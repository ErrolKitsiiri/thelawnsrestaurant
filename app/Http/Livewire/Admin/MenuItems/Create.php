<?php

namespace App\Http\Livewire\Admin\MenuItems;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $title, $description, $price, $image_path, $menu_category_id;

    //public MenuItem $menuItem;

    use WithFileUploads;

    // protected $listeners = [
    //     'done' => 'render'
    // ];

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image_path' => 'image',
        'menu_category_id' => 'required|not_in:0'
    ];

    // public function mount()
    // {
    //     // $this->menuItem = new MenuItem();
    //     $this->menuItem = new MenuItem();
    // }

    public function createMenuItem()
    {

        $this->validate();

        $menuItem = new MenuItem();
        $menuItem->title = $this->title;
        $menuItem->menu_category_id = $this->menu_category_id;
        $menuItem->description = $this->description;
        $menuItem->price = $this->price;

        $imagename = Carbon::now()->timestamp . '.' . $this->image_path->extension();
        $this->image_path->storeAs('admin/menu_item_images', $imagename);

        $menuItem->image_path = $imagename;
        $menuItem->save();

        $this->reset();

        // $this->emit('done', [
        //     'success'=>"You have Successfully Created a new Menu Item"
        // ]);
        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'New Menu Item Posted Successfully'
        ]);

    }
    public function render()
    {
        $categories = MenuCategory::all();
        return view('livewire.admin.menu-items.create', ['categories' => $categories]);
    }
}
