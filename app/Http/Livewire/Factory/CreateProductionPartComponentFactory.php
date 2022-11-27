<?php

namespace App\Http\Livewire\Factory;

use App\Models\ProductionPart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateProductionPartComponentFactory extends Component
{
    public $open = false;
    public $amount,  $production, $user_id;

    public function mount()
    {

    }

    protected $rules = [
        'amount' => 'required|max:20',

    ];

    protected $validationAttributes = [
        'amount' => 'cantidad producida',

    ];

    public function save(){
        $this->validate();

        $production = $this->production->id;
        $user_id = Auth::user()->id;

        ProductionPart::create([
            'amount' => $this->amount,
            'production_id' => $production,
            'user_id' =>   $user_id,

        ]);
        $this->reset(['open', 'amount']);

     //   $this->identificador = rand();

        $this->emit('show-production-part-component-factory');
        $this->emit('alert', 'El productionPart se creó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.factory.create-production-part-component-factory')->layout('layouts.factory');
    }
    public function updatingOpen(){
        if($this->open==false){
            $this ->reset( ['amount']);

        }
    }
}
