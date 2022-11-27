<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Change;
use Livewire\Component;

class DashboardCountChange extends Component
{
    public function render()
    {
        $changes = Change::whereNull('dateEnd')->count();

        return view('livewire.dashboard.dashboard-count-change', compact('changes'));
    }
}
