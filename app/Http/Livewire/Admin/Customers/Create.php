<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\Customer;
use Livewire\Component;

class Create extends Component
{
    public Customer $customer;

    protected $rules = [
        'customer.name' => 'required|min:5',
        'customer.email' => 'required',
        'customer.phone_number' => 'required',
        'customer.address' => 'required',
    ];

    public function mount(){
        $this->customer = new Customer();
    }

    public function save()
    {
        $this->validate();
        $this->customer->save();

        $this->resetInput();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'New Customer Registered Successfully'
        ]);

    }
    public function resetInput()
    {
        $this->customer = new Customer();
    }
    public function render()
    {
        return view('livewire.admin.customers.create');
    }
}
