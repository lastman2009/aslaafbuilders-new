<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\Phase;
  
class Town extends Model
{
	
    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function phases()
    {
    	return $this->hasMany(Phase::class);
    }
     public function updateTownCount($town_id)
    {
        $towns = $this->find($town_id);
        $towns->town_count =   $towns->town_count+1;
        $towns->update();
        
        return true;
        //dd($towns);

    }
}
