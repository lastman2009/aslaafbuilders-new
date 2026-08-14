<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommercialCityTownIndex extends Model
{
    protected $fillable=['city_id','town_id','year','month','avg_price_ftsq','property_count','index','avg_price_difference'];
}
