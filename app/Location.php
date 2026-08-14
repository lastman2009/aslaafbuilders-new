<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Cache;

class Location extends Model
{
    
     public static function getTownListObject($id)
    {   
      $cache_dynamic_variable="city_".$id;
      if (Cache::has($cache_dynamic_variable)) 
      {  
        $towns = Cache::get($cache_dynamic_variable);
      }

      else
      {
        $GLOBALS["city_id"] = $id;
        $towns = Cache::remember($cache_dynamic_variable,120, function() {
          global $city_id;
          return Town::where('city_id',$city_id)->orderBy('name', 'asc')->get();
        });
      }
      return $towns;
    }

    /*Town_id*/
    public static function getPhaseListObject($id)
    {
      $cache_dynamic_variable="town_".$id;
      if (Cache::has($cache_dynamic_variable)) 
      {  
        $phases = Cache::get($cache_dynamic_variable);
      }
      else
      {
        $GLOBALS["town_id"] = $id;
        $phases = Cache::remember($cache_dynamic_variable,120, function() {
          global $town_id;
          return Phase::where('town_id',$town_id)->orderBy('name', 'asc')->get();
        });
      }
      return $phases;
    }
    /*phase_id*/
    public static function getBlockListObject($id)
    {
      $cache_dynamic_variable="phase_".$id;
      if (Cache::has($cache_dynamic_variable)) 
      {  
        $blocks = Cache::get($cache_dynamic_variable);
      }
      else
      {
        $GLOBALS["phase_id"] = $id;
        $blocks = Cache::remember($cache_dynamic_variable,120, function() {
          global $phase_id;
          return Block::where('phase_id',$phase_id)->orderBy('name', 'asc')->get();
        });
      }   
      return $blocks;
    }

}
