<?php

namespace App\Http\Livewire\Admin;

use App\Models\TypeOrder;
use Livewire\Component;

class TypeOrderComponent extends Component
{
    public $typeOrders, $typeOrder;

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
        $this->gettypeOrders();
    }

    public function gettypeOrders(){
        $this->typeOrders = TypeOrder::all();
    }

    public function save(){
        $this->validate();

        TypeOrder::create($this->createForm);

        $this->reset('createForm');

        $this->gettypeOrders();

    }

    public function edit(TypeOrder $typeOrder){
        $this->typeOrder = $typeOrder;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $typeOrder->name;
        $this->editForm['status'] = $typeOrder->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->typeOrder->update($this->editForm);
        $this->reset('editForm');
        $this->gettypeOrders();
    }

    public function delete(TypeOrder $typeOrder){
        $typeOrder->delete();
        $this->gettypeOrders();
    }

    public function render()
    {
        return view('livewire.admin.type-order-component')->layout('layouts.admin');
    }
}
