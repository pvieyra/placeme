<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Manny\Manny;
use phpDocumentor\Reflection\Types\Boolean;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class Tracking extends Model{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'customer_id',
      'building_id',
      'operation_id',
      'state_id',
      'numero_interior_unidad',
      'contact_type',
      'inmobiliaria_name',
      'nombre_asesor',
      'celular_asesor',
    ];


//  public function getCompleteAddressAttribute(){
//    return $this->address." ".$this->suburb." ".$this->municipality;
//  }
    public function getPhoneAsesorAttribute(){
     return Manny::mask($this->celular_asesor, "(11) 1111-1111");
    }

  /**
   * @return bool
   */


    public function isDateTrackingActive(){
      $diffDays = $this->updated_at->diffInDays(Carbon::now());
      return !(($diffDays >= 60));
      //return $this->updated_at->diffInDays(Carbon::now());
    }
    public function state(){
      return $this->belongsTo(State::class);
    }
    public function building(){
      return $this->belongsTo(Building::class);
    }
    public function operation(){
      return $this->belongsTo(Operation::class);
    }
    public function customer(){
      return $this->belongsTo(Customer::class);
    }

    public function comments(){
      return $this->hasMany(Comment::class);
    }

}
