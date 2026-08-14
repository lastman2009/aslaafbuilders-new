<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Property;
class PropertyType extends Model
{
    protected $fillable =['parent','name','status'];

    public function property()
    {
    	return $this->hasOne(Property::class);
    }
    public function getPropertyChild($request)
    {
    	$propertyType =PropertyType::where('name',$request->name)->first();
    	if(!empty($propertyType))
    	return $alldata=PropertyType::where('parent',$propertyType->id)->where('status',1)->get();
    	else
    	return "no data";
    }
}
