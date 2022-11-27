<?php

namespace App\Http\Livewire\Sistem\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCustomer extends Component
{
    use WithPagination;


    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['delete',
                    'customersuccess'

                        ];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete(Customer $customer){
        $customer->delete();
     }

     public function customersuccess(){
        $this->emit('alert');
     }

     public function order($sort){
        if ($this->sort == $sort) {
            if ($this->direction == 'desc'){
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }

    }

    public function render()
    {

        $customers = Customer::where('Cod', 'like', '%' . $this->search . '%')
        ->orwhere('name', 'like', '%' . $this->search . '%')
        ->orwhere('nif', 'like', '%' . $this->search . '%')
        ->orwhere('abbreviated', 'like', '%' . $this->search . '%')
        ->orderBy($this->sort, $this->direction)
        ->paginate(50);

        return view('livewire.sistem.customer.show-customer', compact('customers'))->layout('layouts.sistem');
    }
}
