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
use App\AgencyWebsite;
use App\AgencyOffice;
use App\AgencyStaff;
use App\Property;
use App\UserInterest;
use App\PropertyView;
use DB;
use App\Statistic;


class DashboardController extends Controller
{
    private $upload = 'image/logo';
    private $uploadprofile ="image/profile";
    protected $vendor = ['name','telephone','location','website' ,'description' ,'log'];
    public function dashboard()
    {
        $current = time();
        $previous = $current - 2580000;
        $current = date("Y-m-d", $current);
        $previous = date("Y-m-d", $previous);


        if(Auth::user()->role_id == 1){
            // for admin
            $property_views = DB::table('property_views')->select(DB::raw("SUM(view_count) as views, created_at"))
            ->whereBetween(DB::raw("DATE(created_at)"), [$previous, $current])
            ->groupBy(DB::raw("DATE(created_at)"))
            ->get();

            $property_monthly_views = DB::table('property_views')->select(DB::raw("SUM(view_count) as views, created_at"))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();

            $statuses = $this->getAllStatuses(true);

            $no_of_new_website_request= DB::table('agency_websites')->select(DB::raw("Count(id) as new_website_request"))
            ->where('status',0)
            ->where('verification_documents','!=','')
            ->get()[0];


            $unread_msg= DB::table('message_centers')->select(DB::raw("Count(id) as unread_msg"))
            ->where('read_status',0)
            ->where('user_id', Auth::id())
            ->get()[0];


             $daily_signups = DB::table('users')->select(DB::raw("count(created_at) as count, created_at"))
              ->whereYear('created_at', date('Y'))
              ->whereMonth('created_at', date('m'))
              ->groupBy(DB::raw("DAY(created_at)"))
              ->get();

               $outHouse_properties = DB::table('properties')->select(DB::raw("count(isinhouse) as count, created_at"))
              ->whereYear('created_at', date('Y'))
              ->whereMonth('created_at', date('m'))
              ->where('isinhouse' ,1)
              ->groupBy(DB::raw("DAY(created_at)"))
              ->get();
            //   dd($outHouse_properties)
            $properties =Property::where('status' ,0)->whereIn('purpose', [1, 2, 3])->orderBy('created_at','DESC')->take(10)->get();

            $no_of_searches=null;
            $no_of_user_property_views=null;

            $today_signup =User::whereDate('created_at',date("Y/m/d"))->count();
            $no_of_total_architects = $this->getAllArchitects();
            $no_of_total_vendor = $this->getAllVendors();
        }else{
            //for user
            $property_views = DB::table('property_views')->select(DB::raw("SUM(view_count) as views, created_at"))

            ->where("user_id", Auth::id())
            ->groupBy(DB::raw("DATE(created_at)"))
            ->get();

            $property_monthly_views = DB::table('property_views')->select(DB::raw("SUM(view_count) as views, created_at"))
            ->where("user_id", Auth::id())
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();


            $statuses = $this->getAllStatuses();
            if(!empty($statuses))
                $statuses = $statuses[0];
            else
                $statuses = (object)array("active" => 0, "pending" => 0, "all_properties" => 0, "trash" => 0);


            $no_of_new_website_request= null;

            $no_of_active_website = null;

            $today_signup =null;


            $unread_msg= DB::table('message_centers')->select(DB::raw("Count(id) as unread_msg"))
            ->where('read_status',0)
            ->where('user_id', Auth::id())
            ->get()[0];

            $no_of_total_featured_properties = DB::table('paid_properties')->select(DB::raw("Count(id) as total_featured_properties"))
            ->where('status',1)
            ->where('user_id', Auth::id())
            ->get()[0];

            $properties =Property::where('status' ,0)->whereIn('purpose', [1, 2, 3])
            ->where('user_id', Auth::id())
            ->orderBy('created_at','DESC')->take(10)->get();



            $no_of_user_property_views= DB::table('properties')->select(DB::raw("Count(id) as all_user_property_views"))
             ->where('user_id', Auth::id())
            ->where('status',1)
            ->get()[0];

            $no_of_searches= DB::table('search_trackings')->select(DB::raw("Count(id) as total_search"))
             ->where('user_id', Auth::id())
            ->where('status',1)
            ->get()[0];

            $daily_signups = null;
            $no_of_total_architects = null;
            $no_of_total_vendor = null;
            $outHouse_properties=null;
        }


        $no_of_total_themes= DB::table('themes')->select(DB::raw("Count(id) as total_themes"))
        ->where('status',1)
        ->get()[0];
         $statictics = Statistic::first();
         $no_of_active_website= null;
         $no_of_total_featured_properties= null;
         // dd($unread_msg);
        return view('layouts.masterpanel',compact('property_views','statuses',
            'no_of_total_architects','no_of_total_vendor','no_of_total_themes','no_of_new_website_request'
            ,'no_of_active_website','unread_msg','no_of_total_featured_properties',
            'property_monthly_views','properties','no_of_searches','no_of_user_property_views',
            'today_signup','statictics','daily_signups','outHouse_properties'));
    }
    public function getAllArchitects(){
        return UserCharacterType::select(DB::raw("COUNT(user_character_types.id) as no_of_total_architects"))
        ->join("user_character_details", "user_character_types.id", "=", "user_character_details.user_character_type_id")
        ->where("user_character_types.character_type_id", 3)
        ->where("user_character_types.status",1)
        ->get()[0]->no_of_total_architects;
    }

