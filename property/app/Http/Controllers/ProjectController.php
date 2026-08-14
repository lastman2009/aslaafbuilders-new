<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input;
use App\City;
use App\Town;
use App\Phase;
use App\Block;
use App\Property;
use App\PropertyType;
use App\CharacterType;
use App\UserCharacterDetail;
use File;
use Response;
use App\Client;
use Cache; 
use App\User;
use DB;
use Auth;
use \Crypt;
use App\SaveProperty;
use App\MessageCenter;
use App\Scheme;
use App\Http\Requests\AddProjectPostValidation;
use App\Location;
use App\UserPropertyView;
use App\PropertyView;
use App\Statistic;
use App\PaymentPlan;
use App\FloorPlan;
use App\Developer;

class ProjectController extends Controller
{
	const ACTIVE = 1;
	const PENDING = 0;
	const INACTIVE = 2;
	const TRASH = 3;

     public function listPendingProject()
    {
    	// dd(Auth::id());
      $properties =Property::where('status' ,self::PENDING)->where('purpose',4)->where('user_id',Auth::id())->paginate(10);
      // dd($properties);
      return view('dashboard.project.projectPendingForUser',compact('properties'));
    }
    public function userProjectListing()
    {
      $properties =Property::where('user_id',Auth::id())->whereIn('status' ,[self::ACTIVE,self::INACTIVE])->where('purpose',4)->orderBy('created_at','DESC')->paginate(10);
      return view('dashboard.project.projectListing',compact('properties'));
    }
    public function editProject(Request $request ,$id)
    {
              
      $id=Crypt::decrypt($id);
      $project =Property::find($id);
      $cities =$this->getAllCities();
      $towns = Location::getTownListObject($project->city_id);

     $propertyTypes=PropertyType::where('status',1)->where('parent',0)->get();
     $data=array();
     foreach($propertyTypes as $propertyType)
     {
        $data[$propertyType->id] =PropertyType::where('status',1)->where('parent',$propertyType->id)->get();
     }
     $schemes =Scheme::where('property_id',$project->id)->get();
     $payments=PaymentPlan::where('property_id',$id)->get();
     $floors =FloorPlan::where('property_id',$id)->get();
     $developer=Developer::where('property_id',$id)->first();
      return view('dashboard.project.editProject',compact('project','propertyTypes','data','cities','towns','schemes','developer','floors','payments'));
    }

