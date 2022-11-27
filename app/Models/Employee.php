<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    protected $date = [
        'brith',
        'antiquity'
    ];


    //Relación Uno a Muchos inversa
    public function sex(){
        return $this->belongsTo(sex::class);
    }
    //Relación Uno a Muchos inversa
    public function charge(){
        return $this->belongsTo(charge::class);
    }
    //Relación Uno a Muchos inversa
    public function group(){
        return $this->belongsTo(group::class);
    }

    //Relación Muchos a Muchos
    public function Productions(){
        return $this->belongsToMany(Production::class)->as('producciones')
            ->withPivot('id', 'active')->withTimestamps();
    }
}
