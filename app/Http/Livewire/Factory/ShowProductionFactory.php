<?php

namespace App\Http\Livewire\Factory;

use App\Models\Production;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProductionFactory extends Component
{
    use WithPagination;


    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $machine;



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

        $productions = Production::query()
        ->where('state_production_id', '=', '3')
         ->whereNull('dateEnd')
          ->with('state_production')
          ->with('order')
          ->with('typeorder')
          ->with('machine')
          ->with('room')
          ->with('article')
          ->with('productionParts')
          ->with('customer')
           ->where(function($query) {
            $query->wherehas('customer', function($q){
                $q->where('abbreviated' , 'like', '%' . $this->search . '%');
            })
            ->orwherehas('article', function($q){
                $q->where('name' , 'like', '%' . $this->search . '%');
            })
          ->orwherehas('article', function($q){
              $q->where('CodeCentral' , 'like', '%' . $this->search . '%');
            })

            ->orwherehas('order', function($q){
                $q->where('orden' , 'like', '%' . $this->search . '%');
              })
            ->orwherehas('order', function($q){
                $q->where('pedido' , 'like', '%' . $this->search . '%');
              })
            ->orwherehas('order', function($q){
                $q->where('pedidoCliente' , 'like', '%' . $this->search . '%');
              })
            ->orwherehas('order', function($q){
                $q->where('amount' , 'like', '%' . $this->search . '%');
              })

            ->orwherehas('typeorder', function($q){
                $q->where('name' , 'like', '%' . $this->search . '%');
              })
            ->orwherehas('machine', function($q){
                $q->where('codMachine' , 'like', '%' . $this->search . '%');
              })
              ->orwherehas('room', function($q){
                $q->where('nameRoom', 'like', '%' . $this->search . '%');
              })

              ;

        })



  //->orderByRaw('ISNULL(sortOrder), sortOrder ASC')
 // ->orderBy(DB::raw('-`pry`'), $this->direction)
 ->orderBy('id', 'desc')
  ->paginate($this->cant);



    return view('livewire.factory.show-production-factory', compact('productions'))->layout('layouts.factory');
}
}
