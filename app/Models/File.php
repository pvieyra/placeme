<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model {
    use HasFactory;

    protected $fillable = [
      'comment_id',
      'file',
      'file_path'
    ];

    public function comment(){
      return $this->belongsTo(Comment::class);
    }
}
