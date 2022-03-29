<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'last_name',
      'second_lastname',
      'phone',
      'photo_profile'
    ];

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }
}
