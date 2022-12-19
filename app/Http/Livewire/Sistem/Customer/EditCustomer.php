<?php

namespace App\Http\Livewire\Sistem\Customer;

use App\Models\Customer;
use Livewire\Component;

class EditCustomer extends Component
{
     //public $customer;

     protected $rules  = [
        'customer.name' => 'required|max:50',
        'customer.Cod' => 'required|max:15',
        'customer.nif' => 'required|max:15',
        'customer.abbreviated' => 'required|max:50',
        'customer.status' => 'required',

    ];

    public function mount(Customer $customer){
        $this->customer = $customer;
    }
    protected $validationAttributes = [
        'customer.name' => 'nombre',
        'customer.Cod' => 'código',
        'customer.nif' => 'NIF',
        'customer.abbreviated' => 'abreviación',
    ];
    public function save(){
        $this->validate();
        $this->customer->save();

        $this->emit('saved');

        return redirect()->route('sistem.customer.index');

    }
    public function render()
    {
        return view('livewire.sistem.customer.edit-customer')->layout('layouts.sistem');
    }
}
