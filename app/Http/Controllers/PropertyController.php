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
use App\SearchTracking;
use Session;
use App\PropertyView;
use App\CommercialCityIndex;
use App\CommercialCityTownIndex;
use App\HouseCityIndex;
use App\HouseCityTownIndex;
use App\PlotCityIndex;
use App\PlotCityTownIndex;
use App\Http\Requests\AddPropertyPostValidation;
use App\Http\Requests\AddProjectPostValidation;
use Intervention\Image\Facades\Image;
use App\ImageHelper;
use App\Statistic;
use App\Location;
use Illuminate\Support\Facades\Schema;
use App\UserPropertyView;
use App\Favorite;
use App\Map;
use App\PaymentPlan;
use App\FloorPlan;
use App\Meta;
use View;
use App\PHPMailer\PHPMailer;
use App\PHPMailer\SMTP;
use App\PHPMailer\Exception;
use App\Search_location;
use App\AgencyWebsite;

class PropertyController extends Controller
{
  
  const ACTIVE = 1;
  const PENDING = 0;
  const INACTIVE = 2;
  const TRASH = 3;
  
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

      $current_url = Property::createProjectURL($city, $town, $title);
      $property=Property::find($id);
      if($property != null){
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
        //  if($current_url == $property->url)
         if($current_url)
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
             
             return redirect('/page-not-found');
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


          
            // return view('frontwebsite.project.project-detail',compact('property','data','user_property_view','properties','map_image'));
            return view('frontwebsite.project.project-detail',compact('property','data','properties','map_image'));
          }
           return redirect('/page-not-found');
         }
           return redirect('/page-not-found');
    }
    
  public function test1($type ,$city ,$town,$title ,$id)
  {
        if($type =='project'){
            //echo $type;
            //die;
             return $this->projectDisplayPage($city ,$town,$title ,$id);
    
    }
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
    $purpose=Property::getPurposeId($type);
    $current_url = Property::createPropertyURL($purpose, $city, $town, $title);
    
    $property=Property::find($id);
    if($property != null && is_numeric($id)){
    $prop = Property::agencyinfo($property->user_id);
      // dd($property);
      
    // if($property != null){
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
       
     }
   }
   else
   {
     return redirect('/page-not-found');
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
            //return view('frontwebsite.property.property-detail-page',compact('property','data','user_property_view','properties','map_image','prop'));
    $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 5");
    $cities = $this->getAllCities();
   if($property->purpose !=4){
    $map_image=Phase::where('id',$property->phase_id)->first()->map_name;}
    else{$map_image="";}       
            //return view('frontwebsite.property.property-detail-page',compact('property','data','user_property_view','properties','map_image','prop'));
//   dd($map_image);
    return view('frontwebsite.property.detail-property',compact('locations','property','data','properties','map_image','prop'));
  }
  return redirect('/page-not-found');
}

return redirect('/page-not-found');
}

public function index()
{  

      //$cities =City::orderBy('name', 'asc')->get();
  $cities =City::all();
  $towns=Town::all();
  $phases=Phase::all();
  $blocks=Block::all();
  $clients =Client::where('user_id',Auth::id())->get();

  $propertyTypes=PropertyType::where('status',1)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',1)->where('parent',$propertyType->id)->get();
 }
 $user=User::find(Auth::id());
 return view('dashboard.property.addProperty',compact('propertyTypes','data','cities','towns','blocks','phases','clients','user'));
}

public function addpropertyhome()
{  
// dd('1');
      //$cities =City::orderBy('name', 'asc')->get();
  $cities =City::all();
  $towns=Town::all();
  $phases=Phase::all();
  $blocks=Block::all();
  $clients =Client::where('user_id',Auth::id())->get();

  $propertyTypes=PropertyType::where('status',1)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',1)->where('parent',$propertyType->id)->get();
 }
 $user=User::find(Auth::id());
 //dd($cities)
 return view('layouts.index',compact('propertyTypes','data','cities','towns','blocks','phases','clients','user'));
}
public function indexForHouseUploading()
{
  $cities = City::all();
  $towns = Town::all();
  $phases=Phase::all();
  $blocks=Block::all();
  $clients =Client::where('user_id',Auth::id())->get();

  $propertyTypes=PropertyType::where('status',1)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',1)->where('parent',$propertyType->id)->get();
 }
 $user=User::find(Auth::id());
 return view('dashboard.property.addPropertyforHouse',compact('propertyTypes','data','cities','towns','blocks','phases','clients','user'));
}
public function viewProject()
{
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
  $clients =Client::where('user_id',Auth::id())->get();

  $propertyTypes=PropertyType::where('status',1)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',1)->where('parent',$propertyType->id)->get();
 }
 return view('dashboard.property.addProject',compact('propertyTypes','data','cities','towns','blocks','phases','clients'));
}
public function destroy($id)
{
  $property=Property::find($id);
  $property->status=3;
  $property->update();
  return back();
}
public function editproperty($id)
{ 
  $id=Crypt::decrypt($id);
    //   $towns=Town::all();
    //   $phases=Phase::all();
    //   $blocks=Block::all();
    //  $towns=Town::where("city_id", $property->city_id)->get();
    //  $phases=Phase::where("town_id", $property->town_id)->get();
    //  $blocks=Block::where("phase_id", $property->phase_id)->get(); 
  $propertyTypes=PropertyType::where('status',1)->where('parent',0)->get();
  $property=Property::find($id);
  $cities =$this->getAllCities();
  $towns = Location::getTownListObject($property->city_id);
  $phases=Location::getPhaseListObject($property->town_id);
  $blocks=Location::getBlockListObject($property->phase_id);   
  $clients =Client::where('user_id',$property->user_id)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',1)->where('parent',$propertyType->id)->get();
 }
 $user_client ="";
 if(!empty($property->client_id))
 {
  $user_client =Client::where('id',$property->client_id)->where('user_id',$property->user_id)->first();
}
return view('dashboard.property.editpropertypage',compact('property','propertyTypes','data','cities','towns','blocks','phases','clients' ,'user_client'));
}

public function deleteimageforproperty($id ,$img_name)
{
 $portfolio = Property::find($id);
 $images = explode(';',$portfolio->gallery);
 foreach ($images as $key => $value) {
  if($value == $img_name){
    unset($images[$key]);
  }
}
if(count($images) == 1){
  $images = implode("",$images);
}else{
  $images = implode(';',$images);
}
$portfolio->gallery = $images;
$portfolio->update();
File::delete("images/property/user_property/original_" . $img_name);
File::delete("images/property/user_property/thumb_" . $img_name);
return Response::json(['success' => 'removed']);
}

  public function addproperty(Request $request)
    { 
      if(!empty($request->all()))
      {
        if(!empty($request->images))
        {
          foreach ($request->images as $image) 
          {
              if(filesize($image) > 1700000)
              { 
                  return redirect('dashboard/property/add')->with('message', 'image file size is not acceptable');
              }  
          }  
        }
        $title = $this->removeProceedingHash($request->title);
        $ignorelist =['_token','user_id','files','approved_by_id','address','video','images','clientdata','youtube_link','electricity_backup', 'flooring'];
        $columnNames=$this->getColumnNames();
        $property = new Property;
        $clientid ="";
         if($request->clientdata == "user")
        {
          $property->myself =Auth::id();
          $user=User::find(Auth::id());
          // dd($request->my['number']);
          $user->mobile=$request->my['number'];
         
          
          $my_name=$request->my['name'];
          $user_name = explode(' ', $my_name);

          $user->first_name = $user_name[0];
          if(isset($user_name[1])){
            $last_name = $user_name[1];
            if(isset($user_name[2])){
              for($i=2; $i<count($user_name); $i++){
                $last_name .= ' '.$user_name[$i];
              }
            }
            $user->last_name = $last_name;

          }
          $user->update();
        }
        else if($request->clientdata == "new")
        {
          $client=new Client();
          $client->name = $request->client['name'];
          $client->mobile_no = $request->client['mobile_no'];
          $client->address = $request->client['address'];
          $client->user_id= Auth::id();
          $client->status=1;
          $client->save();
          $clientid=$client->id;
        }
        else
        {
          $clientid = $request->clientdata;
        }
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
        $property->client_id =$clientid;
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
           if($property->purpose == 1)
           $property->status =self::ACTIVE;
       $propertyobject = new Statistic();
            $propertyobject->updateStats('total_properties');
        }
        if(!empty($request->video))
        {
          $video = $request->video;
          $video_name = $this->upload_video_in_folder($video, 'user_property_video');
          $property->video =$video_name;
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
        $property->url =Property::createPropertyURL($request->purpose, $city, $town, $request->title);
        $property->to_marla = $this->convertToMarla($request->area_type, $request->area);
        $property->isInhouse =1;
        $property->save();
        if(!empty(Auth::user()->email))
          {
            $this->AddPropertyEmail($property);
          }
        if(isset($request->city_id))
          {
            $city = new City;
            $city->updateCityCount($request->city_id);
            $town = new Town;
            $town->updateTownCount($request->town_id);
            $block = new Block;
            $block->updateBlockCount($request->block_id);
            $phase = new Phase;
            $phase->updateCountPhase($request->phase_id);
          }
         if($roleName == "admin")
        {
            $this->createIndexes($property->id);
        }
        
        
        return redirect('dashboard/property/add')->with('status', 'Request generated for publishing Property');
      }
      return redirect('dashboard/property/add')->with('message', 'Due to Large Image Your Data failed to enter, Upload small images');
    }
    
    
public function AddPropertyEmail($property)
{    

        // dd('1');  
  $view = View::make('email.addPropertyEmail',compact('property'));
  $contents = (string) $view;
  $contents = $view->render();

  $mail =new PHPMailer;
  try {
    $mail->isSMTP(); 
    $mail->CharSet = "utf-8"; 
    $mail->SMTPAuth = true;  
    $mail->SMTPSecure = "SSL"; 
    $mail->Host = "c57407.sgvps.net";
    $mail->Port = 587; 
    $mail->Username = "support@rightdeed.com";
    $mail->Password = "HG,zT=F0G705ki{6!h";
    $mail->setFrom("subscribe@rightdeed.com", "RightDeed");
    $mail->Subject = "Email Subscription";
    $mail->MsgHTML($contents);
    $mail->addAddress('atifmalik2009@gmail.com', "Rightdeed Mail Subscription");
    if(!$mail->send()) 
    {
     return Response::json(['success'=>2]);
   } 
   else 
   {
     return Response::json(['success'=>1]);
   }
 } catch (phpmailerException $e) {
  dd($e);

} catch (Exception $e) {
  dd($e);
}
return back(); 
}



public function addpropertyForHouse(Request $request)
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
          return redirect('dashboard/property/add')->with('message', 'image file size is not acceptable');
        }  
      }  
    }
    $title = $this->removeProceedingHash($request->title);
    $ignorelist =['_token','user_id','files','approved_by_id','address','video','images','clientdata','youtube_link','electricity_backup', 'flooring','near_transport'];
    $columnNames=$this->getColumnNames();
    $property = new Property;
    $clientid ="";
    if($request->clientdata == "user")
    {
      $property->myself =Auth::id();
      $user=User::find(Auth::id());
            // dd($request->my['number']);
      $user->mobile=$request->my['number'];


      $my_name=$request->my['name'];
      $user_name = explode(' ', $my_name);

      $user->first_name = $user_name[0];
      if(isset($user_name[1])){
        $last_name = $user_name[1];
        if(isset($user_name[2])){
          for($i=2; $i<count($user_name); $i++){
            $last_name .= ' '.$user_name[$i];
          }
        }
        $user->last_name = $last_name;

      }
      $user->update();
    }
    else if($request->clientdata == "new")
    {
      $client=new Client();
      $client->name = $request->client['name'];
      $client->mobile_no = $request->client['mobile_no'];
      $client->address = $request->client['address'];
      $client->user_id= Auth::id();
      $client->status=1;
      $client->save();
      $clientid=$client->id;
    }
    else
    {
      $clientid = $request->clientdata;
    }
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
    $property->client_id =$clientid;
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
     if($property->purpose == 1)
      $property->status =self::ACTIVE;
    $propertyobject = new Statistic();
    $propertyobject->updateStats('total_properties');
  }
  if(!empty($request->video))
  {
    $video = $request->video;
    $video_name = $this->upload_video_in_folder($video, 'user_property_video');
    $property->video =$video_name;
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
  $property->url =Property::createPropertyURL($request->purpose, $city, $town, $request->title);
  $property->to_marla = $this->convertToMarla($request->area_type, $request->area);

  $property->save();
  if(isset($request->city_id))
  {
    $city = new City;
    $city->updateCityCount($request->city_id);
    $town = new Town;
    $town->updateTownCount($request->town_id);
    $block = new Block;
    $block->updateBlockCount($request->block_id);
    $phase = new Phase;
    $phase->updateCountPhase($request->phase_id);
  }
  if($roleName == "admin")
  {
    $this->createIndexes($property->id);
  }
  return redirect('dashboard/property/add')->with('status', 'Request generated for publishing Property');
}
return redirect('dashboard/property/add')->with('message', 'Due to Large Image Your Data failed to enter, Upload small images');
}

    // public function addproject(Request $request)
    // { 
    //   dd($request->all());  
    //    if(!empty($request->all()))
    //   {
    //       if(!empty($request->images))
    //       {
    //         foreach ($request->images as $image) 
    //         {
    //             if(filesize($image) > 1700000)
    //             { 
    //                 return redirect('dashboard/project/add')->with('message', 'image file size is not acceptable');
    //             }  
    //         }  
    //       }
    //       $all=Town::where('id',$request->town_id)->with('city')->get();
    //       //dd($all);
    //       $city = $all[0]->city->name;
    //       $town = $all[0]->name;
    //       $property = new Property;
    //       $ignorelist =['_token','user_id','files','approved_by_id','address','video','images','clientdata','youtube_link','electricity_backup', 'flooring' ,'scheme','photo'];
    //       $columnNames=$this->getColumnNames();
    //       $property->address = $request->address;
    //       $property->purpose=4;
    //       $property->url =Property::createProjectUrl($city, $town, $request->title);
    //       $property->user_id = Auth::id();
    //       foreach($request->all() as $key => $col)
    //       {
    //         if(!in_array($key, $ignorelist) && ! is_array($request->$key)){
    //           $property->$key = $request->$key;
    //         }    
    //       }
    //       $role =new User;
    //       $roleName =$role->getRole(Auth::id());
    //       if($roleName == "admin")
    //       {
    //          $property->status =self::ACTIVE;
    //          $propertyobject = new Statistic();
    //         $propertyobject->updateStats('total_properties');
    //       }
    //       if(!empty($request->video))
    //       {
    //         $video = $request->video;
    //         $video_name = $this->upload_video_in_folder($video, 'user_project_video');
    //         $property->video =$video_name;
    //       }
    //       if(!empty($request->photo))
    //       {
    //         $image = $this->upload_single_map($request->photo,'user_property');
    //         $property->photo =$image;
    //       }
    //       if(!empty($request->youtube_link))
    //       {    
    //         $string  = $request->youtube_link;
    //         $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
    //         $replace  = "youtube.com/embed/$1";    
    //         $url = preg_replace($search,$replace,$string);
    //         $property->youtube_link = $url;  
    //       }
    //       if(!empty($request->images))
    //       { 
    //         $array = $request->images;
    //         $images = $this->upload_multiple_image_and_resize_save_in_folder_property($array, 'user_property');
    //         if(!$images){
    //         return back()->with('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
    //        }
    //         $img_string = implode(';', $images);
    //         $property->gallery =$img_string;
    //       }
    //       if(!empty($request->electricity_backup))
    //       {
    //         $electricity_backup= implode(';', $request->electricity_backup);
    //         $property->electricity_backup = $electricity_backup;
    //       }
    //       if(!empty($request->flooring))
    //       {
    //         $Flooring = implode(';', $request->flooring);
    //         $property->flooring =$Flooring;
    //       }
    //       $property->save();
    //       if(!empty($request->scheme))
    //       {
    //         $count =count($request->scheme['property_type_name']);
    //          for($i=0; $i<= $count ; $i++)
    //         {
    //           if(!empty($request->scheme['property_type_name'][$i]) && !empty($request->scheme['title'][$i]) && !empty($request->scheme['area'][$i]) && !empty($request->scheme['area_type'][$i]) && !empty($request->scheme['min_price'][$i]) && !empty($request->scheme['max_price'][$i]))
    //           {
    //             $scheme =new Scheme;
    //             $scheme->property_type_name =$request->scheme['property_type_name'][$i];
    //             $scheme->title =$request->scheme['title'][$i];
    //             $scheme->area =$request->scheme['area'][$i];
    //             $scheme->area_type =$request->scheme['area_type'][$i];
    //             $scheme->bed =$request->scheme['bed'][$i];
    //             $scheme->bath =$request->scheme['bath'][$i];
    //             $scheme->no_of_floor =$request->scheme['no_of_floor'][$i];
    //             $scheme->min_price =$request->scheme['min_price'][$i];
    //             $scheme->max_price =$request->scheme['max_price'][$i];
    //             $scheme->payment_method =$request->scheme['payment_method'][$i];
    //             $scheme->property_id =$property->id;
    //             $scheme->save();
    //           } 
    //         }
    //       } 
    //     return redirect('dashboard/project/add')->with('status', 'Request generated for publishing Project');
    //   }
    //   return redirect('dashboard/project/add')->with('message', 'Request for empty data , Please enter again');
    // }
