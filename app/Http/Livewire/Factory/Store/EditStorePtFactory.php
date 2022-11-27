<?php

namespace App\Http\Livewire\Factory\Store;

use App\Models\QualityProduction;
use Livewire\Component;

class EditStorePtFactory extends Component
{
    protected $rules  = [
        'qualityProduction.lote_pt' => 'required|max:20',
        'qualityProduction.sp' => 'max:20',
        'qualityProduction.lote_conte' => 'max:20',
        'qualityProduction.cuba' => 'max:20',
        'qualityProduction.palet' => 'required|max:3',
        'qualityProduction.box' => 'required|max:5',
        'qualityProduction.unid' => 'required|max:20',

    ];

    public function mount(QualityProduction $qualityProduction){
        $this->qualityProduction = $qualityProduction;
    }
    protected $validationAttributes = [
        'qualityProduction.lote_pt' => 'lote de PT',
        'qualityProduction.sp' => 'código de SP o formula VRAC ',
        'qualityProduction.lote_conte' => 'lote contenedor',
        'qualityProduction.cuba' => 'cuba',
        'qualityProduction.palet' => 'número de palet',
        'qualityProduction.box' => 'cantidad de cajas',
        'qualityProduction.unid' => 'unidades',
    ];
    public function save(){
        $this->validate();
        $this->qualityProduction->save();

        $this->emit('saved');

        return redirect()->route('factory.store.pt.index');

    }

    public function render()
    {
        return view('livewire.factory.store.edit-store-pt-factory');
    }
}
