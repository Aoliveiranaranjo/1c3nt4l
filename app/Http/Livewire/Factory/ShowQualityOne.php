<?php

namespace App\Http\Livewire\Factory;

use Livewire\Component;

class ShowQualityOne extends Component
{
    public $production;

    public function render()
    {
        return view('livewire.factory.show-quality-one')->layout('layouts.factory');
    }
}
