<?php

namespace App\Http\Livewire\Sistem\Order;

use App\Models\Production;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowOrderProduction extends Component
{
        Public $order;

        protected $listeners = ['refreshShowOrderProduction' => '$refresh'];



        public function render(): View
        {
            $this->productions = Production::where('order_id', $this->order->id)->get();


            return view(view: 'livewire.sistem.order.show-order-production');

        }
}
