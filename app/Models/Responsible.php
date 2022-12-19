<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Responsible extends Model
{
    use HasFactory, SoftDeletes, BelongsToThrough;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];


    //relacion uno a muchos inversa
    public function start(){
        return $this->belongsTo(Start::class);
    }
     //relacion uno a muchos inversa a traves
    public function production(){
        return $this->belongsToThrough(Production::class, Start::class);
    }
}
