<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Production extends Model
{
    use HasFactory, SoftDeletes, BelongsToThrough;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //Relacion de Uno a muchos inversa
    public function order(){
        return $this->belongsTo(Order::class);
    }

    //Relacion de Uno a Muchos inversa
    public function state_production(){
        return $this->belongsTo(StateProduction::class);
    }
    //Relacion de Uno a Muchos inversa
    public function machine(){
        return $this->belongsTo(Machine::class);
    }

    //Relación Uno a Muchos
    public function incidents(){
        return $this->hasMany(Incident::class);
    }

    //Relación Uno a Muchos
    public function productionparts(){
        return $this->hasMany(ProductionPart::class);
    }

    //Relación Muchos a Muchos
    public function employees(){
        return $this->belongsToMany(Employee::class)->as('trabajadoras')
            ->withPivot('id', 'active')->withTimestamps();
    }

    //Relación Muchos a Muchos
    public function activeEmployees(){
        return $this->belongsToMany(Employee::class)->as('trabajadoras')
        ->withPivot('id', 'active')->wherePivot('active', 1)
            ->withTimestamps();
    }
    //Relación Muchos a Muchos
    public function inactiveEmployees(){
        return $this->belongsToMany(Employee::class)->as('trabajadoras')
        ->withPivot('id', 'active')->wherePivot( 'active', 0)
            ->withTimestamps();
    }

     //Relacion de Uno a Muchos inversa
     public function typeorder(){
        return $this->belongsTo(TypeOrder::class);
    }
    //Relación Uno a Muchos
    public function changes(){
      return $this->hasMany(Change::class);
    }
    public function change(){
        return $this->belongsTo(Change::class);
      }
    public function responsible(){
        return $this->hasOneThrough(Responsible::class, Start::class);
    }
    public function customer()
    {
        return $this->belongsToThrough(Customer::class, [Article::class, Order::class]);
    }

    public function article()
    {
        return $this->belongsToThrough(Article::class, Order::class);
    }

    public function room()
    {
        return $this->belongsToThrough(Room::class, Machine::class);
    }
    // public function mechanics()
    // {
    //       return $this->belongsToThrough(Mechanic::class, Fault::class);
    // }

    // Relación de uno a uno
    public function start()
    {
        return $this->hasOne(Start::class);
    }

    //uno a muchos a traves de
    public function qualities(){
        return $this->hasOneThrough(Quality::class, Start::class);
    }

    public function activeQualities(){
        return $this->hasManyThrough(Quality::class, Start::class)->where('status', 1)->get();
    }

    //Relación Uno a Muchos
    public function faults(){
        return $this->hasMany(Fault::class);
      }
      public function fault(){
        return $this->hasOne(Fault::class)->where('status', 1);
      }

    public function mechanic_asig(){
        return $this->hasManyThrough(Mechanic::class, Fault::class, 'mecanic_asig');
    }

    //Relación Uno a Muchos
    public function decrease(){
        return $this->hasMany(Decrease::class);
      }
}
