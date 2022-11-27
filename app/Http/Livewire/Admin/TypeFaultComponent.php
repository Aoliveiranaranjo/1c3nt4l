<?php

namespace App\Http\Livewire\Admin;

use App\Models\FaultType;
use Livewire\Component;

class TypeFaultComponent extends Component
{
    public $typeFaultes, $typeFault;

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
        $this->gettypeFaultes();
    }

    public function gettypeFaultes(){
        $this->typeFaults = FaultType::all();
    }

    public function save(){
        $this->validate();

        FaultType::create($this->createForm);

        $this->reset('createForm');

        $this->gettypeFaultes();

    }

    public function edit(FaultType $typeFault){
        $this->typeFault = $typeFault;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $typeFault->name;
        $this->editForm['status'] = $typeFault->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->typeFault->update($this->editForm);
        $this->reset('editForm');
        $this->gettypeFaultes();
    }

    public function delete(FaultType $typeFault){
        $typeFault->delete();
        $this->gettypeFaultes();
    }
    public function render()
    {
        return view('livewire.admin.type-fault-component')->layout('layouts.admin');
    }
}
