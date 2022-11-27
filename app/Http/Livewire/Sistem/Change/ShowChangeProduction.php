<?php

namespace App\Http\Livewire\Sistem\Change;

use App\Models\Change;
use Livewire\Component;

class ShowChangeProduction extends Component
{
    Public $production;

    protected $listeners = ['refreshShowChangeProduction' => '$refresh'];

    public function render()
    {
        $this->changes = Change::where('production_id', $this->production->id)
        ->get();

        return view('livewire.sistem.change.show-change-production');
    }
}
