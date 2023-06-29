<?php

namespace App\Http\Livewire\Admin\RoomTypes;

use App\Models\RoomType;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $roomTypes = RoomType::paginate(10);
        return view('livewire.admin.room-types.index', ['roomTypes' => $roomTypes]);
    }

    public function deleteRoomType($id)
    {
        $roomType = RoomType::where('id', $id)->first();
        $roomType->delete();


        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Room Type Deleted Successfully'
        ]);
    }
}
