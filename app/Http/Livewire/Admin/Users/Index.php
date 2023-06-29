<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $user= User::find($id);
        if ($user->id == 1) {
            $this->emit('done', [
                'danger'=>"You can't Delete the Primary User of the System"
            ]);
            return;
        }

        $user->delete();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'User Deleted Successfully'
        ]);

    }
    public function render()
    {
        return view('livewire.admin.users.index',[
            'users'=>User::paginate(10)
        ]);
    }
}
