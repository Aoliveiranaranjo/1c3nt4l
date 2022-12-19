<?php

namespace App\Http\Livewire\Factory;

use App\Models\Production;
use Livewire\Component;

class EditProductionFactory extends Component
{
    public  $production;



    protected $listeners = ['refreshCreateResponsibleProductionFactory' => '$refresh',

    ];

    public function mount(Production $production,){

        $this->production = $production;
    }

    public function render()
    {
        return view('livewire.factory.edit-production-factory')->layout('layouts.factory');
    }
}
