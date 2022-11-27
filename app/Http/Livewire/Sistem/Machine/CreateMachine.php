<?php

namespace App\Http\Livewire\Sistem\Machine;

use App\Models\Machine;
use App\Models\Room;
use Livewire\Component;

class CreateMachine extends Component
{
    public  $codMachine, $name, $machine,
    $cadence, $status, $abbreviated,
    $room_id;

   protected $rules  = [
       'codMachine' => 'required|max:10',
       'name' => 'required|max:50',
       'abbreviated' => 'max:50',
       'cadence' => 'required|max:20',
       'room_id' => 'required|integer',

   ];


   public function save(){
       $this->validate();

       $machine = new Machine();

       $machine->codMachine = $this->codMachine;
       $machine->name = $this->name;
       $machine->abbreviated = $this->abbreviated;
       $machine->cadence = $this->cadence;
       $machine->room_id = $this->room_id;

       $machine->save();

       $this->emit('saved');

       return redirect()->route('sistem.machine.index');


   }
   protected $validationAttributes = [
       'codMachine' => 'código',
       'name' => 'nombre',
       'abbreviated' => 'abreviación',
       'cadence' => 'cadencia',
       'room_id' => 'sala',
   ];


   public function mount(Machine $machine){
       $this->machine = $machine;
       $this->rooms = Room::all();

   }

    public function render()
    {
        return view('livewire.sistem.machine.create-machine')->layout('layouts.sistem');
    }
}