    public function getAllVendors(){
        return UserCharacterType::select(DB::raw("COUNT(user_character_types.id) as no_of_total_vendors"))
        ->join("user_character_details", "user_character_types.id", "=", "user_character_details.user_character_type_id")
        ->where("user_character_types.character_type_id", 2)
        ->where("user_character_types.status",1)
        ->get()[0]->no_of_total_vendors;
    }
    public function getAllStatuses($admin = false){
        if($admin){
            return DB::select("SELECT DISTINCT (SELECT count(status) FROM properties WHERE status = 1) as active, (SELECT count(status) FROM properties WHERE status = 0) as pending, (SELECT count(status) FROM properties WHERE status < 3) as all_properties ,(SELECT count(status) FROM properties WHERE status = 3) as trash  FROM properties")[0];
        }else{
            return DB::select("SELECT DISTINCT (SELECT count(status) FROM properties WHERE status = 1 And user_id ='".Auth::id()."' And purpose In(1,2,3)) as active, (SELECT count(status) FROM properties WHERE status = 0 And user_id ='".Auth::id()."' And purpose In(1,2,3)) as pending, (SELECT count(status) FROM properties WHERE status < 3 And user_id ='".Auth::id()."' And purpose In(1,2,3)) as all_properties ,(SELECT count(status) FROM properties WHERE status = 3 And user_id ='".Auth::id()."' And purpose In(1,2,3)) as trash  FROM properties WHERE user_id = ".Auth::id());
        }
    }

    public function update_password_all()
    {
        echo "lol";
        exit;
            DB::table('users')
            ->where('role_id' ,2)->update(array('password' => bcrypt('rightdeed123')));

        echo "done";
    }

    public function count_property()
    {
         echo "lol";
         exit;
        /*make sure that we have 1. backup 2. created columns in table. 3. created mechanism to increment count when new property is approved. */

        DB::statement("UPDATE users T1 
            JOIN ( SELECT id ,user_id,Count(id) as property_count
            FROM properties
            WHERE purpose IN (1, 2, 3) AND
            status = 1
            GROUP BY user_id
            ) T2 ON T1.id=T2.user_id
            SET T1.property_count=T2.property_count");

        DB::statement("UPDATE users T1 
            JOIN ( SELECT id ,user_id,Count(id) as property_count
            FROM properties
            WHERE purpose IN (4) AND
            status = 1
            GROUP BY user_id
            ) T2 ON T1.id=T2.user_id
            SET T1.project_count=T2.property_count");

        DB::statement("UPDATE users T1 
            JOIN ( SELECT id ,user_id,Count(id) as property_count
            FROM properties
            WHERE property_type_id IN (25,26,27,28,29,30,31) AND
            status = 1
            GROUP BY user_id
            ) T2 ON T1.id=T2.user_id
            SET T1.plot_count=T2.property_count");




    }

    public function upload_view()
    {
        return view('upload');
    }

    public function upload_image_now(Request $request)
    {
        $image =$this->upload_single_image_and_resize_save_in_folder($request->file,"testfolder",200,200);
        echo "save";
    }

}
