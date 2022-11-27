<?php

namespace App\Http\Livewire\Sistem\Change;

use App\Models\Change;
use Livewire\Component;
use Livewire\WithPagination;

class ShowChangeClosed extends Component
{
    use WithPagination;


    public $search;
    public $sort = 'id';
    public $direction = 'desc';



    protected $listeners = [
        'restorechange',


    ];


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function changesuccess()
    {
        $this->emit('alert');
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
    }

    public function restorechange(Change $change)
    {
        $change->dateEnd = null;
        $change->save();
    }


    public function render()
    {
        $changes = Change::query()
            ->whereNotNull('dateEnd')
            ->with('statechange')
            ->with('typechange')
            ->with('production')
            ->with('production.order')
            ->with('production.customer')
            ->with('mechanic')
            ->where(function ($query) {
                $query->where('pry', 'like', '%' . $this->search . '%')
                    ->orwhere('description', 'like', '%' . $this->search . '%')

                    ->orwherehas('statechange', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('production.order', function ($q) {
                        $q->where('orden', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('production.customer', function ($q) {
                        $q->where('abbreviated', 'like', '%' . $this->search . '%');
                    })
                    ->orwherehas('typechange', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
            })

            // ->addselect(['articleName' => Article::select ('name')->whereColumn('article_id', 'id')->take(1) ])
            //->addselect(['articleCod' => Article::select ('CodeCentral')->whereColumn('article_id', 'id')->take(1) ])
            // ->addselect(['estado' => OrderState::select ('name')->whereColumn('orderstate_id', 'id')->take(1) ])

            //->orderByRaw('ISNULL(sortOrder), sortOrder ASC')
            // ->orderBy(DB::raw('-`pry`'), $this->direction)
            ->orderBy($this->sort, $this->direction)
            ->paginate(20);

        return view('livewire.sistem.change.show-change-closed', compact('changes'))->layout('layouts.sistem');
    }
}
