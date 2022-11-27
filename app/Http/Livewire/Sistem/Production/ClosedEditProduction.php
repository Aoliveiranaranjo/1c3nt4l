<?php

namespace App\Http\Livewire\Sistem\Production;

use App\Models\Order;
use App\Models\Production;
use Carbon\Carbon;
use Livewire\Component;

class ClosedEditProduction extends Component
{
    public  $production,  $dateClosed,  $order,  $order_id, $orden, $dateEnd;


    protected $rules  = [
        'production.dateClosed' => 'nullable',
        'order.dateEnd' => 'nullable',
        //     'mechanic_id' => 'required',


    ];
    public function mount(Production $production)
    {
        $this->production = $production;

        $this->order = Order::find( $production->order_id );

    }


    public function save(Order $order)
    {
        $this->validate();


        if ($this->production->dateClosed == true) {
            $this->production->dateClosed = Carbon::now();
            $this->production->state_production_id = 6;
        } else {
            $this->production->dateClosed = null;
        }
        if ($this->order->dateEnd == true) {

            $this->order->dateEnd = Carbon::now();
            $this->order->orderstate_id = 5;
            $this->order->save();
        } else {

            $this->order->dateEnd = null;
            $this->order->save();
        }

        $this->production->save();


        $this->reset('dateClosed');

        //  $this->reset('mechanic_id');

        return redirect()->route('sistem.production.closed');
    }
    protected $validationAttributes = [
        'production.dateClosed' => 'terminar esta producción',


    ];

    public function render()
    {
        return view('livewire.sistem.production.closed-edit-production')->layout('layouts.sistem');
    }
}
