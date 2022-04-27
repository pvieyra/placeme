<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model {
  use HasFactory;

  protected $fillable = [
    'building_code',
    'address',
    'suburb',
    'municipality',
    'int_number',
    'zip',
    'alias',
    'comments',
    'active',
  ];

  public function getCompleteAddressAttribute(){
    return $this->address." ".$this->suburb.", ".$this->municipality;
  }

  public function trackings(){
    return $this->hasMany(Tracking::class);
  }

}
