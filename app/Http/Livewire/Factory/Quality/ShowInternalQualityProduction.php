<?php

namespace App\Http\Livewire\Factory\Quality;

use App\Models\QualityProduction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowInternalQualityProduction extends Component
{
    use WithPagination;
    //pendiente borrar los metodos no usados

        public $qualityProduction;
        public $order;
        public $search = '';
        public $sort = 'id';
        public $direction = 'desc';
        public $cant;
        public $readyToLoad = false;

        public function updatingSearch(){
            $this->resetPage();
        }

        public $open_edit = false;

        protected $queryString = [
            'cant' => ['except'=>'25'],
            'sort' => ['except'=>'id'],
            'direction' => ['except'=>'desc'],
            'search' => ['except'=>'']
        ];

        protected $rules =[
            'qualityProduction.lote_pt' => 'required|max:20',
            'qualityProduction.sp' => 'max:20',
            'qualityProduction.lote_conte' => 'max:20',
            'qualityProduction.cuba' => 'max:20',
            'qualityProduction.palet' => 'required|max:3',
            'qualityProduction.box' => 'required|max:5',
            'qualityProduction.unid' => 'required|max:20',

        ];
        protected $validationAttributes = [
            'qualityProduction.lote_pt' => 'lote de PT',
            'qualityProduction.sp' => 'código de SP o formula VRAC ',
            'qualityProduction.lote_conte' => 'lote contenedor',
            'qualityProduction.cuba' => 'cuba',
            'qualityProduction.palet' => 'número de palet',
            'qualityProduction.box' => 'cantidad de cajas',
            'qualityProduction.unid' => 'unidades',

        ];


        protected $listeners = ['delete',
            'show-internal-quality-production' => '$refresh'
        ];


        public function render()
        {
            if($this->readyToLoad){
                $qualityProductions = QualityProduction::where('order_id', $this->order->id)
                ->orderBy('id', 'desc')
                //->paginate($this->cant);
                ->get();
            }else{
                $qualityProductions = [ ];
            }
        return view('livewire.factory.quality.show-internal-quality-production', compact('qualityProductions'))->layout('layouts.factory');
    }
    public function loadqualityProductions(){
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

     public function edit(QualityProduction $qualityProduction){
         $this->qualityProduction = $qualityProduction;
         $this->open_edit = true;

     }

     public function update(){
         $this->validate();

         $this->qualityProduction->order_id = $this->order->id;
         $this->qualityProduction->user_id = Auth::user()->id;
         $this->qualityProduction->save();

         $this->reset(['open_edit']);

         $this->emit('alert', 'Se registro la producción satisfactoriamente');
     }

     public function delete(QualityProduction $qualityProduction){
         $qualityProduction->delete();

     }
}
