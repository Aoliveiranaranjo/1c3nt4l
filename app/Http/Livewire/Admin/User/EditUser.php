<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    //public $user;
    public $roles;

    protected $listeners = ['refreshAssignRole' => '$refresh'];


    protected $rules  = [
        'user.name' => 'required|max:50',
        'user.banned_at' => 'nullable',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->roles = Role::all();
    }
    protected $validationAttributes = [
        'user.name' => 'nombre',
    ];

    public function save()
    {
        $this->validate();

        if ($this->user->banned_at == true) {
            $this->user->banned_at = Carbon::now();
            $this->user->ban();

        } else {
            $this->user->banned_at = $this->user->unban();
        }


        $this->user->update();

        $this->emit('saved');

        return redirect()->route('admin.users.index');
    }
    public function render()
    {
        return view('livewire.admin.user.edit-user')->layout('layouts.admin');
    }
}
