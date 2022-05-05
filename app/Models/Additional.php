<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Manny\Manny;

class Additional extends Model{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'last_name',
      'second_lastname',
      'phone',
      'photo_profile',
      'change_password',
      'active',
    ];

  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }
  public function getActiveStateAttribute(){
    return ($this->active)? 'Activo':'Suspendido';
  }
  public function getFormatPhoneAttribute(){
    return Manny::mask($this->phone, "(11) 1111-1111");
  }

  public function changed(){
    return $this->change_password;
  }

}
