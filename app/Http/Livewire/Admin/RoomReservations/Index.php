<?php

namespace App\Http\Livewire\Admin\RoomReservations;

use App\Models\RoomReservation;
use App\Models\RoomSelection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $room_reservations = RoomReservation::with('roomReservation.roomType')->where('isCheckedOut',1 )->paginate(10);

        //$room_reservations = RoomReservation::paginate(10);
        // dd($room_reservations);
        return view('livewire.admin.room-reservations.index', ['room_reservations' => $room_reservations]);
    }

    public function checkoutRoom($id)
    {
        $room_reservation = RoomReservation::find($id);
        $room_reservation->isCheckedOut = 0;
        $room_reservation->save();
        session()->flash('success', 'Room has been checked out successfully.');

    }

    public function deleteRoomReservation($id)
    {
        $reservation = RoomReservation::where('id', $id)->first();

        if ($reservation) {
            // Delete the room reservation
            $reservation->delete();

            // Delete the corresponding room selection
            $roomSelection = RoomSelection::where('room_reservation_id', $id)->first();
            if ($roomSelection) {
                $roomSelection->delete();
            }

            // session()->flash('success', 'Room has been checked out successfully.');
            $this->dispatchBrowserEvent('success', [
                'title'=>'Success',
                'icon'=>'success',
                'text'=>'Room Reservation Deleted Successfully'
            ]);
        }
    }
}
