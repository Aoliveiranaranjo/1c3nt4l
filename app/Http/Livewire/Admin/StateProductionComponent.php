<?php

namespace App\Http\Livewire\Admin;

use App\Models\StateProduction;
use Livewire\Component;

class StateProductionComponent extends Component
{
    public $stateProductions, $stateProduction;

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
        $this->getStateProductions();
    }

    public function getStateProductions(){
        $this->stateProductions = StateProduction::all();
    }

    public function save(){
        $this->validate();

        StateProduction::create($this->createForm);

        $this->reset('createForm');

        $this->getstateProductions();

    }

    public function edit(StateProduction $stateProduction){
        $this->stateProduction = $stateProduction;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $stateProduction->name;
        $this->editForm['status'] = $stateProduction->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->stateProduction->update($this->editForm);
        $this->reset('editForm');
        $this->getstateProductions();
    }

    public function delete(StateProduction $stateProduction){
        $stateProduction->delete();
        $this->getstateProductions();
    }
    public function render()
    {
        return view('livewire.admin.state-production-component')->layout('layouts.admin');
    }
}
