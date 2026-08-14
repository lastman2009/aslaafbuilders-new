<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class SaveProperty extends Model
{
    public function saveProperty($id)
    {
    	$propertyCheck =SaveProperty::where('property_id',$id)->where('user_id',Auth::id())->first();
    	if($propertyCheck == null){
	    	$savePropertyForUser =new SaveProperty;
	    	$savePropertyForUser->user_id =Auth::id();
	    	$savePropertyForUser->property_id =$id;
	    	$savePropertyForUser->save();
    	return "saved";
    	}
    	else
    	{
    		return "already in saved List";
    	}

    }
    
    public function saveMobileApidata($request)
    {
        $savePropertyForUser =new SaveProperty;
        $savePropertyForUser->user_id =$request->user_id;
        $savePropertyForUser->property_id =$request->property_id;
        $savePropertyForUser->save();
        return true;

    }
}
