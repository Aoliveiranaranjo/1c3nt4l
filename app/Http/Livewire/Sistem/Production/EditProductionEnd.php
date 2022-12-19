<?php

namespace App\Http\Livewire\Sistem\Production;

use App\Models\Machine;
use App\Models\Production;
use App\Models\Room;
use App\Models\StateProduction;
use App\Models\TypeOrder;
use Carbon\Carbon;
use Livewire\Component;

class EditProductionEnd extends Component
{
    public  $production;

    public  $rooms = "";

    public  $room_id;

    protected $rules  = [
        'production.pry' => 'max:2',
        'production.cleaning' => 'max:2',
        'production.changeH' => 'max:2',
        'production.multiUnid' => 'max:2',
        'production.dateEnd' => 'nullable',
        'production.observation' => 'nullable',
        'production.order_id' => 'required',
        'production.machine_id' => 'required',
        'production.state_production_id' => 'required',
        'production.typeorder_id' => 'required',
        // 'room_id' => 'required'
    ];


    public function updatedRoomId($value)
    {
        $this->machines = Machine::where('room_id', $value)

            ->where(function ($query) {
                $query->where('status', 1);
            })->get();

        //  $this->production->machine->room_id = "";

    }

    public function mount(Production $production,)
    {
        $this->production = $production;
        //  $this->orders = Order::find(["id", "pry", "pedidoCliente", "pedido", "orden", "amount", "material", "operator", "orden", "dateDelivery", "dateEnd", "article_id" ])->toArray();
        $this->stateproductions = StateProduction::all();
        $this->rooms = Room::all();
        $this->room_id = $production->machine->room->id;
        $this->typeorders = TypeOrder::all();
        //$this->machine_id = $production->machine->id;
        $this->machines = Machine::where('room_id',  $this->room_id)
            ->where(function ($query) {
                $query->where('status', 1);
            })->get();
    }

    public function save()
    {
        $this->validate();

        if ($this->production->pry == "") {
            $this->production->pry = null;
        }
        if ($this->production->dateEnd == "") {
            $this->production->dateEnd = null;
        } else {
            $this->production->dateEnd = Carbon::now();
            $this->production->state_production_id = 5;
        }



        $this->production->save();

        $this->emit('saved');

        return redirect()->route('sistem.production.index');
    }

    public $editForm = [
        'open' => false,
        'dateEnd' => null
    ];



    public function render()
    {
        return view('livewire.sistem.production.edit-production-end')->layout('layouts.sistem');

    }
}
