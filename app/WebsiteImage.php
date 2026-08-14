<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AgencyWebsite;
class WebsiteImage extends Model
{
   	
   	public function website()
   	{
   		return $this->belongsTo(AgencyWebsite::class);
   	}
   	// public function addImages($)
}
