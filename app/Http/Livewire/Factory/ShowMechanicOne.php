<?php

namespace App\Http\Livewire\Factory;

use Livewire\Component;

class ShowMechanicOne extends Component
{
    public $production;

    public function render()
    {
        return view('livewire.factory.show-mechanic-one');
    }
}
