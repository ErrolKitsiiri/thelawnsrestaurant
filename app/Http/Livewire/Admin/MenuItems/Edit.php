<?php

namespace App\Http\Livewire\Admin\MenuItems;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\View\Components\Front\Category;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    public $title, $price, $menuItemId, $description, $image, $menu_category_id, $new_image;
    use WithFileUploads;

    protected $rules = [
        'title' => 'required|min:6',
        'price' => 'required',
        'description' => 'required',
        //'image' => 'required'
    ]; 

    public function mount($id)
    {

        $menuItem = MenuItem::where('id', $id)->first();

        $this->title = $menuItem->title;
        $this->description = $menuItem->description;
        $this->price = $menuItem->price;
        $this->menu_category_id = $menuItem->menu_category_id;

        $this->menuItemId = $id;
    }

    public function updateMenuItems()
    {

        $this->validate();

        $menuItem = MenuItem::where('id', $this->menuItemId)->first();
        $menuItem->title = $this->title;
        $menuItem->description = $this->description;
        $menuItem->price = $this->price;

        if ($this->new_image) {

            $imagename = Carbon::now()->timestamp . '.' . $this->new_image->extension();
            $this->new_image->storeAs('menu_items_images', $imagename);
            $menuItem->image_path = $imagename;
        }

        $menuItem->update();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Menu Item Updated Successfully'
        ]);
    }

    public function render()
    {
        $categories = MenuCategory::all();
        return view('livewire.admin.menu-items.edit', ['categories' => $categories]);
    }
}
