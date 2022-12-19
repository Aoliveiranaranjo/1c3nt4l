<?php

namespace App\Http\Livewire\Factory\Faults;

use App\Models\Production;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowFaultFactory extends Component
{
    use WithPagination;


    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '50';
    public $readyToLoad = false;




    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $listeners = [

        'refreshShowFaulsFactory' => '$refresh',
        'view-show-fault-component-factory' => '$refresh',
    ];

    //    protected function getListeners()
    //     {
    //         return ['refreshShowFaulsFactory' => '$refresh'];
    //     }


    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
    }

    public function mount()
    {
    }

    public function render(): View
    {
        $productions = Production::whereNull('dateClosed')
            ->where('state_production_id', '=', '3')
            ->has('fault')
            ->with('state_production')
            ->with('order')
            ->with('typeorder')
            ->with('machine')
            ->with('room')
            ->with('faults')
            ->with('article')
            ->with('customer')
            ->where(function ($query) {
                $query->wherehas('customer', function ($q) {
                    $q->where('abbreviated', 'like', '%' . $this->search . '%');
                })
                    ->orwherehas('article', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('article', function ($q) {
                        $q->where('CodeCentral', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('article', function ($q) {
                        $q->where('CodeClient', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order', function ($q) {
                        $q->where('orden', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order', function ($q) {
                        $q->where('pedido', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order', function ($q) {
                        $q->where('pedidoCliente', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order', function ($q) {
                        $q->where('amount', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('state_production', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('typeorder', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('machine', function ($q) {
                        $q->where('codMachine', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('room', function ($q) {
                        $q->where('nameRoom', 'like', '%' . $this->search . '%');
                    });
            })
            //->orderByRaw('ISNULL(sortOrder), sortOrder ASC')
            // ->orderBy(DB::raw('-`pry`'), $this->direction)
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);



        return view('livewire.factory.faults.show-fault-factory', compact('productions'))->layout('layouts.factory');
    }

}
