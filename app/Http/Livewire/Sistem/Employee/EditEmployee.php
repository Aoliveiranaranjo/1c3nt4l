<?php

namespace App\Http\Livewire\Sistem\Employee;

use App\Models\Charge;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Sex;
use Livewire\Component;

class EditEmployee extends Component
{
    protected $rules  = [
        'employee.codigo' => 'required',
        'employee.name' => 'required',
        'employee.dni' => 'required',
        'employee.email' => 'nullable',
        'employee.phone' => 'nullable',
        'employee.emergencyPhone' => 'nullable',
        'employee.antiquity' => 'required',
        'employee.sex_id' => 'required',
        'employee.charge_id' => 'required',
        'employee.group_id' => 'required',
        'employee.status' => 'nullable',
    ];

    public function mount(Employee $employee,)
    {
        $this->employee = $employee;
        $this->sexs = Sex::all();
        $this->groups = Group::all();
        $this->charges = Charge::all();
    }

    public function save()
    {
        $this->validate();
        $this->employee->save();

        $this->emit('saved');

        return redirect()->route('sistem.employee.index');
    }

    public function render()
    {
        return view('livewire.sistem.employee.edit-employee')->layout('layouts.sistem');
    }
}
