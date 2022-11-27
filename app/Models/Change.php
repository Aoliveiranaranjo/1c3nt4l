<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Change extends Model
{
    use HasFactory, SoftDeletes, BelongsToThrough;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //Relación Uno a Muchos inversa
    public function statechange(){
        return $this->belongsTo(statechange::class);
    }

    //Relación Uno a Muchos inversa
    public function typechange(){
        return $this->belongsTo(typechange::class);
    }

    //Relacion de Uno a Muchos inversa
    public function production(){
        return $this->belongsTo(Production::class);
    }
    //Relacion de Uno a Muchos inversa
    public function mechanic(){
        return $this->belongsTo(Mechanic::class);
    }
    //Relacion de Uno a Muchos inversa
    public function mechanicOne(){
        return $this->belongsTo(Mechanic::class,'mechanic_asig', 'id',);
    }
    //Relacion de Uno a Muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

     public function machine()
     {
         return $this->belongsToThrough(Machine::class,  Production::class);
     }

}
