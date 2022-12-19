<?php

namespace App\Http\Livewire\Factory\Change;

use App\Models\Change;
use App\Models\Production;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowChangeFactory extends Component
{
    use WithPagination;


    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '25';



    protected $listeners = ['delete',
                    'productionsuccess'

                        ];


    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete(Production $production){
        $production->delete();
     }

     public function productionsuccess(){
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

    public function mount(){

    }

    public function render()
    {

        $changes = Change::whereNull('dateEnd')
          ->with('production')





  //->orderByRaw('ISNULL(sortOrder), sortOrder ASC')
  ->orderBy(DB::raw('-`pry`'), $this->direction)
  //->orderBy($this->sort, $this->direction)
  ->paginate($this->cant);
;



        return view('livewire.factory.change.show-change-factory', compact('changes'))->layout('layouts.factory');
    }
}
