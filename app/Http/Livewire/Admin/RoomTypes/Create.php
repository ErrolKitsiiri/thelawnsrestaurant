<?php

namespace App\Http\Livewire\Admin\RoomTypes;

use App\Models\RoomType;
use Livewire\Component;

class Create extends Component
{
    public $title, $pax, $rate;

    protected $rules = [
        'title'=>'required|min:6',
        'pax'=>'required',
        'rate'=>'required',
    ];

    public function createRoomType(){

        $this->validate();

        $roomType = new RoomType();
        $roomType->title = $this->title;
        $roomType->pax = $this->pax;
        $roomType->rate = $this->rate;

        $roomType->save();
        // $this->dispatchBrowserEvent('success', ['message'=>'A new roomtype has been added successfully']);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'New Room Type Created Successfully'
        ]);

    }

    public function render()
    {
        return view('livewire.admin.room-types.create');
    }
}
