<?php

namespace App\Http\Livewire\Admin;

use App\Models\TypeChange;
use Livewire\Component;

class TypeChangeComponent extends Component
{
    public $typeChanges, $typeChange;

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
        $this->getTypeChanges();
    }

    public function getTypeChanges(){
        $this->typeChanges = TypeChange::all();
    }

    public function save(){
        $this->validate();

        TypeChange::create($this->createForm);

        $this->reset('createForm');

        $this->getTypeChanges();

    }

    public function edit(TypeChange $typeChange){
        $this->typeChange = $typeChange;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $typeChange->name;
        $this->editForm['status'] = $typeChange->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->typeChange->update($this->editForm);
        $this->reset('editForm');
        $this->gettypeChanges();
    }

    public function delete(TypeChange $typeChange){
        $typeChange->delete();
        $this->gettypeChanges();
     }
    public function render()
    {
        return view('livewire.admin.type-change-component')->layout('layouts.admin');

    }
}
