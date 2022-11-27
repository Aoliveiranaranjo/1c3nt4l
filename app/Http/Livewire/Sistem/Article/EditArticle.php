<?php

namespace App\Http\Livewire\Sistem\Article;

use App\Models\Article;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditArticle extends Component
{
    protected $rules  = [
        'article.CodeCentral' => 'required|max:20',
        'article.name' => 'required|max:45',
        'article.CodeClient' => 'required|max:20',
        'article.status' => 'required',
        'article.statusArticle' => 'required',
        'article.customer_id' => 'required',
    ];

    public function mount(Article $article,){
        $this->article = $article;
        $this->customers = Customer::where('status', 1)->get();
    }
    protected $validationAttributes = [
        'name' => 'nombre',
        'CodeCentral' => 'código',
        'CodeClient' => 'código',
        'customer_id' => 'cliente',
    ];

    public function save(){
        $this->validate();
        $this->article->user_id = Auth::user()->id;
        $this->article->save();

        $this->emit('saved');

        return redirect()->route('sistem.article.index');
    }
    public function render()
    {
        return view('livewire.sistem.article.edit-article')->layout('layouts.sistem');
    }
}
