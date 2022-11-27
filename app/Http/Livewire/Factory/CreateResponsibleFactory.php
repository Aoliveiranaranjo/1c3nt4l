<?php

namespace App\Http\Livewire\Factory;

use App\Models\Responsible;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateResponsibleFactory extends Component
{
    public  $production, $start_id,  $status, $observation, $user_id;
    public $item1, $item2, $item3, $item4,  $item5;


    protected $rules  = [
        'observation' => 'max:255',
        'item1' => 'required',
        'item2' => 'required',
        'item3' => 'required',
        'item4' => 'required',
        'item5' => 'required',
        'status' => 'required'

        ];


    public function save(){

        $this->validate();
/*
        if ( $this->status == null) {
            $this->status = 0;
        }
*/
        $responsible  = new Responsible();
        $responsible->item1 = $this->item1;
        $responsible->item2 = $this->item2;
        $responsible->item3 = $this->item3;
        $responsible->item4 = $this->item4;
        $responsible->item5 = $this->item5;

        $responsible->observation = $this->observation;
        $responsible->status =  $this->status;

        $responsible->start_id = $this->production->start->id;
        $responsible->user_id = Auth::user()->id;

        $responsible->save();

        $this->emit('saved');
          // $this->emit(event: 'refreshShowresponsibleProductionFactory');
           $this->emit(event: 'refreshCreateResponsibleProductionFactory');

        $this->reset('observation');
        $this->reset('status');

    }
    Protected $validationAttributes = [
        'item1' => 'comprobación de preparación de OF, Registro de limpieza, Especificación de Producto e Imputación',
        'item2' => 'verificación despeje de linea del producto anterior',
        'item3' => 'verificación orden y limpieza en máquina y sala',
        'item4' => 'informar y aplicar la seguridad laboral en la producción al grupo de trabajo',
        'item5' => 'verificar protocolo de trabajo',
        'observation' => 'observación',
        'status' => 'confirmar inicio',
   ];

    public function mount(){


   }
    public function render()
    {
        return view('livewire.factory.create-responsible-factory');
    }
}
