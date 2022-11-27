<?php

namespace App\Http\Livewire\Admin;

use App\Models\StateChange;
use Livewire\Component;

class StateChangeComponent extends Component
{
    public $stateChanges, $stateChange;

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
        $this->getStateChanges();
    }

    public function getStateChanges(){
        $this->stateChanges = StateChange::all();
    }

    public function save(){
        $this->validate();

        StateChange::create($this->createForm);

        $this->reset('createForm');

        $this->getStateChanges();

    }

    public function edit(StateChange $stateChange){
        $this->stateChange = $stateChange;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $stateChange->name;
        $this->editForm['status'] = $stateChange->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->stateChange->update($this->editForm);
        $this->reset('editForm');
        $this->getStateChanges();
    }

    public function delete(StateChange $stateChange){
        $stateChange->delete();
        $this->getStateChanges();
    }

    public function render()
    {
        return view('livewire.admin.state-change-component')->layout('layouts.admin');
    }
}
