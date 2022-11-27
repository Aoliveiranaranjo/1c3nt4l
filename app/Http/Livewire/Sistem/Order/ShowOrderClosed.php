<?php

namespace App\Http\Livewire\Sistem\Order;

use App\Models\Article;
use App\Models\Order;
use App\Models\OrderState;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOrderClosed extends Component
{
    use WithPagination;


    public $search, $article, $orderStates,  $statefilter, $orderstate_id;
    public $sort = 'id';
    public $cant = '10';
    public $direction = 'asc';
    public $dataEnd = '';

    protected $listeners = ['restaurarOrder',
                    'ordersuccess'
    ];


    public function updatingSearch(){
        $this->resetPage();
    }

    public function restaurarOrder(Order $order){
        $order->dateEnd = null;
        $order->save();

        return redirect()->route('sistem.order.closed');
     }

     public function ordersuccess(){
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

    public function mount(){

    }



    public function render()
    {
        $orders = Order::query()
        ->whereNotNull('dateEnd')
        ->where(function($query) {
          $query->where('pedido', 'like', '%' . $this->search . '%')
          ->orwhere('orden', 'like', '%' . $this->search . '%')
          ->orwhere('amount', 'like', '%' . $this->search . '%')
          ->orwhere('material', 'like', '%' . $this->search . '%')

          ->orwherehas('customer', function($q){
              $q->where('abbreviated' , 'like', '%' . $this->search . '%');
          })
          ->orwherehas('article', function($q){
              $q->where('name' , 'like', '%' . $this->search . '%');
          })
          ->orwherehas('article', function($q){
              $q->where('CodeCentral' , 'like', '%' . $this->search . '%');
          })
         ->orwherehas('orderstate', function($q){
              $q->where('name' , 'like', '%' . $this->search . '%');
          });
        })

  ->addselect(['articleName' => Article::select ('name')->whereColumn('article_id', 'id')->take(1) ])
  ->addselect(['articleCod' => Article::select ('CodeCentral')->whereColumn('article_id', 'id')->take(1) ])
  ->addselect(['estado' => OrderState::select ('name')->whereColumn('orderstate_id', 'id')->take(1) ])

  //->orderByRaw('ISNULL(sortOrder), sortOrder ASC')
  //->orderBy(DB::raw('-`pry`'), $this->direction)
  ->orderBy($this->sort, $this->direction)
  ->paginate($this->cant);

        return view('livewire.sistem.order.show-order-closed', compact('orders'))->layout('layouts.sistem');
    }
}
