<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderState extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //Relación Uno a Muchos
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
