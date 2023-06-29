<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\Customer;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $phone_number, $address;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
    ];



    public function createCustomer()
    {
        $this->validate();

        $customer = new Customer();
        $customer->name = $this->name;
        $customer->email = $this->email;
        $customer->phone_number = $this->phone_number;
        $customer->address = $this->address;
        $customer->save();

        $this->reset();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'New Customer Registered Successfully'
        ]);

    }
    public function render()
    {
        return view('livewire.admin.customers.create');
    }
}
