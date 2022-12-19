<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Start extends Model
{
    use HasFactory, SoftDeletes, BelongsToThrough;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //relacion uno a muchos
    public function qualities(){
        return $this->hasMany(Quality::class);
    }
    public function qualitie(){
        return $this->hasOne(Quality::class);
    }

    public function responsible(){
        return $this->hasOne(Responsible::class);
    }

    // relacion uno a uno inversa
    public function production()
    {
        return $this->belongsTo(Production::class);
    }
    // relacion uno a uno inversa a traves
    public function order()
    {
        return $this->belongsToThrough(Order::class, Production::class);
    }

}
