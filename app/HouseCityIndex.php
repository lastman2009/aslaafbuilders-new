<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseCityIndex extends Model
{
     protected $fillable=['city_id','year','month','avg_price_ftsq','property_count','index','avg_price_difference'];

     public static function get_class(){
     	return "City";
     }
}
