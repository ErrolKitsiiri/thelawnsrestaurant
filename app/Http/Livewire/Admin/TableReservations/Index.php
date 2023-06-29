<?php

namespace App\Http\Livewire\Admin\TableReservations;

use App\Models\TableReservation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $reservation;
    protected $paginationTheme = 'bootstrap';

    public function mount(){

        foreach (TableReservation::all() as $key => $reservation) {
            if ($reservation->reservation_date < \Illuminate\Support\Carbon::today()) {
                $reservation->status  = 'Expired';
                $reservation->save();
            }
        }

    }


    public function render()
    {
        $table_reservations = TableReservation::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.table-reservations.index', ['table_reservations' => $table_reservations]);
    }

    public function deleteTableReservation($id)
    {
        $table_reservations = TableReservation::where('id', $id)->first();
        $table_reservations->delete();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Table Reservation Deleted Successfully'
        ]);
    }
}
