<?php

namespace App\Http\Livewire\Sistem\Article;

use App\Models\Article;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class ShowArticle extends Component
{
    use WithPagination;


    public $search, $CodeClient;
    public $sort = 'id';
    public $direction = 'desc';



    protected $listeners = ['delete',
                    'articlesuccess'

                        ];


    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete(Article $article){
        $article->delete();
     }

     public function articlesuccess(){
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
        public function render()
    {
        $articles = Article::query()
         ->where('CodeCentral', 'like', '%' . $this->search . '%')
        ->orwhere('name', 'like', '%' . $this->search . '%')
        ->orwhere('CodeClient', 'like', '%' . $this->search . '%')
        ->orwhere('customer_id', 'like', '%' . $this->search . '%')
        ->addselect(['cliente' => Customer::select ('abbreviated')->whereColumn('customer_id', 'id')->take(1) ])
        ->orwherehas('customer', function($q){
           $q->where('abbreviated' , 'like', '%' . $this->search . '%');

        })
        ->orderBy($this->sort, $this->direction)
        ->paginate(25);

        return view('livewire.sistem.article.show-article', compact('articles'))->layout('layouts.sistem');

    }
}
