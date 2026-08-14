<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use \Crypt;
class AgencyOffice extends Model
{
   	public function saveData($request , $id)
   	{
      $id=Crypt::decrypt($id);
    	$newAgencyOffice =new AgencyOffice;
    	$newAgencyOffice->agency_website_id=$id;
    	$newAgencyOffice->telephone=$request->telephone;
    	$newAgencyOffice->email=$request->email;
    	$newAgencyOffice->fb_link=$request->fb_link;
    	$newAgencyOffice->google_link=$request->google_link;
    	$newAgencyOffice->city_id=$request->city_id;
    	$newAgencyOffice->mobile_no=$request->mobile_no;
    	$newAgencyOffice->uan_number=$request->uan_number;
    	$newAgencyOffice->address=$request->address;
    	$newAgencyOffice->lat=$request->latitude;
    	$newAgencyOffice->lng=$request->longitude;
    	$newAgencyOffice->status=1;
    	$newAgencyOffice->save();
   	}

    public function editOffice($request ,$id)
    {
    	
      $editAgencyOffice =AgencyOffice::find($id);
     
      $editAgencyOffice->telephone=$request->telephone;
      $editAgencyOffice->email=$request->email;
      $editAgencyOffice->fb_link=$request->fb_link;
      $editAgencyOffice->google_link=$request->google_link;
      $editAgencyOffice->city_id=$request->city_id;
      $editAgencyOffice->mobile_no=$request->mobile_no;
      $editAgencyOffice->uan_number=$request->uan_number;
      $editAgencyOffice->address=$request->address;
      $editAgencyOffice->lat=$request->latitude;
      $editAgencyOffice->lng=$request->longitude;
      $editAgencyOffice->update();
      return $editAgencyOffice;
    }
   	
}
