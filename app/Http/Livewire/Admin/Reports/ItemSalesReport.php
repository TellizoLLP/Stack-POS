<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ItemSalesReport extends Component
{
    public $start_date,$end_date,$data=[],$search='',$lang;
    /* render the page */
    public function render()
    {
        return view('livewire.admin.reports.item-sales-report');
    }
    /* process before render */
    public function mount()
    {
        $this->start_date = Carbon::today()->startOfMonth()->toDateString();
        $this->end_date = Carbon::today()->toDateString();
        $this->getData();
        $this->lang = getTranslation();
        if(!Auth::user()->can('item_wise_sales_report'))
        {
            abort(404);
        }
    }
    /* feach Item wise sales report*/
    public function getData()
    {
        $query = Product::latest();
        if($this->search != '')
        {
            $query = $query->where('name','like','%'.$this->search.'%');
        }

        $products = $query->get();
        $productids = $products->pluck('id');

        $query = Order::latest();
        $query->whereDate('date','>=',Carbon::parse($this->start_date)->startOfDay()->toDateString());
        $query->whereDate('date','<=',Carbon::parse($this->end_date)->endOfDay()->toDateString());
        $query->whereHas('details', function($query2) use ($productids){
            $query2->whereIn('product_id',$productids);
        });
        $query->with('details');
        $orders = $query->get();
        
        $data = [];
        foreach ($orders as $key => $value) {
            foreach ($value->details as $key => $product) {
                if(in_array($product->product_id,$productids->toArray()))
                {
                    if(isset($data[$product->product_id]))
                    {
                        $data[$product->product_id]['qty'] += $product->quantity;
                        $data[$product->product_id]['amount'] += $product->total;
                    }
                    else{
                        $data[$product->product_id] = [
                            'name'  => $product->product_name,
                            'qty'   => $product->quantity,
                            'amount'    => $product->total
                        ];
                    }
                }
            }
        }
        $this->data = $data;
    }   
}
