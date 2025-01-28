<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SalesReport extends Component
{
    public $start_date,$end_date,$orders=[],$order_type="ALL",$lang;
    /* render the page */
    public function render()
    {
        return view('livewire.admin.reports.sales-report');
    }
    /* process before render */
    public function mount()
    {
        $this->start_date = Carbon::today()->toDateString();
        $this->end_date = Carbon::today()->toDateString();
        $this->getData();
        $this->lang = getTranslation();
        if(!Auth::user()->can('sales_report'))
        {
            abort(404);
        }
    }
    /* feach sales report */
    public function getData()
    {
        $query = Order::latest();
        $query->whereDate('date','>=',Carbon::parse($this->start_date)->startOfDay()->toDateString());
        $query->whereDate('date','<=',Carbon::parse($this->end_date)->endOfDay()->toDateString());
        if($this->order_type != "ALL")
        {
            $query->where('order_type',$this->order_type);
        }
        $this->orders = $query->get();
    }
}
