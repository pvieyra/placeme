<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerHistory extends Model {
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'last_name',
        'second_last_name',
        'email',
        'phone',
    ];

    public function Customer(){
        return $this->belongsTo( Customer::class );
    }

}
