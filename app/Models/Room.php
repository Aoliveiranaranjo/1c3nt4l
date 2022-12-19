<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];


    //Relación Uno a Muchos
    public function machines(){
        return $this->hasMany(Machine::class);
    }
    public function productions()
    {
        return $this->hasManyThrough(Production::class, Machine::class);
    }
}
