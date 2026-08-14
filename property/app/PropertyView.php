<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyView extends Model
{
     protected $fillable =['user_id','property_id','view_count'];
}
