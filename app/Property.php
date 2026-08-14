<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;
use App\City;
use App\Town;
use App\Phase;
use App\Block;
use App\Property;
use App\PropertyType;
use \stdClass;
use App\User;
use App\Client; 
use DateTime;
use \Crypt;
use App\Scheme;
use App\FloorPlan;
use App\PaymentPlan;
class Property extends Model
{
	protected $table = ['properties'];
    
    public function getColumns()
    {
	    $minutes=60*720;
	    if(Cache::has('roles'))
	    {
	    	$data=Cache::get('roles');
	    	$object = new stdClass();	    	
	    	//dd(gettype(	$data));
	         return  $object = (object) $data;
	    }
	    else
	    {
	    	$value = Cache::remember('roles', $minutes, function()
	        {
	      	 // return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
	          $data= DB::getSchemaBuilder()->getColumnListing($this->getTable());
	          $data = (object) $data;
	          return $data;
	        }); 
	    }  
    


    }
    public static function createPropertyURL($purpose, $city, $town, $title){
      $purpose = str_slug(Property::getPurpose($purpose));
      $city = str_slug($city);
      $town = str_slug($town);
      $title = str_slug($title);
      $url = '/property/'.$purpose.'/'.$city.'/'.$town.'/'.$title;
      return $url;

    }
    
    public static function createProjectUrl($city, $town, $title){
      $city = str_slug($city);
      $town = str_slug($town);
      $title = str_slug($title);
      $url = '/project/'.$city.'/'.$town.'/'.$title;
      return $url;

    }
    public function city()
    {
    	return $this->belongsTo(City::class);
    }
    public function block()
    {
    	return $this->belongsTo(Block::class);
    }
    public function town()
    {
    	return $this->belongsTo(Town::class);
    }
     public function phase()
    {
    	return $this->belongsTo(Phase::class);
    }

    public function getTable()
    {
    	return "properties";
    }
    public static function getName($id)
    {
        return Property::where('id',$id)->first()->title;
    }
    public function propertyType(){

        return $this->belongsTo(PropertyType::class , 'property_type_id');
    }

    public static function getphoneNumber($id)
    {
         $number = User::find($id)->mobile;
         if(!empty($number)){
            return $number;
         }    

        return User::find($id)->telephone;
    }

    public static function getPurpose($id)
    {
        $purpose = "";
        if($id  == 1)
        {
            return $purpose="sale";
        }
        else if($id == 2)
        {
            return $purpose="rent";
        }
        else if($id == 3)
        {
            return $purpose="wanted";
        }
        else if($id == 4)
        {
            return $purpose="project";
        }
    }
    public static function getPurposeId($purpose)
    {
        $id = "";
        if($purpose  == 'sale')
        {
            return $id=1;
        }
        else if($purpose == 'rent')
        {
            return $id=2;
        }
        else if($purpose == 'wanted')
        {
            return $id=3;
        }
        else if($purpose == 'project')
        {
            return $id=4;
        }
    }

    public static function getCityName($id)
    {
     return self::getTitleSLug(City::find($id)->name);
    }

    public static function getTownName($id)
    {
         
        return self::getTitleSLug(Town::find($id)->name);    
    }

    // public static function getCityName($id)
    // {
    //     $cache_dynamic_variable="city_unique_".$id;
    //     if (Cache::has($cache_dynamic_variable)) 
    //     {  
    //         $city_name = Cache::get($cache_dynamic_variable);
    //     }
    //     else
    //     {
    //         $GLOBALS["city_unique_id"] = $id;
    //         $city_name = Cache::remember($cache_dynamic_variable,120, function() {
    //           global $city_unique_id;
    //           return self::getTitleSLug(City::find($city_unique_id)->name);
    //         });
    //     }   
    //     return $city_name;
    // }

    // public static function getTownName($id)
    // {

    //     $cache_dynamic_variable="town_unique_".$id;
    //     if (Cache::has($cache_dynamic_variable)) 
    //     {  
    //         $town_name = Cache::get($cache_dynamic_variable);
    //     }
    //     else
    //     {
    //         $GLOBALS["town_unique_id"] = $id;
    //         $town_name = Cache::remember($cache_dynamic_variable,120, function() {
    //           global $town_unique_id;
    //           return self::getTitleSLug(Town::find($town_unique_id)->name);
    //         });
    //     }   
    //     return $town_name;
    //     //return self::getTitleSLug(Town::find($id)->name);    
    // }
    public static function getPhaseName($id)
    {	
    
  
        if($id == null)
        {
            return null;
        }
        
        return self::getTitleSLug(Phase::find($id)->name);    
    }
    public static function getTitleSlug($title){
        // $title = explode(" ", $title);
        // return strtolower(implode("-", $title));
        return str_slug($title);
    }
    public static function getPropertyType($id)
    {   
       
        return PropertyType::find($id)->name;
    }
    public static function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public static function getId($id)
    {
         return  Crypt::encrypt($id);
        // define("ENCRYPTIONss", "!@#$%^&*");
        // $id = encrypt($id, ENCRYPTIONss);
    }
     public static function getUrl($id)
     {
        return  $property=Property::find($id);

     }
      public static function agencyinfo($id)
    {
       return $property = AgencyWebsite::where('user_id',$id)->where('status',1)->first();
    }
     
     public function scheme()
    {
        return $this->hasMany(Scheme::class);
    }
    public function floorPlan()
    {
        return $this->hasMany(FloorPlan::class);
    }
    public function paymentPlan()
    {
        return $this->hasMany(PaymentPlan::class);
    }
}
