<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //Relacion de Uno a Muchos inversa
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    //Relacion de Uno a Muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relación Uno a Muchos
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
