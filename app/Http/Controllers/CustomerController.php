<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function export(){
        return view('livewire.sistem.customer.customer-export');
    }

    public function import(){
        return view('livewire.sistem.customer.customer-import');
    }
}
