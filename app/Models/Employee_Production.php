<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_Production extends Model
{
    use HasFactory;

    protected $table = "employee_production";// <-- El nombre personalizado

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];


    //Relación Uno a Muchos inversa
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function production(){
        return $this->belongsTo(Production::class);
    }

}
