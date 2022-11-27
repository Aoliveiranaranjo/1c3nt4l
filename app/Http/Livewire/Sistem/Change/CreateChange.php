<?php

namespace App\Http\Livewire\Sistem\Change;

use App\Models\Change;
use App\Models\Mechanic;
use App\Models\StateChange;
use App\Models\TypeChange;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateChange extends Component
{
    public  $production,  $pry, $description, $statechange_id ="", $typechange_id ="",
    $mechanic_id="", $user_id;


     protected $rules  = [
         'pry' => 'max:2',
         'description' => 'max:255',
         'statechange_id' => 'required',
         'typechange_id' => 'required',
    //     'mechanic_id' => 'required',


     ];
     public function save(){
         $this->validate();

         $change  = new Change();

         $change->pry = $this->pry;
         $change->description = $this->description;
         $change->statechange_id = $this->statechange_id;
         $change->typechange_id = $this->typechange_id;
         $change->production_id = $this->production->id;
       //  $change->mechanic_id = $this->mechanic_id;
         $change->user_id = Auth::user()->id;

         $change ->save();

         $this->production->state_production_id = 2;
         $this->production->save();

         $this->emit('saved');
         $this->emit(event: 'refreshShowChangeProduction');

         $this->reset('pry');
         $this->reset('description');
         $this->reset('statechange_id');
         $this->reset('typechange_id');
       //  $this->reset('mechanic_id');

       // return redirect()->route('sistem.change.index');
     }
     protected $validationAttributes = [
         'pry' => 'prioridad',
         'description' => 'descripción',
         'statechange_id' => 'estado del cambio',
         'typechange_id' => 'tipo de cambio',
         'production_id' => 'la producción',
    //    'mechanic_id' => 'mecánico',

    ];
    public function mount(){
     $this->statechanges = StateChange::all();
     $this->typechanges = TypeChange::all();
     $this->mechanics = Mechanic::all();

    }
    public function render()
    {
        return view('livewire.sistem.change.create-change')->layout('layouts.sistem');
    }
}
