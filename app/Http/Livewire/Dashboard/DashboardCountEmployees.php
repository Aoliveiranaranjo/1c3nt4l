<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Employee_Production;

use Livewire\Component;

class DashboardCountEmployees extends Component
{
    public function render()
    {

        $employees_active = Employee_Production::where('active', 1)->count();


        return view('livewire.dashboard.dashboard-count-employees', compact('employees_active'));
    }
}
