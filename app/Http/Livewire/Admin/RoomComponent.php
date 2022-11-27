<?php

namespace App\Http\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;

class RoomComponent extends Component
{
    public $rooms, $room;

    public $search;

    protected $listeners = ['delete'];

    public $createForm=[
        'nameRoom' => null
    ];

    public $editForm=[
        'open' => false,
        'nameRoom' => null
    ];

    public $rules = [
        'createForm.nameRoom' => 'required|max:20',

    ];

    protected $validationAttributes = [
        'createForm.nameRoom' => 'nombre',
        'editForm.nameRoom' => 'nombre'
    ];

    public function mount(){
        $this->getRooms();
    }

    public function getRooms(){
        $this->rooms = Room::all();
    }

    public function save(){
        $this->validate();

        Room::create($this->createForm);

        $this->reset('createForm');

        $this->getRooms();

    }

    public function edit(Room $room){
        $this->room = $room;
        $this->editForm['open'] = true;

        $this->editForm['nameRoom'] = $room->nameRoom;
        $this->editForm['status'] = $room->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.nameRoom' => 'required|max:20'

        ]);
        $this->room->update($this->editForm);
        $this->reset('editForm');
        $this->getRooms();
    }

    public function delete(Room $room){
        $room->delete();
        $this->getRooms();
    }
    public function render()
    {
        return view('livewire.admin.room-component')->layout('layouts.admin');
    }
}
