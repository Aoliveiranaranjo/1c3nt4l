<?php

namespace App\Http\Livewire\Sistem\Change;

use App\Models\Change;
use App\Models\Mechanic;
use App\Models\StateChange;
use App\Models\TypeChange;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditChange extends Component
{
    protected $rules  = [
        'change.pry' => 'max:2',
        'change.description' => 'max:144',
        'change.statechange_id' => 'required',
        'change.typechange_id' => 'required',
        'change.production_id' => 'required',
    //    'change.mechanic_id' => 'required',

    ];
    protected $validationAttributes = [
        'change.pry' => 'prioridad',
        'change.description' => 'descripción',
        'change.statechange_id' => 'estado de cambio',
        'change.typechange_id' => 'tipo de cambio',
   //     'change.mechanic_id' => 'mecánico',
    ];

    public function save(){
        $this->validate();
        if ( $this->change->pry == "") {
            $this->change->pry = null;
        }

        if ( $this->change->dateEnd == "") {
            $this->change->dateEnd = null;
        }

        $this->change->user_id = Auth::user()->id;
        $this->change->save();

        $this->emit('saved');

        return redirect()->route('sistem.change.index');
    }

    public function mount(Change $change,){
        $this->change = $change;
        $this->statechanges = StateChange::all();
        $this->typechanges = TypeChange::all();
        $this->mechanics = Mechanic::all();

    }

    public function render()
    {
        return view('livewire.sistem.change.edit-change')->layout('layouts.sistem');
    }
}
