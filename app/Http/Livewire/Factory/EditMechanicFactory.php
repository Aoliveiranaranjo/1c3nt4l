<?php

namespace App\Http\Livewire\Factory;

use App\Models\Machine;
use App\Models\Production;
use Livewire\Component;

class EditMechanicFactory extends Component
{
    public  $production;

    public  $rooms="";

    public  $room_id;

    protected $listeners = ['refreshEditMechanicProductionFactory' => '$refresh'];

    //esto pendiente de modificar.
    protected $rules  = [

        'production.observation' => 'nullable|max:255',
       // 'room_id' => 'required'
    ];


   Public function updatedRoomId($value){
    $this->machines = Machine::where('room_id', $value)

     ->where(function($query) {
        $query->where('status', 1);

    })->get();

 //  $this->production->machine->room_id = "";

    }

    public function mount(Production $production,){
        $this->production = $production;

    }

    public function save(){
        $this->validate();
        $this->production->save();

        $this->emit('saved');

        return redirect()->route('sistem.production.index');
    }

    public function render()
    {
        return view('livewire.factory.edit-mechanic-factory')->layout('layouts.factory');
    }
}
