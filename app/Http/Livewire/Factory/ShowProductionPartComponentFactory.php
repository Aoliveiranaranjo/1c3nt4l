<?php

namespace App\Http\Livewire\Factory;

use App\Models\ProductionPart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProductionPartComponentFactory extends Component
{
    use WithPagination;
    //pendiente borrar los metodos no usados

        public $productionPart;
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
            'cant' => ['except'=>'10'],
            'sort' => ['except'=>'id'],
            'direction' => ['except'=>'desc'],
            'search' => ['except'=>'']
        ];

        protected $rules =[
            'productionPart.amount' => 'required|max:20',

        ];


        protected $listeners = ['delete',
            'show-production-part-component-factory' => '$refresh'
        ];


        public function render()
        {
            if($this->readyToLoad){
                $productionParts = ProductionPart::where('production_id', $this->production->id)
                ->orderBy('id', 'desc')
                //->paginate($this->cant);
                ->get();
            }else{
                $productionParts = [ ];
            }

            return view('livewire.factory.show-production-part-component-factory', compact('productionParts'))->layout('layouts.factory');
        }
        public function loadproductionParts(){
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

         public function edit(ProductionPart $productionPart){
             $this->productionPart = $productionPart;
             $this->open_edit = true;

         }

         public function update(){
             $this->validate();

             $this->productionPart->production_id = $this->production->id;
             $this->productionPart->user_id = Auth::user()->id;
             $this->productionPart->save();

             $this->reset(['open_edit']);

             $this->emit('alert', 'Se registro la producción satisfactoriamente');
         }

         public function delete(ProductionPart $productionPart){
             $productionPart->delete();

         }
}
