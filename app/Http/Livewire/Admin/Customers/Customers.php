<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Customers extends Component
{
    public $customers,$name,$description,$customer,$is_active = true,$lang;
    public $phone,$email,$address;
    /* render the page */
    public function render()
    {
        $this->customers = Customer::latest()->get();
        return view('livewire.admin.customers.customers');
    }
    /* process before render */
    public function mount()
    {
        $this->lang = getTranslation();
        if(!Auth::user()->can('customers_list'))
        {
            abort(404);
        }
    }
    /* store customer data */
    public function create()
    {
        $this->validate([
            'name'  => 'required',
            'phone'  => 'required',
            'email' => 'email|unique:customers'
        ]);
        $customer = new Customer();
        $customer->name = $this->name;
        $customer->phone = $this->phone;
        $customer->email = ($this->email == "" ? null : $this->email);
        $customer->address = $this->address;
        $customer->save();
        $this->emit('closemodal');
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Customer has been created!']);
    }

    /* reset customer data */
    public function edit(Customer $customer)
    {
        $this->resetFields();
        $this->customer = $customer;
        $this->name = $customer->name;
        $this->phone = $customer->phone;
        $this->email = $customer->email;
        $this->address = $customer->address;
    }
    /* update customer data */
    public function update()
    {
        $this->validate([
            'name'  => 'required',
            'phone'  => 'required',
            'email' => 'nullable|email|unique:customers,email,'.$this->customer->id,
        ]);
        $customer = $this->customer;
        $customer->name = $this->name;
        $customer->phone = $this->phone;
        $customer->email = ($this->email == "" ? null : $this->email);
        $customer->address = $this->address;
        $customer->save();
        $this->emit('closemodal');
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Customer has been updated!']);
    }
    /* delete customer data */
    public function delete(Customer $customer)
    {
        $customer->delete();
        $this->customer = null;
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Customer has been deleted!']);
    }
    /* reset customer data */
    public function resetFields()
    {
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->address = '';
        $this->resetErrorBag();
    }
}
