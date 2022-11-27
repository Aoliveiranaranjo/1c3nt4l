<?php

namespace App\Http\Livewire\Factory\Store;

use App\Models\QualityProduction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStorePtFactory extends Component
{
    use WithPagination;


    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';



    protected $listeners = [
        'delivery',
        'qualityProductionsuccess'

    ];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delivery(QualityProduction $qualityProduction)
    {
        $qualityProduction->delivery = Carbon::now();
        $qualityProduction->user_almacen = Auth::user()->id;

        $qualityProduction->save();

        $this->emit('saved');

        return redirect()->route('factory.store.pt.index');
    }

    public function qualityProductionsuccess()
    {
        $this->emit('alert');
    }

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

    public function render()
    {

        $qualityProductions = QualityProduction::with('order')
            ->whereNull('delivery')
            ->with('order.article')
            ->with('order.customer')
            ->where(function ($query) {
                $query->wherehas('order.customer', function ($q) {
                    $q->where('abbreviated', 'like', '%' . $this->search . '%');
                })
                    ->orwherehas('order.article', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order', function ($q) {
                        $q->where('orden', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order', function ($q) {
                        $q->where('pedido', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order.article', function ($q) {
                        $q->where('CodeCentral', 'like', '%' . $this->search . '%');
                    })
                    ->orwhere(function ($q) {
                        $q->where('lote_pt', 'like', '%' . $this->search . '%');
                    })
                    ->orwhere(function ($q) {
                        $q->where('palet', 'like', '%' . $this->search . '%');
                    })
                    ->orwhere(function ($q) {
                        $q->where('box', 'like', '%' . $this->search . '%');
                    })
                    ->orwhere(function ($q) {
                        $q->where('unid', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order.article', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('order.article', function ($q) {
                        $q->where('CodeClient', 'like', '%' . $this->search . '%');
                    });
            })



            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);



        return view('livewire.factory.store.show-store-pt-factory', compact('qualityProductions'))->layout('layouts.factory');
    }
}
