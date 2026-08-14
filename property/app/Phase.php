<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Town;
use App\Block;
use App\City;


class Phase extends Model
{
	
    public function town()
    {
    	return $this->belongsTo(Town::class);
    }

    public function blocks()
    {
    	return $this->hasMany(Block::class);
    }
    //  public function city()
    // {
    // 	return $this->belongsTo(City::class);
    // }
     public function updateCountPhase($phase_id)
    {
        $phases = $this->find($phase_id);
        $phases->phase_count = $phases->phase_count+1;
        $phases->update();
        return true;
    }
}
