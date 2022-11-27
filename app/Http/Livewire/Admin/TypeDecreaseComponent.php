<?php

namespace App\Http\Livewire\Admin;

use App\Models\DecreaseType;
use Livewire\Component;

class TypeDecreaseComponent extends Component
{
    public $decreaseTypees, $decreaseType;

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
        $this->getdecreaseTypees();
    }

    public function getdecreaseTypees(){
        $this->decreaseTypes = DecreaseType::all();
    }

    public function save(){
        $this->validate();

        DecreaseType::create($this->createForm);

        $this->reset('createForm');

        $this->getdecreaseTypees();

    }

    public function edit(DecreaseType $decreaseType){
        $this->decreaseType = $decreaseType;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $decreaseType->name;
        $this->editForm['status'] = $decreaseType->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->decreaseType->update($this->editForm);
        $this->reset('editForm');
        $this->getdecreaseTypees();
    }

    public function delete(DecreaseType $decreaseType){
        $decreaseType->delete();
        $this->getdecreaseTypees();
    }
    public function render()
    {
        return view('livewire.admin.type-decrease-component')->layout('layouts.admin');
    }
}
