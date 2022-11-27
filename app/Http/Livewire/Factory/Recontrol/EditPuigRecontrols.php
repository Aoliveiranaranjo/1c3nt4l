<?php

namespace App\Http\Livewire\Factory\Recontrol;

use App\Models\Client;
use App\Models\Recontrol;
use Carbon\Carbon;
use Livewire\Component;

class EditPuigRecontrols extends Component
{
    public $clients;

    protected $rules  = [
        'recontrol.codCentral' => 'required|max:20',
        'recontrol.reference' => 'required|max:20',
        'recontrol.name' => 'required|max:50',
        'recontrol.lote' => 'nullable|max:20',
        'recontrol.cuba' => 'nullable|max:20',
        'recontrol.dateIn' => 'nullable',
        'recontrol.expirationDate' => 'nullable',
        'recontrol.history' => 'nullable',
        'recontrol.datedelivery' => 'nullable',
        'recontrol.expirationNew' => 'nullable',

        'recontrol.micro' => 'nullable',
        'recontrol.fisico' => 'nullable',
        'recontrol.conservantes' => 'nullable',

        'recontrol.status' => 'required',
        'recontrol.observation' => 'nullable|max:200',
        'recontrol.client_id' => 'required',

    ];

    public function mount(Recontrol $recontrol)
    {
        $this->recontrol = $recontrol;
        $this->clients = Client::where('status', 1)->get();
    }
    protected $validationAttributes = [
        'recontrol.codCentral' => 'código',
        'recontrol.reference' => 'referencia cliente',
        'recontrol.name' => 'nombre artículo',
        'recontrol.lote' => 'lote',
        'recontrol.cuba' => 'cuba',
        'recontrol.dateIn' => 'fecha de entrada',
        'recontrol.expirationDate' => 'fecha de vencimiento',
        'recontrol.datedelivery' => 'fecha de envío',
        'recontrol.expirationNew' => 'nueva caducidad',

        'recontrol.micro' => 'micro',
        'recontrol.fisico' => 'físico',
        'recontrol.conservantes' => 'conservante',

        'recontrol.status' => 'estado del recontrol',
        'recontrol.observation' => 'observación',
        'recontrol.client_id' => 'cliente',
    ];
    public function save()
    {
        $this->validate();

        if ($this->recontrol->history == "") {
            $this->recontrol->history = null;
        } else {
            $this->recontrol->history = Carbon::now();
        }
        $this->recontrol->save();

        $this->emit('saved');

        return redirect()->route('factory.recontrol.show.index.puig');
    }
    public function render()
    {
        return view('livewire.factory.recontrol.edit-puig-recontrols')->layout('layouts.factory');
    }
}
