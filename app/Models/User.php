<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {
    use HasRoles;
    use HasFactory, Notifiable;
    /** spatie permissions */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function additional(){
      return $this->hasOne(Additional::class,'user_id');
    }

  //getters
  public function getAllNameAttribute(){
    return $this->name." ".$this->additional->last_name;
  }

  public function trackings(): HasMany{
    return $this->hasMany(Tracking::class);
  }

  /// utlizar $this->save() para guardar la informacion desde el modelo a la BD
}
