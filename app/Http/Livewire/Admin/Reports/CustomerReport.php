<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerReport extends Component
{
    public $start_date,$end_date,$data=[],$search='',$lang;
    /* render the page */
    public function render()
    {
        return view('livewire.admin.reports.customer-report');
    }
    /* process before render */
    public function mount()
    {
        $this->start_date = Carbon::today()->toDateString();
        $this->end_date = Carbon::today()->toDateString();
        $this->getData();
        $this->lang = getTranslation();
        if(!Auth::user()->can('customer_report'))
        {
            abort(404);
        }
    }
    /* feach customer sales report*/
    public function getData()
    {
        $query = Customer::latest();
        if($this->search != '')
        {
            $query = $query->where('name','like','%'.$this->search.'%');
        }
        $query->withSum('orders','total');
        $query->withSum('payments','amount');
        $this->data = $query->get()->toArray();
    }
}
