<?php

namespace App\Http\Livewire\Factory\Quality;

use App\Models\Order;
use Livewire\Component;

class EditQualityProduction extends Component
{



    protected $listeners = ['delete',
    'refreshShowOrderProduction' => '$refresh',
];
/*
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
*/
    public function mount(Order $order){
       $this->order = $order;

    }
/*
    public function save(){
        $this->validate();

        if ( $this->order->dateEnd == "") {
            $this->order->dateEnd = null;
        } else{
            $this->order->dateEnd;
            $this->order->orderstate_id = 5;

        }

        $this->order->save();

        $this->emit('saved');

        return redirect()->route('factory.production.index');
    } */
    public function render()
    {

        return view('livewire.factory.quality.edit-quality-production')->layout('layouts.factory');
    }
}
