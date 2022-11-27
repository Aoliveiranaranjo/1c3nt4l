<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Laravel\Fortify\Fortify;


class CreateUser extends Component
{

    public $name, $email, $password;

    protected $rules  = [
        'name' => 'required|max:50',
        'email' => 'required|unique:users,email',
        'password' => 'required',
    ];


    public function save()
    {
        $this->validate();

        $user = new User();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->email_verified_at = now();
        $user->password = bcrypt('password');



        $user->save();

        $this->emit('saved');

        return redirect()->route('admin.users.index');
    }
    protected $validationAttributes = [
        'name' => 'nombre',
        'email' => 'email',
        'password' => 'contraseña',
    ];

    public function render()
    {

        return view('livewire.admin.user.create-user')->layout('layouts.admin');
    }
}
