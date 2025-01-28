<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DaywiseSalesReport extends Component
{
    public $start_date,$end_date,$data=[],$lang;
    /* render the page */
    public function render()
    {
        return view('livewire.admin.reports.daywise-sales-report');
    }
    /* process before render */
    public function mount()
    {
        $this->start_date = Carbon::today()->startOfMonth()->toDateString();
        $this->end_date = Carbon::today()->toDateString();
        $this->getData();
        $this->lang = getTranslation();
        if(!Auth::user()->can('day_wise_sales_report'))
        {
            abort(404);
        }

    }
    /* feach daily sales report */
    public function getData()
    {
        $this->data = DB::table('orders')
        ->whereDate('date','<=',Carbon::parse($this->end_date)->endOfDay()->toDateString())
        ->whereDate('date','>=',Carbon::parse($this->start_date)->startOfDay()->toDateString())
        ->select(DB::raw('date(date) as date'), DB::raw('COUNT(id) as count'),DB::raw('SUM(total) AS total') )
        ->groupBy(DB::raw('date(date)'))
        ->get()->toArray();
        $data = [];
        foreach($this->data as $key => $value)
        {
            $data[$key] = json_decode(json_encode($value), true);
        }

        foreach ($data as $key => $value) {
            $paymenttotal = \App\Models\OrderPayment::whereDate('created_at',Carbon::parse($value['date']))->sum('amount');
            $data[$key]['total_paid'] = $paymenttotal;
        }
        $this->data = $data;
    }   
}
