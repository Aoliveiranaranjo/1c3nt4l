<?php

namespace App\Http\Livewire\Factory;

use App\Models\Start;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateMechanicFactory extends Component
{
    public  $production,  $observation, $user_id;
    public $item1, $item2, $item3, $item4, $lote, $item5, $item6, $item7, $item8, $cadence;


     protected $rules  = [
         'observation' => 'max:255',
         'item1' => 'required',
         'item2' => 'required',
         'item3' => 'required',
         'item4' => 'required',
         'lote' => 'required|max:15',
         'item5' => 'required',
         'item6' => 'required',
         'item7' => 'required',
         'item8' => 'required',
         'cadence' => 'required|max:20',

         ];

     public function save(){
         $this->validate();

         $start  = new Start();

         $start->item1 = $this->item1;
         $start->item2 = $this->item2;
         $start->item3 = $this->item3;
         $start->item4 = $this->item4;
         $start->lote = $this->lote;
         $start->item5 = $this->item5;
         $start->item6 = $this->item6;
         $start->item7 = $this->item7;
         $start->item8 = $this->item8;
         $start->cadence = $this->cadence;
         $start->observation = $this->observation;

         $start->production_id = $this->production->id;
         $start->user_id = Auth::user()->id;

         $start->save();

         $this->emit('saved');
        $this->emit(event: 'refreshShowMechanicProductionFactory');
        $this->emit(event: 'refreshEditMechanicProductionFactory');


         $this->reset('item1', 'item2', 'item3', 'item4', 'lote', 'item5', 'item6', 'item7', 'item8', 'cadence', 'observation');



       // return redirect()->route('sistem.change.index');
     }
     protected $validationAttributes = [

        'item1' => 'registro de limpieza',
        'item2' => 'verificación tolva y contenedor cerrado',
        'item3' => 'producto terminado cumple con la especificación',
        'item4' => 'lote correcto',
        'lote' => 'anotar lote',
        'item5' => 'loteado o marcaje correcto. Color y forma',
        'item6' => 'comprobación seguridad máquina',
        'item7' => 'comprobación protecciones de máquina',
        'item8' => 'verificación de que no hay piezas sueltas o herramientas en el interior de la máquina',
        'cadence' => 'velocidad de la máquina o cadencia',
        'observation' => 'observación',



    ];
    public function mount(){


    }

    public function render()
    {
        return view('livewire.factory.create-mechanic-factory');
    }
}
