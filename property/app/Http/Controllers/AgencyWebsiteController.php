<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input;
use App\AgencyWebsite;
use Intervention\Image\Facades\Image;
use Auth;
// use Response;
use Illuminate\Http\Response;
use \Crypt;
use File;
use App\AgencyStaff;
use Redirect;
use App\AgencyOffice;
use App\WebsiteImage;
use App\Theme;
use App\Property;
use App\City;
use DB;
use App\Http\Requests\WebsiteSettingPostValidation;
use App\Http\Requests\StoreAgencyOfficePost;



class AgencyWebsiteController extends Controller
{
    const ACTIVE = 1;
    const PENDING = 0;
    const INACTIVE = 2;
    const TRASH = 3;
    protected $input_allowed_types = ["jpeg"];

    public function addAgencyOverview($id)
    {

        $id =Crypt::decrypt($id);
        $website =AgencyWebsite::with('Images')->where('user_id', $id)->first();
        // dd($website);
        if($website != null)
        {
        return view('agency.add_overview',compact('website'));
            
        }
         return view('frontwebsite.errorPages.error404');
    }
    public function addAgencyOverviewSave(Request $request)
    {
      
        $action = Input::input('action', 'none');
        
        // dd($request->all());

        $website =AgencyWebsite::where('user_id', Auth::id())->with('Images')->first();
        if(!empty($website))
        {              
            $website->agency_name = $request->agency_name;
            $website->about_us = $request->about_us;
            $website->ceo_message = $request->ceo_message;
            $website->address = $request->address;
            $website->email = $request->email;


            $width=300;
            $height=300;
            if(isset($request->logo) && !empty($request->logo))
            {
                $array = $request->logo;
                $image= $this->upload_single_image_and_resize_save_in_folder($array, 'logo',$width,$height);
                $website->logo =$image;
            }
            if(empty($website->logo))
                $website->logo ="anything-logo.jpg";
            if(isset($request->ceo_image) && !empty($request->ceo_image))
            {
                $array = $request->ceo_image;
                $image= $this->upload_single_image_and_resize_save_in_folder($array, 'ceo',$width,$height);
                $website->ceo_image =$image;
            }
            if(empty($website->ceo_image))
            $website->ceo_image ="1506921731.user-avatar.jpg";
            
            if(isset($request->new_banners) && !empty($request->new_banners))
            {
               if(isset($request->new_banners['caption_title']))
                {
                    $count = count($request->new_banners['caption_title']);
                    for ($i=0; $i < $count; $i++) 
                    { 
                        $images =new WebsiteImage();
                        $images->title =$request->new_banners['caption_title'][$i];
                        $images->caption =$request->new_banners['caption'][$i];
                        $array =$request->new_banners[$i];
                        $image = $this->upload_single_banner_image_and_resize_save_in_folder($array, 'banners',$width,$height);
                        $images->image =$image;
                        $images->agency_website_id =$website->id;
                        $images->save();  
                    }
                }
            }
        //   if(!isset($request->new_banners) && !isset($request->banners))
        //     {
        //         $images =new WebsiteImage();
        //         $images->title ="Dummy Banners";
        //         $images->caption ="Dummy Caption";
        //         $images->image ="banner.jpg";
        //         $images->agency_website_id =$website->id;
        //         $images->active =1;
        //         $images->save();  
        //     }
             if(isset($request->banners) && !empty($request->banners))
            {
               
                $count = count($request->banners['caption_title']);
                foreach($request->banners['caption_title'] as $key => $value)
                { 
                    $images = WebsiteImage::find($key);
                    $images->title =$request->banners['caption_title'][$key];
                    $images->caption =$request->banners['caption'][$key];
                    // $array =$request->banners[$i];
                    $images->update();  
                }
            }
              
            
            if(isset($request->verification_documents) && !empty($request->verification_documents))
            {  

                
                $array = $request->verification_documents;
                $verification_documents= $this->upload_multiple_image_save_in_folder_document($array,'documents');

                $verification_documents = implode(';', $verification_documents);
                if(!empty($website->verification_documents))
                {
                    $website->verification_documents = $website->verification_documents.';'.$verification_documents;
                }
                else
                {
                    $website->verification_documents = $verification_documents;
                }             
            }  
            $website->url = strtolower(implode('-',explode(' ',trim($request->agency_name)))).'-'.Auth::id();
            if(isset($request->contact_number) && !empty($request->contact_number))
            {  
                $website->contact_number =$request->contact_number;
            }
            $website->update();
            $id = $website->id;
            $id =Crypt::encrypt($id);

             if($action=='website')
            {
                return back();
            }
            else if($action=='continue')
            {   
                    return Redirect::to("/agency/create-staff/$id");
            }

        }
        else
        {
            return back();
        }
    }
    public function viewStaffpage($id)
    {

        $id =Crypt::decrypt($id);
        $staffs =AgencyStaff::where('agency_website_id',$id)->where('status' ,1)->get();
       
        return view('agency.addStaff',compact('staffs','id'));
    }

