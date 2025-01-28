<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Addon;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewProducts extends Component
{
    public $products,$lang;
    /* render the page */
    public function render()
    {
        $this->products = Product::latest()->get();
        return view('livewire.admin.products.view-products');
    }
    /* process before render */
    public function mount()
    {
        $this->lang = getTranslation();
        if(!Auth::user()->can('products_list'))
        {
            abort(404);
        }
    }
    /* delete products with foreign key delete restriction */   
    public function delete(Product $product)
    {
        if(Addon::where('product_id',$product->id)->count() > 0)
        {
            $this->dispatchBrowserEvent(
                'alert', ['type' => 'error',  'message' => 'Deletion restricted,Product has addons!']);
            return;
        }
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
        $product->delete();
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Product has been deleted!']);
    }
}
