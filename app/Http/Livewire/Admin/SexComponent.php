<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sex;
use Livewire\Component;

class SexComponent extends Component
{
    public $sexes, $sex;

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
        'createForm.name' => 'required|max:1',

    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre'
    ];

    public function mount(){
        $this->getSexes();
    }

    public function getSexes(){
        $this->sexs = Sex::all();
    }

    public function save(){
        $this->validate();

        Sex::create($this->createForm);

        $this->reset('createForm');

        $this->getSexes();

    }

    public function edit(Sex $sex){
        $this->sex = $sex;
        $this->editForm['open'] = true;

        $this->editForm['name'] = $sex->name;
        $this->editForm['status'] = $sex->status;


        $this->resetValidation();
    }

    Public function update(){
        $this->validate([
            'editForm.name' => 'required|max:1'

        ]);
        $this->sex->update($this->editForm);
        $this->reset('editForm');
        $this->getSexes();
    }

    public function delete(Sex $sex){
        $sex->delete();
        $this->getSexes();
    }
    public function render()
    {
        return view('livewire.admin.sex-component')->layout('layouts.admin');
    }
}
