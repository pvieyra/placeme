<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Manny\Manny;

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

    public function getCompleteNameAttribute()
    {
        return ucwords($this->name . " " . $this->last_name . "  " . $this->second_last_name );
    }
    public function getNameAttribute ( $value ){
        return ucwords( $value );
    }

    public function getPhoneCustomerAttribute()
    {
        return Manny::mask($this->phone, "(11) 1111-1111");
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = ucwords($value);
    }

    public function setSecondLastNameAttribute($value) {
        $this->attributes['second_last_name'] = ucwords($value);
    }

    public function trackings() {
        return $this->hasMany(Tracking::class);
    }

    public function histories() {
        return $this->hasMany(CustomerHistory::class)->orderBy('created_at', 'DESC');
    }
}