   public function updateProject(Request $request ,$id)
    {
    if(!empty($request->images))
          {
            foreach ($request->images as $image) 
            {
                if(filesize($image) > 1700000)
                { 
                   return back()->with('message', 'image file size is not acceptable');
                }  
            }         
          }
   
      // dd();
      $property = Property::find($id);
      $all=Town::where('id',$request->town_id)->with('city')->get();
      //dd($all);
      $city = $all[0]->city->name;
      $town = $all[0]->name;
      $ignorelist =['_token','user_id','files','approved_by_id','address','video','images','clientdata','youtube_link','electricity_backup', 'flooring' ,'scheme','photo'];
      $property->address = $request->address;
      foreach($request->all() as $key => $col)
      {
        if(!in_array($key, $ignorelist) && ! is_array($request->$key)){
          $property->$key = $request->$key;
        }    
      }
      if(!empty($request->video))
      {
        if(!empty($property->video)){
          File::delete("images/user_project_video/".$property->video);
        }
        $video = $request->video;
        $video_name = $this->upload_video_in_folder($video, 'user_project_video');
        $property->video =$video_name;
      }

      if(!empty($request->photo))
      {
        if(!empty($property->photo)){
          File::delete("images/user_property/".$property->photo);
        }
        $image = $this->upload_single_map($request->photo,'user_property');
        $property->photo =$image;
      }

      if(!empty($request->youtube_link))
      {    
        $string  = $request->youtube_link;
        $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
        $replace  = "youtube.com/embed/$1";    
        $url = preg_replace($search,$replace,$string);
        $property->youtube_link = $url;  
      }
      if(!empty($request->images))
      { 
        $array = $request->images;
        $images = $this->upload_multiple_image_and_resize_save_in_folder_property($array, 'user_property');
        if(!$images)
        {
        return back()->with('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
        }
        $img_string = implode(';', $images);
       if(!empty($property->gallery))
        {
          $property->gallery = $property->gallery.';'.$img_string;
        }
        else
        {
            $property->gallery = $img_string;
        }
      }
      if(!empty($request->electricity_backup))
      {
        $electricity_backup= implode(';', $request->electricity_backup);
        $property->electricity_backup = $electricity_backup;
      }
      if(!empty($request->flooring))
      {
        $Flooring = implode(';', $request->flooring);
        $property->flooring =$Flooring;
      }
      $property->url =Property::createPropertyURL($property->purpose, $city, $town, $request->title);
      $property->update();
      if(!empty($request->scheme)){

        foreach ($request->scheme as $key => $value) {
              $update_scheme =Scheme::find($key);
              foreach($value as $key =>$data)
              {
                  $update_scheme->$key =$data;
              }
              $update_scheme->update();
        }
      }

      if(!empty($request->scheme_new['title']) && !empty($request->scheme_new['area']) && !empty($request->scheme_new['area_type']) && !empty($request->scheme_new['min_price']) && !empty($request->scheme_new['max_price']))
      {
        // $request->scheme_new['title']
        $scheme =new Scheme;
        $scheme->property_type_name =$request->scheme_new['property_type_name'];
        $scheme->title =$request->scheme_new['title'];
        $scheme->area =$request->scheme_new['area'];
        $scheme->area_type =$request->scheme_new['area_type'];
        $scheme->bed =$request->scheme_new['bed'];
        $scheme->bath =$request->scheme_new['bath'];
        $scheme->no_of_floor =$request->scheme_new['no_of_floor'];
        $scheme->min_price =$request->scheme_new['min_price'];
        $scheme->max_price =$request->scheme_new['max_price'];
        $scheme->payment_method =$request->scheme_new['payment_method'];
        $scheme->property_id =$property->id;
        $scheme->save();
      } 
      if(!empty($request->floor_old['id'][0]))
      {
        $floor = new FloorPlan;
        $floor->update_all_old($request->floor_old);
      }
      if(!empty($request->payment_old['id'][0]))
      {
        $payment_old = new PaymentPlan;
        $payment_old->update_all_old($request->payment_old);
      }
      if(!empty($request->payment['title'][0])){
          $count_payment_plan =count($request->payment['title']);
          $paymentPlan = new PaymentPlan();
          $paymentPlan->PaymentPlans($request->payment,$count_payment_plan ,$property->id);
         }
      if(!empty($request->floor['title'][0])){
      $count_floor_plan =count($request->floor['title']);
      $floorPlan = new FloorPlan();
      $floorPlan->FloorPlans($request->floor,$count_floor_plan ,$property->id);
      }

      if(!empty($request->development)){
          $developer =Developer::where('property_id', $property->id)->first();
          if(empty($developer))
          {
            $developer = new Developer();
            $developer->addDeveloper($request->development,$property->id);
          }
          else
          {
              $developer = $developer->updateDeveloper($request->development); 
          }
         }
      return back()->with('success', 'Project is updated successfully');
    }
    
    public function delete_floor(Request $request)
    { 
      // dd()
        $floor_plan =FloorPlan::find($request->id);
        $floor_plan->delete();
        return Response::json(['status' => 'delete']);

    }
     public function delete_payment_plan(Request $request)
    { 
      // dd()
        $payment_plan =PaymentPlan::find($request->id);
        $payment_plan->delete();
        return Response::json(['status' => 'delete']);

    }
    public function allPendingProject()
      {
        $properties = Property::where('purpose', 4)->where('status',self::PENDING )->orderBy('created_at','DESC')->paginate(10);
        // dd($properties);
        return view('dashboard.project.allPendingProject',compact('properties'));
      }

      public function allActiveInActiveProject()
      {
        $properties = Property::where('status',self::ACTIVE)->where('purpose', 4)->orderBy('created_at','DESC')->paginate(10);
        return view('dashboard.project.allActiveInActiveProject',compact('properties'));
      }
      public function allTrashProject()
      {
        $properties = Property::where('status',self::TRASH)->where('purpose', 4)->orderBy('created_at','DESC')->paginate(10);
        return view('dashboard.project.allTrashProject',compact('properties'));
      }
      
       public function addFrequentPropertyAPI(Request $request)
  {
    // return Response::json($request->all()); 
    if(!empty($request->identifier)) 
    {
        if(!empty($request->images))
        {
          foreach ($request->images as $image) 
          {
              if(filesize($image) > 716801)
              { 
                  return redirect()->back()->with('message', 'image file size is not acceptable');
              }  
          }  
        }
        $title = $this->removeProceedingHash($request->title);
        $ignorelist =['_token','files','approved_by_id','address','images', 'flooring' ,'identifier'];
        $columnNames=$this->getColumnNames();
        $property = new Property;
        $property_address="";
        $all=Block::where('id',$request->block_id)->with('phase.town.city')->get();
        $property_no=$request->property_no;
        $city =$all[0]->phase->town->city->name;
        $town =$all[0]->phase->town->name;
        $phase =$all[0]->phase->name;
        $block =$all[0]->name;
        if(!empty(($property_no)))
          $property_address =$property_no.', '.$block.', '.$phase.', '.$town.', '.$city;
        else
          $property_address =$block.', '.$phase.', '.$town.', '.$city;
        $property->address = $property_address;
        $property->client_id =$request->user_id;
        $property->user_id = $request->user_id;
        foreach($request->all() as $key => $col)
        {
          if(!in_array($key, $ignorelist) && ! is_array($request->$key))
          {
            $property->$key = $request->$key;
          }    
        }
        $role =new User;
        $roleName =$role->getRoleApi($request->user_id);
        if($roleName == "admin")
        {
           $property->status =self::ACTIVE;
        }
        if(!empty($request->images))
        { 
            $array = $request->images;
          $images = $this->upload_multiple_image_and_resize_save_in_folder_property($array, 'user_property');
            if(!$images)
            {
              return back()->with('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            }
            $img_string = implode(';', $images);
            $property->gallery =$img_string;
        }
          $property->frequent_add = 1;
          $property->save();
         if($roleName == "admin")
        {
            $this->createIndexes($property->id);
            return Response::json('publishProject'); 
           // return redirect()->back()->with('status', 'Request generated for publishing Project');
        }
            return Response::json('Request generated for publishing Project'); 

    }
    return Response::json('sorry wrong'); 
      // return redirect()->back()->with('message', 'Empty Request for data');
  }
  public function projectDisplayPage($city ,$town,$title ,$id)
    {
        if(Auth::check())
        {

            $user_id =Auth::id();
            $property_id=$id;
            $user_property_view =UserPropertyView::where('property_id',$property_id)->where('user_id',$user_id)->first();
            if(empty($user_property_view))
            {
                $user_property_views = new UserPropertyView;
                $user_property_views->user_id = $user_id;
                $user_property_views->property_id = $property_id;
                $user_property_views->save();
                $user_property_view=$user_property_views;
            }

        }

      // $purpose=Property::getPurposeId($type);
      $current_url = Property::createProjectURL($city, $town, $title);
      // dd($current_url);
      $property=Property::find($id);
      // dd($property);
      if($property != null){
    //   $title_match=strtolower(implode('-',explode(' ',$property->title)));
      //////GEt relavent DAta for Current PRoperty ////////////
      // $relavent_properties =$this->getRelevantProperties($property);
        // $title_match=str_slug($property->title);
      $owner_id = $property->user_id;
      $property_views = PropertyView::where("id", $id)->whereDate("created_at", date("Y-m-d"))->first();
      if(!empty($property_views)){
        $property_views->view_count += 1;
        $property_views->update();
      }else{
        $property_view = new PropertyView;
        $property_view->user_id=$owner_id;
        $property_view->property_id=$id;
        $property_view->view_count=1;
        $property_view->save();
      }
      if($property != null)
      {
        //   if($title_match == $title)
         if($current_url == $property->url)
          {       
            $data =array();
            if($property->purpose != 4)
            {
                $user =User::find($property->user_id);
                if($user->image != null)
                {
                  foreach(json_decode($user->image) as $image)
                  {
                      $data['image'] =$image;
                  }
                }
                else
                {
                  $data['image'] ="";
                }
                $data['name'] =$user->first_name.' '.$user->last_name;
                if($user->mobile != "")
                {
                $data['mobile_no'] = $user->mobile;
                }
                else
                {
                   $data['mobile_no'] = $user->telephone;
                }
            }
            else
            {
                $user =User::find($property->user_id);
                  if($user->image != null)
                  {
                    foreach(json_decode($user->image) as $image)
                    {
                        $data['image'] =$image;
                    }
                  }
                  else
                  {
                    $data['image'] ="";
                  }         
                  $data['name'] =$user->first_name.' '.$user->last_name;
                  if($user->mobile != "")
                  {
                    $data['mobile_no'] = $user->mobile;
                  }
                  else
                  {
                     $data['mobile_no'] = $user->telephone;
                  }
                  $data['scheme'] =Scheme::where('property_id',$id)->get();
                  $data['payment_plan'] =PaymentPlan::where('property_id',$id)->get();
                  $data['floor_plan'] =FloorPlan::where('property_id',$id)->get();
            }
          }
          else
          {
             return abort(404);
          }
            $property->property_view_count+=1;
            $property->update();
            
            if($property->purpose == 1)
          {
              $porperty_min_proce =$property->price - 500000;
              $porperty_max_proce =$property->price + 500000;
              $properties=Property::where('town_id',$property->town_id)->whereBetween('price', array($porperty_min_proce, $porperty_max_proce))->where('purpose' ,1)->limit(4)->get ();
          }
          elseif($property->purpose == 2)
          {
              $porperty_min_proce =$property->price - 10000;
              $porperty_max_proce =$property->price + 10000;
              $properties=Property::where('town_id',$property->town_id)->whereBetween('price', array($porperty_min_proce, $porperty_max_proce))->where('purpose' ,2)->limit(4)->get ();

          }
          else{
              $porperty_min_proce =$property->price - 100000;
              $porperty_max_proce =$property->price + 100000;
              $properties=Property::where('town_id',$property->town_id)->whereBetween('price', array($porperty_min_proce, $porperty_max_proce))->where('purpose' ,3)->limit(4)->get ();

          }
          if($property->property_type_id == 25 | $property->property_type_id == 26 | $property->property_type_id == 27 | $property->property_type_id == 28 | $property->property_type_id == 29 | $property->property_type_id == 30 | $property->property_type_id == 31)
          {
           
            $properties=Property::where('town_id',$property->town_id)->whereBetween('price', array($porperty_min_proce, $porperty_max_proce))->where('status',1)->whereIn('property_type_id', [25,26,27,28,29,30,31])->limit(4)->get();
          }
          if($property->purpose !=4){
          $map_image=Phase::where('id',$property->phase_id)->first()->map_name;}
          else{$map_image="";}       
            return view('frontwebsite.project.project-detail',compact('property','data','properties','map_image'));
          }
           return abort(404);
         }
           return abort(404);
    }

    public function addproject(Request $request)
    {      
      // dd($request->all());  
       if(!empty($request->all()))
      {
          if(!empty($request->images))
          {
            foreach ($request->images as $image) 
            {
                if(filesize($image) > 1700000)
                { 
                    return redirect('dashboard/project/add')->with('message', 'image file size is not acceptable');
                }  
            }  
          }
          $all=Town::where('id',$request->town_id)->with('city')->get();
          //dd($all);
          $city = $all[0]->city->name;
          $town = $all[0]->name;
          $property = new Property;
          $ignorelist =['_token','user_id','files','approved_by_id','address','video','images','clientdata','youtube_link','electricity_backup', 'flooring' ,'scheme','photo'];
          $columnNames=$this->getColumnNames();
          $property->address = $request->address;
          $property->purpose=4;
          $property->url =Property::createProjectUrl($city, $town, $request->title);
          $property->user_id = Auth::id();
          foreach($request->all() as $key => $col)
          {
            if(!in_array($key, $ignorelist) && ! is_array($request->$key)){
              $property->$key = $request->$key;
            }    
          }
          $role =new User;
          $roleName =$role->getRole(Auth::id());
          if($roleName == "admin")
          {
             $property->status =self::ACTIVE;
             $propertyobject = new Statistic();
            $propertyobject->updateStats('total_properties');
          }
          if(!empty($request->video))
          {
            $video = $request->video;
            $video_name = $this->upload_video_in_folder($video, 'user_project_video');
            $property->video =$video_name;
          }
          if(!empty($request->photo))
          {
            $image = $this->upload_single_map($request->photo,'user_property');
            $property->photo =$image;
          }
          if(!empty($request->youtube_link))
          {    
            $string  = $request->youtube_link;
            $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
            $replace  = "youtube.com/embed/$1";    
            $url = preg_replace($search,$replace,$string);
            $property->youtube_link = $url;  
          }
          if(!empty($request->images))
          { 
            $array = $request->images;
            $images = $this->upload_multiple_image_and_resize_save_in_folder_property($array, 'user_property');
            if(!$images){
            return back()->with('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
           }
            $img_string = implode(';', $images);
            $property->gallery =$img_string;
          }
          if(!empty($request->electricity_backup))
          {
            $electricity_backup= implode(';', $request->electricity_backup);
            $property->electricity_backup = $electricity_backup;
          }
          if(!empty($request->flooring))
          {
            $Flooring = implode(';', $request->flooring);
            $property->flooring =$Flooring;
          }
          $property->save();
          if(!empty($request->scheme))
          {
            $count =count($request->scheme['property_type_name']);
             for($i=0; $i<= $count ; $i++)
            {
              if(!empty($request->scheme['property_type_name'][$i]) && !empty($request->scheme['title'][$i]) && !empty($request->scheme['area'][$i]) && !empty($request->scheme['area_type'][$i]) && !empty($request->scheme['min_price'][$i]) && !empty($request->scheme['max_price'][$i]))
              {
                $scheme =new Scheme;
                $scheme->property_type_name =$request->scheme['property_type_name'][$i];
                $scheme->title =$request->scheme['title'][$i];
                $scheme->area =$request->scheme['area'][$i];
                $scheme->area_type =$request->scheme['area_type'][$i];
                $scheme->bed =$request->scheme['bed'][$i];
                $scheme->bath =$request->scheme['bath'][$i];
                $scheme->no_of_floor =$request->scheme['no_of_floor'][$i];
                $scheme->min_price =$request->scheme['min_price'][$i];
                $scheme->max_price =$request->scheme['max_price'][$i];
                $scheme->payment_method =$request->scheme['payment_method'][$i];
                $scheme->property_id =$property->id;
                $scheme->save();
              } 
            }
          } 
         if(!empty($request->payment['title'][0])){
          $count_payment_plan =count($request->payment['title']);
          $paymentPlan = new PaymentPlan();
          $paymentPlan->PaymentPlans($request->payment,$count_payment_plan ,$property->id);

         }
          if(!empty($request->floor['title'][0])){
          $count_floor_plan =count($request->floor['title']);
          $floorPlan = new FloorPlan();
          $floorPlan->FloorPlans($request->floor,$count_floor_plan ,$property->id);

         }
           if(!empty($request->development)){
          $developer = new Developer();
          $developer->addDeveloper($request->development,$property->id);
         }
        return redirect('dashboard/project/add')->with('status', 'Request generated for publishing Project');
      }
      return redirect('dashboard/project/add')->with('message', 'Request for empty data , Please enter again');
    }


     public function getColumnNames()
    {
    
      $minutes=60*720;
      if(Cache::has('property'))
      {
        return $data=Cache::pull('property');
      }
      else
      {
        return  Cache::remember('property', $minutes, function()
          {
            return DB::getSchemaBuilder()->getColumnListing('properties');             
           });        
      }  
    }

}
