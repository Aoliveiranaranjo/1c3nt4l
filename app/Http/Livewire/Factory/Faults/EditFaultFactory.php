<?php

namespace App\Http\Livewire\Factory\Faults;

use App\Models\Fault;
use App\Models\Mechanic;
use App\Models\Production;
use App\Models\Room;
use App\Models\StateProduction;
use Carbon\Carbon;
use Livewire\Component;

class EditFaultFactory extends Component
{
    public $production, $fault, $mechanic_asig;


    protected $rules  = [
        'fault.mechanic_asig' => 'nullable',

    ];



    public function mount(Production $production)
    {
        $this->production = $production;
        $this->fault = Fault::where('production_id', $this->production->id)
            ->where('status',  1)->first();

        $this->mechanics = Mechanic::where('status', 1)->get();

    }

    public function save()
    {
        $this->validate();

        $this->fault->mechanic_asig = $this->fault->mechanic_asig;

        $this->fault->save();

        $this->emit('saved');

        return redirect()->route('factory.fault.index');
    }


    public function render()
    {
        return view('livewire.factory.faults.edit-fault-factory')->layout('layouts.factory');
    }
}