    public function addStaff(Request $request ,$id)
    {     

        $addStaff =new AgencyStaff();
        $addStaff->saveData($request ,$id);
        $action = Input::input('action', 'none');
        $id =Crypt::encrypt($id);
        if($action=='save')
        {
            // return Redirect::to('foo/bar')->with('key', 'value');
            return Redirect::to("dashboard/agency/office/$id");

            // return Redirect("/agency/office/$id");
        }
        else if($action=='more')
        {   
            // dd('assssd');
            return Redirect::to("/agency/create-staff/$id");

             // return Redirect("/agency/create-staff/$id");
        }
    }
    public function viewOfficePage($id)
    {

        $id =Crypt::decrypt($id);
        $offices =AgencyOffice::where('agency_website_id',$id)->where('status' ,1)->get();
        $id =Crypt::encrypt($id);
        $cities = City::all();

         return view('agency.contact',compact('id','offices','cities'));
    }

    public function addOffice(Request $request,$id)
    {       
      
        $action = Input::input('action', 'none');
        $addOffice =new AgencyOffice();
        $addOffice->saveData($request ,$id);
        if($action=='more')
        {
            return Redirect::intended("dashboard/agency/office/$id");
            // return Redirect::to("/agency/office/$id");

            // return Redirect("/agency/office/$id");
        }
        else if($action=='save')
        {
           return Redirect ('/dashboard/themes');
        }
        
    }
   public function demoTheme($id, $name)
    {
        // dd('1');
        $theme_name=Theme::find($id)->name;
        $slug_name=str_slug($theme_name);
        // dd($name);
        if($slug_name == $name)
        {   
            
            return view('unzips/'.$theme_name.'/demo',compact('theme_name'));
        }
        return redirect('/page-not-found');
    }
    public function theme()
    {         

        if(Auth::user()->role_id != 1)
        {
        $website_theme_id =AgencyWebsite::where('user_id',Auth::id())->first()->theme_id;
        $activated_theme =Theme::find($website_theme_id);
        $themes =Theme::where('id','!=',$website_theme_id)->where('status',1)->paginate(6);
        }
        else
        {   $activated_theme =0;
            $themes=Theme::where('status',1)->paginate(6);
        }
        return view('agency.theme',compact('themes','activated_theme'));
    }
    public function createWebsite($status)
    {
        $website =new AgencyWebsite();
        $website->createNewWebsite($status);
        return Response::json(['success'=>  "updated"]);
    }

    public function deleteImage($id)
    {

       $website =WebsiteImage::find($id);
        File::delete("images/banners/" . $website->image);
        File::delete("images/banners/thumb_" .$website->image);
        $website->delete();
        return Response::json(['success' => 'removed']);
    }
    public function deleteOffice($id)
    {
        $agency_office =AgencyOffice::find($id);
        $agency_office->status=self::TRASH;
        $agency_office->update();
        return Response::json(['success' => 'success']);

    }
    public function deletestaff($id)
    {
        $agency_staff =AgencyStaff::find($id);
        $agency_staff->status=self::TRASH;
        $agency_staff->update();
        return Response::json(['success' => 'success']);
    }

