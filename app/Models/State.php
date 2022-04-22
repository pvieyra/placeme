<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'hierarchy',
    ];

    public function loadStates( $idState ){
      //debe regresar una coleccion con los estados de mayor jerarquia y sin el estado actual.
      $currentState = State::findOrFail( $idState);
      $states = State::all();
      $statesCollection = collect();
      foreach ($states as $state){
        if($state->id != $idState && $state->hierarchy > $currentState->hierarchy){
          $statesCollection->push($state);
        }
      }
      return $statesCollection;
    }
    public function trackings(): HasMany{
      return $this->hasMany(Tracking::class);
    }
}
