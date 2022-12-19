<?php

namespace App\Http\Livewire\Factory;

use App\Models\Fault;
use App\Models\FaultType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateFaultComponentFactory extends Component
{
    public $open = false;
    public $description, $status, $fault_type_id="", $mechanic_asig ="1", $mechanic_id="1",
            $production,  $user_id;

    public function mount()
    {
        $this->faultTypes = FaultType::where('status', 1)->get();
    }

    protected $rules = [
        'description' => 'required|max:144',
        'fault_type_id' => 'required',

    ];
    protected $validationAttributes = [
        'description' => 'descripción',
        'fault_type_id' => 'tipo de avería',
    ];

    public function save(){
        $this->validate();

        $production = $this->production->id;
        $user_id = Auth::user()->id;

        Fault::create([
            'description' => $this->description,
            'mechanic_asig' => $this->mechanic_asig,
            'mechanic_id' => $this->mechanic_id,
            'fault_type_id' => $this->fault_type_id,
            'production_id' => $production,
            'user_id' =>   $user_id,

        ]);
        $this->reset(['open', 'description','fault_type_id']);

     //   $this->identificador = rand();

        $this->emit('show-fault-component-factory');
        $this->emit('alert', 'La avería se creó satisfactoriamente');
    }
    public function render()
    {
        return view('livewire.factory.create-fault-component-factory')->layout('layouts.factory');

    }
    public function updatingOpen(){
        if($this->open==false){
            $this ->reset([ 'description','fault_type_id']);

        }
    }
}
