<?php

namespace App\Http\Livewire\Sistem\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOrderProgress extends Component
{
    use WithPagination;


    public $search; //, $article, $orderStates,  $statefilter, $orderstate_id;
    public $sort = 'id';
    public $cant = '10';
    public $direction = 'desc';

    protected $listeners = [
        'delete',
        'ordersuccess'
    ];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Order $order)
    {
        $order->delete();
    }

    public function ordersuccess()
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

        $orders = Order::query()
            ->whereNull('dateEnd')
            ->where('orderstate_id', 3)
            ->with('article')
            ->with('customer')
            ->with('orderstate')
            ->where(function ($query) {
                $query->where('pedido', 'like', '%' . $this->search . '%')
                    ->orwhere('orden', 'like', '%' . $this->search . '%')
                    ->orwhere('pedidoCliente', 'like', '%' . $this->search . '%')
                    ->orwhere('created_at', 'like', '%' . $this->search . '%')
                    ->orwhere('amount', 'like', '%' . $this->search . '%')
                    ->orwhere('material', 'like', '%' . $this->search . '%')


                    ->orwherehas('customer', function ($q) {
                        $q->where('abbreviated', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('article', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('article', function ($q) {
                        $q->where('CodeCentral', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('orderstate', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
            })

            // ->addselect(['articleName' => Article::select ('name')->whereColumn('article_id', 'id')->take(1) ])
            //->addselect(['articleCod' => Article::select ('CodeCentral')->whereColumn('article_id', 'id')->take(1) ])
            // ->addselect(['estado' => OrderState::select ('name')->whereColumn('orderstate_id', 'id')->take(1) ])


            //->orderBy(DB::raw('-`pry`'), $this->direction)
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);



        return view('livewire.sistem.order.show-order-progress', compact('orders'))->layout('layouts.sistem');
    }
}
