<?php

namespace App\Http\Livewire\Sistem\Article;

use App\Models\Article;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateArticle extends Component
{
    public  $CodeCentral, $name, $article,
    $CodeClient, $status, $statusArticle='', $user_id,
    $customer_id;

   protected $rules  = [
       'CodeCentral' => 'required|max:20',
       'name' => 'required|max:45',
       'CodeClient' => 'required|max:20',
       'statusArticle' => 'required',
       'customer_id' => 'required|integer',

   ];


   public function save(){
       $this->validate();

       $article = new Article();

       $article->CodeCentral = $this->CodeCentral;
       $article->name = $this->name;
       $article->CodeClient = $this->CodeClient;
       $article->statusArticle = $this->statusArticle;
       $article->user_id = Auth::user()->id;
       $article->customer_id = $this->customer_id;

       $article->save();

       $this->emit('saved');

       return redirect()->route('sistem.article.index');


   }
   protected $validationAttributes = [
       'name' => 'nombre',
       'CodeCentral' => 'código',
       'CodeClient' => 'código del cliente',
       'statusArticle' => 'estado del artículo',
       'customer_id' => 'cliente',
   ];


   public function mount(Article $article){
       $this->article = $article;
       $this->customers = Customer::where('status', 1)->get();

   }

    public function render()
    {
        return view('livewire.sistem.article.create-article')->layout('layouts.sistem');
    }
}
