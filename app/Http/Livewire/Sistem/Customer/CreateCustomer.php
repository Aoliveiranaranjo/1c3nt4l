<?php

namespace App\Http\Livewire\Sistem\Customer;

use App\Models\Customer;
use Livewire\Component;

class CreateCustomer extends Component
{
    public $name, $Cod, $nif, $abbreviated;

    protected $rules  = [
        'name' => 'required|max:50',
        'Cod' => 'required|max:15',
        'nif' => 'required|max:15',
        'abbreviated' => 'required|max:50',

    ];


    public function save(){
        $this->validate();

        $customer = new Customer();

        $customer->name = $this->name;
        $customer->Cod = $this->Cod;
        $customer->nif = $this->nif;
        $customer->abbreviated = $this->abbreviated;

        $customer->save();

        $this->emit('saved');

        return redirect()->route('sistem.customer.index');


    }
    protected $validationAttributes = [
        'name' => 'nombre',
        'Cod' => 'código',
        'nif' => 'NIF',
        'abbreviated' => 'abreviación',
    ];
    public function render()
    {
        return view('livewire.sistem.customer.create-customer')->layout('layouts.sistem');
    }
}
