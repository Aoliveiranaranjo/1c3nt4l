<?php

namespace App\Http\Livewire\Sistem\Order;

use App\Models\Article;
use App\Models\Order;
use App\Models\OrderState;
use Carbon\Carbon;
use Livewire\Component;

class EditOrder extends Component
{


    protected $rules  = [
        'order.pedidoCliente' => 'required|max:20',
        'order.pedido' => 'required|max:15',
        'order.orden' => 'required|max:15',
        'order.amount' => 'required|max:50',
        'order.material' => 'nullable',
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
        }

        $this->order->save();

        $this->emit('saved');

        return redirect()->route('sistem.order.index');
    }

    public function render()
    {

        return view('livewire.sistem.order.edit-order')->layout('layouts.sistem');
    }
}
