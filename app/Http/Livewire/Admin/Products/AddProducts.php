<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class AddProducts extends Component
{
    use WithFileUploads;
    public $code,$name,$category,$categories,$image,$price,$description,$is_veg=1,$is_active=1,$lang;
    /* render the page */
    public function render()
    {
        return view('livewire.admin.products.add-products');
    }
    /* process before render */
    public function mount()
    {
        $this->categories = ProductCategory::where('is_active',1)->get();
        $i = DB::table('products')->max('id') ;
        do{
            $i++;
        }
        while(Product::where('code',$i)->first());
        $this->lang = getTranslation();
        $this->code = $i;
        if(!Auth::user()->can('add_product'))
        {
            abort(404);
        }
    }
    /* store products*/
    public function create()
    {
        $this->validate([
            'name'  => 'required',
            'code'  => 'required|unique:products',
            'category'  => 'required',
            'price' => 'required',
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->code = $this->code;
        $product->category_id = $this->category;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->is_veg = $this->is_veg;
        $product->is_active = $this->is_active;
      
        if($this->image){
            
            $default_image = $this->image;
            $input['file'] = time().'.'.$default_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/products/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $imgFile = Image::make($this->image->getRealPath());
            $imgFile->resize(1000,1000,function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationPath.'/'.$input['file']);
            $imageurl = '/uploads/products/'.$input['file'];
            $product->image = $imageurl;
        }
        $product->save();
        return redirect()->route('admin.view_products');
    }
}
