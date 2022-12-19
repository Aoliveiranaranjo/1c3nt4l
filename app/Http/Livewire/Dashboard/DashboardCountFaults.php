<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Fault;
use Livewire\Component;

class DashboardCountFaults extends Component
{
    public function render()
    {
        $faults = Fault::where('status', 1)->count();

        return view('livewire.dashboard.dashboard-count-faults', compact('faults'));
    }
}
