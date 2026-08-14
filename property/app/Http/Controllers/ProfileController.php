<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CharacterType;
use App\UserCharacterType;
use App\UserCharacterDetail;
use App\Interest;
use File;
use App\UserInterest;
use App\UserPortfolio;
use App\UserProduct;
use App\AgencyWebsite;
use App\City;
use App\Property;
use App\ProfileView;
use Response;
use App\Http\Requests\ProfileSettingPostValidation;
use App\Statistic;


class ProfileController extends Controller
{
	private $upload = 'image/logo';
    private $uploadprofile ="image/profile";
    protected $vendor = ['name','telephone','location','website' ,'description' ,'log'];

    public function viewProfile()
    {
      $fillable = ["first_name", "last_name", "email", "telephone", "mobile", "address", "city", "cnic", "facebook_link", "google_link", "twitter_link", "image"];
      $selected =array();
      foreach(UserInterest::where('user_id', Auth::id())->get() as $select)
      {
          $selected[$select->interest_id] =$select->interest_id;
      }

      $interests =Interest::where('status',1)->get();
      $characterTypes =CharacterType::where('status',1)->get();
      $userdata=Auth::user()->with('UserCharacterType')->where('id',Auth::id())->get();
      $UserCharacterType=UserCharacterType::where('user_id',Auth::id())->where('status',1)->get();


      $checked =array();
      $checkedName =array();
      $selectedNames= array();
      $portfolio =array();
        foreach($UserCharacterType as $user)
        {
            $name=$this->getName($user->character_type_id);
            $selectedNames[] =$name;
            $checked[] = $user->character_type_id;
            $checkedName[$name][] =UserCharacterDetail::where('user_id',Auth::id())->where('user_character_type_id',$user->id)->first();

        }

        if(empty($UserCharacterType[0]) == false )
        {

        foreach($UserCharacterType as $user)
        {
            $name=$this->getName($user->character_type_id);
            if($name != "agent")
            {
              $portfolio[$name][] =UserPortfolio::where('user_id',Auth::id())->where('character_type_id',$user->character_type_id)->get();
            }

        }
        // dd(isset($portfolio['vendor'], $portfolio));
        if(isset($portfolio['vendor'], $portfolio) )
        {
            $vendorcheck =1;
            foreach($portfolio['vendor'][0] as $vendor)
            {
              $vendorcheck =2;
            }
        }
         if(isset($portfolio['architecture'], $portfolio))
         {

            $architecturecheck =1;


             foreach($portfolio['architecture'][0] as $architecture)
            {
                $architecturecheck=2;
            }
         }
         $allProducts =UserProduct::where('user_id',Auth::id())->where('status',1)->get();

      }

        $percent_count = 0;
        foreach($fillable as $value){
            if(!empty($userdata[0]->$value)){
                $percent_count++;
            }
        }
        $profile_completion = round((($percent_count/count($fillable)) * 100));
        $property_count = Property::where('user_id',Auth::id())->where('status',1)->count();
        $all = null;
        $seletedInterests = null;
        $architecturecheck = null;
        $vendorcheck = null;
        $allProducts = null;
//        dd($property_count);
    	return view('dashboard.profile.index',compact('userdata' ,
            'characterTypes','checked' ,'all','checkedName','interests',
            'seletedInterests','selected','selectedNames','portfolio','architecturecheck','vendorcheck','allProducts', 'profile_completion', 'property_count'));

    }

     public function profileEdit()
    {

      $cities =City::all();
      $selected =array();
      foreach(UserInterest::where('user_id', Auth::id())->get() as $select)
      {
          $selected[$select->interest_id] =$select->interest_id;
      }

  	 	$interests =Interest::where('status',1)->get();
  		$characterTypes =CharacterType::where('status',1)->get();
  		$all=Auth::user()->with('UserCharacterType')->where('id',Auth::id())->get();

        $UserCharacterType=UserCharacterType::where('user_id',Auth::id())->where('status',1)->get();


        $checked =array();
        $checkedName =array();
        foreach($UserCharacterType as $user)
        {
            // dd($UserCharacterType);
            $name=$this->getName($user->character_type_id);
            $checked[] = $user->character_type_id;
            $data=UserCharacterDetail::where('user_id',Auth::id())->where('user_character_type_id',$user->id)->first();
              if($data != null)
              {
              $checkedName[$name][] =$data;

              }
              else
              {
                $data =new UserCharacterDetail;
                $data->user_id= Auth::id();
                $data->user_character_type_id =$user->id;
                $data->save();
                $checkedName[$name][] =$data;

              }
        }
        $website_status="";
        $websiteCheck = AgencyWebsite::where('user_id',Auth::id())->where('status' ,1)->first();
        if($websiteCheck != null)
        {
          $websiteCheck = "checked";
        }
    // dd($checkedName);
        // dd($cities);

    	return view('dashboard.editProfile',compact('all' ,'characterTypes','checked' ,'all','checkedName','interests','seletedInterests','selected','websiteCheck','cities'));
    }

