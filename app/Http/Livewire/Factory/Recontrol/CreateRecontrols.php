<?php

namespace App\Http\Livewire\Factory\Recontrol;

use App\Models\Client;
use App\Models\Recontrol;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateRecontrols extends Component
{
    public $codCentral, $reference, $name, $lote, $cuba,
    $dateIn, $expirationDate, $datedelivery, $expirationNew,
    $micro, $fisico, $conservantes, $status='', $observation, $clients, $client_id='';

    protected $rules  = [
        'codCentral' => 'required|max:20',
        'reference' => 'required|max:20',
        'name' => 'required|max:50',
        'lote' => 'nullable|max:20',
        'cuba' => 'nullable|max:20',
        'dateIn' => 'nullable',
        'expirationDate' => 'nullable',
        'datedelivery' => 'nullable',
        'expirationNew' => 'nullable',

        'micro' => 'nullable',
        'fisico' => 'nullable',
        'conservantes' => 'nullable',

        'status' => 'required',
        'observation' => 'nullable|max:200',
        'client_id' => 'required',

    ];

    public function mount(){
        $this->clients = Client::where('status', 1)->get();
    }

    public function save(){
        $this->validate();

        $recontrol = new Recontrol();

        $recontrol->codCentral = $this->codCentral;
        $recontrol->reference = $this->reference;
        $recontrol->name = $this->name;
        $recontrol->lote = $this->lote;
        $recontrol->cuba = $this->cuba;
        $recontrol->dateIn = $this->dateIn;
        $recontrol->expirationDate = $this->expirationDate;
        $recontrol->datedelivery = $this->datedelivery;
        $recontrol->expirationNew = $this->expirationNew;
        $recontrol->micro = $this->micro;
        $recontrol->fisico = $this->fisico;
        $recontrol->conservantes = $this->conservantes;
        $recontrol->status = $this->status;
        $recontrol->observation = $this->observation;
        $recontrol->client_id = $this->client_id;
        $recontrol->user_id =  Auth::user()->id;


        $recontrol->save();

        $this->emit('saved');

        return redirect()->route('factory.recontrol.show.index');


    }
    protected $validationAttributes = [
        'codCentral' => 'código',
        'reference' => 'referencia cliente',
        'name' => 'nombre artículo',
        'lote' => 'lote',
        'cuba' => 'cuba',
        'dateIn' => 'fecha de entrada',
        'expirationDate' => 'fecha de vencimiento',
        'datedelivery' => 'fecha de envío',
        'expirationNew' => 'nueva caducidad',

        'micro' => 'micro',
        'fisico' => 'físico',
        'conservantes' => 'conservante',

        'status' => 'estado del recontrol',
        'observation' => 'observación',
        'client_id' => 'cliente',

    ];
    public function render()
    {
        return view('livewire.factory.recontrol.create-recontrols')->layout('layouts.factory');
    }
}
