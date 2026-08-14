<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Favorite extends Model
{
   public static function getFavouriteList()
   {
   		$data= Favorite::where('session_id',Session::getId())->first();
   		if(!empty($data))
   			return true;
   		return false;
   }
}