    protected function getName($id)
    {
        return CharacterType::find($id)->name;
    }
    public function tesing_data(Request $request)    /* change function name */
    {
        //   dd($request->all());
        if(!empty($request->edit_profile_email))
        {
          $check_email =User::where('email',$request->edit_profile_email)->first();
        }
        if(!empty($request->edit_profile_phone))
        {
          $check_phone =User::where('telephone',$request->edit_profile_phone)->first();
        }
        if(empty($check_phone) )
        {

          if(empty($check_email)){


                $profileImage ="";
                $user=User::find(Auth::id());
                $user->first_name=$request->edit_profile_first_name;
                $user->last_name=$request->edit_profile_last_name;
                if(!empty($request->edit_profile_email)){
                $user->email=$request->edit_profile_email;
                }
                if(!empty($request->edit_profile_phone)){
                $user->telephone =$request->edit_profile_phone;
                }
                $user->address =$request->edit_profile_address;

                $user->mobile =$request->edit_profile_mobile;
                $user->city =$request->edit_profile_city;
                $user->cnic =$request->edit_profile_cnic;
                $user->facebook_link = $request->edit_profile_facebook;
                $user->google_link = $request->edit_profile_gplus;
                $user->twitter_link =$request->edit_profile_twitter;
                if(isset($request->edit_profile_image))
                {
                    if($user->image !="")
                    {
                        File::delete("image/profile/" .json_decode($user->image)[0]);
                    }
                    $profileImage =$this->uploadMedia($request->edit_profile_image);
                    $user->image =$profileImage;
                }

                $user->update();
                //delete selected interest ////
                UserInterest::where('user_id' , Auth::id())->delete();
                if($request->interest != null)
                {

                foreach($request->interest as $key => $value)
                {
                    $interest =new UserInterest;
                    $interest->user_id =Auth::id();
                    $interest->interest_id = $key;
                    $interest->save();
                }
                }
                foreach($request->character as $key => $characters)
                {
                    $listOfFiles ="";
                        $userCharacterDetail =UserCharacterDetail::where('user_character_type_id',$characters['id'])->where('user_id',Auth::id())->first();

                        if($characters['id'] !=  "")
                        {
                                // dd($characters);
                            if($userCharacterDetail == null)
                            {
                                if(isset($characters['logo']))
                                {
                                 $listOfFiles = $this->uploadMed($characters['logo']);
                                }

                                 $userCharacterDetail =new UserCharacterDetail;
                                 $userCharacterDetail->name =$characters['name'];
                                 $userCharacterDetail->telephone =$characters['telephone'];
                                 $userCharacterDetail->user_id =Auth::id();
                                 $userCharacterDetail->user_character_type_id =$characters['id'];
                                 $userCharacterDetail->location =$characters['location'];
                                 $userCharacterDetail->website =$characters['website'];
                                 $userCharacterDetail->description =$characters['description'];
                                 $userCharacterDetail->logo =$listOfFiles;
                                 if(!empty($characters['city_id'])){
                                  $userCharacterDetail->city_id =$characters['city_id'];
                                 }
                                 $userCharacterDetail->save();
                                 if($key == "agent"){
                                  $propertyobject = new Statistic();
                                  $propertyobject->updateStats('total_estate_agent');
                                 }
                            }
                            else
                            {
                                if(isset($characters['logo']))
                                {
                                    if($userCharacterDetail->logo != "")
                                    {

                                      File::delete("image/logo/" .json_decode($userCharacterDetail->logo)[0]);
                                    }
                                    $listOfFiles = $this->uploadMed($characters['logo']);
                                    $userCharacterDetail->logo =$listOfFiles;
                                }

                                 $userCharacterDetail->name =$characters['name'];
                                 $userCharacterDetail->telephone =$characters['telephone'];
                                 $userCharacterDetail->location =$characters['location'];
                                 $userCharacterDetail->website =$characters['website'];
                                 if(!empty($characters['city_id'])){
                                  $userCharacterDetail->city_id =$characters['city_id'];
                                 }
                                 $userCharacterDetail->description =$characters['description'];

                                 $userCharacterDetail->update();
                            }

                        }
                        else
                        {

                        }

                }
                // dd($request->all());

            return back();
          }
           return redirect('/dashboard/profile/edit')->with('status', 'Email already exist');
      }
      return redirect('/dashboard/profile/edit')->with('status', 'Phone Already Exist');
    }