public function propertyListingForAdminActive()
{
  $properties =Property::where('status' ,self::ACTIVE)->whereIn('purpose', [1, 2, 3])->orderBy('created_at','DESC')->paginate(10);
  return view('dashboard.property.propertyApproved',compact('properties'));
}
public function propertyListingForAdminPending()
{
  $properties =Property::where('status' ,self::PENDING)->whereIn('purpose', [1, 2, 3])->orderBy('created_at','DESC')->paginate(10);

  return view('dashboard.property.propertyUnApproved',compact('properties'));
}

public function propertyListingForAdminTrash()
{
  $properties =Property::where('status' ,self::TRASH)->whereIn('purpose', [1, 2, 3])->orderBy('created_at','DESC')->paginate(10);
  return view('dashboard.property.propertyTrash',compact('properties'));
}  

public function propertyPending()
{
  $properties =Property::where('status' ,self::PENDING)->where('user_id',Auth::id())->whereIn('purpose', [1, 2, 3])->orderBy('created_at','DESC')->paginate(10);
  return view('dashboard.property.propertyPendingForUser',compact('properties'));
}
public function propertyListing()
{
    //   dd(Auth::id())
 $properties =Property::where('user_id',Auth::id())->whereIn('status' ,[self::ACTIVE,self::INACTIVE])->whereIn('purpose', [1, 2, 3])->orderBy('created_at','DESC')->paginate(10);
    //  dd($properties);
 return view('dashboard.property.propertyListing',compact('properties'));
}

public function inHousePropertyListing()
{

  $properties = Property::where('isInhouse',1)
  ->orderBy('created_at','DESC')
  ->paginate(10);

  return view('dashboard.property.inHouse',compact('properties'));
}

public function searchUserProperties()
{
  return view('dashboard.property.searchUserProperties');
}

public function searchForUser(Request $request)
{     
  $agent_id =CharacterType::where('name','agent')->first()->id;
  $GLOBALS['agent_id']=$agent_id;
  $Property = User::query();
  if(Input::filled('id') || Input::filled('name') || Input::filled('email') || Input::filled('mobile'))
  { 
    if(Input::filled('id'))
    {

      $Property->where('id', Input::input('id'));
    }
    if(Input::filled('name'))
    {
      $Property->where('first_name', 'like', '%' . Input::input('name') .'%');
    }
    if(Input::filled('email'))
    {
      $Property->where('email', 'like', '%' . Input::input('email') .'%');
    }
    if(Input::filled('mobile'))
    {
      $Property->where('mobile', 'like', '%' . Input::input('mobile') .'%');
    }  

    $userAndUserCharacterTypes =$Property->with('UserCharacterType')->get();  
    $userDetails =array();
    $somedetails =array();
    foreach($userAndUserCharacterTypes as $user)
    {
      $userDetails[]=UserCharacterDetail::where('user_character_type_id',$user->UserCharacterType[0]->id)->where('user_id',$user->id)->first();     
    }
    $somedetails['1']=$userAndUserCharacterTypes->toArray();
    $somedetails['2']=$userDetails;
    return view('dashboard.property.searchUserProperties',compact('somedetails'));
  }

  if(Input::filled('agency'))
  {
    $lol=UserCharacterDetail::where('name', 'like', '%' . Input::input('agency') . '%')->get();
    if(count($lol) > 0)
    {
      $datas = $lol->load('UserCharacterType');
      $userAndUserCharacterTypes =array();
      $userDetails =array();
      $detail =array();
      $i=0;
      foreach($datas as $data)
      {  
        if($data->UserCharacterType->character_type_id == $agent_id)
        {
          $userAndUserCharacterTypes[]=User::where('id',$data->user_id)->with(['UserCharacterType' =>function($query) {
            global $agent_id;
            $query->where('character_type_id', $agent_id);
          }])->get(); 
          $userDetails[]=UserCharacterDetail::where('user_character_type_id',$userAndUserCharacterTypes[$i][0]->UserCharacterType[0]->id)->where('user_id',$data->user_id)->first();
          $i++;
        }
      }  
      $detail['1'] =$userAndUserCharacterTypes;
      $detail['2'] =$userDetails;

      return view('dashboard.property.searchUserProperties',compact('detail'));   
    }    
    return view('dashboard.property.searchUserProperties');   
  }
  return view('dashboard.property.searchUserProperties');   
}
public function allProperties($id)
{
  $properties = Property::where('user_id',$id)->whereIn('purpose', [1, 2, 3])->get();
  return view('dashboard.property.allproperties',compact('properties'));
}
public function changeStatusofproperty(Request $request ,$status ,$id)
{
  $property =Property::find($id);
  $property->status =$status;
  $property->update();

  return Response::json(['success' => 'updated']);
}

public function trashProperty($id)
{ 
  $property =Property::find($id);
  $property->status = self::TRASH;
  $property->update();

  return Response::json(['success' => "trashed"]);
}
    // some changes for new requirment to count property
    // public function propertyActiveOrUnactiveByAdmin($id)
    // {
    //   $property =Property::find($id);

    //     switch ($property->status) {
    //         case '0':
    //             $property->status=self::ACTIVE;
    //              $propertyobject = new Statistic();
    //         $propertyobject->updateStats('total_properties');
    //             break;
    //         case '1':
    //              $property->status=self::PENDING;
    //              $propertyobject =new Statistic();
    //         $propertyobject->decrementStats('total_properties');
    //             break;
    //     }
    //     $property->update();
    //      if($property->purpose == 1)
    //   {
    //     $this->createIndexes($id);   
    //   }

    // }
