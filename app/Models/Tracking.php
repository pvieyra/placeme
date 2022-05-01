<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
      'active',
      'checked',
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

    public static function getDuplicatesTrackings( $perPage){
      return DB::table('trackings as t')
        ->selectRaw("t.id as tracking_id,b.building_code, CONCAT(u.name, ' ',a.last_name) as user_name, u.email, t.customer_id, CONCAT(c.name,' ',c.last_name) as customer_name,  c.phone as customer_phone, b.id as building_id, b.building_code, b.address, s.name as state_name, s.color as state_color, t.active as activo, t.checked as revisado, t.created_at as creado")
        ->join("customers as c","t.customer_id",'=','c.id')
        ->join("buildings as b","t.building_id","=","b.id")
        ->join("users as u", "t.user_id","=","u.id")
        ->join("additionals as a","u.id", "=","a.user_id")
        ->join("states as s","t.state_id", "=", "s.id")
        ->whereRaw("c.phone IN (
	        SELECT c.phone FROM trackings as t
            JOIN customers as c 
            ON t.customer_id = c.id
            GROUP BY  c.phone
            HAVING COUNT(*) > 1
     ) ")
        ->whereRaw("t.building_id IN(
          SELECT trackings.building_id FROM trackings
        GROUP BY trackings.building_id
        HAVING COUNT(*) > 1
      ) ")->paginate($perPage);
    }
}
