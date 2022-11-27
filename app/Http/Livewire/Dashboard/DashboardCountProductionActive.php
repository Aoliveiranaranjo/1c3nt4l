<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Production;
use Livewire\Component;

class DashboardCountProductionActive extends Component
{
    public function render()
    {
        $production = Production::whereNull('dateClosed')
            ->where('state_production_id', '=', '3')->count();
        return view('livewire.dashboard.dashboard-count-production-active', compact('production'));
    }
}
