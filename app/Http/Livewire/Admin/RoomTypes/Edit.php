<?php

namespace App\Http\Livewire\Admin\RoomTypes;

use App\Models\RoomType;
use Livewire\Component;

class Edit extends Component
{
    public $title, $pax, $rate;
    public $roomTypeId;

    protected $rules = [
        'title'=>'required|min:6',
        'pax'=>'required',
        'rate'=>'required',
    ];

    public function mount($id){
        $roomType = RoomType::where('id', $id);

        $roomType->title = $this->title;
        $roomType->pax = $this->pax;
        $roomType->rate = $this->rate;

        $this->roomTypeId = $id;

        //dd($id);
    }

    public function updateRoomType(){

        $this->validate();

        $roomType = RoomType::where('id', $this->roomTypeId)->first();

        $roomType->title = $this->title;
        $roomType->pax = $this->pax;
        $roomType->rate = $this->rate;

        $roomType->update();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Room Type Updated Successfully'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.room-types.edit');
    }
}
