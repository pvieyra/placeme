<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model{
    use HasFactory;

    protected $fillable = [
      'last_name',
      'second_lastname',
      'phone',
      'photo_profile'
    ];
}
