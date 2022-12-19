<?php

namespace App\Http\Livewire\Admin;

use App\Models\Charge;
use Livewire\Component;

class ChargeComponent extends Component
{
    public $charges, $charge;

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
        $this->getCharges();
    }

    public function getCharges(){
        $this->charges = Charge::all();
    }

    public function save(){
        $this->validate();


        Charge::create($this->createForm);


        $this->reset('createForm');

        $this->getCharges();

    }

    public function edit(Charge $charge){
        $this->charge = $charge;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $charge->name;
        $this->editForm['status'] = $charge->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->charge->update($this->editForm);
        $this->reset('editForm');
        $this->getCharges();
    }

    public function delete(Charge $charge){
        $charge->delete();
        $this->getCharges();
    }

    public function render()
    {
        return view('livewire.admin.charge-component')->layout('layouts.admin');
    }
}
