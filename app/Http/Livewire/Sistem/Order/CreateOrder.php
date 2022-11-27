<?php

namespace App\Http\Livewire\Sistem\Order;

use App\Models\Article;
use App\Models\Customer;
use App\Models\Order;
use Livewire\Component;

class CreateOrder extends Component
{
    public   $pedidoCliente, $pedido,
    $order, $amount,  $dateEnd, $orden,
   $dateDelivery, $customer, $articles,
    $customer_id, $orderstate_id, $article_id, $articleview ;

   public $articleName = "";

   protected $rules  = [
       'pedidoCliente' => 'required',
       'pedido' => 'required',
       'orden' => 'required',
       'amount' => 'required|integer',
       'article_id' => 'required|integer',

   ];

   public function updatedArticleId($value){
       $this->articles = Article::where('id', $value)->get();
   }

   public function save(){
       $this->validate();

       $order = new Order();

       $order->pedidoCliente = $this->pedidoCliente;
       $order->pedido = $this->pedido;
       $order->orden = $this->orden;
       $order->amount = $this->amount;
       $order->dateDelivery = $this->dateDelivery;
       $order->dateEnd = $this->dateEnd;
       $order->orderstate_id = '2';
       $order->article_id = $this->article_id;


       $order->save();

       $this->emit('saved');

       return redirect()->route('sistem.order.index');
   }

   protected $validationAttributes = [
      'pedidoCliente' => 'pedido del cliente',
       'pedido' => 'numero de pedido Central',
       'orden' => 'orden de Central',
       'amount' => 'cantidad a producir',
       'pedido' => 'numero de pedido Central',
       'orderstate_id' => 'estado de la orden',
       'article_id' => 'código de artículo',
   ];


   public function mount(Order $order){
       $this->order = $order;
       $this->articles = Article::all();
       $this->customers = Customer::all();


   }

    public function render()
    {
        return view('livewire.sistem.order.create-order')->layout('layouts.sistem');
    }
}
