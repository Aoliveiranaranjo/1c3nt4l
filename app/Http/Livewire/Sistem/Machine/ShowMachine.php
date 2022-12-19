<?php

namespace App\Http\Livewire\Sistem\Machine;

use App\Models\Machine;
use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMachine extends Component
{
    use WithPagination;


    public $search, $CodeClient;
    public $sort = 'id';
    public $direction = 'desc';



    protected $listeners = ['delete',
                    'machinesuccess'

                        ];


    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete(Machine $machine){
        $machine->delete();
     }

     public function machinesuccess(){
        $this->emit('alert');
     }

     public function order($sort){
        if ($this->sort == $sort) {
            if ($this->direction == 'desc'){
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }

    }
        public function render()
    {
        $machines = Machine::query()
         ->where('codMachine', 'like', '%' . $this->search . '%')
        ->orwhere('name', 'like', '%' . $this->search . '%')
        ->orwhere('abbreviated', 'like', '%' . $this->search . '%')
        ->orwhere('cadence', 'like', '%' . $this->search . '%')
        ->orwhere('status', 'like', '%' . $this->search . '%')
        ->addselect(['sala' => Room::select ('nameRoom')->whereColumn('room_id', 'id')->take(1) ])
        ->orwherehas('room', function($q){
           $q->where('nameRoom' , 'like', '%' . $this->search . '%');

        })
        ->orderBy($this->sort, $this->direction)
        ->paginate(25);
        return view('livewire.sistem.machine.show-machine', compact('machines'))->layout('layouts.sistem');
    }
}
