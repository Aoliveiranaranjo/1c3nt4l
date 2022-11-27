<?php

namespace App\Http\Livewire\Factory;

use App\Models\Decrease;
use App\Models\DecreaseType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDecreaseComponentFactory extends Component
{
    use WithPagination;

    //pendiente borrar los metodos no usados
        public $decrease;
        public $decreaseType;
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
            'decrease.code' => 'required|max:10',
            'decrease.observation' => 'required|max:255',
            'decrease.amount' => 'required|max:8',
            'decrease.decrease_type_id' => 'required',

        ];


        protected $listeners = ['delete',
            'show-decrease-component-factory' => '$refresh'
        ];

        public function mount(){
            $this->decreaseType = DecreaseType::all();
        }

        public function render()
        {
            if($this->readyToLoad){
                $decreases = Decrease::where('production_id', $this->production->id)
                ->orderBy('id', 'desc')
                ->paginate(4);

            }else{
                $decreases = [ ];
            }
            return view('livewire.factory.show-decrease-component-factory', compact('decreases'))->layout('layouts.factory');
        }
        public function loaddecreases(){
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

         public function edit(Decrease $decrease){
             $this->decrease = $decrease;
             $this->open_edit = true;

         }

         public function update(){
             $this->validate();

             $this->decrease->production_id = $this->production->id;
             $this->decrease->user_id = Auth::user()->id;
             $this->decrease->save();

             $this->reset(['open_edit']);

             $this->emit('alert', 'Se registro la producción satisfactoriamente');
         }

         public function delete(Decrease $decrease){
             $decrease->delete();

         }
}
