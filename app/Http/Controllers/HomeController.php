<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Property;
use App\Blog;
use App\User;
use App\City;
use App\Town;
use App\Events\SaveProperty;
use App\Events\ContactUs;
use App\PropertyType;
use Event;
use App\PaidProperty;
use DB;
use App\Phase;
use App\Statistic;
use App\Block;
use App\PHPMailer\PHPMailer;
use App\PHPMailer\SMTP;
use App\PHPMailer\Exception;
use View;
use \Cache;
use Config;
use App\Favorite;
use Session;
use App\AgencyWebsite;
use Storage;
use Intervention\Image\Facades\Image;
use App\ImageHelper;
use App\Meta;
use Auth;
use App\Search_location;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function search_home_ajax(Request $request)
    {
       
        $lists =Search_location::where('address', $request->search)->orWhere('address', 'like', '%' .$request->search. '%')->where('city_id', $request->city_id)->get();
        
        return $lists->toArray();
    }
    public function favorite()
    {
        $properties=array();
        $data= Favorite::where('session_id',Session::getId())->get();
        foreach ($data as $value) {
            $properties[] =Property::where('id',$value->property_id)->first(); 
        }   
        return view('frontwebsite.favorite.index',compact('properties'));
    }
    public function testfunction()
    {
        if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
            //Send request and receive json data by latitude and longitude
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';
            $json = @file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;
            if($status=="OK"){
                //Get address from json data
                $location = $data->results[0]->formatted_address;
            }else{
                $location =  '';
            }
            //Print address
            return Response::json(['location' =>$location]);
        }
    }
    //Beta Home Page Function
   public function landingPage()
    {    
    $width = 1200;    
    if(isset($_GET['width'])){
         $width =  $_GET['width'];
    }
        // $mobile ='923204322797';
        // $message ='hello';
        // $this->phoneapi($mobile,$message)
        $data =array();
        // $featured_agencies=AgencyWebsite::featuredAgencies();
        $cities = $this->getAllCities();
        $bundle = $this->getAllPropertyTypes();
        $propertyTypes = $bundle["propertyTypes"];
        $data = $bundle["data"];
        $towns="";
        $properties=DB::select("SELECT * FROM properties WHERE id IN (21828,21830,21831,21832) ORDER BY FIELD(id, 21828,21830,21831,21832 )ASC");
        $blogs=Blog::where('status',1)->orderBy('id','DESC')->limit(6)->get();
         //$blogs =Blog::whereIn('id', [624, 626, 625, 628,627,623])->get();
        // $projects =Property::where('purpose' ,4)->whereIn('id', [474, 473, 492, 493])->where('status', 1)->orderBy('id','DESC')->get();
        // $count = count($projects);
        $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 5");
        $all_city_top_towns=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name ,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id In (1,2,3) group by town_id HAVING COUNT(town_city_id) >= 12 ORDER BY town_city_id ,number DESC LIMIT 200");
        // dd($all_city_top_towns);
       $townData=array();
        $count_lahore =0;
        $count_karachi =0;
        $count_isl =0;
        foreach ($all_city_top_towns as $town) 
        {   
            if($town->town_city_id == 1)
            {
                if($count_lahore < 5)
                {
                    $townData['lahore'][] =$town;
                    $count_lahore++;
                }
            } 
            if($town->town_city_id == 2)
            {
                if($count_karachi < 5)
                {
                    $townData['karachi'][] =$town;
                    $count_karachi++;
                }
            } 
            if($town->town_city_id == 3)
            {
                if($count_isl < 5)
                {
                    $townData['islamabad'][] =$town;
                    $count_isl++;
                }
            } 
        }
         $all_city_top_plots=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id IN(1,2,3) AND properties.property_type_id IN(25,26,27,28,29,30,31) group by town_id HAVING COUNT(town_city_id) >= 2  ORDER BY town_city_id ASC ,number DESC LIMIT 200");

        $plotData=array();
        $count_lahore_plots =0;
        $count_karachi_plots =0;
        $count_isl_plots =0;
        foreach ($all_city_top_plots as $plot) 
        {   
            if($plot->town_city_id == 1)
            {
                if($count_lahore_plots < 5)
                {
                    $plotData['lahore'][] =$plot;
                    $count_lahore_plots++;
                }
            } 
            if($plot->town_city_id == 2)
            {
                if($count_karachi_plots < 5)
                {
                    $plotData['karachi'][] =$plot;
                    $count_karachi_plots++;
                }
            } 
            if($plot->town_city_id == 3)
            {
                if($count_isl_plots < 5)
                {
                    $plotData['islamabad'][] =$plot;
                    $count_isl_plots++;
                }
            } 
        }
        // dd($all_city_top_plots);
        $all_city_top_rent=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id IN(1,2,3) AND properties.property_type_id IN(4,5,6,7,8,9,10,11,12) group by town_id HAVING COUNT(town_city_id) >= 8  ORDER BY town_city_id ASC ,number DESC LIMIT 200");
        
        $rentData=array();
        $count_lahore_rents =0;
        $count_karachi_rents =0;
        $count_isl_rents =0;
        foreach ($all_city_top_rent as $rent) 
        {   
            if($rent->town_city_id == 1)
            {
                if($count_lahore_rents < 5)
                {
                    $rentData['lahore'][] =$rent;
                    $count_lahore_rents++;
                }
            } 
            if($rent->town_city_id == 2)
            {
                if($count_karachi_rents < 5)
                {
                    $rentData['karachi'][] =$rent;
                    $count_karachi_rents++;
                }
            } 
            if($rent->town_city_id == 3)
            {   
                
                if($count_isl_rents < 5)
                {
                    $rentData['islamabad'][] =$rent;
                    $count_isl_rents++;
                }
                
            } 
        }       
      
        $meta =Meta::find(1);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        
        $class_name ='sticky-navbar';
    
       $cities_agent = $this->getAllCities();
        return view('layouts.index',compact('properties','blogs','cities_agent','cities','propertyTypes','data','locations','towns','townData','plotData','rentData','title','description','keyword','class_name','width'));

          /*Featured houses */

        // $karachi_towns=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name ,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 2 group by town_id order by number DESC LIMIT 5");
        // $isl_towns=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name ,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 3 group by town_id order by number DESC LIMIT 5");
        // $lahore_towns=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name ,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 1 group by town_id order by number DESC LIMIT 5");
        
        /*Featured Plots */
        
        // $lahore_towns_plot=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 1 AND properties.property_type_id IN(25,26,27,28,29,30,31) group by town_id order by number DESC LIMIT 5");
        // $karachi_towns_plot=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 2 AND properties.property_type_id IN(25,26,27,28,29,30,31)  group by town_id order by number DESC LIMIT 5");
        // $isl_towns_plot=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 3 AND properties.property_type_id IN(25,26,27,28,29,30,31) group by town_id order by number DESC LIMIT 5");

         /*Featured Rents */
        // $lahore_towns_rent=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 1 AND properties.property_type_id IN(4,5,6,7,8,9,10,11,12) group by town_id order by number DESC LIMIT 5");
        // $isl_towns_rent=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 2 AND properties.property_type_id IN(4,5,6,7,8,9,10,11,12) group by town_id order by number DESC LIMIT 5");
        // $karachi_towns_rent=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 3 AND properties.property_type_id IN(4,5,6,7,8,9,10,11,12) group by town_id order by number DESC LIMIT 5");

    }

    public function landingPage_old()
    {    
        // $mobile ='923204322797';
        // $message ='hello';
        // $this->phoneapi($mobile,$message)
        $data =array();
        $featured_agencies=AgencyWebsite::featuredAgencies();
        $cities = $this->getAllCities();
        $bundle = $this->getAllPropertyTypes();
        $propertyTypes = $bundle["propertyTypes"];
        $data = $bundle["data"];
        $towns="";
        $properties=DB::select("SELECT * FROM properties WHERE id IN (164,159,157,526) ORDER BY FIELD(id, 164,159,157,526 )ASC");
        $blogs=Blog::where('status',1)->orderBy('id','DESC')->limit(4)->get();
        $projects =Property::where('purpose' ,4)->whereIn('id', [474, 473, 492, 493])->where('status', 1)->orderBy('id','DESC')->get();
        $count = count($projects);
        $locations=DB::select("SELECT DISTINCT COUNT(city_id) as number, cities.name FROM properties inner join cities ON cities.id = properties.city_id group by city_id order by number DESC LIMIT 5");
        $all_city_top_towns=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name ,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id In (1,2,3) group by town_id HAVING COUNT(town_city_id) >= 12 ORDER BY town_city_id ,number DESC LIMIT 35");
    //  dd($all_city_top_towns);
        $townData=array();
        $count_lahore =0;
        $count_karachi =0;
        $count_isl =0;
        foreach ($all_city_top_towns as $town) 
        {   
            if($town->town_city_id == 1)
            {
                if($count_lahore < 5)
                {
                    $townData['lahore'][] =$town;
                    $count_lahore++;
                }
            } 
            if($town->town_city_id == 2)
            {
                if($count_karachi < 5)
                {
                    $townData['karachi'][] =$town;
                    $count_karachi++;
                }
            } 
            if($town->town_city_id == 3)
            {
                if($count_isl < 5)
                {
                    $townData['islamabad'][] =$town;
                    $count_isl++;
                }
            } 
        }
         $all_city_top_plots=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id IN(1,2,3) AND properties.property_type_id IN(25,26,27,28,29,30,31) group by town_id HAVING COUNT(town_city_id) >= 2  ORDER BY town_city_id ASC ,number DESC LIMIT 28");

        $plotData=array();
        $count_lahore_plots =0;
        $count_karachi_plots =0;
        $count_isl_plots =0;
        foreach ($all_city_top_plots as $plot) 
        {   
            if($plot->town_city_id == 1)
            {
                if($count_lahore_plots < 5)
                {
                    $plotData['lahore'][] =$plot;
                    $count_lahore_plots++;
                }
            } 
            if($plot->town_city_id == 2)
            {
                if($count_karachi_plots < 5)
                {
                    $plotData['karachi'][] =$plot;
                    $count_karachi_plots++;
                }
            } 
            if($plot->town_city_id == 3)
            {
                if($count_isl_plots < 5)
                {
                    $plotData['islamabad'][] =$plot;
                    $count_isl_plots++;
                }
            } 
        }
        $all_city_top_rent=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id IN(1,2,3) AND properties.property_type_id IN(4,5,6,7,8,9,10,11,12) group by town_id HAVING COUNT(town_city_id) >= 8  ORDER BY town_city_id ASC ,number DESC LIMIT 35");

        $rentData=array();
        $count_lahore_rents =0;
        $count_karachi_rents =0;
        $count_isl_rents =0;
        foreach ($all_city_top_plots as $rent) 
        {   
            if($rent->town_city_id == 1)
            {
                if($count_lahore_rents < 5)
                {
                    $rentData['lahore'][] =$rent;
                    $count_lahore_rents++;
                }
            } 
            if($rent->town_city_id == 2)
            {
                if($count_karachi_rents < 5)
                {
                    $rentData['karachi'][] =$rent;
                    $count_karachi_rents++;
                }
            } 
            if($rent->town_city_id == 3)
            {
                if($count_isl_rents < 5)
                {
                    $rentData['islamabad'][] =$rent;
                    $count_isl_rents++;
                }
            } 
        }       
        
        $featured_properties = [];
        $featured_count = 0;
        $meta =Meta::find(1);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        // return view('index',compact('properties','blogs','cities','propertyTypes','data','projects','count','locations','featured_properties','featured_count','towns','featured_agencies','townData','plotData','rentData','title','description','keyword'));
        return view('layouts.masterIndexNew',compact('properties','blogs','cities','propertyTypes','data','projects','count','locations','featured_properties','featured_count','towns','featured_agencies','townData','plotData','rentData','title','description','keyword'));

          /*Featured houses */

        // $karachi_towns=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name ,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 2 group by town_id order by number DESC LIMIT 5");
        // $isl_towns=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name ,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 3 group by town_id order by number DESC LIMIT 5");
        // $lahore_towns=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name ,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 1 group by town_id order by number DESC LIMIT 5");
        
        /*Featured Plots */
        
        // $lahore_towns_plot=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 1 AND properties.property_type_id IN(25,26,27,28,29,30,31) group by town_id order by number DESC LIMIT 5");
        // $karachi_towns_plot=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 2 AND properties.property_type_id IN(25,26,27,28,29,30,31)  group by town_id order by number DESC LIMIT 5");
        // $isl_towns_plot=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 3 AND properties.property_type_id IN(25,26,27,28,29,30,31) group by town_id order by number DESC LIMIT 5");

         /*Featured Rents */
        // $lahore_towns_rent=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 1 AND properties.property_type_id IN(4,5,6,7,8,9,10,11,12) group by town_id order by number DESC LIMIT 5");
        // $isl_towns_rent=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 2 AND properties.property_type_id IN(4,5,6,7,8,9,10,11,12) group by town_id order by number DESC LIMIT 5");
        // $karachi_towns_rent=DB::select("SELECT DISTINCT COUNT(town_id) as number, towns.name,properties.property_type_id,towns.city_id as town_city_id, towns.id as townid FROM properties inner join towns ON towns.id = properties.town_id  WHERE towns.city_id = 3 AND properties.property_type_id IN(4,5,6,7,8,9,10,11,12) group by town_id order by number DESC LIMIT 5");

    }




    public function emailform(Request $request)
    {

        $property = Property::find($request->property);
        $email =$request->email;
        Event::fire(new SaveProperty($property ,$email));  
    }

    public function contactus()
    {
        $meta=Meta::find(2);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('pages.contactUs',compact('title','description','keyword'));
    }
     public function contactdetail(Request $request)
    {
    
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['subject']=$request->subject;
        $data['email']=$request->email;
        $data['comment']=$request->comment;
         
        $view = View::make('email.contactUs',compact('data'));
        $contents = (string) $view;
        $contents = $view->render();

         $mail =new PHPMailer;
         try {
            $mail->isSMTP(); 
            $mail->CharSet = "utf-8"; 
            $mail->SMTPAuth = true;  
            $mail->SMTPSecure = "TLS"; 
            $mail->Host = "vm818.tmdcloud.com";
            $mail->Port = 587; 
            $mail->Username = "support@rightdeed.com";
            $mail->Password = "F;i_P!ibbW]y";
            $mail->setFrom("support@rightdeed.com", "RightDeed");
            $mail->Subject = "contact form";
            $mail->MsgHTML($contents);
            $mail->addAddress("support@rightdeed.com", "Rightdeed Mail Subscription");
            $mail->send();
        
          } 
          catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
        return back(); 
    }
       public function tempuploader(){
        return view('tempuploader');
    }
    public function tempuploaderprocess(Request $request){
        // return view('tempuploader');
        $images = array();
        foreach ($request->images as $img) {
            $pic_name = $img->getClientOriginalName();
            $new_name = time() . '.' .$pic_name;
            $img->move(base_path() . '/uploads', $new_name);
            $images[]=$new_name;
        }
        return $images;
    }
     public function agent_signup()
    {   
        if(Auth::check())
        {
            return redirect()->route('home');
        }
        $cities = City::all();
        return view('agency.agencySignUp',compact('cities'));
    }
    
    public function session()
    {
        session(['showPopUp' => true]);
        return Response::json('true');
    }
    public function sendPropertyDataToSupport(){

        $current_date = date('Y-m-d');          // >=
        $properties = Property::where('properties.created_at', '>=', $current_date)
        ->select(DB::raw("properties.*, users.id as user_id, users.first_name, users.last_name, users.email, users.mobile, users.telephone"))
        ->join('users', 'properties.user_id', '=', 'users.id')
        ->where('properties.status', 1)
        ->whereIn('properties.purpose', [1,2,3])
        ->orderBy("properties.id", "DESC")
        ->limit(10)
        ->get();
        
        
        //dd($properties->toArray());
        if(!empty($properties->toArray())){
            $options = 
            array(
                'http'=>array(
                    'method'=>"POST",
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'content'=>http_build_query($properties->toArray())
            ));
            
            $context = stream_context_create($options);
            $result = file_get_contents('http://property.supportportal.website/recieveDataFromRightdeed.php',false,$context);
            
            var_dump($result);    
        }
    }
    
    public function contactDetaiLAPI(Request $request)
    {
        
     if(!empty($request->identifier))
     {

        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['subject']=$request->subject;
        $data['email']=$request->email;
        $data['comment']=$request->comment;
        
        $view = View::make('email.contactUs',compact('data'));
        $contents = (string) $view;
        $contents = $view->render();

         $mail =new PHPMailer;
       try {
            $mail->isSMTP(); 
            $mail->CharSet = "utf-8"; 
            $mail->SMTPAuth = true;  
            $mail->SMTPSecure = "TLS"; 
            $mail->Host = "vm818.tmdcloud.com";
            $mail->Port = 587; 
            $mail->Username = "support@rightdeed.com";
            $mail->Password = "F;i_P!ibbW]y";
            $mail->setFrom("support@rightdeed.com", "RightDeed");
            $mail->Subject = "contact form";
            $mail->MsgHTML($contents);
            $mail->addAddress("support@rightdeed.com", "Rightdeed Mail Subscription");
            $mail->send();
        
           
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
         return Response::json(1);
     }
     return Response::json('sorry no data');
    }
    
     public function tell_friend(Request $request)
    {   
        $url =$request->url;
        $email =$request->email;
        $id =$request->id;


        $view = View::make('email.tellFriend',compact('url','id'));
        $contents = (string) $view;
        $contents = $view->render();

         $mail =new PHPMailer;
        try {
            $mail->isSMTP(); 
            $mail->CharSet = "utf-8"; 
            $mail->SMTPAuth = true;  
            $mail->SMTPSecure = "SSL"; 
            $mail->Host = "vm818.tmdcloud.com";
            $mail->Port = 587; 
            $mail->Username = "support@rightdeed.com";
            $mail->Password = "F;i_P!ibbW]y";
            $mail->setFrom("subscribe@rightdeed.com", "RightDeed");
            $mail->Subject = "Tell a Friend";
            $mail->MsgHTML($contents);
            $mail->addAddress($email, "Rightdeed Mail Subscription");
            if(!$mail->send()) 
                 {  
                    return back()->with('error','Something Went Wrong'); 
                 } 
           else 
            {
                    return back()->with('state','Email Send'); 
                 
            }
             } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
        return back(); 
    }
    public function latestListing()
    {
        $properties=DB::select("SELECT * FROM properties WHERE id IN (18242,18215,18211,18318) ORDER BY FIELD(id, 18242,18215,18211,18318 )ASC");
        return view('home.latest_properties',compact('properties'));
    }

    public function searchdata_me()
    {

        $datas=DB::select("SELECT cities.id as city_id,towns.id as town_id,phases.id as phase_id ,blocks.id as block_id, cities.name as city_name,towns.name as town_name,phases.name as phase_name,blocks.name as block_name FROM `cities` INNER JOIN towns ON cities.id = towns.city_id
            INNER JOIN phases ON towns.id = phases.town_id
            INNER JOIN blocks ON phases.id  = blocks.phase_id
            Where cities.id = '122'");
                
          dd($datas);
                foreach($datas as $data)
                {
        
                    $Search_location=new Search_location();
                    $Search_location->address = $data->town_name.''.$data->phase_name.''.$data->block_name;
                    $Search_location->city_id = $data->city_id;
                    $Search_location->town_id = $data->town_id;
                    $Search_location->phase_id = $data->phase_id;
                    $Search_location->block_id = $data->block_id;
                    $Search_location->save();
                }
                echo "asdasd";    
    }
}   
