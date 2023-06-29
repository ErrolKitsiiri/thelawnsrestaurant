<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\Customer;
use Livewire\Component;

class Edit extends Component
{
    public $name, $email, $phone_number, $address;

    public $customerId;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required',
        'phone_number' => 'required',
    ];


    public function mount($id)
    {
        $customer = Customer::where('id', $id)->first();
        $this->name  = $customer->name;
        $this->email  = $customer->email;
        $this->phone_number  = $customer->phone_number;
        $this->address  = $customer->address;
        $this->customerId = $id;

        //dd($id);
    }

    public function updateCustomer()
    {

        $this->validate();

        $customer = Customer::where('id', $this->customerId)->first();
        $customer->name = $this->name;
        $customer->email = $this->email;
        $customer->phone_number = $this->phone_number;
        $customer->address = $this->address;
        $customer->update();

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
