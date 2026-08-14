<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AgencyWebsite;
class Theme extends Model
{
    protected $fillable=['name','description','	frequency','thumbnail'];

    public static function getThemeName($id)
    {
    	return Theme::find($id)->name;
    }

}
