<?php

namespace App\Http\Livewire\Sistem\Employee;

use App\Models\Charge;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Sex;
use Livewire\Component;

class CreateEmployee extends Component
{
    public $codigo, $name, $dni, $antiquity, $email, $phone, $emergencyPhone, $groups,
        $sex_id, $charge_id, $group_id, $charges,
        $sexs, $sex;

    protected $rules  = [
        'codigo' => 'required',
        'name' => 'required',
        'dni' => 'required',
        'email' => 'required',
        'antiquity' => 'required',
        'phone' => 'required',
        'emergencyPhone' => 'required',
        'sex_id' => 'required',
        'charge_id' => 'required',
        'group_id' => 'required',

    ];


    public function save()
    {
        $this->validate();

        $employee = new Employee();

        $employee->codigo = $this->codigo;
        $employee->name = $this->name;
        $employee->antiquity = $this->antiquity;
        $employee->dni = $this->dni;
        $employee->phone = $this->phone;
        $employee->email = $this->email;
        $employee->emergencyPhone = $this->emergencyPhone;
        $employee->sex_id = $this->sex_id;
        $employee->charge_id = $this->charge_id;
        $employee->group_id = $this->group_id;

        $employee->save();

        $this->emit('saved');

        return redirect()->route('sistem.employee.index');
    }
    protected $validationAttributes = [
        'codigo' => 'código',
        'name' => 'nombre',
        'antiquity' => 'fecha de inicio de relación',
        'dni' => 'DNI',
        'email' => 'e-mail',
        'phone' => 'teléfono',
        'emergencyPhone' => 'teléfono de emergencia',
        'sex_id' => 'sexo',
        'charge_id' => 'cargo',
        'group_id' => 'grupo',

    ];

    public function mount()
    {
        $this->sexs = Sex::all();
        $this->groups = Group::all();
        $this->charges = Charge::all();
    }
    public function render()
    {
        return view('livewire.sistem.employee.create-employee')->layout('layouts.sistem');
    }
}
