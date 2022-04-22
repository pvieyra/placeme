<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

  protected $fillable = [
    'name',
    'last_name',
    'second_last_name',
    'email',
    'phone',
  ];

  public function getCompleteNameAttribute(){
    return $this->name." ".$this->last_name.", ".$this->second_last_name;
  }
  public function trackings(){
    return $this->hasMany(Tracking::class);
  }
}
