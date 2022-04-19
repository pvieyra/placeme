<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    use HasFactory;

    protected $fillable = [
      'tracking_id',
      'state_id',
      'comments',
      'tracking_date'
    ];

    public function tracking(){
      return $this->belongsTo(Tracking::class);
    }

    public function files(){
      return $this->hasMany(File::class);
    }
}
