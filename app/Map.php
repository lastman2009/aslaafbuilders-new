<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
	protected $fillable=['image'];
	public static function getMaps()
	{
		return $maps=Map::where('status',1)->get();

	}
}
