<?php

namespace App\Http\Livewire\Admin;

use App\Models\IncidentType;
use Livewire\Component;

class IncidentTypesComponent extends Component
{
    public $incidentTypes, $incidentType;

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
        $this->getIncidentTypes();
    }

    public function getIncidentTypes(){
        $this->incidentTypes = IncidentType::all();
    }

    public function save(){
        $this->validate();

        IncidentType::create($this->createForm);

        $this->reset('createForm');

        $this->getIncidentTypes();

    }

    public function edit(IncidentType $incidentType){
        $this->incidentType = $incidentType;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $incidentType->name;
        $this->editForm['status'] = $incidentType->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->incidentType->update($this->editForm);
        $this->reset('editForm');
        $this->getIncidentTypes();
    }

    public function delete(IncidentType $incidentType){
        $incidentType->delete();
        $this->getIncidentTypes();
    }
    public function render()
    {
        return view('livewire.admin.incident-types-component')->layout('layouts.admin');
    }
}
