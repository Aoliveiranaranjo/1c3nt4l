<?php

namespace App\Http\Livewire\Factory;

use App\Models\Employee;
use Livewire\Component;

class CreateEmployeeComponentFactory extends Component
{
    public $open = false;
    public $employee_id="", $production_id, $active,
            $production,  $employees;

    public function mount()
    {
        $this->employees = Employee::where('status', 1)->get();
    }

    protected $rules = [
        'employee_id' => 'required',

    ];
    protected $validationAttributes = [
        'employee_id' => 'empleado',

    ];

    public function save(){
        $this->validate();

        $this->production->employees()->attach($this->employee_id);

/*
        $production = $this->production->id;


        Decrease::create([
            'employee_id' => $this->employee_id,
            'production_id' => $production->id,


        ]);
        */
        $this->reset(['employee_id', 'open']);


        $this->emit('show-employee-component-factory');
        $this->emit('alert', 'El alta del trabajador, se creó satisfactoriamente');

    }

    public function render()
    {
        return view('livewire.factory.create-employee-component-factory')->layout('layouts.sistem');
    }
    public function updatingOpen(){
        if($this->open==false){
            $this ->reset([ 'employee_id']);

        }
    }
}
