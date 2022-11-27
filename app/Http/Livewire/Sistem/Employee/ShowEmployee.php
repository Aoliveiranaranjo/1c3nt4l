<?php

namespace App\Http\Livewire\Sistem\Employee;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEmployee extends Component
{
    use WithPagination;


    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['delete',
                    'employeesuccess'

                        ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete(Employee $employee){
        $employee->delete();
     }

     public function employeesuccess(){
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

         $employees = Employee::where('codigo', 'like', '%' . $this->search . '%')
        ->orwhere('name', 'like', '%' . $this->search . '%')
        ->orwhere('dni', 'like', '%' . $this->search . '%')
        ->orwhere('phone', 'like', '%' . $this->search . '%')
        ->orwhere('emergencyPhone', 'like', '%' . $this->search . '%')
        ->orwhere('email', 'like', '%' . $this->search . '%')
        ->orwhere('antiquity', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate(20);

        return view('livewire.sistem.employee.show-employee', compact('employees'))->layout('layouts.sistem');
    }
}
