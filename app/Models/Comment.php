<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    use HasFactory;

    public function tracking(){
      return $this->belongsTo(Tracking::class);
    }
    public function files(){
      return $this->hasMany(File::class);
    }
}
