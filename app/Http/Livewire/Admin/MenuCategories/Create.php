<?php

namespace App\Http\Livewire\Admin\MenuCategories;

use App\Models\MenuCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    public MenuCategory $menuCategory;
    public $image_path;
    use WithFileUploads;

    // protected $listeners = [
    //     'done' => 'render'
    // ];

    protected $rules = [
        'menuCategory.title' => 'required',
        'image_path' => 'required|image',
    ];

    public function mount()
    {
        $this->menuCategory = new MenuCategory();
    }

    public function create()
    {

        $this->validate();

        $imagename = Carbon::now()->timestamp . '.' . $this->image_path->extension();
        $this->menuCategory->image_path->storeAs('admin/menu_category_images', $imagename);
        $this->menuCategory->image_path = $imagename;

        $this->menuCategory->save();

        // $this->emit('done', [
        //     'success'=>"You have Successfully Created a new Menu Category"
        // ]);

        $this->dispatchBrowserEvent('success', [
            'title' => 'Success',
            'icon' => 'success',
            'text' => 'You have Successfully Created a new Menu Category'
        ]);

        $this->resetInput();
    }
    public function resetInput()
    {
        $this->menuCategory = new MenuCategory();
        $this->image_path = null;
    }

    public function render()
    {
        return view('livewire.admin.menu-categories.create');
    }
}
