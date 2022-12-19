<?php

namespace App\Http\Livewire\Factory\Recontrol;

use App\Models\Client;
use App\Models\Recontrol;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRecontrols extends Component
{
    use WithPagination;

    public $client;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = [
        'delete',
        'recontrolsuccess'

    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Recontrol $recontrol)
    {
        $recontrol->delete();
    }

    public function recontrolsuccess()
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
    public function mount()
    {
        $this->client = Client::where('status', 1)->get();
    }


    public function render()
    {

        $recontrols = Recontrol::query()
            ->whereNull('history')
            ->with('client')

            ->where(function ($query) {
                $query->wherehas('client', function ($q) {
                    $q->where('abbreviated', 'like', '%' . $this->search . '%');
                })
                    ->orwhere(function ($query) {
                        $query->where('created_at', 'like', '%' . $this->search . '%');
                        $query->where('codCentral', 'like', '%' . $this->search . '%');
                        $query->orwhere('reference', 'like', '%' . $this->search . '%');
                        $query->orwhere('name', 'like', '%' . $this->search . '%');
                        $query->orwhere('lote', 'like', '%' . $this->search . '%');
                        $query->orwhere('cuba', 'like', '%' . $this->search . '%');
                        $query->orwhere('dateIn', 'like', '%' . $this->search . '%');
                        $query->orwhere('expirationDate', 'like', '%' . $this->search . '%');
                        $query->orwhere('datedelivery', 'like', '%' . $this->search . '%');
                        $query->orwhere('expirationNew', 'like', '%' . $this->search . '%');
                        $query->orwhere('lote', 'like', '%' . $this->search . '%');
                    });
            })

            ->orderBy($this->sort, $this->direction)
            ->paginate(50);
        return view('livewire.factory.recontrol.show-recontrols', compact('recontrols'))->layout('layouts.factory');
    }
}
