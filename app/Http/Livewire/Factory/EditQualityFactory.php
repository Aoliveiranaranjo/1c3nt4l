<?php

namespace App\Http\Livewire\Factory;

use App\Models\Production;
use Livewire\Component;

class EditQualityFactory extends Component
{
    public  $production;

    public  $rooms="";

    public  $room_id;

    protected $listeners = ['refreshEditQualityProductionFactory' => '$refresh'];

    //esto pendiente de modificar
    protected $rules  = [

        'production.observation' => 'nullable|max:255',
        'production.approved' => 'nullable',

       // 'room_id' => 'required'
    ];


    public function mount(Production $production,){
        $this->production = $production;

    }

  /*  public function save(){
        $this->validate();
        $this->production->save();

        $this->emit('saved');

        return redirect()->route('sistem.production.index');
    }
*/
    public function render()
    {
        return view('livewire.factory.edit-quality-factory')->layout('layouts.factory');
    }
}
