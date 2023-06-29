<?php

namespace App\Http\Livewire\Admin\MenuCategories;

use App\Models\MenuCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $menuCategories = MenuCategory::paginate(10);
        return view('livewire.admin.menu-categories.index', ['menuCategories' => $menuCategories]);
    }

    public function deleteMenuCategory($id)
    {
        $menuCategory = MenuCategory::where('id', $id)->first();

        $menuCategory->delete();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Menu Category Deleted Successfully'
        ]);

        // $this->emit('done', [
        //     'success' => "Successfully Deleted the Menu Category from the system"
        // ]);
    }
}
