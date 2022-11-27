<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateProduction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //Relación Uno a Muchos
    public function productions(){
        return $this->hasMany(Production::class);
    }
}