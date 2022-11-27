<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Decrease extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //Relacion de Uno a Muchos inversa
    public function decreaseType(){
        return $this->belongsTo(DecreaseType::class);
    }

    //Relacion de Uno a Muchos inversa
    public function decrease(){
        return $this->belongsTo(Decrease::class);
    }

}
