<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyValueAssessment extends Model
{
   protected $table = 'property_value_assessment';
    protected $primaryKey ='id';
    protected $fillable = ['property_type','name', 'phone', 'property_address','message'];
    public $timestamps = true;
    
}