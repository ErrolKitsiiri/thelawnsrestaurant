<?php

namespace App\Http\Livewire\Admin\RoomReservations;

use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomReservation;
use App\Models\RoomSelection;
use App\Models\RoomType;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $client;
    public $roomType;
    public $roomNumbers;
    public $selectedRoomType;
    public $roomSelection;
    public $customer_id;
    public $roomtype;


    public $name, $check_in, $check_out, $rate, $data, $customerData, $roomNumber;

    protected $rules = [
        // 'customer_id'=>'required',
        // 'customer_id' => 'required|not_in:0',
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:checkIn',
        'rate' => 'required',
        'roomType' => 'required',
        'roomNumber' => 'required',
    ];


    public function mount()
    {
        $this->roomNumbers = [];
    }

    public function updatedClient($client)
    {
        $this->customerData = json_decode($client, true);
    }

    public function updatedRoomType($value)
    {
        // Retrieve the room type details
        $roomType = RoomType::find($value);
        // Set the pax value
        if ($roomType) {
            $this->roomSelection['pax'] = $roomType->pax;
        }
    }

    public function filterRoomNumbers()
    {
        if (!empty($this->roomType)) {
            // Get the room numbers that match the room type
            $roomNumbers = Room::where('room_type_id', $this->roomType)->pluck('id');

            // Exclude the room numbers that have an active reservation
            $reservedRoomNumbers = RoomReservation::where('isCheckedOut', 1)
                ->pluck('room_id');

            $availableRoomNumbers = $roomNumbers->diff($reservedRoomNumbers);

            // Fetch the room type details
            $this->selectedRoomType = RoomType::find($this->roomType);
           

            $this->roomNumbers = Room::whereIn('id', $availableRoomNumbers)->get();
        } else {
            $this->roomNumbers = [];
            $this->selectedRoomType = null;
            $this->rate = null;
        }
    }

    public function updatedCheckOut()
    {
        $this->rate  = Carbon::parse($this->check_out)->diffInDays(Carbon::parse($this->check_in)) * $this->selectedRoomType['rate'];
    }

    public function createRoomReservation()
    {
        $this->validate();
        $data = json_decode($this->client);
        $reservation = new RoomReservation();
        $reservation->customer_id = $data->id;
        $reservation->room_id = $this->roomNumber;
        $reservation->check_in = Carbon::parse($this->check_in);
        $reservation->check_out = Carbon::parse($this->check_out);

        if ($reservation->check_in && $reservation->check_out && $this->roomType) {
            $roomType = RoomType::find($this->roomType);

            if ($roomType) {
                $diffInDays = $reservation->check_out->diffInDays($reservation->check_in);
                $rate = $roomType->rate;
                $reservation->rate = $diffInDays * $rate;
                $this->rate = $reservation->rate;
                $reservation->save();

                // Create the room selection
                $roomSelection = new RoomSelection();
                $roomSelection->room_reservation_id = $reservation->id;
                $roomSelection->room_type_id = $this->roomType;
                $roomSelection->pax = $roomType->pax; // Retrieve pax from room type
                $roomSelection->extras = '';
                $roomSelection->save();

                $this->reset();
                session()->flash('success', 'Room reservation created successfully.');
            } else {
                $this->rate = null;
                session()->flash('error', 'Failed to find room type with ID: ' . $this->roomType);
            }
        } else {
            $this->rate = null;
            session()->flash('error', 'Please provide valid check-in, check-out dates, and room type.');
        }
        
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'title' => 'Success',
            'icon' => 'success',
            'text' => 'New Room Reservation Created Successfully'
        ]);
    }
    public function render()
    {
        $customers = Customer::all();
        $roomTypes = RoomType::all();
        $rooms = Room::all();
        return view('livewire.admin.room-reservations.create', compact('customers', 'roomTypes', 'rooms'));
    }
}
