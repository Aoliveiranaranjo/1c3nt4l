<?php

namespace App\Http\Livewire\Admin;

use App\Models\Mechanic;
use Livewire\Component;

class MechanicComponen extends Component
{
    public $mechanics, $mechanic;

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
        'createForm.email' => 'required|email',
        'createForm.abbreviated' => 'required|max:15',

    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre',
        'createForm.email' => 'email',
        'editForm.email' => 'email',
        'createForm.abbreviated' => 'abreviación',
        'editForm.abbreviated' => 'abreviación',
    ];

    public function mount(){
        $this->getmechanics();
    }

    public function getmechanics(){
        $this->mechanics = Mechanic::all();
    }

    public function save(){
        $this->validate();

        Mechanic::create($this->createForm);

        $this->reset('createForm');

        $this->getmechanics();

    }

    public function edit(Mechanic $mechanic){
        $this->mechanic = $mechanic;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $mechanic->name;
        $this->editForm['email'] = $mechanic->email;
        $this->editForm['abbreviated'] = $mechanic->abbreviated;
        $this->editForm['status'] = $mechanic->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50',
            'editForm.email' => 'required|email',
            'editForm.abbreviated' => 'required|max:15',
            'editForm.status' => 'required'

        ]);
        $this->mechanic->update($this->editForm);
        $this->reset('editForm');
        $this->getmechanics();
    }

    public function delete(Mechanic $mechanic){
        $mechanic->delete();
        $this->getmechanics();
    }
    public function render()
    {
        return view('livewire.admin.mechanic-componen')->layout('layouts.admin');
    }
}
