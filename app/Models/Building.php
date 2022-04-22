<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model {
  use HasFactory;


  public function getCompleteAddressAttribute(){
    return $this->address." ".$this->suburb.", ".$this->municipality;
  }

  public function trackings(){
    return $this->hasMany(Tracking::class);
  }

}
