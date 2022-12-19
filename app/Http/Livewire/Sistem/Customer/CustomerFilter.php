<?php

namespace App\Http\Livewire\Sistem\Customer;

use App\Models\Customer;
use App\Exports\CustomerExport;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;


class CustomerFilter extends Component
{
    use WithPagination;

    public $filters = [
        'search' => '',
        'cod' => '',
        'fromDate' => '',
        'toDate' => '',
        'status' => true,
    ];

    public function generateReport(){
        return Excel::download(new CustomerExport(), 'clientes.xlsx');
    }


    public function render()
    {
        $customers = Customer::filter($this->filters)->paginate(20);

        return view('livewire.sistem.customer.customer-filter', compact('customers'));
    }
}