    public function viewEditStaff($id)
    {  
        $id =Crypt::decrypt($id);
       $staff=AgencyStaff::find($id);
        return view('agency.edit.staff',compact('staff'));
    }

    public function editStaff(Request $request ,$id)
    {   
        $agency_staff =new AgencyStaff();
        $staff =$agency_staff->editStaff($request ,$id);
        $id =Crypt::encrypt($staff->agency_website_id);
        return Redirect("/dashboard/agency/staff/$id");
    }

    public function viewEditOffice($id)
    {
       $id =Crypt::decrypt($id);
       $office=AgencyOffice::find($id);
       $cities=City::all();
       return view('agency.edit.office',compact('office','cities'));
    }  
    public function editOffice(StoreAgencyOfficePost $request ,$id)
    {   
    	
        $agency_office =new AgencyOffice();
        $office =$agency_office->editOffice($request ,$id);
        $id =Crypt::encrypt($office->agency_website_id);
        return Redirect("/dashboard/agency/office/$id");
    }
    public function websiteUrl($url)
    {       

        $agencyWebsite =AgencyWebsite::with('Images')->where('url',$url)->first();
        // dd($agencyWebsite);
        if(!empty($agencyWebsite))
        {
            $theme =Theme::where('id' ,$agencyWebsite->theme_id)->first();
           //$staffs=AgencyStaff::where('agency_website_id', $agencyWebsite->id)->where('status',1)->get();
            //$staffs = DB::table('agency_staffs')->select(DB::raw("agency_staffs.*, contact_number as mobile_no, contact_number ,contact_number as telephone"))->where('agency_website_id', $agencyWebsite->id)->where('status',1)->get();
             $staffs = DB::table('agency_staffs')
              ->select(DB::raw(
              "agency_staffs.*, contact_number as mobile_no, contact_number , CASE WHEN contact_number IS NOT NULL THEN '' ELSE '' END as telephone")
            )->where('agency_website_id', $agencyWebsite->id)
              ->where('status', 1)->get();
            
            $offices=AgencyOffice::where('agency_website_id', $agencyWebsite->id)->where('status',1)->get();
//             dd($offices);
            $properties =Property::where('user_id' ,$agencyWebsite->user_id)->where('status',1)->get();
            $cities=City::all();
            

            return view('unzips/'.$theme->name.'.index',compact('theme','staffs','offices','agencyWebsite','properties','cities'));
        }
        else
        {
            // return Redirect('/page-not-found');
            // return new Response(view('frontwebsite.errorPages.error404'));
            abort(404);
        }
            
    }

    public function changeTheme($id)
    {
        
        $website_theme=AgencyWebsite::where('user_id',Auth::id())->first();
        $website_theme->theme_id =$id;
        $website_theme->update();
        return Response::json(['success' => "good"]);

    }
    public function check_image($id)
    {
        $image_active =WebsiteImage::find($id);
        $total =WebsiteImage::where('agency_website_id', $image_active->agency_website_id)->get();
        foreach($total as $image)
        {
            $image =WebsiteImage::find($image->id);
            $image->active= 0;
            $image->update();
        }
        $image_active->active =1;
        $image_active->update();
        return Response::json(['success' => "activated"]);



    }

    public function websiteRequestList()
    {
        $activation_requests =AgencyWebsite::where('verification_documents','!=',null)->where('status', 1)->where('verified',null)->paginate(20);
        return view('dashboard.website.activationRequestList',compact('activation_requests'));
    }

    public function activateWebsite($id)
    {

        $for_activation_website =AgencyWebsite::find($id);

        $for_activation_website->url =strtolower(implode('-',explode(' ',trim($for_activation_website->agency_name))));
        $for_activation_website->verified =1;
        $for_activation_website->update();

        return Response::json(['success' => $for_activation_website->url , 'id' => $for_activation_website->id]);

    }

    public function websiteActivationList()
    {
        
        $activation_requests =AgencyWebsite::where('verification_documents','!=',null)->where('status', 1)->where('verified',1)->paginate(20);
        return view('dashboard.website.activationActiveList',compact('activation_requests'));

    }

