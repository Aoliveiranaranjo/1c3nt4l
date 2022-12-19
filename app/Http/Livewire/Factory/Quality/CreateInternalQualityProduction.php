<?php

namespace App\Http\Livewire\Factory\Quality;

use App\Models\QualityProduction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateInternalQualityProduction extends Component
{
    public $open = false;
    public $unid,  $order,  $order_id, $user_id;
    public $lote_pt,  $sp, $lote_conte, $cuba, $palet, $box;


    public function mount()
    {
    }

    protected $rules = [
        'lote_pt' => 'required|max:20',
        'sp' => 'max:20',
        'lote_conte' => 'max:20',
        'cuba' => 'max:20',
        'palet' => 'required|max:3',
        'box' => 'required|max:5',
        'unid' => 'required|max:20',


    ];

    protected $validationAttributes = [
        'lote_pt' => 'lote de PT',
        'sp' => 'código de SP o formula VRAC ',
        'lote_conte' => 'lote contenedor',
        'cuba' => 'cuba',
        'palet' => 'número de palet',
        'box' => 'cantidad de cajas',
        'unid' => 'unidades',

    ];

    public function save()
    {
        $this->validate();

        $order_id = $this->order->id;
        $user_id = Auth::user()->id;

        QualityProduction::create([
            'lote_pt' => $this->lote_pt,
            'sp' => $this->sp,
            'lote_conte' => $this->lote_conte,
            'cuba' => $this->cuba,
            'palet' => $this->palet,
            'box' => $this->box,
            'unid' => $this->unid,

            'order_id' => $order_id,
            'user_id' =>   $user_id,

        ]);
        $this->reset(['open', 'lote_pt', 'sp', 'lote_conte', 'cuba',
        'palet', 'box', 'unid', 'order_id', 'user_id',
        ]);

        //   $this->identificador = rand();

        $this->emit('show-internal-quality-production');
        $this->emit('alert', 'La producción se creó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.factory.quality.create-internal-quality-production')->layout('layouts.factory');
    }
    public function updatingOpen()
    {
        if ($this->open == false) {
            $this->reset(['open', 'lote_pt', 'sp', 'lote_conte', 'cuba',
            'palet', 'box', 'unid', 'order_id', 'user_id',]);
        }
    }
}
