<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    use HasFactory;

    protected $fillable = [
      'tracking_id',
      'state_id',
      'subject',
      'comments',
      'tracking_date'
    ];

    public function tracking(){
      return $this->belongsTo(Tracking::class);
    }
    public function state(){
      return $this->belongsTo(State::class);
    }
    public function files(){
      return $this->hasMany(File::class);
    }
}
