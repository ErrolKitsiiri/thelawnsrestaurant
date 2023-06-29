<?php

namespace App\Http\Livewire\Admin\MenuCategories;

use App\Models\MenuCategory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    public $image, $new_image;
    public $menuCategory;
    use WithFileUploads;

    protected $rules = [
        'menuCategory.title' => 'required',
        'new_image' => 'image',
    ];

    // protected $listeners = [
    //     'done' => 'render'
    // ];

    public function mount($id)
    {
        $this->menuCategory = MenuCategory::find($id);
            $this->image = MenuCategory::find($id)->image_path;
    }

    public function save()
    {

        $this->validate();

        if ($this->new_image) {
            if (file_exists('/images/admin/menu_category_images/' . $this->image)) {
                unlink('/images/admin/menu_category_images/' . $this->image);
            }
            $imagename = Carbon::now()->timestamp . '.' . $this->new_image->extension();
            $this->new_image->storeAs('admin/menu_category_images', $imagename);
            $this->menuCategory->image_path = $imagename;
        }

        $this->menuCategory->save();

        // $this->emit('done', [
        //     'success' => 'Successfully Edited this Menu Category'
        // ]);
        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'Menu Category Updated Successfully'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.menu-categories.edit');
    }
}
