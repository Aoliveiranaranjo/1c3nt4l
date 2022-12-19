<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\QualityProduction;
use Livewire\Component;

class DashboardCountStorePt extends Component
{
    public function render()
    {
        $qualityproductions = QualityProduction::whereNull('delivery')->count();

        return view('livewire.dashboard.dashboard-count-store-pt', compact('qualityproductions'));
    }
}
