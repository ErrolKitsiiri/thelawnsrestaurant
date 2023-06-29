<?php

namespace App\Http\Livewire\Admin\RoomReservations;

use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomReservation;
use App\Models\RoomSelection;
use App\Models\RoomType;
use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    public $roomTypes;
    public $reservationId;
    public $roomNumber;
    public $roomType;
    public $check_in;
    public $check_out;
    public $client;
    public $rate;

    protected $rules = [
        'roomNumber' => 'required',
        'roomType' => 'required',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after:check_in',
    ];

    public function mount($id)
    {
        $reservation = RoomReservation::find($id);

        if ($reservation) {
            $this->reservationId = $reservation->id;
            $this->roomNumber = $reservation->room_id;
            $this->roomType = $reservation->room_type_id;
            $this->check_in = $reservation->check_in;
            $this->check_out = $reservation->check_out;

            // Retrieve customer details
            $this->client = $reservation->roomCustomerReservations;
        }
    }


    public function updateRoomReservation()
    {
        $this->validate();

        $reservation = RoomReservation::find($this->reservationId);

        if ($reservation) {
            $reservation->room_id = $this->roomNumber;
            $reservation->check_in = $this->check_in;
            $reservation->check_out = $this->check_out;
            $checkInDate = Carbon::parse($this->check_in);
            $checkOutDate = Carbon::parse($this->check_out);

            if ($checkInDate && $checkOutDate) {
                $diffInDays = $checkOutDate->diffInDays($checkInDate);
                $roomType = RoomType::find($this->roomType);

                if ($roomType) {
                    $reservation->rate = $roomType->rate * $diffInDays;
                }
            }

            $reservation->save();

            // Update room selection if exists
            $roomSelection = RoomSelection::where('room_reservation_id', $reservation->id)->first();

            if ($roomSelection) {
                $roomSelection->room_type_id = $this->roomType;
                $roomSelection->save();
            }
        }

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Room Reservation Updated Successfully'
        ]);
    }

    public function render()
    {
        $this->roomTypes = RoomType::all();
        $selectedRoomType = RoomType::find($this->roomType);
        $roomTypeRates = RoomType::pluck('rate', 'id')->toArray();

        $roomNumbers = [];

        if ($selectedRoomType) {
            $roomNumbers = Room::where('room_type_id', $this->roomType)
                ->whereDoesntHave('roomReservations', function ($query) {
                    $query->where('check_out', '>', $this->check_in)
                        ->where('check_in', '<', $this->check_out);
                })
                ->pluck('room_number', 'id')
                ->toArray();
        }

        $customers = Customer::all();

        return view('livewire.admin.room-reservations.edit', compact('roomNumbers', 'customers', 'selectedRoomType', 'roomTypeRates'));
    }
}
