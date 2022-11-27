<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use Livewire\Component;

class GroupComponent extends Component
{
    public $groups, $group;

    public $search;

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null
    ];

    public $editForm=[
        'open' => false,
        'name' => null
    ];

    public $rules = [
        'createForm.name' => 'required|max:50',

    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre'
    ];

    public function mount(){
        $this->getGroups();
    }

    public function getGroups(){
        $this->groups = Group::all();
    }

    public function save(){
        $this->validate();

        Group::create($this->createForm);

        $this->reset('createForm');

        $this->getGroups();

    }

    public function edit(Group $group){
        $this->group = $group;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $group->name;
        $this->editForm['status'] = $group->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->group->update($this->editForm);
        $this->reset('editForm');
        $this->getGroups();
    }

    public function delete(Group $group){
        $group->delete();
        $this->getGroups();
    }

    public function render()
    {
        return view('livewire.admin.group-component')->layout('layouts.admin');
    }
}
