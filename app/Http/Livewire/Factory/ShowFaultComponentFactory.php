<?php

namespace App\Http\Livewire\Factory;

use App\Models\Fault;
use App\Models\FaultType;
use App\Models\Mechanic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

use function Termwind\render;

class ShowFaultComponentFactory extends Component
{
    use WithPagination;

//pendiente borrar los metodos no usados
    public $fault;
    public $faultType, $mechanics, $mechanic_id, $dateEnd, $status;
    public $production;
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

    ];

    protected $rules =[
        'fault.mechanic_id' => 'required',
        'fault.fault_type_id' => 'required',

    ];


    protected $listeners = ['delete',
        'show-fault-component-factory' => '$refresh'
    ];

    public function mount(){
        $this->faultType = FaultType::where('status', 1)->get();
        $this->mechanics = Mechanic::where('status', 1)->get();
    }

    public function render()
    {
        if($this->readyToLoad){
            $faults = Fault::where('production_id', $this->production->id)
            ->where('status', true)
            ->orderBy('id', 'desc')
            ->paginate(4);

        }else{
            $faults = [ ];
        }
        return view('livewire.factory.show-fault-component-factory', compact('faults'))->layout('layouts.factory');
    }
    public function loadfaults(){
        $this->readyToLoad = true;
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
         }

     }

     public function edit(Fault $fault){
         $this->fault = $fault;
         $this->open_edit = true;

     }

     public function update(){
         $this->validate();

         $this->fault->status = "0";
         $this->fault->dateEnd = Carbon::now();
         $this->fault->production_id = $this->production->id;
         $this->fault->user_id = Auth::user()->id;
         $this->fault->save();

         $this->reset(['open_edit']);

         $this->emit('refreshShowFaulsFactory');
         $this->emitTo('ShowFaultFactory', 'refreshShowFaulsFactory');

        //  $this->emit('alert', 'Se registro la fin de avería satisfactoriamente');
     }

     public function delete(Fault $fault){
         $fault->delete();

     }
}
