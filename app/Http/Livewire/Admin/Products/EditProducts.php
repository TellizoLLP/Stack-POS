<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class EditProducts extends Component
{
    use WithFileUploads;
    public $product,$code,$name,$category,$categories,$image,$price,$description,$is_veg=1,$is_active=1,$lang;
    /* render the page */
    public function render()
    {
        return view('livewire.admin.products.edit-products');
    }
    /* process before render */
    public function mount($id)
    {
        $this->categories = ProductCategory::where('is_active',1)->get();
        $this->product = Product::find($id);
        if(!$this->product)
        {
            abort(404);
        }
        $this->code = $this->product->code;
        $this->name = $this->product->name;
        $this->category = $this->product->category_id;
        $this->price = $this->product->price;
        $this->description = $this->product->description;
        $this->is_veg = $this->product->is_veg;
        $this->is_active = $this->product->is_active;
        $this->lang = getTranslation();
        if(!Auth::user()->can('edit_product'))
        {
            abort(404);
        }
    }
    /* update product data */
    public function update()
    {
        $this->validate([
            'name'  => 'required',
            'code'  => 'required|unique:products,code,'.$this->product->id,
            'category'  => 'required',
            'price' => 'required',
        ]);
        $product = $this->product;
        $product->name = $this->name;
        $product->code = $this->code;
        $product->category_id = $this->category;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->is_veg = $this->is_veg;
        $product->is_active = $this->is_active;
       
        if($this->image){
            if($product->image)
            {
                $file= public_path($product->image);
                if(file_exists($file))
                {
                    try{
                        unlink(public_path($product->image));
                    }
                    catch(\Exception $e)
                    {
    
                    }
                }
            }
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