    public function deactivateWebsite($id)
    {
        $for_deactivate_website =AgencyWebsite::find($id);

        $for_deactivate_website->url =strtolower(implode('-',explode(' ',trim($for_deactivate_website->agency_name)))).'-'.$for_deactivate_website->user_id;
        $for_deactivate_website->verified =2;

        $for_deactivate_website->update();

        return Response::json(['success' => $for_deactivate_website->url , 'id' => $for_deactivate_website->id]);
    }

    public function websitedeActivationList()
    {
        $activation_requests =AgencyWebsite::where('verification_documents','!=',null)->where('status', 1)->where('verified',2)->get();
        return view('dashboard.website.deActiveList',compact('activation_requests'));

    }

    public function searchActivatedWebsite(Request $request)
    {
         $website = AgencyWebsite::query();    
        if(Input::filled('id'))
        {
            $website->where('id', Input::input('id'));
        
        }
        if(Input::filled('agency_name'))
        {
       
            $website->where('agency_name', 'like', '%' . Input::input('agency_name') .'%');
        }
        if(Input::filled('email'))
        {

           $website->where('email', 'like', '%' . Input::input('email') .'%');

        }
        if(Input::filled('contact_number'))
        {
            $website->where('contact_number', 'like', '%' . Input::input('contact_number') .'%');
        }  
        $activation_requests=$website->where('verified',1)->get();

        return view('dashboard.website.activationActiveList',compact('activation_requests'));

       
    }

     public function searchdeactivatedWebsite(Request $request)
    {
         $website = AgencyWebsite::query();    
        if(Input::filled('id'))
        {
            $website->where('id', Input::input('id'));
        
        }
        if(Input::filled('agency_name'))
        {
       
            $website->where('agency_name', 'like', '%' . Input::input('agency_name') .'%');
        }
        if(Input::filled('email'))
        {

           $website->where('email', 'like', '%' . Input::input('email') .'%');

        }
        if(Input::filled('contact_number'))
        {
            $website->where('contact_number', 'like', '%' . Input::input('contact_number') .'%');
        }  
        $activation_requests=$website->where('verified',2)->get();

        return view('dashboard.website.activationActiveList',compact('activation_requests'));
    }

    public function agencySearchDirectory()
    {
        $user_character_details='';

        $cities = City::all();
        return view('agency.agencysearchDirectory', compact('cities','user_character_details'));
    }
    public function agencySearchResult(Request $request)
    { 
        
        $name=$request->name;
        $id=$request->id;
        $city_id=$request->city_id;
        
        $cities = City::all();

        $user_characters= DB::table('agency_websites')
            ->join('agency_offices', 'agency_offices.agency_website_id', '=', 'agency_websites.id')
            ->join('cities', 'cities.id', '=', 'agency_offices.city_id');
            if(!empty($name))
            {
                $user_characters->where('agency_websites.agency_name', 'like', '%'.$name.'%');
            }
            if(!empty($id))
            {
                $user_characters->where('agency_websites.id',$id );
            }
            if(!empty($city_id))
            {
                $user_characters->where('cities.id',$city_id );
            }
            
            
             $user_characters->select('agency_websites.agency_name as agency_name','agency_websites.contact_number as contact_number','agency_websites.url as website','agency_offices.address as address', 'agency_websites.id as agency_websites_id', 'cities.name as city_name');
             $user_character_details = $user_characters->get();

           
        return view('agency.agencysearchDirectory', compact('cities','user_character_details'));
    }

    public function deleteTheme($id)
    {

        $theme = Theme::find($id);
        //File::deleteDirectory(public_path("unzips/$theme->name"));
        //File::deleteDirectory(base_path("/resources/views/unzips/$theme->name"));
        $theme->status =0;
        
        $theme->update();
        return back();
        
    }

