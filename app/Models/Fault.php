<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fault extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    // relacion uno a uno inversa
    public function production()
    {
        return $this->belongsTo(Production::class);
    }

    //Relacion de Uno a Muchos inversa
    public function mechanic(){
        return $this->belongsTo(Mechanic::class);
    }
    public function mechanicOne(){
        return $this->belongsTo(Mechanic::class,  'mechanic_asig', 'id',);
    }

    //Relacion de Uno a Muchos inversa
    public function fault_type(){
        return $this->belongsTo(FaultType::class);
    }
}
