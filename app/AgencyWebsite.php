<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\WebsiteImage;
use \Crypt;
use App\Theme;
use App\AgencyOffice;
use App\AgencyStaff;
use App\Statistic;
use DB;

class AgencyWebsite extends Model
{
    public function createNewWebsite($status)
    {	
        if($status==1)
        {
            $propertyobject = new Statistic();
            $propertyobject->updateStats('active_website');
        }
        else
        {
            $propertyobject = new Statistic();
            $propertyobject->decrementStats('active_website');
        }
    	$forCheckwebsite =AgencyWebsite::where('user_id' ,Auth::id())->first();
       	if(empty($forCheckwebsite))
    	{
    		
	    	$createNewWebsite = new AgencyWebsite();
	    	$createNewWebsite->user_id = Auth::id();
	    	$createNewWebsite ->status= $status;
            $createNewWebsite ->theme_id=Theme::where('name','Default Theme')->first()->id;
	    	$createNewWebsite->save();
	        return true;

    	}
    	else
    	{     
             // $forCheckwebsite ->theme_id=Theme::where('name','default')->first()->id;
  	    	 $forCheckwebsite->status  = $status;
	    	 $forCheckwebsite->update();
	    	 return true;
    	}
    }
      public static function getId($id)
    {
         return  Crypt::encrypt($id);
    }
    public static function getWebsiteId()
    {
        return Crypt::encrypt(AgencyWebsite::where('user_id' ,Auth::id())->first()->id);  
    }
    public function Images()
    {
        return $this->hasMany(WebsiteImage::class);
    }

    public static function getWebsite($id)
    {
       return AgencyWebsite::where('user_id',Auth::id())->first()->url;

    }
    public static function displaywebsite($id)
    {
        $office=AgencyOffice::where('agency_website_id',$id)->where('status',1)->first();
        $staff=AgencyStaff::where('agency_website_id',$id)->where('status',1)->first();
        if(!empty($office) && !empty($staff))
        {
            return true;
        }
            return false;

    }
    public function createNewWebsiteOnRegister($user ,$status)
    {   
            
            $createNewWebsite = new AgencyWebsite();
            $createNewWebsite->user_id = $user->id;
            $createNewWebsite ->status= $status;
            $createNewWebsite ->theme_id=Theme::where('name','Default Theme')->first()->id;
            $createNewWebsite->save();
            return true;

    }

     public function getWebsiteName($id)
    {
        $agencyUrl =AgencyWebsite::find($id);
        if(!empty($agencyUrl))
        return $agencyUrl->url;
        else
        return "no data";
    }
      public static function featuredAgencies()
   {
    $featuredAgencies =AgencyWebsite::select(DB::raw('agency_websites.id, agency_websites.contact_number, agency_websites. address, agency_websites.logo, agency_websites.agency_name , agency_websites.url ,  agency_websites.verified'))
    ->where('agency_websites.verified', '1')
    ->where('agency_websites.status', 1)
    ->orderBy('agency_websites.id', 'desc')
    ->limit(28)
    ->get();
        return $featuredAgencies;
   }

}
