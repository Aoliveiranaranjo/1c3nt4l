<?php

namespace App\Http\Livewire\Sistem\Production;

use App\Models\Machine;
use App\Models\Production;
use App\Models\Room;
use App\Models\StateProduction;
use App\Models\TypeOrder;
use Livewire\Component;

class CreateProduction extends Component
{
    public  $order,  $pry, $cleaning ="4", $changeH="4", $observation,
    $multiUnid ="1", $typeorder_id ="", $order_id,
    $state_production_id="",  $machines=[];

    public  $room_id="", $machine_id="";


   protected $rules  = [
       'pry' => 'max:2',
       'cleaning' => 'required|max:2',
       'changeH' => 'required|max:2',
       'multiUnid' => 'required|max:4',
       'observation' => 'max:255',
       'typeorder_id' => 'required',
       'order_id' => 'nullable',
       'state_production_id' => 'required',
       'machine_id' => 'required',

   ];

   Public function updatedRoomId($value){
        $this->machines = Machine::where('room_id', $value)

         ->where(function($query) {
            $query->where('status', 1);

        })->get();

       $this->reset('machine_id');
   }

   public function save(){
       $this->validate();

       $production = new Production();

       $production->pry = $this->pry;
       $production->cleaning = $this->cleaning;
       $production->changeH = $this->changeH;
       $production->multiUnid = $this->multiUnid;
       $production->observation = $this->observation;
       $production->typeorder_id = $this->typeorder_id;
       $production->order_id = $this->order->id;
       $production->state_production_id = $this->state_production_id;
       $production->machine_id = $this->machine_id;

       $production->save();

       $this->order->orderstate_id = 3;
       $this->order->save();

       $this->emit('saved');
        $this->emit(event: 'refreshShowOrderProduction');
        $this->emit(event: 'refreshEditOrderProduction');

       $this->reset('room_id');
       $this->reset('state_production_id');
       $this->reset('typeorder_id');
       $this->reset('machine_id');
       $this->reset('observation');
     //  return redirect()->route('sistem.production.index');


   }
   protected $validationAttributes = [
        'pry' => 'prioridad',
        'cleaning' => 'horas de limpieza',
        'changeH' => 'horas por cambio',
        'observation' => 'observación',
        'multiUnid' => 'múltiplos por unidad',
       'typeorder_id' => 'tipo de orden',
       'order_id' => 'orden',
       'state_production_id' => 'estado de producción',
       'machine_id' => 'selecciona maquína',
   ];


   public function mount(){
    $this->rooms = Room::all();
    $this->typeorders = TypeOrder::all();
    $this->stateproductions = StateProduction::all();
    $this->machines = Machine::where('room_id',  $this->room_id)
    ->where(function($query) {
       $query->where('status', 1);
     })->get();

   }
    public function render()
    {
        return view('livewire.sistem.production.create-production');
    }
}
