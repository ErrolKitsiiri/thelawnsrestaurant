<?php

namespace App\Http\Livewire\Admin\TableReservations;

use App\Models\TableReservation;
use Livewire\Component;

class Edit extends Component
{
    public $pax, $reservation_date, $reservation_time, $name, $email, $phone_number, $tableReservationId, $customer_id;

    protected $rules = [
        'reservation_date' => 'required|date|after_or_equal:today',
        'reservation_time' => 'required',

    ];

    public function mount($id){

        $table_reservation = TableReservation::where('id', $id)->first();

        $this->name = $table_reservation->tableReservations->name;
        $this->email = $table_reservation->tableReservations->email;
        $this->phone_number = $table_reservation->tableReservations->phone_number;
        $this->reservation_date = $table_reservation->reservation_date;
        $this->reservation_time = $table_reservation->reservation_time;
        $this->pax = $table_reservation->pax;

        $this->customer_id = $table_reservation->customer_id;

        $this->tableReservationId = $id;

       // dd($this->name);

    }

    public function editTableReservation(){

        //$this->validate();

        $tableReservation = TableReservation::where('id', $this->tableReservationId)->first();

        $tableReservation->reservation_date = $this->reservation_date;
        $tableReservation->reservation_time = $this->reservation_time;
        $tableReservation->pax = $this->pax;

        $tableReservation->update();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Table Reservation Updated Successfully'
        ]);

    }

    public function render()
    {
        return view('livewire.admin.table-reservations.edit');
    }
}
