<?php

namespace App\Http\Controllers\Recontrol;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecontrolController extends Controller
{
    public function index(){
        return view('recontrol.index');
    }
}
