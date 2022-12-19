<?php

namespace App\Http\Livewire\Sistem\Order;

use App\Models\Article;
use App\Models\Order;
use App\Models\OrderState;
use Carbon\Carbon;
use Livewire\Component;

class EditOrderProgress extends Component
{
    Public $order;

    protected $listeners = ['delete',
    'refreshShowOrderProduction' => '$refresh',
];

    protected $rules  = [
        'order.pedidoCliente' => 'required|max:20',
        'order.pedido' => 'required|max:15',
        'order.orden' => 'required|max:15',
        'order.amount' => 'required|max:50',
        'order.material' => 'required',
        'order.dateDelivery' => 'required',  //nullable
        'order.dateEnd' => 'nullable',
        'order.orderstate_id' => 'required',
        'order.article_id' => 'required',
    ];

    public function mount(Order $order){
        $this->order = $order;

        $this->articles = Article::where("status", "1")->get();
        $this->orderstates = OrderState::all();
    }

    public function save(){
        $this->validate();

        if ( $this->order->dateEnd == "") {
            $this->order->dateEnd = null;
        } else{
            $this->order->dateEnd = Carbon::now();
            $this->order->orderstate_id = 5;

        }

        $this->order->save();

        $this->emit('saved');

        return redirect()->route('sistem.order.progress');
    }

    public function render()
    {
        return view('livewire.sistem.order.edit-order-progress')->layout('layouts.sistem');
    }
}
