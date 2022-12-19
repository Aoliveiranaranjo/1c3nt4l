<?php

namespace App\Http\Livewire\Admin;

use App\Models\OrderState;
use Livewire\Component;

class OrderStateComponent extends Component
{
    public $orderStates, $orderState;

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
        $this->getorderStates();
    }

    public function getorderStates(){
        $this->orderStates = OrderState::all();
    }

    public function save(){
        $this->validate();

        OrderState::create($this->createForm);

        $this->reset('createForm');

        $this->getorderStates();

    }

    public function edit(OrderState $orderState){
        $this->orderState = $orderState;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $orderState->name;
        $this->editForm['status'] = $orderState->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50'

        ]);
        $this->orderState->update($this->editForm);
        $this->reset('editForm');
        $this->getorderStates();
    }

    public function delete(OrderState $orderState){
        $orderState->delete();
        $this->getorderStates();
    }
    public function render()
    {
        return view('livewire.admin.order-state-component')->layout('layouts.admin');
    }
}
