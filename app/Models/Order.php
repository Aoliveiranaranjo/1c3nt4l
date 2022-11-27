<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Order extends Model
{
    use HasFactory, SoftDeletes, BelongsToThrough;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    protected $date = [
        'dateDelivery',
        'dateEnd'
    ];

    //Relación Uno a muchos
    public function productions(){
        return $this->hasMany(Production::class);
    }
   //Relación Uno a muchos
    public function qualityProductions(){
        return $this->hasMany(QualityProduction::class);
    }

    //Relacion de Uno a Muchos inversa
    public function orderstate(){
        return $this->belongsTo(OrderState::class);
    }

    //Relacion de Uno a Muchos inversa
    public function article(){
        return $this->belongsTo(Article::class);
    }

    //Relacion de a través de artículos a cliente inversa

    public function customer()
    {
        return $this->belongsToThrough(Customer::class, Article::class);
    }
}
