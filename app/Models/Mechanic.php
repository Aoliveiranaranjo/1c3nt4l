<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mechanic extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];


    //Relación Uno a Muchos
    public function changes(){
        return $this->hasMany(Changes::class);
    }

    //Relación Uno a Muchos
    public function fault(){
        return $this->hasMany(Fault::class);
    }
    public function faultMechanicAsig(){
        return $this->hasMany(Fault::class, 'mechanic_asig');
    }


    //relacion uno a mucho inversas atraves de
    public function production()
    {
        return $this->belongsToThrough(Production::class, Fault::class);
    }

}
