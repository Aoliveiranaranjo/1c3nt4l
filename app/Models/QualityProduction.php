<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QualityProduction extends Model
{
    use HasFactory,  SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];
    //Relacion de Uno a Muchos inversa
    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userAlmacen(){
        return $this->belongsTo(User::class, 'user_almacen', 'id');
    }


}
