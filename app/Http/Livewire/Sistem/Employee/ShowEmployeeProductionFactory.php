<?php

namespace App\Http\Livewire\Sistem\Employee;

use App\Models\Employee_Production;
use Livewire\Component;
use Livewire\WithPagination;

class ShowEmployeeProductionFactory extends Component
{
    use WithPagination;

    public function render()
    {
        $production = Employee_Production::where('active', 0)->orderBy('created_at', 'desc')
        ->paginate(20);

        return view('livewire.sistem.employee.show-employee-production-factory', compact('production'));
    }

}
