<?php

namespace App\Http\Livewire\Sistem\Machine;

use App\Models\Machine;
use App\Models\Room;
use Livewire\Component;

class EditMachine extends Component
{
    protected $rules  = [
        'machine.codMachine' => 'required|max:10',
        'machine.name' => 'required|max:50',
        'machine.cadence' => 'required|max:20',
        'machine.status' => 'nullable',
        'machine.room_id' => 'required',
    ];

    public function mount(Machine $machine,){
        $this->machine = $machine;
        $this->rooms = Room::all()
        ->where('status', 1);
    }
    protected $validationAttributes = [
        'codMachine' => 'código',
        'name' => 'nombre',
        'cadence' => 'cadencia',
        'room_id' => 'sala',
    ];

    public function save(){
        $this->validate();
        $this->machine->save();

        $this->emit('saved');

        return redirect()->route('sistem.machine.index');
    }
    public function render()
    {
        return view('livewire.sistem.machine.edit-machine')->layout('layouts.sistem');
    }
}
