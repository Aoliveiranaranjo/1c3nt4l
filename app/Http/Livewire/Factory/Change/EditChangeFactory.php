<?php

namespace App\Http\Livewire\Factory\Change;

use App\Models\Change;
use App\Models\Mechanic;
use App\Models\StateChange;
use App\Models\TypeChange;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditChangeFactory extends Component
{
    protected $rules  = [
        'change.pry' => 'max:2',
        'change.description' => 'max:144',
        'change.observation' => 'max:144',
        'change.statechange_id' => 'required',
        'change.typechange_id' => 'nullable',
        'change.production_id' => 'required',
        'change.mechanic_id' => 'required',
        'change.mechanic_asig' => 'nullable',
        'change.dateEnd' => 'nullable',

    ];
    protected $validationAttributes = [
        'change.pry' => 'prioridad',
        'change.description' => 'descripción',
        'change.observation' => 'observación',
        'change.statechange_id' => 'estado de cambio',
        'change.typechange_id' => 'tipo de cambio',
        'change.mechanic_id' => 'mecánico',
        'change.mechanic_asig' => 'mecánico limpieza',
        'change.dateEnd' => 'fecha final del cambio',
    ];

    public function save(){
        $this->validate();
        if ( $this->change->pry == "") {
            $this->change->pry = null;
        }

        if ( $this->change->dateEnd == "") {
            $this->change->dateEnd = null;
        } else {
            $this->change->dateEnd = Carbon::now();
            $this->change->statechange_id = 5;
        }

        $this->change->user_id = Auth::user()->id;
        $this->change->save();

        $this->emit('saved');

        return redirect()->route('factory.change.index');
    }

    public function mount(Change $change,){
        $this->change = $change;
        $this->statechanges = StateChange::all();
        $this->typechanges = TypeChange::all();
        $this->mechanics = Mechanic::where('status', 1)->get();

    }
    public function render()
    {
        return view('livewire.factory.change.edit-change-factory')->layout('layouts.factory');
    }
}
