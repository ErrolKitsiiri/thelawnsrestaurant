<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $user, $name, $email, $role_id, $password;

    protected $rules = [
        'name' =>'required',
        'role_id' =>'required',
        'email' =>'required',
        'password' =>'required',
    ];

    public function createUser(){

        $this->validate();

        $user = new User();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->role_id = $this->role_id;
        $user->password = Hash::make($this->password);

        $user->save();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'User Created Successfully'
        ]);

    }

    public function render()
    {
        $users = User::all();
        return view('livewire.admin.users.create', ['users'=>$users]);
    }
}
// {
//     public User $user;

//     protected $rules = [
//         'user.role_id' => 'required',
//         'user.name' => 'required',
//         'user.email' => 'required|unique:users,email',
//     ];
//     public function mount()
//     {
//         $this->user = new User();
//     }


//     public function save()
//     {
//         $this->validate();
//         $this->user->password = Hash::make('1234567890');
//         $this->user->save();

//         return redirect()->route('admin.users.index');
//     }

//     public function render()
//     {
//         return view('livewire.admin.users.create');
//     }
// }
