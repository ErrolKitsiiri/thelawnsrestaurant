<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $name, $email, $role_id, $password;

    public $userId;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required',
        'role_id' => 'required',
    ];

    public function mount($id)
    {

        $user = User::where('id', $id)->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;

        $this->userId = $id;
    }


    public function updateUser()
    {

        $this->validate();

        $user = User::where('id', $this->userId)->first();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role_id = $this->role_id;
        $user->update();

        $this->dispatchBrowserEvent('success', [
            'title'=>'Success',
            'icon'=>'success',
            'text'=>'User Updated Successfully'
        ]);
    }



    public function render()
    {
        return view('livewire.admin.users.edit');
    }

    // public User $user;

    // public function rules()
    // {
    //     return [
    //         'user.role_id' => 'required',
    //         'user.name' => 'required',
    //         'user.email' => [
    //             'required',
    //             Rule::unique('users','email')->ignore($this->user->id),
    //         ]
    //     ];
    // }

    // public function mount($id)
    // {
    //     $this->user = User::find($id);
    // }


    // public function save()
    // {
    //     $this->validate();
    //     $this->user->password = Hash::make('1234567890');
    //     $this->user->save();

    //     return redirect()->route('admin.users.index');
    // }

    // public function render()
    // {
    //     return view('livewire.admin.users.edit');
    // }
}
