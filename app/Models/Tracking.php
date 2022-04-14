<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'customer_id',
      'building_id',
      'operation_id',
      'state_id',
      'numero_interior_unidad',
      'contact_type',
      'inmobiliaria_name',
      'nombre_asesor',
      'celular_asesor'
    ];

    public function state(){
      return $this->belongsTo(State::class);
    }
    public function building(){
      return $this->belongsTo(Building::class);
    }
    public function operation(){
      return $this->belongsTo(Operation::class);
    }
    public function customer(){
      return $this->belongsTo(Customer::class);
    }
    public function commments(){
      return $this->hasMany(Comment::class);
    }

}