    public function portfolioDisplay($id)
    {
    	$data=UserPortfolio::find($id);
    	return view('dashboard.modals.portfolio',compact('data'));
    }
    private function uploadMed($filename)
    {

      $temp = $filename->getClientOriginalName();
      $name=$this->renameFile($temp);
      $listOfFiles[] = $name;
      $filename->move($this->upload, $name);
        return json_encode($listOfFiles);
    }
    private function uploadMedia($filename)
    {
      $temp = $filename->getClientOriginalName();
      $name=$this->renameFile($temp);
      $profileImage[] = $name;
      $filename->move($this->uploadprofile, $name);
        return json_encode($profileImage);
    }
    public function renameFile($fileName)
    {
        $ext = substr(strtolower(strrchr($fileName, '.')), 1);
        $newFileName =$this->generateRandomCode($fileName) . '.' . $ext;
        return $newFileName;
    }
    public function generateRandomCode($fileName)
    {
        return $this->clean(str_shuffle($fileName) . date("Y-m-d-h-i-sa"));
    }

    public function clean($string)
    {
      $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.

       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }


    public function viewProileByAll($id , $name, Request $request)
    {

      // $character = $request->segment(2);
      $fillable = ["first_name", "last_name", "email", "telephone", "mobile", "address", "city", "cnic", "facebook_link", "google_link", "twitter_link", "image"];


      // dd($id);

      $profileView = ProfileView::where("user_id", $id)->whereDate("created_at", date("Y-m-d"))->first();
      // dd($property_views);
      if(!empty($profileView)){
        $profileView->view_count += 1;
        $profileView->update();

      }else{
        $profileView = new ProfileView;
        $profileView->user_id=$id;
        $profileView->view_count=1;
        $profileView->save();
      }

      $selected =array();
      foreach(UserInterest::where('user_id', $id)->get() as $select)
      {
          $selected[$select->interest_id] =$select->interest_id;
      }

      $interests =Interest::where('status',1)->get();
      $characterTypes =CharacterType::where('status',1)->get();
      $userdata=User::where('id', $id)->with('UserCharacterType')->where('id', $id)->get();
      $UserCharacterType=UserCharacterType::where('user_id', $id)->where('status',1)->get();


      $checked =array();
      $checkedName =array();
      $selectedNames= array();
      $portfolio =array();
        foreach($UserCharacterType as $user)
        {
            $name=$this->getName($user->character_type_id);
            $selectedNames[] =$name;
            $checked[] = $user->character_type_id;
            $checkedName[$name][] =UserCharacterDetail::where('user_id', $id)->where('user_character_type_id',$user->id)->first();

        }

      if(empty($UserCharacterType[0]) == false )
      {

        foreach($UserCharacterType as $user)
        {
            $name=$this->getName($user->character_type_id);
            if($name != "agent")
            {
              $portfolio[$name][] =UserPortfolio::where('user_id', $id)->where('character_type_id',$user->character_type_id)->get();
            }

        }
        // dd(isset($portfolio['vendor'], $portfolio));
        if(isset($portfolio['vendor'], $portfolio) )
        {
            $vendorcheck =1;
            foreach($portfolio['vendor'][0] as $vendor)
            {
              $vendorcheck =2;
            }
        }
         if(isset($portfolio['architecture'], $portfolio))
         {
            $architecturecheck =1;
             foreach($portfolio['architecture'][0] as $architecture)
            {
                $architecturecheck=2;
            }
         }
         $allProducts =UserProduct::where('user_id', $id)->where('status',1)->get();

      }


      $percent_count = 0;
        foreach($fillable as $value){
            if(!empty($userdata[0]->$value)){
                $percent_count++;
            }
        }
        $profile_completion = round((($percent_count/count($fillable)) * 100));
        $property_count = Property::where('user_id',$id)->where('status',1)->count();
      // dd($checkedName)
        $all = null;
        $seletedInterests = null;
        $architecturecheck = null;
        $vendorcheck = null;
        $allProducts = null;
      return view('dashboard.profile.index',compact('userdata' ,'characterTypes','checked' ,'all','checkedName','interests','seletedInterests','selected','selectedNames','portfolio','architecturecheck','vendorcheck','allProducts','profile_completion','property_count'));

    }

    public function checkEmailExist($email)
    {
        $check_email =User::where('email',$email)->first();

        if(empty($check_email)){
          return Response::json(['success' => "1"]);
        }
          return Response::json(['success' => "2"]);
    }

    public function checkPhoneExist($phone)
    {

        $check_email =User::where('telephone',$phone)->first();

        if(empty($check_email)){
          return Response::json(['success' => "1"]);
        }
          return Response::json(['success' => "2"]);
    }
}


