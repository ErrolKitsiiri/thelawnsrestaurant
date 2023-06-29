<?php

namespace App\Http\Livewire\Admin\MenuItems;

use App\Models\MenuItem;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

 

    public function render()
    {
        $menuItems = MenuItem::paginate(10);
        return view('livewire.admin.menu-items.index', ['menuItems'=> $menuItems]);
    }

    public function deleteMenuItem($id){
        $menuItem = MenuItem::where('id', $id)->first();

        $menuItem->delete();
        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Menu Item Deleted Successfully'
        ]);
    }
}