public function propertyActiveOrUnactiveByAdmin($id)
{
  $property =Property::find($id);

  switch ($property->status) {
    case '0':
    $property->status=self::ACTIVE;
    $userupdatecount =User::find($property->user_id);
    if($property->property_type_id == 25 || $property->property_type_id == 26 || $property->property_type_id == 27 || $property->property_type_id == 28 || $property->property_type_id == 29 || $property->property_type_id == 30 || $property->property_type_id == 31)
    {
     $userupdatecount->updateCount($property->property_type_id);     
   }
   $userupdatecount->updateCount($property->purpose);
   $propertyobject = new Statistic();
   $propertyobject->updateStats('total_properties');
   break;
   case '1':
   $property->status=self::PENDING;
   $propertyobject =new Statistic();
   $propertyobject->decrementStats('total_properties');
   break;
 }
 $property->update();
 if($property->purpose == 1)
 {
  $this->createIndexes($id);   
}

}
public function createIndexes($id){

  $property = Property::find($id);
  $type_id_info = $this->getTypeRow($property->property_type_id);
  $parent_type_id = $type_id_info->parent;
  $city_id = $property->city_id;
  $town = $property->town_id;
  $type = PropertyType::find($parent_type_id)->name;

  switch ($type) {
    case 'Residential':
    $this->createHouseCityTownIndex($property);
    $this->createHouseCityIndex($property);
    break;
    case 'Commercial':
    $this->createCommercialCityIndex($property);
    $this->createCommercialCityTownIndex($property);
    break;
    case 'Plots':
    $this->createPlotsCityIndex($property);
    $this->createPlotsCityTownIndex($property);
    break;

    default:
          # code...
    break;
  }
}
public function updateIndex($property, $model, $town_id = null){
      // if($property->purpose == 1){
  $city_id = $property->city_id;
  $price = $property->price;
  $area = $property->area;
  $area_type = $property->area_type;
  $per_sq_ft_price = $this->getPerSquareFeetPrice($price, $area, $area_type);

  if(empty($town_id)){
    $current = $model::where("city_id" , $city_id)->where("day", date("d", strtotime($property->created_at)))->where("month", date("m", strtotime($property->created_at)))->where("year", date("Y", strtotime($property->created_at)))->first();
  }else{
    $current = $model::where("city_id" , $city_id)->where("town_id", $town_id)->where("day", date("d", strtotime($property->created_at)))->where("month", date("m", strtotime($property->created_at)))->where("year", date("Y", strtotime($property->created_at)))->first();
  }
        ////////////////// if current day entery exists ///////////////////  
  if(!empty($current)){
    $previous_avg_sq_ft_price = $current->avg_price_ftsq; 
    $total_properties_today = $current->property_count;
          /////////////////// shit is happening here
    $new_avg = (($previous_avg_sq_ft_price * $total_properties_today) + $per_sq_ft_price)/($total_properties_today+1);

    if(empty($town_id)){
      $previous_day = $model::where("city_id" , $city_id)->where("day", '<', date("d", strtotime($property->created_at)))->orderby("day" , "DESC")->orderby("month" , "DESC")->orderby("year" , "DESC")->first();
    }else
    {
      $previous_day = $model::where("city_id" , $city_id)->where("town_id", $town_id)->where("day", '<', date("d", strtotime($property->created_at)))->orderby("day" , "DESC")->orderby("month" , "DESC")->orderby("year" , "DESC")->first();
    }
    if(empty($previous_day)){
      $new_index = 100;
      $avg_price_difference = 0;
    }else{
      $previous_day_avg_price = $previous_day->avg_price_ftsq;
      $new_index = ($new_avg / $previous_day_avg_price) * 100;
      $avg_price_difference = (($new_index - $previous_day->index)/$previous_day->index) * 100;
    }
    $current->avg_price_ftsq = $new_avg;
    $current->index = $new_index;
    $current->avg_price_difference = $avg_price_difference;
    $current->property_count += 1;
    $current->update();

    $this->updateProceedingIndexes($current->id,$current->city_id, $model);

        }else{////////////////   if current day entery does not exists  ///////////////
          $new_entery = new $model();
          $new_entery->city_id = $city_id;
          $new_entery->year = date('Y', strtotime($property->created_at));
          $new_entery->month = date('m', strtotime($property->created_at));
          $new_entery->day = date('d', strtotime($property->created_at));  
          $new_entery->avg_price_ftsq = $per_sq_ft_price;
          if(empty($town_id)){
            $previous_day = $model::where("city_id" , $city_id)->where("day", '<', date("d", strtotime($property->created_at)))->orderby("day" , "DESC")->orderby("month" , "DESC")->orderby("year" , "DESC")->first();
          }else{
            $previous_day = $model::where("city_id" , $city_id)->where("town_id", $town_id)->where("day", '<', date("d", strtotime($property->created_at)))->orderby("day" , "DESC")->orderby("month" , "DESC")->orderby("year" , "DESC")->first();
          }
          if(empty($previous_day)){
            $new_index = 100;
            $avg_price_difference = 0;
          }else{
            $previous_day_avg_price = $previous_day->avg_price_ftsq;
            $new_index = ($per_sq_ft_price / $previous_day_avg_price) * 100;
            $avg_price_difference = (($new_index - $previous_day->index)/$previous_day->index) * 100;
          }
          $new_entery->index = $new_index;
          $new_entery->avg_price_difference = $avg_price_difference;
          $new_entery->property_count=1;
          if(!empty($town_id))
          { 
            $new_entery->town_id = $property->town_id;
          }
          $new_entery->save();
        }
      // }
      }
      public function updateProceedingIndexes($previous_id,$city_id, $model){ 
        $current = $model::where("id",'>',$previous_id)->where('city_id',$city_id)->limit(1)->first();

        if(!empty($current)){
          $domain = strstr($model, 'Town');
          if($domain==false)
          {
            $previous_day = $model::where('id',$previous_id)->where('city_id',$city_id)->first();
          }
          else
          {
            $previous_day = $model::where('id',$previous_id)->where('city_id',$city_id)->where('town_id',$current->town_id)->first();
          }

          if(!$previous_day == null)
          {
            $previous_avg_sq_ft_price = $current->avg_price_ftsq; 
            $total_properties_today = $current->property_count;
          /////////////////// shit is happening here

            $previous_day_avg_price = $previous_day->avg_price_ftsq;
            // dd(($current->avg_price_ftsq / $previous_day_avg_price) * 100);
            $new_index = ($current->avg_price_ftsq / $previous_day_avg_price) * 100;
            $avg_price_difference = (($new_index - $previous_day->index)/$previous_day->index) * 100;
          // dd($avg_price_difference);

            $current->index = $new_index;
            $current->avg_price_difference = $avg_price_difference;
            $current->update();
          }
          $this->updateProceedingIndexes($current->id,$current->city_id, $model);
        }
      }
      public function createHouseCityIndex($property){
        $this->updateIndex($property, HouseCityIndex::class);
      } 
      public function createHouseCityTownIndex($property){
        $this->updateIndex($property, HouseCityTownIndex::class, 
          $property->town_id);
      } 
      public function createCommercialCityIndex($property){
        $this->updateIndex($property, CommercialCityIndex::class);
      } 
      public function createCommercialCityTownIndex($property){
        $this->updateIndex($property, CommercialCityTownIndex::class, $property->town_id);
      } 
      public function createPlotsCityIndex($property){
        $this->updateIndex($property, PlotCityIndex::class);
      } 
      public function createPlotsCityTownIndex($property){
        $this->updateIndex($property, PlotCityTownIndex::class, $property->town_id);
      } 
      public function getPerSquareFeetPrice($price, $area, $area_type){
        switch ($area_type) {
          case 'Marla':
          return $price/$this->marlaToSqfeet($area);
          break;
          case 'Kanal':
          return $price/$this->kanalToSqfeet($area);
          break;
          case 'Square Yards':
          return $price/$this->sqyardToSqfeet($area);
          break;
          case 'Square Meters':
          return $price/$this->sqmeterToSqfeet($area);
          break;
          case 'Acre':
          return $price/$this->acreToSqfeet($area);
          break;
          case 'Square Feet':
          return $price/$area;
          break;
        }
      }
      public function kanalToSqfeet($area){
        return $area * 5445;
      }
      public function acreToSqfeet($area){
        return $area * 43560;
      }
      public function sqmeterToSqfeet($area){
        return $area * 10.7639;
      }
      public function sqyardToSqfeet($area){
        return $area * 9;
      }
      public function getTypeRow($type_id){
        return PropertyType::find($type_id);
      }
      public function propertyBlockorActive($id)
      {
       $property =Property::find($id);

       switch ($property->status) {
        case '1':
        $property->status=self::INACTIVE;
        break;
        case '2':
        $property->status=self::ACTIVE;
        break;
      }
      $property->update();
      return Response::json(['success' => "trashed"]);
    }
    public function trashPropertyToActive($id)
    {
      $property =Property::find($id);
      
      switch ($property->status) {
        case '3':
        $property->status=self::ACTIVE;
        break;
        case '1':
        $property->status=self::TRASH;
        break;
      }
      $property->update();
      return Response::json(['success' => "trashed"]);

    }
    public function edit($id)
    {

      $property=Property::find($id);
      return view('.....',compact('Property'));
    }

    public function update(Request $request ,$id)
    {
      $property=Property::find($id);
      $property->update();
      return back();

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
    public function deleteImage($id ,$name)
    {
      $property = Property::find($id);
        // dd($images);
      $property->video ="";
      $property->update();
      File::delete("images/user_property_video/" . $name);


      return Response::json(['success' => 'removed']);
    }

    public function editpropertydetails(Request $request , $id)
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

      $ignorelist =['_token','id','user_id','files','approved_by_id','address','video','images','clientdata','youtube_link','electricity_backup', 'flooring','myself','client_id','gallery','status'];
      $columnNames=$this->getColumnNames();
      $property = Property::find($id);
      $clientid ="";
      if($request->clientdata == "user")
      {
        $property->client_id =NULL;
        $property->myself =$property->user_id;
      }
      else if($request->clientdata == "new")
      {
        $client=new Client();
        $client->name = $request->client['name'];
        $client->mobile_no = $request->client['mobile_no'];
        $client->address = $request->client['address'];
        $client->user_id= $property->user_id;
        $client->status=self::ACTIVE;
        $client->save();
        $clientid=$client->id;
        $property->myself =NULL;

      }
      else
      {
        $clientid = $request->clientdata;
        $property->myself =NULL;
      }
      $all=Block::where('id',$request->block_id)->with('phase.town.city')->get();
      $property_no=$request->property_no;
      $city =$all[0]->phase->town->city->name;
      $town =$all[0]->phase->town->name;
      $phase =$all[0]->phase->name;
      $block =$all[0]->name;

      $property_address =$property_no.', '.$block.', '.$phase.', '.$town.', '.$city;
      $property->address = $property_address;
      $property->client_id =$clientid;
      $property->user_id = Auth::id();

      foreach($columnNames as $col){
        if(!in_array($col, $ignorelist) && ! is_array($request->$col)){
          $property->$col = $request->$col;
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
      $video_name = $this->upload_video_in_folder($video, 'user_property_video');
      $property->video =$video_name;
    }
    if(!empty($request->youtube_link))
    {    
      $string  = $request->youtube_link;
      $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
      $replace  = "youtube.com/embed/$1";    
      $url = preg_replace($search,$replace,$string);
      $property->youtube_link = $url;  
    }else{
      $property->youtube_link = ""; 
    }
    if(!empty($request->images)){
      $array = $request->images;
      $images = $this->upload_multiple_image_and_resize_save_in_folder_property($array, 'user_property');
      $img_string = implode(';', $images);
      if(!empty($property->gallery))
      {
        $property->gallery = $property->gallery.';'.$img_string;
      }else{

        $property->gallery = $img_string;
      }
    }

    if(!empty($request->electricity_backup))
    {
      $electricity_backup= implode(';', $request->electricity_backup);
      $property->electricity_backup = $electricity_backup;
    }else{
      $property->electricity_backup = "";
    }
    if(!empty($request->flooring))
    {
      $flooring = implode(';', $request->flooring);
      $property->flooring =$flooring;
    }else{
      $property->flooring = "";
    }
    $property->url =Property::createPropertyURL($request->purpose, $city, $town, $request->title);
    $property->to_marla = $this->convertToMarla($request->area_type, $request->area);

    $property->update();

    return back();

  }
  public function removeProceedingHash($str){

    return trim(preg_replace('/[^a-zA-Z0-9_,. ]/', '', $str));
  }
  public function test($type ,$city ,$town,$title ,$id)
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
    $purpose=Property::getPurposeId($type);
    $current_url = Property::createPropertyURL($purpose, $city, $town, $title);
    $property=Property::find($id);
    $prop = Property::agencyinfo($property->user_id);
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
     }
   }
   else
   {
     return redirect('/page-not-found');
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
            //return view('frontwebsite.property.property-detail-page',compact('property','data','user_property_view','properties','map_image','prop'));
    return view('frontwebsite.property.detail-property',compact('property','data','user_property_view','properties','map_image','prop'));
  }
  return redirect('/page-not-found');
}
return redirect('/page-not-found');
}

public function internalSearch()
{ 

  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];

  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
 $properties=Property::where('status',self::ACTIVE)->where('purpose','!=',4)->orderBy('created_at','DESC')->paginate(6);
 $count = Property::where('status',1)->whereIn('purpose', [1, 2, 3])->count();
 $name ="";

 return view('frontwebsite.property.internalSearch',compact('properties','propertyTypes' ,'data','cities','towns','phases' ,'blocks' ,'count' ,'name'));
}
public function buy()
{
  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
 return view('frontwebsite.ajaxPages.buy',compact('propertyTypes' ,'data'));
}
public function rent()
{
  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
 return view('frontwebsite.ajaxPages.rent',compact('propertyTypes','data'));
}
public function wanted(){

  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
 return view('frontwebsite.ajaxPages.wanted',compact('propertyTypes','data'));
}
public function project()
{ 
  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
 return view('frontwebsite.ajaxPages.project',compact('propertyTypes','data'));
}

