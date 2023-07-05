<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\Customer;
use Livewire\Component;

class Edit extends Component
{
    public Customer $customer;

    protected $rules = [
        'customer.name' => 'required|min:5',
        'customer.email' => 'required',
        'customer.phone_number' => 'required',
        'customer.address' => 'required',
    ];


    public function mount($id)
    {
        $this->customer = Customer::find($id);
    }

    public function update()
    {

        $this->validate();

        $this->customer->save();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Customer Details Updated Successfully'
        ]);
    }

    public function render()
    {

        return view('livewire.admin.customers.edit');
    }
}
