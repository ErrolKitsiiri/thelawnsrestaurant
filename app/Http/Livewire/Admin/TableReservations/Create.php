<?php

namespace App\Http\Livewire\Admin\TableReservations;

use App\Models\Customer;
use App\Models\TableReservation;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $client;
    public $selectedCustomer;

    public $name, $reservation_date, $reservation_time, $pax, $data, $customer_name, $customerData;

    public function updatedClient($client)
    {
        $this->customerData = json_decode($client, true);
    }


    protected $rules = [
        'selectedCustomer' => 'required',
        'reservation_date' => 'required|date|after_or_equal:today',
        'reservation_time' => 'required',
        'pax' => 'required|max:20',
    ];

    public function createTableReservation()
    {

        $this->validate();

        $data = json_decode($this->client);
        $reservation = new TableReservation();


        $reservation->customer_id = $data->id;
        $reservation->tableReservations->name = $data->name;
        $reservation->reservation_date = Carbon::parse($this->reservation_date);
        $reservation->reservation_time = Carbon::parse($this->reservation_time)->toTimeString();
        $reservation->pax = $this->pax;
        $reservation->save();

        $this->reset();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'New Table Reservation Created Successfully'
        ]);
    }



    public function render()
    {
        $customers = Customer::all();

        return view('livewire.admin.table-reservations.create', ['customers' => $customers]);
    }
}
