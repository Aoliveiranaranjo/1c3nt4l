<?php

namespace App\Http\Livewire\Factory\Faults;

use App\Models\Fault;
use Livewire\Component;
use Livewire\WithPagination;

class ViewFaultFactory extends Component
{
    use WithPagination;

    public $production;

    // protected $listeners = [

    //     'refreshShowFaulsFactory' => '$refresh'

    // ];

//    protected function getListeners()
//     {
//         return ['refreshShowFaulsFactory' => '$refresh'];
//     }


    public function render()
    {
        $faults = Fault::where('production_id', $this->production->id )
            ->orderBy('id', 'desc' )
            ->paginate(10);

        return view('livewire.factory.faults.view-fault-factory', compact('faults'));
    }
}
