<?php

namespace App\Http\Livewire\Factory;

use App\Models\Incident;
use App\Models\IncidentType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowIncidentComponentFactory extends Component
{
    use WithPagination;

    //pendiente borrar los metodos no usados
        public $production,  $description, $incident_type_id ="", $user_id;
        public $incidentType;
        public $readyToLoad = false;

        public function updatingSearch(){
            $this->resetPage();
        }

        public $open_edit = false;

        protected $queryString = [


        ];

        protected $rules =[
            'incident.code' => 'required|max:10',
            'incident.observation' => 'required|max:255',
            'incident.amount' => 'required|max:8',
            'incident.incident_type_id' => 'required',

        ];


        protected $listeners = ['delete',
            'show-incident-component-factory' => '$refresh'
        ];

        public function mount(){
            $this->incidentType = IncidentType::all();
        }

        public function render()
        {
            if($this->readyToLoad){
                $incidents = Incident::where('production_id', $this->production->id)
                ->with('incident_type')

    /*
                ->where(function($query) {
                    $query->where('incidenttype', function($q){
                        $q->where('name');
                    });
                })

    */
                ->orderBy('id', 'desc')
                ->paginate(4);

            }else{
                $incidents = [ ];
            }
            return view('livewire.factory.show-incident-component-factory', compact('incidents'))->layout('layouts.factory');
        }
        public function loadincidents(){
            $this->readyToLoad = true;
         }



         public function edit(Incident $incident){
             $this->incident = $incident;
             $this->open_edit = true;

         }

         public function update(){
             $this->validate();

             $this->incident->production_id = $this->production->id;
             $this->incident->user_id = Auth::user()->id;
             $this->incident->save();

             $this->reset(['open_edit']);

             $this->emit('alert', 'Se registro la producción satisfactoriamente');
         }

         public function delete(Incident $incident){
             $incident->delete();

         }
}
