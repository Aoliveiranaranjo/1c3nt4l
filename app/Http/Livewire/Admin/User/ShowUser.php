<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class ShowUser extends Component
{
    use WithPagination;

    public $roles;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['delete',
                    'usersuccess'

                        ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete(User $user){
        $user->delete();
     }

     public function usersuccess(){
        $this->emit('alert');
     }

     public function order($sort){
        if ($this->sort == $sort) {
            if ($this->direction == 'desc'){
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }

    }

    public function mount(){
        $this->roles = Role::all();
    }

    public function render()
    {

        $users = User::where('email', '<>', auth()->user()->email)
                ->where(function($query){
                    $query->where('name', 'like', '%' . $this->search . '%');
                    $query->where('email', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate(15);

        return view('livewire.admin.user.show-user', compact('users'))->layout('layouts.admin');
    }
}
