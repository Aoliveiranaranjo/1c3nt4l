<?php

namespace App\Http\Livewire\Factory;

use App\Models\Decrease;
use App\Models\DecreaseType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateDecreaseComponentFactory extends Component
{
    public $open = false;
    public $code, $amount, $observation, $decrease_type_id="",
            $production,  $user_id;

    public function mount()
    {
        $this->decreaseTypes = DecreaseType::where('status', 1)->get();
    }

    protected $rules = [
        'code' => 'required|max:10',
        'observation' => 'max:255',
        'amount' => 'required|max:8',
        'decrease_type_id' => 'required',

    ];
    protected $validationAttributes = [
        'code' => 'código',
        'observation' => 'observación',
        'amount' => 'cantidad',
        'decrease_type_id' => 'tipo de componente',
    ];

    public function save(){
        $this->validate();

        $production = $this->production->id;
        $user_id = Auth::user()->id;

        Decrease::create([
            'code' => $this->code,
            'amount' => $this->amount,
            'observation' => $this->observation,
            'decrease_type_id' => $this->decrease_type_id,
            'production_id' => $production,
            'user_id' =>   $user_id,

        ]);
        $this->reset(['open', 'code','amount','observation','decrease_type_id']);

     //   $this->identificador = rand();

        $this->emit('show-decrease-component-factory');
        $this->emit('alert', 'El decrease se creó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.factory.create-decrease-component-factory')->layout('layouts.factory');

    }
    public function updatingOpen(){
        if($this->open==false){
            $this ->reset([ 'code','amount','observation','decrease_type_id']);

        }
    }
}