public function getpropertyTypes()
{

}
public function searchHelper($request){

}
public function searchPropertyData(Request $request)
{    
   //dd($request->all());

  if(!empty($request->all()))
  
        $this->searchTrack($request);
        $cities = $this->getAllCities();
        $bundle = $this->getAllPropertyTypes();
        $propertyTypes = $bundle["propertyTypes"];
        $data = $bundle["data"];
        $towns=[];
        $phases=[];
        $blocks=[];
        $name ="";
        if($request->search_purpose ==1)
        {
            $name ="for Sale";
        }
        else if ($request->search_purpose ==2)
        {
        $name ="for Rent";
    
        }
        else if  ($request->search_purpose ==3)
        {
        $name =3; 
        }
        else if  ($request->search_purpose ==4)
        {
        $name ="for Project";
        }
        else
        {
        $name ="";
        }        
        $meta=Meta::find(12);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        $featured_agencies=AgencyWebsite::featuredAgencies();
        $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
             
        if(isset($request->city_id_new) && empty($request->address)){
            $Property =Property::select('properties.*','properties.property_type_id')
            ->join('users' ,'properties.user_id','users.id')
            ->where('properties.city_id',$request->city_id_new)->paginate(9);
             $count =$Property->where('properties.status',self::ACTIVE)->count(); 
           
            
            $properties = Property::select('properties.*','properties.property_type_id')
            ->join('users' ,'properties.user_id','users.id')
            ->where('properties.city_id',$request->city_id_new)
            ->orderBy('properties.created_at','DESC')->paginate(9);
               //dd($properties);
            

            return view('frontwebsite.property.internalSearch',compact('properties','featured_agencies','locations','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
   
        }
        
        if(isset($request->city_id_new) && !empty($request->address) && !empty($request->search_purpose)){
            $Property =Property::select('properties.*','properties.property_type_id')
            ->join('users' ,'properties.user_id','users.id')
            ->where('properties.city_id',$request->city_id_new)->paginate(9);
             $count =$Property->where('properties.status',self::ACTIVE)->count(); 
           
            
            $properties = Property::select('properties.*','properties.property_type_id')
            ->join('users' ,'properties.user_id','users.id')
            ->where('properties.city_id',$request->city_id_new)
            ->where('properties.area_type',$request->search_purpose)
            ->orderBy('properties.created_at','DESC')->paginate(9);
               //dd($properties);
        
       
            return view('frontwebsite.property.internalSearch',compact('properties','featured_agencies','locations','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
   
        }

    $search_property_data = Search_location::where('address',$request->address)->first();
  
        // dd($search_property_data);
     $Property =Property::select('properties.*','agency_websites.id as agency_website_id','agency_websites.agency_name','agency_websites.logo as agency_website_logo','agency_websites.url as agency_website_url','properties.property_type_id')
    ->join('users' ,'properties.user_id','users.id')
    ->join('agency_websites','agency_websites.user_id' ,'users.id');

        // return Response::json($Property);
    if(Input::filled('id')){
        $Property->where('properties.id', Input::input('id'));
    }
    else{ 

        if(Input::filled('propertyRelated')){
            if($request->propertyRelated == 1){
                $Property->where('properties.property_type_id', array(4,5,6,7,8,9,10,11,12));
            }
        else{
            $Property->where('properties.property_type_id', array(13,14,15,16,17,18,19,20,21,22,23,24));
            }
        }
    if(Input::filled('search_purpose')){

      $Property->where('properties.purpose', Input::input('search_purpose'));
    }
    if(Input::filled('bed'))
    {
      $Property->where('properties.bed', Input::input('bed'));
    }

    if(Input::filled('construction_status'))
    {
      $Property->where('properties.construction_status', Input::input('construction_status'));
    }

    if(Input::filled('construction_year'))
    {

      $years=explode('-', Input::input('construction_year'));
      $current = date('Y');
      $start_year=$current - $years[0];
      $end_year=$current - $years[1];  
      $Property->whereBetween('properties.construction_year', [$end_year ,$start_year]);
    }

    if(Input::filled('area_type'))
    {
      $Property->where('properties.area_type', Input::input('area_type'));
    }
    if(Input::filled('area'))
    {
      $Property->where('properties.area', Input::input('area'));
    }
    if(empty($request->identifier))
    {
      if(Input::filled('min_area') && Input::filled('max_area')){
        $min_area = $request->min_area;
        $max_area = $request->max_area;
        if (strpos($request->min_area, 'Marla') !== false) 
        {
          $min_area = explode(" ", $min_area)[1];
          $max_area = explode(" ", $max_area)[1];
        }
        if(trim($min_area) != "0" || trim($max_area) != "1000")
        {  
          $Property->whereBetween('properties.to_marla', [$min_area ,$max_area]);   
        } 
      }
    }
    else
    {
      if(Input::filled('min_area') && Input::filled('max_area')){
        $min_area = $request->min_area;
        $max_area = $request->max_area;
        if(trim($min_area) != "0" || trim($max_area) != "1000")
        {  
          $Property->whereBetween('properties.to_marla', [$min_area ,$max_area]);   
        } 
      }

    }                              
    if(Input::filled('property_type'))
    {
      $Property->where('properties.property_type_id', Input::input('property_type'));
    }
    if(!empty($search_property_data->city_id))
    { 

      $Property->where('properties.city_id', $search_property_data->city_id);
    }
    if(!empty($search_property_data->town_id))
    {
      $Property->where('properties.town_id', $search_property_data->town_id);
    }
    if(!empty($search_property_data->phase_id))
    {
      $Property->where('properties.phase_id', $search_property_data->phase_id);
    }
    if(!empty($search_property_data->block_id))
    {
      $Property->where('properties.block_id', $search_property_data->block_id);
    }

    if(empty($request->identifier))
    {
      if(Input::filled('min_price') && Input::filled('max_price'))
      {
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        if (strpos($request->min_price, 'Rs.') !== false) {
          $min_price = explode(' ',$min_price)[1];
          $max_price = explode(' ',$max_price)[1];
          $min_price = str_replace(array(','), '',$min_price);
          $max_price = str_replace(array(','), '',$max_price);
        }
        if($min_price != 0 || $max_price != 100000000){

          $Property->whereRaw('properties.price BETWEEN ' . $min_price . ' AND ' . $max_price  . '');
        }

      }

      else if(Input::filled('min_price'))
      {                
        $Property->whereRaw('price >= '. $request->min_price); 
      }
      else if(Input::filled('max_price'))
      {                   
        $Property->whereRaw('properties.price <= '. $request->max_price);
      }
    }
    else
    {
      if(Input::filled('min_price') && Input::filled('max_price'))
      {
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        if($min_price != 0 || $max_price != 100000000){

          $Property->whereRaw('properties.price BETWEEN ' . $min_price . ' AND ' . $max_price  . '');
        }

      }

      else if(Input::filled('min_price'))
      {                
        $Property->whereRaw('properties.price >= '. $request->min_price); 
      }
      else if(Input::filled('max_price'))
      {                   
        $Property->whereRaw('properties.price <= '. $request->max_price);
      }
    }

  }
//   $name ="";
//     if($request->search_purpose ==1)
//     {
//         $name ="for Sale";
//     }
//     else if ($request->search_purpose ==2)
//     {
//     $name ="for Rent";

//     }
//     else if  ($request->search_purpose ==3)
//     {
//     $name =3; 
//     }
//     else if  ($request->search_purpose ==4)
//     {
//     $name ="for Project";
//     }
//     else
//     {
//     $name ="";
//     }        
$count =$Property->where('properties.status',self::ACTIVE)->count();            
    if(!empty($request->identifier)){ 
        if(empty($request->all()) || isset($_['page'])){
            if(!isset($_GET['property_type'])){
                $Property->whereIn('properties.purpose', [1,2,3]);
                $Property->whereIn('properties.property_type_id', [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);
            }
        }
        $properties =$Property->orderBy('properties.created_at','DESC')->where('properties.status',self::ACTIVE)->paginate(20);
        return Response::json($properties);
    }
    else{ 
        if(empty($request->all()) || isset($_GET['page'])){
            if(!isset($_GET['property_type'])){
                $Property->whereIn('properties.purpose', [1,2,3]);
                $Property->whereIn('properties.property_type_id', [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);
            }
        }
        $properties =$Property->orderBy('properties.created_at','DESC')->where('properties.status',self::ACTIVE)->paginate(6);              
    }
    if($request->inventory_search_page == "on"){
         return view('dashboard.property.inventorySearch', compact('properties','propertyTypes' ,'data','cities'));
    }   
    // $meta=Meta::find(12);
    // $title =$meta->meta_title;
    // $description =$meta->meta_description;
    // $keyword =$meta->meta_keyword;
    // $featured_agencies=AgencyWebsite::featuredAgencies();
    // $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");

    return view('frontwebsite.property.internalSearch',compact('properties','featured_agencies','locations','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}
// public function searchPropertyData(Request $request)
// {    

//     //dd($request->all());


//   if(!empty($request->all())) 
//     $this->searchTrack($request);
//         $cities = $this->getAllCities();
//         $bundle = $this->getAllPropertyTypes();
//         $propertyTypes = $bundle["propertyTypes"];
//         $data = $bundle["data"];
//         $towns=[];
//         $phases=[];
//         $blocks=[];
//         $search_property_data=Search_location::where('address',$request->address)->first();
//         //dd($search_property_data);
//           $Property =Property::select('properties.*','agency_websites.id as agency_website_id','agency_websites.agency_name','agency_websites.logo as agency_website_logo','agency_websites.url as agency_website_url','properties.property_type_id')
//           ->join('users' ,'properties.user_id','users.id')
//           ->join('agency_websites','agency_websites.user_id' ,'users.id');
            
//             dd($Property);
//         // return Response::json($Property);
//   if(Input::filled('id'))
//   {
//     $Property->where('properties.id', Input::input('id'));
//   }
//   else
//   { 

//     if(Input::filled('propertyRelated'))
//     {
//       if($request->propertyRelated == 1)
//       {

//         $Property->where('properties.property_type_id', array(4,5,6,7,8,9,10,11,12));
//       }
//       else
//       {
//         $Property->where('properties.property_type_id', array(13,14,15,16,17,18,19,20,21,22,23,24));
//       }
//     }
//     if(Input::filled('search_purpose'))
//     {

//       $Property->where('properties.purpose', Input::input('search_purpose'));
//     }
//     if(Input::filled('bed'))
//     {
//       $Property->where('properties.bed', Input::input('bed'));
//     }

//     if(Input::filled('construction_status'))
//     {
//       $Property->where('properties.construction_status', Input::input('construction_status'));
//     }

//     if(Input::filled('construction_year'))
//     {

//       $years=explode('-', Input::input('construction_year'));
//       $current = date('Y');
//       $start_year=$current - $years[0];
//       $end_year=$current - $years[1];  
//       $Property->whereBetween('properties.construction_year', [$end_year ,$start_year]);
//     }

//     if(Input::filled('area_type'))
//     {
//       $Property->where('properties.area_type', Input::input('area_type'));
//     }
//     if(Input::filled('area'))
//     {
//       $Property->where('properties.area', Input::input('area'));
//     }
//     if(empty($request->identifier))
//     {
//       if(Input::filled('min_area') && Input::filled('max_area')){
//         $min_area = $request->min_area;
//         $max_area = $request->max_area;
//         if (strpos($request->min_area, 'Marla') !== false) 
//         {
//           $min_area = explode(" ", $min_area)[1];
//           $max_area = explode(" ", $max_area)[1];
//         }
//         if(trim($min_area) != "0" || trim($max_area) != "1000")
//         {  
//           $Property->whereBetween('properties.to_marla', [$min_area ,$max_area]);   
//         } 
//       }
//     }
//     else
//     {
//       if(Input::filled('min_area') && Input::filled('max_area')){
//         $min_area = $request->min_area;
//         $max_area = $request->max_area;
//         if(trim($min_area) != "0" || trim($max_area) != "1000")
//         {  
//           $Property->whereBetween('properties.to_marla', [$min_area ,$max_area]);   
//         } 
//       }

//     }                              
//     if(Input::filled('property_type'))
//     {
//       $Property->where('properties.property_type_id', Input::input('property_type'));
//     }
//              // if(Input::filled('city_id'))
//              //  { 

//              //      $Property->where('properties.city_id', Input::input('city_id'));
//              //  }
//              //  if(Input::filled('town_id'))
//              //  {
//              //        $Property->where('properties.town_id', $request->town_id);
//              //  }
//              //  if(Input::filled('phase_id'))
//              //  {
//              //      $Property->where('properties.phase_id', Input::input('phase_id'));
//              //  }
//              //  if(Input::filled('block_id'))
//              //  {

//              //      $Property->where('properties.block_id', Input::input('block_id'));
//              //  }
//     if(!empty($search_property_data->city_id))
//     { 

//       $Property->where('properties.city_id', $search_property_data->city_id);
//     }
//     if(!empty($search_property_data->town_id))
//     {
//       $Property->where('properties.town_id', $search_property_data->town_id);
//     }
//     if(!empty($search_property_data->phase_id))
//     {
//       $Property->where('properties.phase_id', $search_property_data->phase_id);
//     }
//     if(!empty($search_property_data->block_id))
//     {
//       $Property->where('properties.block_id', $search_property_data->block_id);
//     }

//     if(empty($request->identifier))
//     {
//       if(Input::filled('min_price') && Input::filled('max_price'))
//       {
//         $min_price = $request->min_price;
//         $max_price = $request->max_price;

//         if (strpos($request->min_price, 'Rs.') !== false) {
//           $min_price = explode(' ',$min_price)[1];
//           $max_price = explode(' ',$max_price)[1];
//           $min_price = str_replace(array(','), '',$min_price);
//           $max_price = str_replace(array(','), '',$max_price);
//         }
//         if($min_price != 0 || $max_price != 100000000){

//           $Property->whereRaw('properties.price BETWEEN ' . $min_price . ' AND ' . $max_price  . '');
//         }

//       }

//       else if(Input::filled('min_price'))
//       {                
//         $Property->whereRaw('price >= '. $request->min_price); 
//       }
//       else if(Input::filled('max_price'))
//       {                   
//         $Property->whereRaw('properties.price <= '. $request->max_price);
//       }
//     }
//     else
//     {
//       if(Input::filled('min_price') && Input::filled('max_price'))
//       {
//         $min_price = $request->min_price;
//         $max_price = $request->max_price;
//         if($min_price != 0 || $max_price != 100000000){

//           $Property->whereRaw('properties.price BETWEEN ' . $min_price . ' AND ' . $max_price  . '');
//         }

//       }

//       else if(Input::filled('min_price'))
//       {                
//         $Property->whereRaw('properties.price >= '. $request->min_price); 
//       }
//       else if(Input::filled('max_price'))
//       {                   
//         $Property->whereRaw('properties.price <= '. $request->max_price);
//       }
//     }

//   }
//   $name ="";
//   if($request->search_purpose ==1)
//   {
//     $name ="for Sale";
//   }
//   else if ($request->search_purpose ==2)
//   {
//   $name ="for Rent";
//  }
//  else if  ($request->search_purpose ==3)
//  {
//   $name =3; 
// }
// else if  ($request->search_purpose ==4)
// {
//   $name ="for Project";
// }
// else
// {
//   $name ="";
// }        
// $count =$Property->where('properties.status',self::ACTIVE)->count();            
// if(!empty($request->identifier))
// { 
//   if(empty($request->all()) || isset($_['page']))
//   {
//     if(!isset($_GET['property_type']))
//     {
//       $Property->whereIn('properties.purpose', [1,2,3]);
//       $Property->whereIn('properties.property_type_id', [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);
//     }
//   }
//   $properties =$Property->orderBy('properties.created_at','DESC')->where('properties.status',self::ACTIVE)->paginate(20);
//   return Response::json($properties);
// }
// else
// { 
//   if(empty($request->all()) || isset($_GET['page']))
//   {
//     if(!isset($_GET['property_type']))
//     {
//       $Property->whereIn('properties.purpose', [1,2,3]);
//       $Property->whereIn('properties.property_type_id', [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);
//     }
//   }
//   $properties =$Property->orderBy('properties.created_at','DESC')->where('properties.status',self::ACTIVE)->paginate(10);              
// }
// if($request->inventory_search_page == "on"){
//   return view('dashboard.property.inventorySearch', compact('properties','propertyTypes' ,'data','cities'));
// }   
// $meta=Meta::find(12);
// $title =$meta->meta_title;
// $description =$meta->meta_description;
// $keyword =$meta->meta_keyword;
// $featured_agencies=AgencyWebsite::featuredAgencies();
// $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
// return view('frontwebsite.property.internalSearch',compact('properties','featured_agencies','locations','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
// }
  //   public function searchPropertyData(Request $request)
  //   {    

  //       // dd($request->all());


  //       if(!empty($request->all())) 

  //         $this->searchTrack($request);
  //       $cities = $this->getAllCities();
  //       $bundle = $this->getAllPropertyTypes();
  //       $propertyTypes = $bundle["propertyTypes"];
  //       $data = $bundle["data"];
  //       $towns=[];
  //       $phases=[];
  //       $blocks=[];

  //        $Property =Property::select('properties.*','agency_websites.id as agency_website_id','agency_websites.agency_name','agency_websites.logo as agency_website_logo','agency_websites.url as agency_website_url','properties.property_type_id')
  //          ->join('users' ,'properties.user_id','users.id')
  //          ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id');

  //       // return Response::json($Property);
  //         if(Input::filled('id'))
  //         {
  //           $Property->where('properties.id', Input::input('id'));
  //         }
  //         else
  //         { 

  //           if(Input::filled('propertyRelated'))
  //             {
  //               if($request->propertyRelated == 1)
  //               {

  //                 $Property->where('properties.property_type_id', array(4,5,6,7,8,9,10,11,12));
  //               }
  //               else
  //               {
  //                 $Property->where('properties.property_type_id', array(13,14,15,16,17,18,19,20,21,22,23,24));
  //               }
  //             }
  //           if(Input::filled('search_purpose'))
  //             {

  //                 $Property->where('properties.purpose', Input::input('search_purpose'));
  //             }
  //           if(Input::filled('bed'))
  //             {
  //                 $Property->where('properties.bed', Input::input('bed'));
  //             }

  //            if(Input::filled('construction_status'))
  //             {
  //                 $Property->where('properties.construction_status', Input::input('construction_status'));
  //             }

  //            if(Input::filled('construction_year'))
  //             {

  //                 $years=explode('-', Input::input('construction_year'));
  //                 $current = date('Y');
  //                 $start_year=$current - $years[0];
  //                 $end_year=$current - $years[1];  
  //                 $Property->whereBetween('properties.construction_year', [$end_year ,$start_year]);
  //             }

  //            if(Input::filled('area_type'))
  //             {
  //               $Property->where('properties.area_type', Input::input('area_type'));
  //             }
  //             if(Input::filled('area'))
  //             {
  //               $Property->where('properties.area', Input::input('area'));
  //             }
  //              if(empty($request->identifier))
  //             {
  //                 if(Input::filled('min_area') && Input::filled('max_area')){
  //                 $min_area = $request->min_area;
  //                 $max_area = $request->max_area;
  //                 if (strpos($request->min_area, 'Marla') !== false) 
  //                 {
  //                     $min_area = explode(" ", $min_area)[1];
  //                     $max_area = explode(" ", $max_area)[1];
  //                 }
  //                 if(trim($min_area) != "0" || trim($max_area) != "1000")
  //                 {  
  //                     $Property->whereBetween('properties.to_marla', [$min_area ,$max_area]);   
  //                 } 
  //               }
  //             }
  //             else
  //             {
  //               if(Input::filled('min_area') && Input::filled('max_area')){
  //                 $min_area = $request->min_area;
  //                 $max_area = $request->max_area;
  //                 if(trim($min_area) != "0" || trim($max_area) != "1000")
  //                 {  
  //                     $Property->whereBetween('properties.to_marla', [$min_area ,$max_area]);   
  //                 } 
  //               }

  //             }                              
  //             if(Input::filled('property_type'))
  //             {
  //                 $Property->where('properties.property_type_id', Input::input('property_type'));
  //             }
  //            if(Input::filled('city_id'))
  //             { 

  //                 $Property->where('properties.city_id', Input::input('city_id'));
  //             }
  //             if(Input::filled('town_id'))
  //             {
  //                   $Property->where('properties.town_id', $request->town_id);
  //             }
  //             if(Input::filled('phase_id'))
  //             {
  //                 $Property->where('properties.phase_id', Input::input('phase_id'));
  //             }
  //             if(Input::filled('block_id'))
  //             {

  //                 $Property->where('properties.block_id', Input::input('block_id'));
  //             }

  //            if(empty($request->identifier))
  //             {
  //             if(Input::filled('min_price') && Input::filled('max_price'))
  //               {
  //                 $min_price = $request->min_price;
  //                 $max_price = $request->max_price;

  //                 if (strpos($request->min_price, 'Rs.') !== false) {
  //                     $min_price = explode(' ',$min_price)[1];
  //                     $max_price = explode(' ',$max_price)[1];
  //                     $min_price = str_replace(array(','), '',$min_price);
  //                     $max_price = str_replace(array(','), '',$max_price);
  //                 }
  //                 if($min_price != 0 || $max_price != 100000000){

  //                   $Property->whereRaw('properties.price BETWEEN ' . $min_price . ' AND ' . $max_price  . '');
  //                 }

  //               }

  //             else if(Input::filled('min_price'))
  //               {                
  //                   $Property->whereRaw('price >= '. $request->min_price); 
  //               }
  //             else if(Input::filled('max_price'))
  //               {                   
  //                   $Property->whereRaw('properties.price <= '. $request->max_price);
  //               }
  //           }
  //           else
  //           {
  //             if(Input::filled('min_price') && Input::filled('max_price'))
  //               {
  //                 $min_price = $request->min_price;
  //                 $max_price = $request->max_price;
  //                 if($min_price != 0 || $max_price != 100000000){

  //                   $Property->whereRaw('properties.price BETWEEN ' . $min_price . ' AND ' . $max_price  . '');
  //                 }

  //               }

  //             else if(Input::filled('min_price'))
  //               {                
  //                   $Property->whereRaw('properties.price >= '. $request->min_price); 
  //               }
  //             else if(Input::filled('max_price'))
  //               {                   
  //                   $Property->whereRaw('properties.price <= '. $request->max_price);
  //               }
  //           }

  //         }
  //         $name ="";
  //         if($request->search_purpose ==1)
  //         {
  //           $name ="for Sale";
  //         }
  //         else if ($request->search_purpose ==2)
  //         {
  //            $name ="for Rent";
  //         }
  //         else if  ($request->search_purpose ==3)
  //         {
  //             $name =3; 
  //         }
  //         else if  ($request->search_purpose ==4)
  //         {
  //           $name ="for Project";
  //         }
  //         else
  //         {
  //           $name ="";
  //         }        
  //          $count =$Property->where('properties.status',self::ACTIVE)->count();            
  //          if(!empty($request->identifier))
  //          { 
  //           if(empty($request->all()) || isset($_['page']))
  //            {
  //             if(!isset($_GET['property_type']))
  //             {
  //               $Property->whereIn('properties.purpose', [1,2,3]);
  //               $Property->whereIn('properties.property_type_id', [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);
  //             }
  //            }
  //               $properties =$Property->orderBy('properties.created_at','DESC')->where('properties.status',self::ACTIVE)->paginate(20);
  //            return Response::json($properties);
  //          }
  //          else
  //          { 
  //             if(empty($request->all()) || isset($_GET['page']))
  //              {
  //               if(!isset($_GET['property_type']))
  //               {
  //                 $Property->whereIn('properties.purpose', [1,2,3]);
  //                 $Property->whereIn('properties.property_type_id', [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);
  //               }
  //              }
  //            $properties =$Property->orderBy('properties.created_at','DESC')->where('properties.status',self::ACTIVE)->paginate(6);              
  //          }
  //         if($request->inventory_search_page == "on"){
  //           return view('dashboard.property.inventorySearch', compact('properties','propertyTypes' ,'data','cities'));
  //         }   
  //         $meta=Meta::find(12);
  //       $title =$meta->meta_title;
  //       $description =$meta->meta_description;
  //       $keyword =$meta->meta_keyword;
  //        return view('frontwebsite.property.internalSearch',compact('properties','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
  // }

public function saveProperty($id)
{ 
  $saveProperty = new SaveProperty();
  $result =$saveProperty->saveProperty($id);
  return Response::json(['success' => $result]);
}
public function favouriteProperty($id)
{
  $check =Favorite::where('session_id', Session::getId())->where('property_id', $id)->first();
  if(empty($check))
  {  
    $favorite= new Favorite();
    $favorite->session_id=Session::getId();
    $favorite->property_id= $id;
    $favorite->save();
    $count = Favorite::where('session_id', Session::getId())->count();
    return Response::json(['success' => "Added in Favorite List" , 'count' => $count ,'val' => 2]);
  }
  else
  {
   return Response::json(['warning' => "Allready in Favorite List" ,'val' => 1]);
 }
}
public function viewCount($id)
{

  $property =Property::find($id);
  $property->view_count+=1;
  $property->update();
  return Response::json(['success' => 'success']);
}


public function marlaToKanal($area){
  return $area / 20;
}
public function marlaToSqmeter($area){
  return $area * 25.2929;
}
public function marlaToSqyard($area){
  return $area * 30.2501;
}
public function marlaToSqfeet($area){
  return $area * 272.251;
}
public function marlaToAcre($area){
  return $area / 160;
}

public function inventorySearch()
{
  $cities = $this->getAllCities();
  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }

 return view('dashboard.property.inventorySearch', compact('cities', 'data', 'propertyTypes'));
}
public function inventorySearchResult(Request $request){
  dd($request->all());

}

public function searchTrack($request)
{
  $track = new SearchTracking();
  if(Auth::id()){
    $track->user_id = Auth::id();  
    $track->search_string = $request->fullUrl();
    $track->purpose = $request->search_purpose;
    if(isset($request->id))
      $track->property_id = $request->id;
    if(isset($request->city_id))
      $track->city_id = $request->city_id;
    if(isset($request->town_id))
      $track->town_id = $request->town_id;
    $min_price = $request->min_price;
    $max_price = $request->max_price;
    if (strpos($request->min_price, 'Rs.') !== false) {
      $min_price = explode(' ',$min_price)[1];
      $max_price = explode(' ',$max_price)[1];
      $min_price = str_replace(array(','), '',$min_price);
      $max_price = str_replace(array(','), '',$max_price);
    }
    $track->min_price = $min_price;
    $track->max_price = $max_price;

    if(isset($request->min_area) && isset($request->max_area)){
      $min_area = $request->min_area;
      $max_area = $request->max_area;
      if (strpos($request->min_area, 'Marla') !== false) 
      {
        $min_area = explode(" ", $min_area)[1];
        $max_area = explode(" ", $max_area)[1];
      }
      $track->min_area = trim($min_area);
      $track->max_area = trim($max_area);
    }
    if(isset($request->property_type))
      $track->property_type_id = $request->property_type;
    if(isset($request->bed))
      $track->bed = $request->bed;
    if(isset($request->construction_year))
      $track->construction_year = $request->construction_year;
    if(isset($request->construction_status))
      $track->construction_status = $request->construction_status;
    if(isset($request->parking_space))
      $track->parking_space = $request->parking_space;
    if(isset($request->area))
      $track->area = $request->area;
    $track->area_type = $request->area_type;
    if(isset($request->phase_id))
      $track->phase_id = $request->phase_id;
    if(isset($request->block_id))
      $track->block_id = $request->block_id;
    return $track->save()? true : false;
  }else{
      // do something else
  }
}

public function propertyBuy()
{     
  $name ="for Sale";
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
  $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id,
  users.id as user_id,users.first_name as username'))
    ->join('property_types',  'property_types.id', '=','properties.property_type_id')
    ->join('users',  'users.id', '=','properties.user_id')
    ->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.created_at', 'DESC')->paginate(9);  
 // dd($properties);
//     $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id,
//   users.id as user_id,users.first_name as username'))
//     ->join('property_types',  'property_types.id', '=','properties.property_type_id')
//     ->join('users',  'users.id', '=','properties.user_id')
//     ->join('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
//     ->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.created_at', 'DESC')->paginate(10);  
//  // dd($properties);
//  $properties =Property::where('purpose',1)->where('status',self::ACTIVE)->orderBy('created_at','DESC')->paginate(10); 
 $count =Property::where('purpose',1)->where('status',self::ACTIVE)->count();
 $meta=Meta::find(4);
 $title =$meta->meta_title;
 $description =$meta->meta_description;
 $keyword =$meta->meta_keyword;
 $featured_agencies=AgencyWebsite::featuredAgencies();
 $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
 return view('frontwebsite.property.internalSearch',compact('properties','propertyTypes','featured_agencies','locations' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}

public function propertyRent()
{     
  $name ="for Rental";
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
  $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id,
  users.id as user_id,users.first_name as username'))
          ->join('property_types',  'property_types.id', '=','properties.property_type_id')
          ->join('users',  'users.id', '=','properties.user_id')
          
//  $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id,
//   users.id as user_id,users.first_name as username'))
//           ->join('property_types',  'property_types.id', '=','properties.property_type_id')
//           ->join('users',  'users.id', '=','properties.user_id')
//           ->leftjoin('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
 ->where('properties.status',self::ACTIVE)->where('properties.purpose',2)->orderBy('properties.created_at', 'DESC')->paginate(10);  
  //$properties =Property::where('purpose',2)->where('status',self::ACTIVE)->orderBy('created_at','DESC')->paginate(10); 
 $count =Property::where('purpose',2)->where('status',self::ACTIVE)->count();
 $meta=Meta::find(12);
 $title =$meta->meta_title;
 $description =$meta->meta_description;
 $keyword =$meta->meta_keyword;
 $featured_agencies=AgencyWebsite::featuredAgencies();
 $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
 return view('frontwebsite.property.internalSearch',compact('properties','propertyTypes','featured_agencies','locations' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}

public function propertyWanted()
{     
  $name =3;
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
 $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id,
  users.id as user_id,users.first_name as username'))
           ->join('property_types',  'property_types.id', '=','properties.property_type_id')
           ->join('users',  'users.id', '=','properties.user_id')
           ->leftjoin('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
 ->where('properties.purpose',3)->orderBy('properties.created_at', 'DESC')->paginate(10);  
 // $properties =Property::where('purpose',3)->where('status',self::ACTIVE)->orderBy('created_at','DESC')->paginate(5); 
 $count =Property::where('purpose',3)->where('status',self::ACTIVE)->count();
 $meta=Meta::find(9);
 $title =$meta->meta_title;
 $description =$meta->meta_description;
 $keyword =$meta->meta_keyword;
 $featured_agencies=AgencyWebsite::featuredAgencies();
 $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");

 return view('frontwebsite.property.internalSearch',compact('properties','propertyTypes','featured_agencies','locations' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}

public function propertyProject()
{     
  $name ="for Project";
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
  $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
 }
//  $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id'))
//           ->join('property_types',  'property_types.id', '=','properties.property_type_id')
//           ->leftjoin('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
//           ->where('properties.purpose',4)->orderBy('properties.created_at','DESC')->paginate(10);
           
 $properties =Property::where('purpose',4)->where('status',self::ACTIVE)->orderBy('created_at','DESC')->paginate(5); 
 $count =Property::where('purpose',4)->where('status',self::ACTIVE)->count();
 $meta=Meta::find(10);
 $title =$meta->meta_title;
 $description =$meta->meta_description;
 $keyword =$meta->meta_keyword;
  $featured_agencies=AgencyWebsite::featuredAgencies();
 $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
 return view('frontwebsite.property.internalSearch',compact('properties','propertyTypes','featured_agencies','locations' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}

public function savedProperty()
{ 
  $properties=array();
  $savedProperty =SaveProperty::where('user_id',Auth::id())->get();
  foreach($savedProperty as $property)
  {
    $data =Property::where('id',$property->property_id)->where('status',1)->first();
    if(!empty($data)){
      $properties[]= $data;
    }    
  }
  return view('dashboard.property.savedProperty',compact('properties'));
}
public function unsaveProperty($id)
{
  $saved =SaveProperty::where('user_id',Auth::id())->where('property_id',$id)->first();
  $saved->delete();
  return Response::json(['success' => "sucess"]);
}

public function propertyCompare(Request $request)
{
  $compare = $request->session()->get("compare");
  if(empty($compare)){
    return redirect('/searchPropertyData');
  }
  $ids = array_keys($compare);

  $firstproperty= Property::where('id',$ids[0])->first();
  $firstpropertyType= PropertyType::where('id',$firstproperty->property_type_id)->first();
  $firstpropertycontactno=User::where('id',$firstproperty->user_id)->first();
  $secondproperty= Property::where('id',$ids[1])->first();
  $secondpropertyType= PropertyType::where('id',$secondproperty->property_type_id)->first();
  $secondpropertycontactno=User::where('id',$secondproperty->user_id)->first();

  $session = $request->session()->get("compare");
  $request->session()->forget("compare");
  unset($session); 
  $request->session()->put("compare", "");  

  return view('frontwebsite.property.property_comparisan',compact('firstproperty','secondproperty','firstpropertyType','secondpropertyType','firstpropertycontactno','secondpropertycontactno'));
}

public function propertyCompareList()
{
  return view('frontwebsite.property.property_comparisan');
}

public function serSessionforCompare(Request $request)
{
  if($request->session()->has("compare.".$_GET["id"])){
    $session = $request->session()->get("compare");
    $request->session()->forget("compare.".$_GET["id"]);
    unset($session[$_GET["id"]]); 
    $request->session()->put("compare", $session);      
  }else{
    $request->session()->push("compare.".$_GET["id"], $_GET);
  }
}
public function removeSessionCompare(Request $request){
  if($request->session()->has("compare.".$_GET["id"])){
    $session = $request->session()->get("compare");
    $request->session()->forget("compare.".$_GET["id"]);
    unset($session[$_GET["id"]]); 
    $request->session()->put("compare", $session);      
  }
}
public function locationSearch($name)
  {     
        $city=City::where('name' ,$name)->first();
        if(!$city == null)
        {
        $name ="FOR $name";
        $cities =$this->getAllCities();
        $towns=[];
        $phases=[];
        $blocks=[];
        $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
        $data=array();
        foreach($propertyTypes as $propertyType)
        {
           $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
        }
        $properties =Property::where('city_id',$city->id)->where('status',self::ACTIVE)->paginate(5); 
        $count =$properties->count();
        $meta=Meta::find(14);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        $featured_agencies=AgencyWebsite::featuredAgencies();
        
        $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
        return view('frontwebsite.property.internalSearch',compact('properties','propertyTypes','featured_agencies','locations' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
        }
        // return redirect('/page-not-found');
        return abort(404);
  }
  
// public function locationSearch($name)
// {     
//   //dd($request-all());
//   $city=City::where('name' ,$name)->paginate(9);
//     //dd( $city);
//     // echo '2';
//   if(!$city == null)
//   {
//     $name ="FOR $name";
//     //dd($name);
//     $cities =$this->getAllCities();
//     $towns=[];
//     $phases=[];
//     $blocks=[];
//     $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
//     $data=array();
//     foreach($propertyTypes as $propertyType)
//     {
//      $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
//   }
//   dd($city->id);
//     $properties =Property::where('city_id',$city->id)->where('status',self::ACTIVE)->paginate(5); 
//     $count =$properties->count();
//     $meta=Meta::find(14);
//     $title =$meta->meta_title;
//     $description =$meta->meta_description;
//     $keyword =$meta->meta_keyword;
//     $featured_agencies=AgencyWebsite::featuredAgencies();
    
//     $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");

//   return view('frontwebsite.property.internalSearch',compact('properties','locations','featured_agencies','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
//  }
//  return redirect('/page-not-found');
// }
public function townSearch($city_id,$name,$town_id)
{     
  $town=Town::find($town_id);
  if(!$town == null)
  {
    $name ="FOR $name";
    $cities =$this->getAllCities();
    $towns=[];
    $phases=[];
    $blocks=[];
    $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
    $data=array();
    foreach($propertyTypes as $propertyType)
    {
     $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
   }
   $properties =Property::where('town_id',$town->id)->where('city_id',$city_id)->whereIn('purpose', [1, 2, 3])->where('status',self::ACTIVE)->orderBy('id', 'DESC')->paginate(5); 

   
   $count =$properties->count();
   $meta=Meta::find(13);
   $title =$meta->meta_title;
   $description =$meta->meta_description;
   $keyword =$meta->meta_keyword;
    $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
  
   $featured_agencies=AgencyWebsite::featuredAgencies();
   return view('frontwebsite.property.internalSearch',compact('properties','locations','featured_agencies','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
 }
 return redirect('/page-not-found');
}
public function plotSearch($city_id,$name,$town_id)
{ 
  $town=Town::find($town_id);
  if(!$town == null)
  {
    $name ="FOR $name";
    $cities =$this->getAllCities();
    $towns=[];
    $phases=[];
    $blocks=[];
    $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
    $data=array();
    foreach($propertyTypes as $propertyType)
    {
     $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
   }
   $properties =Property::where('town_id',$town->id)->where('city_id',$city_id)->whereIn('purpose', [1, 2, 3])->whereIn('property_type_id', [25,26,27,28,29,30,31])->where('status',self::ACTIVE)->orderBy('id', 'DESC')->paginate(5); 
   //dd($properties);
   $count =$properties->count();
   $meta=Meta::find(8);
   $title =$meta->meta_title;
   $description =$meta->meta_description;
   $keyword =$meta->meta_keyword;
   $keyword =$meta->meta_keyword;
    $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
   $featured_agencies=AgencyWebsite::featuredAgencies();
   return view('frontwebsite.property.internalSearch',compact('properties','locations','featured_agencies','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
 }
}

public function rentSearch($city_id,$name,$town_id)
{ 
  $town=Town::find($town_id);
  if(!$town == null)
  {
    $name ="FOR $name";
    $cities =$this->getAllCities();
    $towns=[];
    $phases=[];
    $blocks=[];
    $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
    $data=array();
    foreach($propertyTypes as $propertyType)
    {
     $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
   }
    // $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id'))
    //       ->join('property_types',  'property_types.id', '=','properties.property_type_id')
    //       ->leftjoin('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
    //       ->where('town_id',$town->id)->where('city_id',$city_id)->whereIn('purpose', [1, 2, 3])->whereIn('property_type_id', [4,5,6,7,8,9,10,11,12])->where('status',self::ACTIVE)->paginate(10); 
  $properties =Property::where('town_id',$town->id)->where('city_id',$city_id)->whereIn('purpose', [1, 2, 3])->whereIn('property_type_id', [4,5,6,7,8,9,10,11,12])->where('status',self::ACTIVE)->orderBy('id', 'DESC')->paginate(5); 
   $count =$properties->count();
   $meta=Meta::find(5);
   $title =$meta->meta_title;
   $description =$meta->meta_description;
   $keyword =$meta->meta_keyword;
    $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");
   $featured_agencies=AgencyWebsite::featuredAgencies();
   return view('frontwebsite.property.internalSearch',compact('properties','propertyTypes' ,'data','cities','towns','phases' ,'locations','featured_agencies','blocks','count','name','title','description','keyword'));
 }
}
public function commercial()
{ 
  $name ="FOR Commercial";
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
        // $propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
        // foreach($propertyTypes as $propertyType)
        // {
        //    $data[$propertyType->id] =PropertyType::where('status',self::ACTIVE)->where('parent',$propertyType->id)->get();
        // }
  $propertyTypes=PropertyType::where('status',1)->get();
  $parents = [];
  foreach($propertyTypes as $par){
   if($par->parent == 0){
     $parents[] = $par;
   }
 }
 $datas = [];
 foreach($parents as $parent){
   foreach($propertyTypes as $types){
     if($types->parent == $parent->id){
       $datas[] = $types;
     }
   }
   $data[$parent->id] = $datas;
   $datas = [];
 }

 $propertyTypes = $parents;
        $properties =Property::join('property_types', 'properties.property_type_id' , '=', 'property_types.id')->where('property_types.parent',2)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->paginate(8);
$properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id'))
 ->join('agency_websites','properties.user_id', '=' ,'agency_websites.user_id')
 ->join('property_types', 'properties.property_type_id' , '=', 'property_types.id')
 ->where('property_types.parent',2)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(9); 
    //  $properties =Property::select(DB::raw('properties.*,agency_websites.agency_name as agency_name,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id, users.id as user_id,users.first_name as username'))
    //       ->join('property_types',  'property_types.id', '=','properties.property_type_id')
    //         ->join('users',  'users.id', '=','properties.user_id')
    //       ->leftjoin('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
    //       ->where('property_types.parent',2)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(10);
        //   dd($properties);
 $count =$properties->count();
 $meta=Meta::find(7);
 $title =$meta->meta_title;
 $description =$meta->meta_description;
 $keyword =$meta->meta_keyword;
 $featured_agencies=AgencyWebsite::featuredAgencies();
 $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");

 return view('frontwebsite.property.internalSearch',compact('properties','locations','featured_agencies','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}

public function residential()
{ 
  $name ="FOR Residential";
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
        //$propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  $propertyTypes=PropertyType::where('status',1)->get();
  $parents = [];
  foreach($propertyTypes as $par){
   if($par->parent == 0){
     $parents[] = $par;
   }
 }
 $datas = [];
 foreach($parents as $parent){
   foreach($propertyTypes as $types){
     if($types->parent == $parent->id){
       $datas[] = $types;
     }
   }
   $data[$parent->id] = $datas;
   $datas = [];
 }

 $propertyTypes = $parents;
 $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id, users.id as user_id,users.first_name as username'))
           ->join('property_types',  'property_types.id', '=','properties.property_type_id')
           ->join('users',  'users.id', '=','properties.user_id')
           
           ->where('property_types.parent',1)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(9);  
           
    // $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id, users.id as user_id,users.first_name as username'))
    //       ->join('property_types',  'property_types.id', '=','properties.property_type_id')
    //       ->join('users',  'users.id', '=','properties.user_id')
    //       ->leftjoin('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
    //       ->where('property_types.parent',1)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(8);  
        //   dd($properties);
    // $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id'))
    //       ->join('property_types', 'properties.property_type_id' , '=', 'property_types.id')
    //       ->where('property_types.parent',1)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(8); 
// $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id'))
//  ->join('agency_websites','properties.user_id', '=' ,'agency_websites.user_id')
//  ->join('property_types', 'properties.property_type_id' , '=', 'property_types.id')
//  ->where('property_types.parent',1)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(8); 
 $count =$properties->count();
 $meta=Meta::find(6);
 $title =$meta->meta_title;
 $description =$meta->meta_description;
 $keyword =$meta->meta_keyword;
 $featured_agencies=AgencyWebsite::featuredAgencies();
 $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");

 return view('frontwebsite.property.internalSearch',compact('properties','locations','featured_agencies','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}

public function plots()
{ 
  $name ="FOR Plots";
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
        //$propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  $propertyTypes=PropertyType::where('status',1)->get();
  $parents = [];
  foreach($propertyTypes as $par){
   if($par->parent == 0){
     $parents[] = $par;
   }
 }
 $datas = [];
 foreach($parents as $parent){
   foreach($propertyTypes as $types){
     if($types->parent == $parent->id){
       $datas[] = $types;
     }
   }
   $data[$parent->id] = $datas;
   $datas = [];
 }

 $propertyTypes = $parents;
// $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id'))
//  ->join('property_types', 'properties.property_type_id' , '=', 'property_types.id')
 
// ->where('property_types.parent',3)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(10);  
 $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id, users.id as user_id,users.first_name as username'))
          ->join('property_types',  'property_types.id', '=','properties.property_type_id')
          ->join('users',  'users.id', '=','properties.user_id')
          
          ->where('property_types.parent',3)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(9);
//  $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id, users.id as user_id,users.first_name as username'))
//           ->join('property_types',  'property_types.id', '=','properties.property_type_id')
//           ->join('users',  'users.id', '=','properties.user_id')
//           ->leftjoin('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
//           ->where('property_types.parent',3)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(8);
  // print_r($properties);
  // die;
//   dd($properties);
 $count =$properties->count();
 $meta=Meta::find(8);
 $title =$meta->meta_title;
 $description =$meta->meta_description;
 $keyword =$meta->meta_keyword;
 $featured_agencies=AgencyWebsite::featuredAgencies();
 $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");

 return view('frontwebsite.property.internalSearch',compact('properties','featured_agencies','locations','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}

public function flats()
{ 
   
  $name ="FOR Flats";
  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
        //$propertyTypes=PropertyType::where('status',self::ACTIVE)->where('parent',0)->get();
  $data=array();
  $propertyTypes=PropertyType::where('status',1)->get();
  $parents = [];
  foreach($propertyTypes as $par){
   if($par->parent == 0){
     $parents[] = $par;
   }
 }
 $datas = [];
 foreach($parents as $parent){
   foreach($propertyTypes as $types){
     if($types->parent == $parent->id){
       $datas[] = $types;
     }
   }
   $data[$parent->id] = $datas;
   $datas = [];
 }

 $propertyTypes = $parents;
// $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id'))
//  ->join('property_types', 'properties.property_type_id' , '=', 'property_types.id')
// ->where('properties.property_type_id',5)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->get;  
//  dd($properties); 
  $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id'))
          ->join('property_types', 'properties.property_type_id' , '=', 'property_types.id')
          ->where('properties.property_type_id',5)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(6);  
     
         
//  $properties =Property::select(DB::raw('properties.*,agency_websites.logo as agency_website_logo,agency_websites.url as agency_website_url, property_types.id as property_type_id, users.id as user_id,users.first_name as username'))
//           ->join('property_types',  'property_types.id', '=','properties.property_type_id')
//           ->join('users',  'users.id', '=','properties.user_id')
//           ->leftjoin('agency_websites','agency_websites.user_id','=' ,'properties.user_id')
//           ->where('property_types.parent',3)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(8);
  // print_r($properties);
  // die;
//   dd($properties);
 $count =$properties->count();
 $meta=Meta::find(8);
 $title =$meta->meta_title;
 $description =$meta->meta_description;
 $keyword =$meta->meta_keyword;
 $featured_agencies=AgencyWebsite::featuredAgencies();
 $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 10");

 return view('frontwebsite.property.internalSearch',compact('properties','featured_agencies','locations','propertyTypes' ,'data','cities','towns','phases' ,'blocks','count','name','title','description','keyword'));
}

public function plotsApi(Request $request)
{ 
 if($request->identifier){
  $properties =Property::select(DB::raw('properties.*, property_types.id as property_type_id, agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo,agency_websites.url as agency_websites_url'))
  ->join('users' ,'properties.user_id','users.id')
  ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
  ->join('property_types', 'properties.property_type_id' , '=', 'property_types.id')
  ->where('property_types.parent',3)->where('properties.status',self::ACTIVE)->where('properties.purpose',1)->orderBy('properties.id', 'DESC')->paginate(20);           return Response::json($properties);
}
return Response::json("Something Went Wrong");
}
function checkSession(Request $request){
    // $request->session()->pull("abcd.id");
        //  Session::forget("abcd");
    // dd(A)
    // $request->session()->flush();

        // $request->session()->regenerate();
        // dd(Auth::id());
  $session = Session::all();

  dd($session);
}

function getExtension($filename) {
  return substr(strrchr($filename, '.'), 1);
}

public function addwatermark()
{
 $images = array();
 $path = './images/property/user_property';
 $d = dir($path);
 while (false !== ($entry = $d->read())) {
  if(is_file($path.'/'.$entry)) {
    $ext = $this->getExtension($entry);
    if($ext=='jpg') {
      $images[] = $entry;
    }
  }
}
  //$d->close();
$imagess=$images;
dd($imagess);
foreach ($imagess as $imag) 
{

  $watermark =Image::make(base_path().'/images/'.'water-mark.png');
  $img =Image::make(base_path().'/images/property/user_property/'.$imag);
    //dd($imag);
    $resizePercentage = 70;//70% less then an actual image (play with this value)
    $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
    $watermark->resize($watermarkSize, null, function ($constraint) {
      $constraint->aspectRatio();
    });     
    $img->insert($watermark, 'center');
    $img->save(base_path() .'/images/property/user_property/'.$imag);
    
  }
}


public function frequentPropertyForm()
{

  $cities =$this->getAllCities();
  $towns=[];
  $phases=[];
  $blocks=[];
  $clients =Client::where('user_id',Auth::id())->get();

  $propertyTypes=PropertyType::where('status',1)->where('parent',0)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',1)->where('parent',$propertyType->id)->get();
 }
 $user=User::find(Auth::id());

 return view('dashboard.property.frequentAddProperty',compact('propertyTypes','data','cities','towns','blocks','phases','clients','user'));


}


public function addFrequentProperty(Request $request)
  {
    if(!empty($request->all()))
      {
        if(!empty($request->images))
        {
          foreach ($request->images as $image) 
          {
              if(filesize($image) > 1700000)
              { 
                  return redirect('dashboard/quick/add/Property')->with('message', 'image file size is not acceptable');
              }  
          }  
        }
        $title = $this->removeProceedingHash($request->title);
        $ignorelist =['_token','files','approved_by_id','address','images', 'flooring','number'];

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
        $property->client_id =Auth::id()  ;
        $property->user_id = Auth::id();
        foreach($request->all() as $key => $col)
        {
          if(!in_array($key, $ignorelist) && ! is_array($request->$key))
          {
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
        if(!empty($request->number))
            {
              $current_user =User::find(Auth::id());
              $current_user->mobile=$request->number;
              $current_user->update();
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
         $property->url =Property::createPropertyURL($request->purpose, $city, $town, $request->title);
        $property->to_marla = $this->convertToMarla($request->area_type, $request->area);

          $property->save();
         if($roleName == "admin")
        {
            $this->createIndexes($property->id);
        }

        return redirect('dashboard/quick/add/Property')->with('status', 'Request generated for publishing Project');
      }
      return redirect('dashboard/quick/add/Property')->with('message', 'Empty Request for data');
  }
public function quickEditProperty($id)
{
  $id=Crypt::decrypt($id);
  $propertyTypes=PropertyType::where('status',1)->where('parent',0)->get();
  $property=Property::find($id);
  $cities =$this->getAllCities();
  $towns = Location::getTownListObject($property->city_id);
  $phases=Location::getPhaseListObject($property->town_id);
  $blocks=Location::getBlockListObject($property->phase_id);   
  $clients =Client::where('user_id',$property->user_id)->get();
  $data=array();
  foreach($propertyTypes as $propertyType)
  {
   $data[$propertyType->id] =PropertyType::where('status',1)->where('parent',$propertyType->id)->get();
 }
 $user_client ="";
 if(!empty($property->client_id))
 {
  $user_client =Client::where('id',$property->client_id)->where('user_id',$property->user_id)->first();
}
    //  $user=Auth::user();
return view('dashboard.property.quickEditPropertyPage',compact('property','propertyTypes','data','cities','towns','blocks','phases','clients' ,'user_client','user'));
}
public function EditFrequentProperty(Request $request ,$id)
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
$property = Property::find($id);

$all=Block::where('id',$request->block_id)->with('phase.town.city')->get();
$property_no=$request->property_no;
$city =$all[0]->phase->town->city->name;
$town =$all[0]->phase->town->name;
$phase =$all[0]->phase->name;
$block =$all[0]->name;
$property_address =$property_no.', '.$block.', '.$phase.', '.$town.', '.$city;
$property->address = $property_address;
$property->title = $request->title;
$property->area=$request->area;
$property->city_id=$request->city_id;
$property->town_id=$request->town_id;
$property->phase_id=$request->phase_id;
$property->block_id=$request->block_id;
$property->description=$request->description;
$property->property_type_id=$request->property_type_id;
$property->price=$request->price;
$property->area_type=$request->area_type;
$property->latitude = $request->latitude;
$property->longitude = $request->longitude;
$property->purpose =$request->purpose;

if(!empty($request->images))
{
  $array = $request->images;
  $images = $this->upload_multiple_image_and_resize_save_in_folder_property($array, 'user_property');
  $img_string = implode(';', $images);
  if(!empty($property->gallery))
  {
    $property->gallery = $property->gallery.';'.$img_string;
  }else{
    $property->gallery = $img_string;
  }
} 
$property->url =Property::createPropertyURL($request->purpose, $city, $town, $request->title);
$property->to_marla = $this->convertToMarla($request->area_type, $request->area);
$property->update();
return back()->with('status','Updated');

}

public function EditFrequentPropertyAPI(Request $request)
{

  if(!empty($request->identifier))
  {
    $property = Property::find($request->id);
    $all=Block::where('id',$request->block_id)->with('phase.town.city')->get();

    $city =$all[0]->phase->town->city->name;
    $town =$all[0]->phase->town->name;
    $phase =$all[0]->phase->name;
    $block =$all[0]->name;
    $property_no=$request->property_no;

    $property_address =$property_no.', '.$block.', '.$phase.', '.$town.', '.$city;
    $property->address = $property_address;
    $property->title = $request->title;
    $property->area=$request->area;
    $property->city_id=$request->city_id;
    $property->town_id=$request->town_id;
    $property->phase_id=$request->phase_id;
    $property->block_id=$request->block_id;
    $property->description=$request->description;
    $property->property_type_id=$request->property_type_id;
    $property->price=$request->price;
    $property->area_type=$request->area_type;
    $property->latitude = $request->latitude;
    $property->longitude = $request->longitude;
    $property->bed = $request->bed;
    $property->bath = $request->bath;
    $property->purpose =$request->purpose;
    $property->property_no =$property_no;

    $user=User::find($property->user_id);
    $user->mobile =$request->number;
    $user->update();
    if(!empty($request->images))
    {           
      $array = $request->images; 
      $images = $this->upload_multiple_image($array, 'user_property');
      $img_string = implode(';', $images);
      if(!empty($property->gallery))
      {
        $property->gallery = $property->gallery.';'.$img_string;
      }else{
        $property->gallery = $img_string;
      }
    }
    $property->url =Property::createPropertyURL($request->purpose, $city, $town, $request->title);
    $property->to_marla = $this->convertToMarla($request->area_type, $request->area);
    $property->update();
    return Response::json('updated Property');
  }
  return Response::json('wrong  try');

}
public function getPropertyApi()
{
  $properties=Property::where('status',1)->orderBy('id','DESC')->limit(100)->get();
  return Response::json($properties);
}
public function getPropertyDetailAPI(Request $request)
{ 

 if(!empty($request->property_id))
 {  
         // $data=Property::find($request->property_id);
  $data = Property::
  select(DB::raw("properties.* , agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo ,agency_websites.url as agency_websites_url"))
  ->join('users' ,'properties.user_id','users.id')
  ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
  ->where("properties.id",$request->property_id)
  ->get();
  if(!empty($data[0]))
  {   
   $data[0]->description =strip_tags($data[0]->description);
   $user=User::find($data[0]->user_id);
   $data[0]->username = $user->first_name . $user->last_name;
   $data[0]->telephone = $user->telephone;
   $data[0]->mobile = $user->mobile;
   return Response::json($data[0]);
 }
       //    $data = DB::table('properties')
       //    ->join('agency_websites' ,'properties.user_id','=','agency_websites.user_id')
       //    ->where('properties.id',$request->property_id)
       //    ->get();
       // return Response::json($data);
}
$data=0;
return Response::json($data);
}
//   public function addFrequentPropertyAPI(Request $request)
//   {
//     // return Response::json($request->title);
//     foreach($request->images as $image)
//     {
//         $data = base64_decode($image);
//         file_put_contents('swf/image.png', $data);

//     }
//     if(!empty($request->identifier)) 
//     {
//         // if(!empty($request->images))
//         // {
//         //   foreach ($request->images as $image) 
//         //   {
//         //       if(filesize($image) > 716801)
//         //       { 
//         //           return redirect()->back()->with('message', 'image file size is not acceptable');
//         //       }  
//         //   }  
//         // }
//         $title = $this->removeProceedingHash($request->title);
//         $ignorelist =['_token','files','approved_by_id','address','images', 'flooring' ,'identifier'];
//         $columnNames=$this->getColumnNames();
//         $property = new Property;
//         $property_address="";
//         $all=Block::where('id',$request->block_id)->with('phase.town.city')->get();
//         $property_no=$request->property_no;
//         $city =$all[0]->phase->town->city->name;
//         $town =$all[0]->phase->town->name;
//         $phase =$all[0]->phase->name;
//         $block =$all[0]->name;
//         if(!empty(($property_no)))
//           $property_address =$property_no.', '.$block.', '.$phase.', '.$town.', '.$city;
//         else
//           $property_address =$block.', '.$phase.', '.$town.', '.$city;
//         $property->address = $property_address;
//         $property->client_id =$request->user_id;
//         $property->user_id = $request->user_id;
//         foreach($request->all() as $key => $col)
//         {
//           if(!in_array($key, $ignorelist) && ! is_array($request->$key))
//           {
//             $property->$key = $request->$key;
//           }    
//         }
//         $role =new User;
//         $roleName =$role->getRoleApi($request->user_id);
//         if($roleName == "admin")
//         {
//           $property->status =self::ACTIVE;
//         }
//         // if(!empty($request->images))
//         // { 
//         //     $array = $request->images;
//         //   $images = $this->upload_multiple_image_and_resize_save_in_folder_property($array, 'user_property');
//         //     if(!$images)
//         //     {
//         //       return back()->with('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
//         //     }
//         //     $img_string = implode(';', $images);
//         //     $property->gallery =$img_string;
//         // }
//           $property->frequent_add = 1;
//           $property->save();
//          if($roleName == "admin")
//         {
//             $this->createIndexes($property->id);
//             return Response::json('publishProject'); 
//           // return redirect()->back()->with('status', 'Request generated for publishing Project');
//         }
//             return Response::json('Request generated for publishing Project'); 

//     }
//     return Response::json('sorry wrong'); 
//       // return redirect()->back()->with('message', 'Empty Request for data');
//   }

public function addFrequentPropertyAPI(Request $request)
{ 

  if(!empty($request->identifier)) 
  {
    $title = $this->removeProceedingHash($request->title);
    $ignorelist =['_token','files','approved_by_id','address','images', 'flooring' ,'identifier','number'];
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
    $property->wanted_purpose =$request->wanted_purpose;

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
     $propertyobject = new Statistic();
     $propertyobject->updateStats('total_properties');
   }
   if(!empty($request->number))
   {
    $current_user =User::find($request->user_id);
    $current_user->mobile=$request->number;
    $current_user->update();
  }
  if(!empty($request->images))
  { 

    $array = $request->images;


    $images = $this->upload_multiple_image($array, 'user_property');

    if(!$images)
    {
      return Response::json('sorry no image'); 
    }
    $img_string = implode(';', $images);
    $property->gallery =$img_string;
  }
  $property->frequent_add = 1;
  $property->url =Property::createPropertyURL($request->purpose, $city, $town, $request->title);
  $property->to_marla = $this->convertToMarla($request->area_type, $request->area);


  $city = new City;
  $city->updateCityCount($request->city_id);


  $town = new Town;
  $town->updateTownCount($request->town_id);


  $block = new Block;
  $block->updateBlockCount($request->block_id);

  $phase = new Phase;
  $phase->updatePhaseCount($request->phase_id);



  $property->save();
  if($roleName == "admin")
  {
    $this->createIndexes($property->id);
    return Response::json(2);  
           // return redirect()->back()->with('status', 'Request generated for publishing Project');
  }
  return Response::json(1); 

}
return Response::json('sorry wrong'); 
      // return redirect()->back()->with('message', 'Empty Request for data');
}
public function upload_multiple_image($images_array,$folderName)
{    

            // return Response::json('sorry wrong'); 
  $original_image_size = ["width" => 1024, "height" => 768];
  $thumb_image_size = ["width" => 107, "height" => 80];

  $img_helper = new ImageHelper;

  $images = array();
  $i=0;
  foreach ($images_array as $img) {
    $data = base64_decode($img);
    $new_name = time() .$i++. '_' .'image.png'; 
    $path_image = 'swf/image.png';
    file_put_contents($path_image, $data);
    $type = pathinfo($path_image, PATHINFO_EXTENSION);
    file_get_contents($path_image);
    rename('swf/image.png', base_path() .$this->getPublicPath().'/images/property/user_property/'.'original_'.$new_name);
    $targetPath = base_path() .  $this->getPublicPath().'/images/property/user_property/';
    $path = $new_name;
    $path = 'original_'.$new_name;
    $img_helper->load($targetPath. $path);
    $img_helper->resize(1024,768);
    $img_helper->saveImage($targetPath.'original_'.$new_name); 

    $img_helper->load($targetPath. $path);
    $img_helper->resize(107,80);
    $img_helper->saveImage($targetPath.'thumb_'.$new_name); 
    $watermark =Image::make(base_path() .$this->getPublicPath().'/images/'.'water-mark.png');
    $original_image =Image::make(base_path() .$this->getPublicPath().'/images/property/user_property/'.'original_'.$new_name);
          $resizePercentage = 70;//70% less then an actual image (play with this value)
          $resizePercentage;
          $watermarkSize = round($original_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
          
          $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
          });
        //   return $watermark;
          $original_image->insert($watermark, 'center');
          $original_image->save(base_path() .  $this->getPublicPath().'/images/property/user_property/original_'.$new_name);
          
          $thumb_image =Image::make(base_path() .$this->getPublicPath().'/images/property/user_property/'.'thumb_'.$new_name);
          
          $watermarkSize = round($thumb_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
          $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
          });
          $thumb_image->insert($watermark, 'center');
          $thumb_image->save(base_path() .  $this->getPublicPath().'/images/property/user_property/thumb_'.$new_name);
          $images[] = $new_name;
        } 
        return $images;
      }
    // public function upload_multiple_image($images_array,$folderName)
    // {    


    //         // return Response::json('sorry wrong'); 
    //     $original_image_size = ["width" => 1024, "height" => 768];
    //     $thumb_image_size = ["width" => 107, "height" => 80];

    //     $img_helper = new ImageHelper;

    //     $images = array();
    //     $i=0;
    //     foreach ($images_array as $img) {

    //       $data = base64_decode($img);
    //        $new_name = time() .$i++. '_' .'image.png'; 

    //        $path_image = 'swf/image.png';

    //       file_put_contents($path_image, $data);

    //       $type = pathinfo($path_image, PATHINFO_EXTENSION);
    //       $data = file_get_contents($path_image);
    //     rename($path_image, base_path() .$this->getPublicPath().'/images/property/user_property/'.'original_'.$new_name);
    //       $targetPath = base_path() .  $this->getPublicPath().'/images/property/user_property/';
    //       $path = $new_name;

    //       $path = 'original_'.$new_name;

    //       $img_helper->load($targetPath. $path);
    //       $img_helper->resize(1024,768);
    //       $img_helper->saveImage($targetPath.'original_'.$new_name); 

    //       $img_helper->load($targetPath. $path);
    //       $img_helper->resize(107,80);
    //       $img_helper->saveImage($targetPath.'thumb_'.$new_name); 

    //       /**/
    //       $watermark =Image::make(base_path() .$this->getPublicPath().'/images/'.'water-mark.png');
    //       /**/

    //       $original_image =Image::make(base_path() .$this->getPublicPath().'/images/property/user_property/'.'original_'.$new_name);

    //       $resizePercentage = 70;//70% less then an actual image (play with this value)
    //       $watermarkSize = round($original_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
    //       $watermark->resize($watermarkSize, null, function ($constraint) {
    //           $constraint->aspectRatio();
    //       });
    //       $original_image->insert($watermark, 'center');
    //       $original_image->save(base_path() .  $this->getPublicPath().'/images/property/user_property/original_'.$new_name);

    //       $thumb_image =Image::make(base_path() .$this->getPublicPath().'/images/property/user_property/'.'thumb_'.$new_name);
    //       $watermarkSize = round($thumb_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
    //       $watermark->resize($watermarkSize, null, function ($constraint) {
    //           $constraint->aspectRatio();
    //       });
    //       $thumb_image->insert($watermark, 'center');
    //       $thumb_image->save(base_path() .  $this->getPublicPath().'/images/property/user_property/thumb_'.$new_name);
    //       $images[] = $new_name;
    //     //return "emd";
    //     }
    //     return $images;
    // }

      public function getPublicPath(){
        // Uploads must always land inside the web root. This used to key off
        // isLive(), which was true for any host other than 127.0.0.1, so both
        // "localhost" and production wrote outside public/ and 404ed.
        return "/public";
      }
      public function isLive(){
        return $_SERVER['SERVER_NAME'] == "127.0.0.1" ? false : true;
      }

      public function allLatestProperties(Request $request)
      {
        if(!empty($request->identifier))
        {
    //   $properties =Property::where('status' ,self::ACTIVE)->whereIn('purpose', [1, 2, 3])->orderBy('created_at','DESC')->paginate(20);
          $properties = Property::select(DB::raw("properties.* , agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo ,agency_websites.url as agency_websites_url"))
          ->join('users' ,'properties.user_id','users.id')
          ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
          ->where("properties.status",1)
          ->whereIn('properties.purpose', [1, 2, 3])
          ->whereIn('properties.property_type_id', [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24])
          ->orderBy('properties.created_at','DESC')
          ->paginate(20);
            // ->get();
          return Response::json($properties);
        }
        return Response::json("no lol sorry");
      }

      public function allBuy(Request $request)
      {
       if(!empty($request->identifier))
       {
        $properties = Property::
        select(DB::raw("properties.* , agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo,agency_websites.url as agency_websites_url"))
        ->join('users' ,'properties.user_id','users.id')
        ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
        ->where('properties.status' ,self::ACTIVE)
        ->where('properties.purpose', 1)
        ->orderBy('properties.created_at','DESC')
        ->paginate(20);
        return Response::json($properties);
      }
      return Response::json("no lol sorry");
    } 
    public function allRent(Request $request)
    {
     if(!empty($request->identifier))
     {
       $properties = Property::
       select(DB::raw("properties.* , agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo ,agency_websites.url as agency_websites_url"))
       ->join('users' ,'properties.user_id','users.id')
       ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
       ->where('properties.status' ,self::ACTIVE)
       ->where('properties.purpose', 2)
       ->orderBy('properties.created_at','DESC')
       ->paginate(20);
       return Response::json($properties);
     }
     return Response::json("no lol sorry");
   } 
   public function allWanted(Request $request)
   {
     if(!empty($request->identifier))
     {
       $properties = Property::
       select(DB::raw("properties.* , agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo,agency_websites.url as agency_websites_url"))
       ->join('users' ,'properties.user_id','users.id')
       ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
       ->where('properties.status' ,self::ACTIVE)
       ->where('properties.purpose', 3)
       ->orderBy('properties.created_at','DESC')
       ->paginate(20);
       return Response::json($properties);
     }
     return Response::json("no lol sorry");
   } 
   public function allProject(Request $request)
   {
     if(!empty($request->identifier))
     {
      $properties = Property::
      select(DB::raw("properties.* , agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo,agency_websites.url as agency_websites_url"))
      ->join('users' ,'properties.user_id','users.id')
      ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
      ->where('properties.status' ,self::ACTIVE)
      ->where('properties.purpose', 4)
      ->orderBy('properties.created_at','DESC')
      ->paginate(20);
      return Response::json($properties);
    }
    return Response::json("no lol sorry");
  }

  public function savePropertyMobileAPI(Request $request)
  {
    if(!empty($request->identifier))
    {
      echo "1";
      $property=SaveProperty::where('user_id',$request->user_id)->where('property_id',$request->property_id)->first();
      if(!empty($property))
      {
        echo "2";
        return Response::json(0);
      }
      else
      {
        echo"3";
        $property =new SaveProperty();
        $property->saveMobileApidata($request);
        return Response::json(1);

      }
    }
    return Response::json("No Data Found");
  }

  public function userSavedProperties(Request $request)
  {
    if(!empty($request->identifier))
    {  
      $property = DB::table('save_properties')
      ->select(DB::raw("save_properties.*, properties.* , agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo"))
      ->rightjoin('properties', 'save_properties.property_id', '=', 'properties.id')
      ->join('users' ,'users.id', 'properties.user_id')
      ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
      ->where('save_properties.user_id',$request->user_id)
      ->where('properties.status' ,self::ACTIVE)
      ->orderBy('properties.created_at','DESC')
      ->get();

        /*$property = DB::table('save_properties')
        ->rightjoin('properties', 'save_properties.property_id', '=', 'properties.id')
        ->where('save_properties.user_id',$request->user_id)
        ->get();*/
        return Response::json($property);
      }else
      {
       return Response::json(0);
     }
     return Response::json("sorry Wrong page");
   }

   public function updateUrl()
   {
            // $property->url =Property::createPropertyURL($request->purpose, $city, $town, $request->title);
    $properties=Property::all();
    foreach ($properties as $property){
      $property=Property::find($property->id);
      $city=City::find($property->city_id);

      if(empty($city))
      {
        dd($property->city_id);
      }
      else
      {
        $city=$city->name;
      }
      $town=Town::find($property->town_id)->name;

      $property->url =Property::createPropertyURL($property->purpose, $city, $town, $property->title);
      $property->update();
    }

  }

  public function updateMarla()
  {
    $properties =Property::all();
    foreach ($properties as $property) 
    {
          //dd($property);
      $pro=Property::find($property->id);
      $area=$pro->area;
      $area_type=$pro->area_type;
      $pro->to_marla=$this->convertToMarla($area_type, $area);
      $pro->update();
    }
  }
  private function convertToMarla($area_type, $area){
    switch ($area_type) {
      case 'Kanal':
      return $this->kanalToMarla($area);
      break;
      case 'Square Yards':
      return $this->sqyardToMarla($area);
      break;
      case 'Square Meters':
      return $this->sqmeterToMarla($area);
      break;
      case 'Acre':
      return $this->acreToMarla($area);
      break;
      case 'Square Feet':
      return $this->sqfeetToMarla($area);
      break;
      default:
      return $area;
      break;
    }
  }

  /*to marla conversions*/
  public function kanalToMarla($area){
    return $area * 20;
  }
  public function sqmeterToMarla($area){
    return $area / 25.2929;
  }
  public function sqyardToMarla($area){
    return $area / 30.2501;
  }
  public function sqfeetToMarla($area){
    return $area / 272.251;
  }
  public function acreToMarla($area){
    return $area * 160;
  }

       /////Api For My property //////
  public function my_properties(Request $request)
  {
    if(!empty($request->identifier))
    {
        //   $properties=Property::where('user_id',$request->user_id)->whereIn('status', [0,1,2])->get();

     $properties = Property::
     select(DB::raw("properties.* , agency_websites.id as agency_websites_id, agency_websites.agency_name as agency_websites_name, agency_websites.logo as agency_websites_logo"))
     ->join('users' ,'properties.user_id','users.id')
     ->leftjoin('agency_websites','agency_websites.user_id' ,'users.id')
     ->whereIn('properties.status', [0, 1, 2])
     ->where("properties.user_id",$request->user_id)
           // ->whereIn('properties.purpose', [1, 2, 3])
           // ->orderBy('properties.created_at','DESC')
     ->get();
     return Response::json($properties);
   }
   return Response::json(0);
 }
 public function deletePropertyMobileApi(Request $request)
 {
  if(!empty($request->identifier))
  {
    $property=Property::find($request->id);
    $property->status=self::TRASH;
    $property->update();
    return Response::json('Property Removed');
  }
  return Response::json('Wrong Approach');
}
public function unsavePropertyMobileApi(Request $request)
{
 if(!empty($request->identifier))
 {
  $property=SaveProperty::where('user_id',$request->user_id)->where('property_id',$request->property_id)->first();
  $property->delete();
  return Response::json('Property Unsaved');
}
return Response::json('Wrong Approach');
}

     /////End mnobile API /////


     ////////Revevant Property data /////

public function getRelevantProperties($property)
{
  if(!empty($property)){
    $purpose = $property->purpose;
    $type = $property->property_type_id;
    $variant_price = $this->calculateVariance($purpose, $property->price);
    $city = $property->city_id;
    $town = $property->town_id;

    return Property::where("purpose", $purpose)
    ->where("status", 1)
    ->where("property_type_id", $type)
    ->where("city_id", $city)
    ->where("town_id", $town)
    ->whereBetween("price", [($property->price-$variant_price),($property->price+$variant_price)])
    ->limit(10)
    ->get();

  }else{
    return false;
  }
}

private function calculateVariance($purpose, $amount)
{
  if(!empty($purpose)){
    if($purpose == 1){
      return $this->getPercentAmount($amount, 10);
    }
    else if($purpose == 2 || $purpose == 3){
      return $this->getPercentAmount($amount, 25);
    }
  }
}

private function getPercentAmount($amount, $percent)
{
  if(!empty($amount) && !empty($percent)){
    return ($amount*$percent)/100;
  }
}
public function ApiEditProperty(Request $request)
{

 if(!empty($request->identifier))
 {
  $property =Property::
  select('properties.*','users.telephone')
  ->join('users' ,'users.id' ,'=','properties.user_id')
  ->where('properties.id',$request->property_id)
  ->first();
  if(!empty($property))
  {
           // $cities = $this->getAllCities();
           // $towns=Location::getTownListObject($property->city_id);
           // $phases =Location::getPhaseListObject($property->town_id);
           // $blocks =Location::getBlockListObject($property->phase_id);
           // return Response::json(['property'=> $property , 'cities'=>$cities ,'towns'=>$towns ,'phases' => $phases ,'blocks' => $blocks]);
   return Response::json( $property);

           // return Response::json([$property , $cities ,$towns ,$phases , $blocks]);
 }
 return Response::json('No Property Found');

}
return Response::json('Wrong Approach');

}

public function ApiDeletePropertyImage(Request $request){
  if(!empty($request->identifier)){
    $property = Property::find($request->id);
    $images = explode(';',$property->gallery);
    if(in_array($request->img_name, $images)){
      foreach ($images as $key => $value) {
        if($value == $request->img_name){
          unset($images[$key]);
        }
      }
      if(count($images) == 1){
        $images = implode("",$images);
      }else{
        $images = implode(';',$images);
      }
      $property->gallery = $images;
      $property->update();
      File::delete("images/property/user_property/original_" . $request->img_name);
      File::delete("images/property/user_property/thumb_" . $request->img_name);
      return Response::json('Removed');                
    }
    return Response::json('Removed from list!');
  }
}


public function create_view_property_list()
{
  Schema::create('user_property_view', function($table)
  {
    $table->increments('id');
    $table->integer('property_id')->nullable();
    $table->integer('user_id')->nullable();
    $table->timestamps();
  });
}
public function find_string_in_array ($arr, $string) {

  return array_filter($arr, function($value) use ($string) {
    return strpos($value, $string) !== false;
  });

}
public function images_resize()
{
  $images = array();
  $path = './images/property/user_property';
  $d = dir($path);
  while (false !== ($entry = $d->read())) {
    if(is_file($path.'/'.$entry)) {
      $ext = $this->getExtension($entry);
      if($ext=='jpg') {
        $images[] = $entry;
      }
    }
  }
       //$d->close();
  $imagess= $this->find_string_in_array ($images, 'original_');
        //dd($imagess);
  foreach ($imagess as $imag)
  {
    $img_helper = new ImageHelper;
    $img =Image::make(base_path().$this->getPublicPath().'/images/property/user_property/'.$imag);
    $targetPath = base_path() .  $this->getPublicPath().'/images/property/user_property';
    $targetPath2 = base_path() .  $this->getPublicPath().'/images/property/medium_property_images';
    $img_helper->load($targetPath.'/'. $imag);
    $img_helper->resize(260,195);
    $img_helper->saveImage($targetPath2.'/'.$imag);

  }
}


// public function upload_multiple_image($images_array,$folderName)
//     {    
//         $original_image_size = ["width" => 1024, "height" => 768];
//         $thumb_image_size = ["width" => 107, "height" => 80];
//         $img_helper = new ImageHelper;
//         $images = array();
//         $i=0;
//         foreach ($images_array as $img) {   
//           $data = base64_decode($img);
//            $new_name = time() .$i++. '_' .'image.png'; 
//            $path_image = 'swf/image.png';
//           file_put_contents($path_image, $data);
//           $type = pathinfo($path_image, PATHINFO_EXTENSION);
//              file_get_contents($path_image);

//             rename('swf/image.png', base_path() .$this->getPublicPath().'/images/property/test123/'.'original_'.$new_name);
//           // $data->move(base_path() .$this->getPublicPath().'/images/property/user_property/', 'original_'.$new_name);
//             die();
//         //   $targetPath = base_path() .  $this->getPublicPath().'/images/property/user_property/';
//           $path = $new_name;

//           $path = 'original_'.$new_name;


//         //   $img_helper->load($targetPath. $path);
//         //   $img_helper->resize(1024,768);
//         //   $img_helper->saveImage($targetPath.'original_'.$new_name); 

//         //   $img_helper->load($targetPath. $path);
//         //   $img_helper->resize(107,80);
//         //   $img_helper->saveImage($targetPath.'thumb_'.$new_name); 

//           /**/
//         //   return $img;
//         //   $img->move(base_path() .'/images/property/user_property/','original_'.$new_name);.
//                   $img->move(base_path() .'/images/property/test/','original_'.$new_name);
//                return "as";
//         //   $watermark =Image::make(base_path() .$this->getPublicPath().'/images/'.'water-mark.png');

//           /**/
//         //   $original_image =Image::make(base_path() .$this->getPublicPath().'/images/property/user_property/'.'original_'.$new_name);

//          $original_image =Image::make(base_path() .$this->getPublicPath().'/images/property/test/'.'original_'.$new_name);

//         die();

//           $resizePercentage = 70;//70% less then an actual image (play with this value)
//           return $resizePercentage;
//           $watermarkSize = round($original_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
//           return $watermarkSize;
//           $watermark->resize($watermarkSize, null, function ($constraint) {
//               $constraint->aspectRatio();
//           });
//           return $watermark;
//           $original_image->insert($watermark, 'center');
//           $original_image->save(base_path() .  $this->getPublicPath().'/images/property/user_property/original_'.$new_name);

//           $thumb_image =Image::make(base_path() .$this->getPublicPath().'/images/property/user_property/'.'original_'.$new_name);
//           $watermarkSize = round($thumb_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
//           $watermark->resize($watermarkSize, null, function ($constraint) {
//               $constraint->aspectRatio();
//           });
//           $thumb_image->insert($watermark, 'center');
//           $thumb_image->save(base_path() .  $this->getPublicPath().'/images/property/user_property/thumb_'.$new_name);
//           $images[] = $new_name;
//         //return "emd";
//         }
//         return $images;
//     }


}
ini_set('upload_max_filesize', '512M');
ini_set('post_max_size', '512M');
ini_set('max_execution_time', '720');