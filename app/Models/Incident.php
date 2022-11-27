<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //Relacion de Uno a Muchos inversa
    public function incident_type(){
        return $this->belongsTo(IncidentType::class);
    }
    //Relacion de Uno a Muchos inversa
    public function production(){
        return $this->belongsTo(Production::class);
    }
    //Relacion de Uno a Muchos inversa
    public function mechane(){
        return $this->belongsTo(Mechanic::class);
    }
    //Relacion de Uno a Muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
}
