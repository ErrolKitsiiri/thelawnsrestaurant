<?php

namespace App\Http\Livewire\Admin\RoomTypes;

use App\Models\RoomType;
use Livewire\Component;

class Create extends Component
{

    public ?RoomType $roomType;

    // protected $listeners = [
    //     'success' => 'render'
    // ];

    protected $rules = [
        'roomType.title' => 'required',
        'roomType.pax' => 'required',
        'roomType.rate' => 'required',
    ];

    public function mount()
    {
        $this->roomType = new RoomType();
    }

    public function save()
    {

        $this->validate();
        $this->roomType->save();

        //$this->emit('success', ['message'=>'A new roomtype has been added successfully']);

        $this->resetInput();

        $this->dispatchBrowserEvent('success', [
            'title' => 'Success',
            'icon' => 'success',
            'text' => 'New Room Type Created Successfully',
        ]);
    }

    public function resetInput()
    {
        $this->roomType = new RoomType();
    }

    public function render()
    {
        return view('livewire.admin.room-types.create');
    }
}