    public function mainAgencyList()
    {
        // dd('asd')
        //$website_themes=AgencyWebsite::where('status',1)->get();
        $website_themes =AgencyWebsite::select(DB::raw('DISTINCT agency_offices.id as office_id , agency_websites.id, agency_websites.contact_number, agency_websites. address, agency_websites.logo, agency_websites.agency_name , agency_websites.url ,  agency_websites.verified'))
        ->join('agency_staffs','agency_websites.id' ,'=',  'agency_staffs.agency_website_id')
        ->join('agency_offices','agency_websites.id' ,'=',  'agency_offices.agency_website_id')
        ->where('agency_websites.status', 1)
        ->orderBy('agency_websites.id', 'desc')
        ->groupBy('agency_websites.id')->paginate(20);

        return view('agency.mainAgencyList',compact('website_themes'));

    }
    public function websites()
    {

        $all_websites = AgencyWebsite::where('status',1)->get();
        $websites =array();
        foreach ($all_websites as $website) {
            $office =AgencyOffice::where('agency_website_id', $website->id)->where('status', 1)->get();

            $staff =AgencyStaff::where('agency_website_id', $website->id)->where('status', 1)->get();
            if(!$office->isEmpty() && !$staff->isEmpty())
            {
                $websites[] =$website;
            }
        
        }
          
        return view('dashboard.website.listingForAdmin',compact('websites'));
    }


 public function agenciesSearch(Request $request)
    {        
        //   $website_themes= AgencyWebsite::where('agency_name', 'like', '%' . $request->name .'%')->paginate(20);
         $website_themes= AgencyWebsite::select(DB::raw('DISTINCT agency_offices.id as office_id , agency_websites.id, agency_websites.contact_number, agency_websites. address, agency_websites.logo, agency_websites.agency_name , agency_websites.url ,  agency_websites.verified'))
        ->join('agency_staffs','agency_websites.id' ,'=',  'agency_staffs.agency_website_id')
        ->join('agency_offices','agency_websites.id' ,'=',  'agency_offices.agency_website_id')
        ->where('agency_websites.status', 1)
        ->orderBy('agency_websites.id', 'desc')
        ->where('agency_name', 'like', '%' . $request->name .'%')->paginate(20);
          
           return view('agency.mainAgencyList',compact('website_themes'));
    }





    // public function addStaff(){
    //     dd('add staff');
    //     return view('agency.add_staff');
    // }
    // public function addStaffSave(Request $request){
    //     dd("add staff save");
    // }
    // public function addOffice(){
    //     dd('add office');
    //     return view('agency.add_office');
    // }
    // public function addOfficeSave(Request $request){
    //     dd("add staff save");
    // }
    // public function editOverview($id){

    // }
    // public function updateOverview(Request $request){

    // }
    // public function editStaff($id){

    // }
    // public function updateStaff(Request $request){

    // }
    // public function editOffice($id){

    // }
    // public function updateOffice(Request $request){

    // }

//     public function upload_logo($img,$folderName)
//     {
//         $original_image_size = ["width" => 300, "height" => 300];
// //        $thumb_image_size = ["width" => 107, "height" => 80];
// //            dd($folderName)
//          $images = "";

//             $pic_name = $img->getClientOriginalName();
//             $new_name = time() . '.' .$pic_name;
//             $original_image=Image::make($img)->fit($original_image_size["width"], $original_image_size["height"]);
//            // $thumb_image=Image::make($img)->fit($thumb_image_size["width"], $thumb_image_size["height"]);
//             // $im
//             $img->move(base_path() .  $this->getPublicPath().'/images/property/'.$folderName, $new_name);
//             $original_image->save(base_path() .  $this->getPublicPath().'/images/'.$folderName.'/original_'.$new_name);
//            // $thumb_image->save(base_path() .  $this->getPublicPath().'/images/property/'.$folderName.'/thumb_'.$new_name);
//             $images=$new_name;

//         return $images;
//     }


    public function bulkActivate(){

        $websites =AgencyWebsite::where('status', 1)->where('verified',null)->get();

        foreach ($websites as $value) {
            // $for_activation_website =AgencyWebsite::find($value->id);
            $value->url =strtolower(implode('-',explode(' ',trim($value->agency_name))));
            $value->verified =1;
            $value->update();            
        }
        echo "123";
    }
    
