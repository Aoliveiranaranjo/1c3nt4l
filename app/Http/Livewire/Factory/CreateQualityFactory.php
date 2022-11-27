<?php

namespace App\Http\Livewire\Factory;

use App\Models\Quality;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateQualityFactory extends Component
{
    public  $production, $start_id,  $status, $observation, $user_id;
    public $item1, $item2, $item3, $item4,  $item5, $item6, $item7, $item8,
    $item9, $item10, $item11, $item12, $item13, $lote, $item15, $muestraDate;

    protected $rules  = [

        'item1' => 'required',
        'item2' => 'required',
        'item3' => 'required',
        'item4' => 'required',
        'item5' => 'required',
        'item6' => 'required',
        'item7' => 'required',
        'item8' => 'required',
        'item9' => 'required',
        'item10' => 'required',
        'item11' => 'required',
        'item12' => 'required',
        'item13' => 'required',
        'lote' => 'required|max:30',
        'item15' => 'required',
        'muestraDate' => 'required',

        'observation' => 'max:255',
        'status' => 'required'

        ];


    public function save(){

        $this->validate();


        $quality  = new Quality();

        $quality->item1 = $this->item1;
        $quality->item2 = $this->item2;
        $quality->item3 = $this->item3;
        $quality->item4 = $this->item4;
        $quality->item5 = $this->item5;
        $quality->item6 = $this->item6;
        $quality->item7 = $this->item7;
        $quality->item8 = $this->item8;
        $quality->item9 = $this->item9;
        $quality->item10 = $this->item10;
        $quality->item11 = $this->item11;
        $quality->item12 = $this->item12;
        $quality->item13 = $this->item13;
        $quality->lote = $this->lote;
        $quality->item15 = $this->item15;
        $quality->muestraDate = $this->muestraDate;

        $quality->observation = $this->observation;
        $quality->status =  $this->status;

        $quality->start_id = $this->production->start->id;
        $quality->user_id = Auth::user()->id;

        $quality->save();

        $this->emit('saved');
          // $this->emit(event: 'refreshShowQualityProductionFactory');
           $this->emit(event: 'refreshEditQualityProductionFactory');

        $this->reset('item1', 'item2', 'item3', 'item4', 'item5', 'item6', 'item7', 'item8',
        'item9', 'item10', 'item11', 'item12', 'item13', 'lote', 'item15', 'muestraDate', 'observation', 'status');

    }
    Protected $validationAttributes = [
        'item1' => 'comprobar especificación del producto',
        'item2' => 'aspecto, color y olor según muestra tipo',
        'item3' => 'control funcional',
        'item4' => 'prueba de estanqueidad',
        'item5' => 'aspecto: burbuja de expansión, ausencia de partículas, presencia tubo de inmersión',
        'item6' => 'limpieza de línea de montaje',
        'item7' => 'comprobación de materiales',
        'item8' => 'tolva y contenedores cerrados',
        'item9' => 'seguridad de la máquina y personal',
        'item10' => 'instrumentos de control calibrados',
        'item11' => 'comprobar temperatura del bulk',
        'item12' => 'control de paletización',
        'item13' => 'control de etiquetas de cajas',
        'lote' => 'anotar lote preparado',
        'item15' => 'muestra tipo',
        'muestraDate' => 'fecha muestra',
        'observation' => 'observación',
        'status' => 'confirmar inicio',
   ];

    public function mount(){


   }

    public function render()
    {
        return view('livewire.factory.create-quality-factory');
    }
}
