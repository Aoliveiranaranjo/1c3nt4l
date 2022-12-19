<?php

namespace App\Http\Livewire\Factory;

use App\Models\Employee;
use App\Models\Production;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEmployeeComponentFactory extends Component
{
    use WithPagination;

    //pendiente borrar los metodos no usados
        public $employee;
        public $employee_id, $itemId;
        public $production, $productions;
        public $search = '';
        public $sort = 'id';
        public $direction = 'desc';
        public $cant = '10';
        public $readyToLoad = false;

        public function updatingSearch(){
            $this->resetPage();
        }

        public $open_edit = false;

        protected $queryString = [
            'cant' => ['except'=>'10'],
            'sort' => ['except'=>'id'],
            'direction' => ['except'=>'desc'],
            'search' => ['except'=>'']
        ];

        protected $rules =[
            'employee.employee_id' => 'required',

        ];


        protected $listeners = [
            'show-employee-component-factory' => '$refresh',
            'baja',
        ];

        public function mount(){
            $this->employee = Employee::where('status', 1)->get();
        }

        public function render()
        {
            if($this->readyToLoad){
                $employees = $this->production->activeEmployees()

                // ->employees()->get();
                // ->where('trabajadoras', 1)
                 ->orderBy('name', 'asc')
                 ->paginate(20);

            }else{
                $employees = [ ];
            }
            return view('livewire.factory.show-employee-component-factory', compact('employees'))->layout('layouts.factory');
        }

        public function loademployees(){
            $this->readyToLoad = true;
         }



         public function edit(Production $productions){
             $this->productions->employees = $productions;
             $this->open_edit = true;

         }

         public function update(){
             $this->validate();

             $this->production->employees->production_id = $this->production->id;

             $this->production->save();

             $this->reset(['open_edit']);

             $this->emit('alert', 'Se registro la producción satisfactoriamente');
         }

         public function baja(Employee $id){
             $this->production->employees()->updateExistingPivot($id, [
                'active' => false,
            ]);

         }
}