    public function addbanner()
    {
        $agency_id=array();
        $data=array();
        $websites=AgencyWebsite::all();
            foreach($websites as $website)
            {
                $data[$website->id] =WebsiteImage::where('agency_website_id',$website->id)->first(); 
                if(empty($data[$website->id]))
                {
                     $agency_id[] =$website->id;
                }
            }

            foreach($agency_id as $id)
            {
                $images=new WebsiteImage;
                $images->image="banner.jpg";
                $images->title="default banner";
                $images->caption="default caption";
                $images->active=1;
                $images->agency_website_id=$id;
                $images->save();
            }
            return "success";
    }
    
    // Edit api for all agent along with counts .
    public function ApiGetAgents(Request $request){
        
         if(!empty($request->identifier)){
            $website_themes =AgencyWebsite::select(DB::raw('DISTINCT agency_offices.id, agency_websites.id,agency_websites.contact_number, agency_websites. address,agency_websites.user_id as agency_user_id, agency_websites.logo, agency_websites.agency_name , agency_websites.url ,agency_websites.ceo_message , agency_offices.lat as latitude ,agency_staffs.fb_link as agency_fb ,agency_staffs.google_plus as agency_google , agency_offices.lng as longitude, agency_websites.about_us as description, users.property_count ,users.project_count,users.plot_count'))
            ->join('agency_staffs','agency_websites.id' ,'=',  'agency_staffs.agency_website_id')
            ->join('agency_offices','agency_websites.id' ,'=','agency_offices.agency_website_id')
            ->join('users','agency_websites.user_id','=','users.id')
            ->where('agency_websites.status', 1)
            ->groupBy('agency_websites.id')->paginate(20);
            
            return $website_themes;
        }
        return Response::json("Access Denied!");
    }
//   public function ApiGetAgents(Request $request){
        
//         if(!empty($request->identifier)){
//             $website_themes =AgencyWebsite::select(DB::raw('DISTINCT agency_offices.id, agency_websites.id,agency_websites.contact_number, agency_websites. address, agency_websites.logo, agency_websites.agency_name , agency_websites.url ,agency_websites.ceo_message , agency_offices.lat as latitude ,agency_staffs.fb_link as agency_fb ,agency_staffs.google_plus as agency_google , agency_offices.lng as longitude, agency_websites.about_us as description','properties.purpose as purpose'))
//             ->join('agency_staffs','agency_websites.id' ,'=',  'agency_staffs.agency_website_id')
//             ->join('agency_offices','agency_websites.id' ,'=','agency_offices.agency_website_id')
//             // ->join('properties','website_user_id' ,'=' ,'properties.user_id')
//             ->where('agency_websites.status', 1)
//             ->groupBy('agency_websites.id')->paginate(20);
            
//             return Response::json($website_themes);
//         }
//         return Response::json("Access Denied!");
//     }
    
     public function ApiGetSingleAgents(Request $request){ 
        if(!empty($request->identifier)){
           $website_themes['data'] =AgencyWebsite::select(DB::raw('DISTINCT agency_offices.id, agency_websites.id,agency_websites.contact_number, agency_websites. address,agency_websites.user_id as agency_user_id, agency_websites.logo, agency_websites.agency_name , agency_websites.url ,agency_websites.ceo_message , agency_offices.lat as latitude ,agency_staffs.fb_link as agency_fb ,agency_staffs.google_plus as agency_google , agency_offices.lng as longitude, agency_websites.about_us as description, users.property_count ,users.project_count,users.plot_count'))
            ->join('agency_staffs','agency_websites.id' ,'=',  'agency_staffs.agency_website_id')
            ->join('agency_offices','agency_websites.id' ,'=','agency_offices.agency_website_id')
            ->join('users','agency_websites.user_id','=','users.id')
            ->where('agency_websites.id', $request->id)->first();
            $website_themes['property'] =Property::where('user_id',$website_themes['data']->agency_user_id)->get();
            
            return $website_themes;
            // return Response::json($website_themes);
        }
        return Response::json("Access Denied!");
    }

    public function agentWebsiteUrl(Request $request)
    {
        if(!empty($request->identifier))
        {
            $agency_websites=new AgencyWebsite();
            $data =$agency_websites->getWebsiteName($request->id);
            return Response::json($data);
        }
    }


    

}
