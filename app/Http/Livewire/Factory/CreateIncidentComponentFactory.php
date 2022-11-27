<?php

namespace App\Http\Livewire\Factory;

use App\Models\Incident;
use App\Models\IncidentType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateIncidentComponentFactory extends Component
{
    public $open = false;
    public $production,  $description, $incident_type_id ="", $user_id;

    public function mount()
    {
        $this->incidentTypes = IncidentType::where('status', 1)->get();
    }

    protected $rules = [
        'description' => 'required|max:144',
        'incident_type_id' => 'required',

    ];
    protected $validationAttributes = [
        'description' => 'descripción',
        'incident_type_id' => 'tipo de incidencia',
    ];

    public function save(){
        $this->validate();

        $production = $this->production->id;
        $user_id = Auth::user()->id;

        Incident::create([
            'description' => $this->description,
            'incident_type_id' => $this->incident_type_id,
            'production_id' => $production,
            'user_id' =>   $user_id,

        ]);
        $this->reset(['open', 'description','incident_type_id']);

     //   $this->identificador = rand();

        $this->emit('show-incident-component-factory');
        $this->emit('alert', 'El incidente se creó satisfactoriamente');
    }


    public function render()
    {
        return view('livewire.factory.create-incident-component-factory')->layout('layouts.factory');

    }
    public function updatingOpen(){
        if($this->open==false){
            $this ->reset([ 'description','incident_type_id']);

        }
    }
}
