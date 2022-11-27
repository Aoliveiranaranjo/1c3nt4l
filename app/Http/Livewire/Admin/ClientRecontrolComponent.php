<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use Livewire\Component;

class ClientRecontrolComponent extends Component
{
    public $clients, $client;

    public $search;

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null
    ];

    public $editForm=[
        'open' => false,
        'name' => null
    ];

    public $rules = [
        'createForm.name' => 'required|max:50',
        'createForm.abbreviated' => 'required|max:15',

    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre',
        'createForm.abbreviated' => 'abreviación',
        'editForm.abbreviated' => 'abreviación',
    ];

    public function mount(){
        $this->getclients();
    }

    public function getclients(){
        $this->clients = Client::all();
    }

    public function save(){
        $this->validate();

        Client::create($this->createForm);

        $this->reset('createForm');

        $this->getclients();

    }

    public function edit(Client $client){
        $this->client = $client;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $client->name;
        $this->editForm['abbreviated'] = $client->abbreviated;
        $this->editForm['status'] = $client->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:50',
            'editForm.abbreviated' => 'required|max:15',
            'editForm.status' => 'required'

        ]);
        $this->client->update($this->editForm);
        $this->reset('editForm');
        $this->getclients();
    }

    public function delete(Client $client){
        $client->delete();
        $this->getclients();
    }
    public function render()
    {
        return view('livewire.admin.client-recontrol-component')->layout('layouts.admin');
    }
}
