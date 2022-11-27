<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class FaultType extends Model
{
    use HasFactory, SoftDeletes, BelongsToThrough;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //relacion uno a mucho inversas atraves de
    public function production()
    {
        return $this->belongsToThrough(Production::class, Start::class);
    }

    //Relación Uno a Muchos
    public function fault(){
        return $this->hasMany(Fault::class);
    }
}
