<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id','created_at',
    'updated_at', 'deleted_at'];

    //Query Scopes
    public function scopeFilter($query, $filters){
        $query->when($filters['search'] ?? null, function($query, $search){
            $query->where('name', 'like', '%' . $search . '%');
        })->when($filters['cod'] ?? null, function($query, $cod){
            $query->where('Cod',  $cod);
        })->when($filters['fromDate'] ?? null, function($query, $fromDate){
            $query->where('created_at', '>=', $fromDate);
        })->when($filters['toDate'] ?? null, function($query, $toDate){
            $query->where('created_at', '<=',$toDate);
        })->when($filters['status'] ?? null, function($query, $status){
            $query->where('status', $status);
        });      
    }


    //Relación Uno a Muchos
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
