<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Town;

class City extends Model
{
    public function towns()
    {
    	return $this->hasMany(Town::class);
    }

   public static function getTowns($id)
    {
    	return Town::where('city_id' , $id)->get();
    }
     public function updateCityCount($city_id)
    {
		$cities = $this->find($city_id);
		$cities->city_count =   $cities->city_count+1;
		$cities->update();	
		return true;
		//dd($towns);
    }
}
