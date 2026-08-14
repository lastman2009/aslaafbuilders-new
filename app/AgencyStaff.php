<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use \Crypt;
use File;
class AgencyStaff extends Model
{
    public function saveData($request ,$id)
    {
       
    	$width=300;
        $height=300;
    	$newAgencySaff =new AgencyStaff;
    	$newAgencySaff->agency_website_id=$id;
    	$newAgencySaff->name=$request->name;
    	$newAgencySaff->designation=$request->designation;
    	$newAgencySaff->year_of_service=$request->year_of_service;
    	$newAgencySaff->contact_number=$request->contact_number;
    	$newAgencySaff->email=$request->email;
    	$newAgencySaff->site_profile_url=$request->site_profile_url;
    	$newAgencySaff->fb_link=$request->fb_link;
    	$newAgencySaff->google_plus=$request->google_plus;
    	$newAgencySaff->status=1;
	 	if(isset($request->images) && !empty($request->images))
        {
            $array = $request->images;
            $image= $this->upload_single_image_and_resize_save_in_folder($array, 'staff',$width,$height);
            $newAgencySaff->image =$image;
    	}
    	 else
        {
             $newAgencySaff->image="1503903321.user-avatar.jpg";
        }
    	$newAgencySaff->save();
    }

    public function editStaff($request ,$id)
    {
        $agency_edit_staff =AgencyStaff::find($id);   
        $agency_edit_staff->name=$request->name;
        $agency_edit_staff->designation=$request->designation;
        $agency_edit_staff->year_of_service=$request->year_of_service;
        $agency_edit_staff->contact_number=$request->contact_number;
        $agency_edit_staff->email=$request->email;
        $agency_edit_staff->site_profile_url=$request->site_profile_url;
        $agency_edit_staff->fb_link=$request->fb_link;
        $agency_edit_staff->google_plus=$request->google_plus;
        if(isset($request->images) && !empty($request->images))
        {
            if($agency_edit_staff->image != null)
            {                 
                 File::delete("images/staff/" .$agency_edit_staff->image);
                 File::delete("images/staff/thumb_" .$agency_edit_staff->image);

            }
            $width=300;
            $height=300;
            $array = $request->images;
            $image= $this->upload_single_image_and_resize_save_in_folder($array, 'staff',$width,$height);
            $agency_edit_staff->image =$image;
        }
        $agency_edit_staff->update();
        return $agency_edit_staff;

    }

      public function upload_single_image_and_resize_save_in_folder($img,$folderName,$width,$height)
    {
        $images ="";
        
            $pic_name = $img->getClientOriginalName();
            $new_name = time() . '.' .$pic_name;
            $thumb_image=Image::make($img)->fit($width, $height);
            $img->move(base_path() .  $this->getPublicPath().'/images//'.$folderName, $new_name);
            $thumb_image->save(base_path() .  $this->getPublicPath().'/images//'.$folderName.'/thumb_'.$new_name);
            $images=$new_name;
        
        return $images;
    }
    public function isLive(){
        return $_SERVER['SERVER_NAME'] == "127.0.0.1" ? false : true;
    }
    public function getPublicPath(){
        return $this->isLive()? "" : "/public";
    }


}
