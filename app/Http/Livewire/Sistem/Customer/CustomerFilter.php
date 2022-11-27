<?php

namespace App\Http\Livewire\Sistem\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerFilter extends Component
{
    use WithPagination;

    public $filters = [
        'search' => '',
        'fromDate' => '',
        'toDate' => '',
    ];


    public function render()
    {
        $customers = Customer::paginate(20);

        return view('livewire.sistem.customer.customer-filter', compact('customers'));
    }
}
