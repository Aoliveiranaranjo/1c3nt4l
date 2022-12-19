<?php

namespace App\Http\Livewire\Factory\Production;

use App\Models\Production;
use Livewire\Component;

class ViewProductionActiveFactory extends Component
{
    public  $production;



    // protected $listeners = ['refreshCreateResponsibleProductionFactory' => '$refresh',

    // ];

    public function mount(Production $production,){

        $this->production = $production;
    }

    public function render()
    {
        return view('livewire.factory.production.view-production-active-factory')->layout('layouts.factory');
    }
}
