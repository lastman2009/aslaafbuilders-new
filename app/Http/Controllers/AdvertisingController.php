<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaidProperty;
use App\Package;
use App\AdCategory;
use App\AdPages;
use App\AdPositions;
use App\DiscountOffer;
use App\User;
use App\Account;
use Auth;
use DB;
use Response;
use App\StaticAd;
class AdvertisingController extends Controller
{
    public function userActiveAdvertisinglist()
    {
    	$paid_properties = array();
    	$paid = PaidProperty::where('user_id' , Auth::id())->get();
    	foreach ($paid as $p) {
    		$paid_properties[] = $p->property_id; 
    	}
    	$allNonFeaturedProperties= DB::table('properties')
            ->join('users', 'properties.user_id', '=', 'users.id')
            ->where(['properties.status' => 1])
            ->where(['properties.user_id' => Auth::id()])
            ->whereNotIn('properties.id', $paid_properties)
            ->select('properties.id as p_id','properties.address as p_address','properties.title as title','properties.created_at as p_created_at', 'users.email as email', 'users.mobile as mobile')
            ->paginate(10);
            
    	return view('advertising.userAdvertisingList',compact('allNonFeaturedProperties'));
    }

    public function listPackagesForAd($property_id)
    {
    	 $packages = Package::where('status',1)->where('adcategory_id', 3)->get();
         // dd($packages);
    	 $property_id=$property_id;
       
        return view('advertising.advertisingPageList',compact('packages','property_id'));
    }

    public function getPackagedetail($id)
    {
    	$packages = Package::where('status',1)->where('id',$id)->first();
    	$page = AdPages::where('status',1)->where('id', $packages->adpage_id)->first();
    	$category = AdCategory::where('status',1)->where('id', $packages->adcategory_id)->first();
    	$position = AdPositions::where('status',1)->where('id', $packages->adposition_id)->first();
    	$bundle["package_name"] = $packages->name;
    	$bundle["page_name"] = $page->name;
    	$bundle["category_name"] = $category->name;
    	$bundle["position_name"] = $position->name;
    	$bundle["duration"] = $packages->duration;
    	$bundle["price"] = $packages->price;

    	// dd($packages);
    	return Response::json(['success'=>$bundle]);
     	// return response()->json($packages);
    }
    public function savePaidProperty(Request $request)
    {
    	$paidProperty = new PaidProperty;

        $paidProperty->user_id = Auth::id();
        $paidProperty->property_id = $request->property_id;
        $paidProperty->status = 0;
        $paidProperty->price = $request->price;
        $paidProperty->package_id = $request->package_id;
        $paidProperty->featured_ad = 1;
        $paidProperty->save();
        return redirect('/dashboard/user/featured/advertising');
    }
   
   public function userfeaturedPendinglist()
     {
    	 
    	 $allPendingFeaturedProperties= DB::table('properties')
	         ->join('users', 'properties.user_id', '=', 'users.id')
	         ->join('paid_properties','properties.id', '=', 'paid_properties.property_id')
	         ->join('packages','paid_properties.package_id', '=', 'packages.id')
	         ->where(['properties.status' => 1])
             ->where('paid_properties.status', 0)
             ->where('paid_properties.user_id', Auth::id())
             ->select('properties.id as p_id','properties.address as p_address','properties.title as title','properties.created_at as p_created_at', 'users.email as email', 'users.mobile as mobile'
             	, 'packages.name as pkg_name')
             ->paginate(10);
    	return view('advertising.userFeaturedPropertyList',compact('allPendingFeaturedProperties'));
    }
    public function userfeaturedRejectlist()
     {
     
    	 $allRejectedFeaturedProperties= DB::table('properties')
	         ->join('users', 'properties.user_id', '=', 'users.id')
	         ->join('paid_properties','properties.id', '=', 'paid_properties.property_id')
	         ->join('packages','paid_properties.package_id', '=', 'packages.id')
	         ->where(['properties.status' => 1])
             ->where('paid_properties.status', 2)
             ->where('paid_properties.user_id', Auth::id())
             ->select('properties.id as p_id','properties.address as p_address','properties.title as title','properties.created_at as p_created_at', 'users.email as email', 'users.mobile as mobile'
             	, 'packages.name as pkg_name','paid_properties.reject_reason as reject_reason')
             ->paginate(10);
    	return view('advertising.userFeaturedRejectedPropertyList',compact('allRejectedFeaturedProperties'));
    	//return view('advertising.userFeaturedRejectedPropertyList');
    }
    public function userfeaturedApprovelist()
     {
    
    	 $allApprovedFeaturedProperties= DB::table('properties')
	         ->join('users', 'properties.user_id', '=', 'users.id')
	         ->join('paid_properties','properties.id', '=', 'paid_properties.property_id')
	         ->join('packages','paid_properties.package_id', '=', 'packages.id')
	         ->where(['properties.status' => 1])
             ->where('paid_properties.status', 1)
             ->where('paid_properties.user_id', Auth::id())
             ->select('properties.id as p_id','properties.address as p_address','properties.title as title','properties.created_at as p_created_at', 'users.email as email', 'users.mobile as mobile'
             	, 'packages.name as pkg_name')
             ->paginate(10);
    	return view('advertising.userFeaturedActivePropertyList',compact('allApprovedFeaturedProperties'));
    	//return view('advertising.userFeaturedActivePropertyList');
    }

     public function adminPendingFeaturedList()
     {
    	 
    	 $adminPendingFeaturedProperties= DB::table('properties')
	         ->join('users', 'properties.user_id', '=', 'users.id')
	         ->join('paid_properties','properties.id', '=', 'paid_properties.property_id')
	         ->join('packages','paid_properties.package_id', '=', 'packages.id')
	         ->where(['properties.status' => 1])
             ->where('paid_properties.status', 0)
             ->select('properties.id as p_id','properties.address as p_address','properties.title as title','properties.created_at as p_created_at', 'users.email as email', 'users.mobile as mobile'
             	, 'packages.name as pkg_name','users.id as u_id','users.first_name as u_first_name','users.id as u_last_name', 'paid_properties.property_id as paid_property_id','paid_properties.id as paid_pro_id')
             ->paginate(10);
    	return view('advertising.adminPendingFeaturedPropertyList',compact('adminPendingFeaturedProperties'));
    	//return view('advertising.adminPendingFeaturedPropertyList');
    }
     public function adminRejectFeaturedList()
     {
    	 
    	 $adminRejectFeaturedProperties= DB::table('properties')
	         ->join('users', 'properties.user_id', '=', 'users.id')
	         ->join('paid_properties','properties.id', '=', 'paid_properties.property_id')
	         ->join('packages','paid_properties.package_id', '=', 'packages.id')
	         ->where(['properties.status' => 1])
             ->where('paid_properties.status', 2)
             ->select('properties.id as p_id','properties.address as p_address','properties.title as title','properties.created_at as p_created_at', 'users.email as email', 'users.mobile as mobile'
             	, 'packages.name as pkg_name','users.id as u_id','users.first_name as u_first_name','users.id as u_last_name','paid_properties.reject_reason as reject_reason')
             ->paginate(10);
    	return view('advertising.adminRejectFeaturedPropertyList',compact('adminRejectFeaturedProperties'));
    	//return view('advertising.adminRejectFeaturedPropertyList');
    }
     public function adminApproveFeaturedList()
     {
    	 
    	 $adminApproveFeaturedProperties= DB::table('properties')
	         ->join('users', 'properties.user_id', '=', 'users.id')
	         ->join('paid_properties','properties.id', '=', 'paid_properties.property_id')
	         ->join('packages','paid_properties.package_id', '=', 'packages.id')
	         ->where(['properties.status' => 1])
             ->where('paid_properties.status', 1)
             ->select('properties.id as p_id','properties.address as p_address','properties.title as title','properties.created_at as p_created_at', 'users.email as email', 'users.mobile as mobile'
             	, 'packages.name as pkg_name','users.id as u_id','users.first_name as u_first_name','users.id as u_last_name')
             ->paginate(10);
    	return view('advertising.adminApproveFeaturedPropertyList',compact('adminApproveFeaturedProperties'));
    	//return view('advertising.adminApproveFeaturedPropertyList');
    }

    public function adminAdvertisingPaymentMethod($user_id,$paid_property_id)
    {
    	$account=Account::where('user_id',$user_id)->where('status' ,1)->orderBy('id', 'desc')->first();
    	$users=User::where('id',$user_id)->where('status' ,1)->first();
    	$paidProperty = PaidProperty::where('property_id', $paid_property_id)->first();
    	$discountOffers = DiscountOffer::orderBy('created_at', 'desc')->where('status', 1)->get();
    	$packages = Package::orderBy('created_at', 'desc')->where('status' ,'>=' ,1)->where('adcategory_id' ,'>' ,2)->get();
    	// dd($packages);
    	return view('advertising.adminAdvertisingPaymentMethod',compact('account','paidProperty','discountOffers','packages','users'));
    }

    public function getdiscountdetail($id)
    {
    	$discountOffers = DiscountOffer::where('status',1)->where('id',$id)->first();
    	
    	$bundle["percent_price"] = $discountOffers->percent_price;
    	$bundle["name"] = $discountOffers->name;

    	// dd($packages);
    	return Response::json(['success'=>$bundle]);
    }

    public function saveAccountDetail(Request $request,$paid_property_id)
    {
    	//dd($request->all());

    	$duration=$request->duration;
    	$end_date_count=time()+(86400*$duration);
    	$start_date=date('Y-m-d H:i:s' , time());
    	$end_date =date('Y-m-d H:i:s', $end_date_count);

    	$transaction_no=0;

    	if(!empty($request->transaction_id))
    	{
    		$transaction_no=$request->transaction_id;
    	}
    	if(!empty($request->recipt_no))
    	{
    		$transaction_no=$request->recipt_no;
    	}
    	if(!empty($request->cheque_no))
    	{
    		$transaction_no=$request->cheque_no;
    	}

    	DB::table('paid_properties')
            ->where('id',$paid_property_id)
			->update(['support_id' => Auth::id(),'payment_method' => $request->payment_method,'transaction_id' => $transaction_no,'discount_offer_id' => $request->discount_offer_id,'recieved_amount' => $request->recieved_amount,'package_id' => $request->package_id,'price' => $request->package_price,'featured_ad' => 1,'start_date' => $start_date,'end_date' => $end_date,'status' => 1]
            	);

$total_user_balance=$request->pervious_balance+$request->recieved_amount-$request->package_price+$request->discount_amount;
			// DB::table('accounts')          
			// ->insert(['user_id' => $request->u_id,'property_id' => $request->p_id,'previous_balance' => $request->pervious_balance,'recieved_amount' => $request->recieved_amount,'payable_amount' => $request->total_amount,'total_balance'=>$total_user_balance,'status' => 1]
   //          	);

		$account = new Account;
        $account->user_id 			= $request->u_id;
        $account->property_id 		= $request->p_id;
        $account->previous_balance 	= $request->pervious_balance;
        $account->recieved_amount 	= $request->recieved_amount;
        $account->payable_amount 	= $request->total_amount;
        $account->total_balance 	= $total_user_balance;  
        $account->status 			= 1;
        $account->save();
        return redirect('/dashboard/admin/featured/approved');


    }
    public function rejectFeatureAdverteAd(Request $request,$paid_property_id)
    {
    	//dd($paid_property_id);
    	DB::table('paid_properties')
            ->where('id',$paid_property_id)
			->update(['reject_reason' => $request->reject,'status' => 2]
            	);

			return redirect('/dashboard/admin/featured/reject');

    }

    public function addStaticAdvertise()
    {
    	$packages = Package::where('status',1)->where('adcategory_id', 1)->get();
    	return view('advertising.addStaticAdvertise',compact('packages'));

    }
    public function save_static_pic($request)
    {
       	$new_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(base_path() . $this->getPublicPath().'/images/staticAd', $new_name);
        return $new_name;
    }

    public function saveAddStaticAdvertise(Request $request)
    {
    	$static_pic=$this->save_static_pic($request);
    	$staticad = new StaticAd;
        $staticad->title 		= $request->title;
        $staticad->link 		= $request->link;
        $staticad->user_id 		= Auth::id();
        $staticad->package_id 	= $request->package_id;
        $staticad->image 		= $static_pic;
        $staticad->price 		= $request->price;
        $staticad->status 		= 0;
        $staticad->save();
        return redirect('/dashboard/user/static/ads/pending');
    }

    public function userStaticAdsPendinglist()
    {
    	 $allPendingstaticAds= DB::table('static_ads')
	         ->join('packages','static_ads.package_id', '=', 'packages.id')
	         ->leftJoin('ad_pages','packages.adpage_id', '=', 'ad_pages.id')
	         ->leftJoin('ad_positions','packages.adposition_id', '=', 'ad_positions.id')
	         ->join('ad_categories','packages.adcategory_id', '=', 'ad_categories.id')
             ->where('static_ads.status', 0)
             ->where('static_ads.user_id', Auth::id())
             ->select('static_ads.id as static_id','static_ads.title as static_ad_title','static_ads.image as static_ad_image','static_ads.link as static_ad_link', 'packages.name as package_name', 'ad_pages.name as page_name'
             	, 'ad_categories.name as category_name', 'ad_positions.name as position_name')
             ->paginate(10);
    	return view('advertising.userStaticPendingAdslist',compact('allPendingstaticAds'));

    }

    public function userStaticAdsRejectlist()
    {
    	 $allRejectstaticAds= DB::table('static_ads')
	         ->join('packages','static_ads.package_id', '=', 'packages.id')
	         ->leftJoin('ad_pages','packages.adpage_id', '=', 'ad_pages.id')
	         ->leftJoin('ad_positions','packages.adposition_id', '=', 'ad_positions.id')
	         ->join('ad_categories','packages.adcategory_id', '=', 'ad_categories.id')
             ->where('static_ads.status', 2)
             ->where('static_ads.user_id', Auth::id())
             ->select('static_ads.id as static_id','static_ads.title as static_ad_title','static_ads.image as static_ad_image','static_ads.link as static_ad_link', 'packages.name as package_name', 'ad_pages.name as page_name'
             	, 'ad_categories.name as category_name', 'ad_positions.name as position_name', 'static_ads.reject_reason as reject_reason')
             ->paginate(10);
    	return view('advertising.userStaticRejectAdslist',compact('allRejectstaticAds'));

    }

    public function userStaticAdsApprovelist()
    {
    	 $allApprovestaticAds= DB::table('static_ads')
	         ->join('packages','static_ads.package_id', '=', 'packages.id')
	         ->leftJoin('ad_pages','packages.adpage_id', '=', 'ad_pages.id')
	         ->leftJoin('ad_positions','packages.adposition_id', '=', 'ad_positions.id')
	         ->join('ad_categories','packages.adcategory_id', '=', 'ad_categories.id')
             ->where('static_ads.status', 1)
             ->where('static_ads.user_id', Auth::id())
             ->select('static_ads.id as static_id','static_ads.title as static_ad_title','static_ads.image as static_ad_image','static_ads.link as static_ad_link', 'packages.name as package_name', 'ad_pages.name as page_name'
             	, 'ad_categories.name as category_name', 'ad_positions.name as position_name', 'static_ads.reject_reason as reject_reason', 'static_ads.start_date as start_date', 'static_ads.end_date as end_date')
             ->paginate(10);
    	return view('advertising.userStaticAdsApprovelist',compact('allApprovestaticAds'));

    }

    public function adminStaticAdsPendinglist()
    {
    	 $allPendingStaticAdsForAdmin= DB::table('static_ads')
	         ->join('users', 'static_ads.user_id', '=', 'users.id')
	         ->join('packages','static_ads.package_id', '=', 'packages.id')
	         ->leftJoin('ad_pages','packages.adpage_id', '=', 'ad_pages.id')
	         ->leftJoin('ad_positions','packages.adposition_id', '=', 'ad_positions.id')
	         ->join('ad_categories','packages.adcategory_id', '=', 'ad_categories.id')
             ->where('static_ads.status', 0)
             ->select('static_ads.id as static_id','static_ads.title as static_ad_title','static_ads.image as static_ad_image','static_ads.link as static_ad_link', 'packages.name as package_name', 'ad_pages.name as page_name'
             	, 'ad_categories.name as category_name', 'ad_positions.name as position_name', 'static_ads.reject_reason as reject_reason','users.first_name as u_first_name','users.id as u_last_name','static_ads.created_at as created_at', 'users.email as email', 'users.mobile as mobile','users.id as u_id')
             ->paginate(10);
    	return view('advertising.adminStaticAdsPendinglist',compact('allPendingStaticAdsForAdmin'));
    }

    public function adminStaticAdsRejectlist()
    {
    	 $allRejectStaticAds= DB::table('static_ads')
	         ->join('users', 'static_ads.user_id', '=', 'users.id')
	         ->join('packages','static_ads.package_id', '=', 'packages.id')
	         ->leftJoin('ad_pages','packages.adpage_id', '=', 'ad_pages.id')
	         ->leftJoin('ad_positions','packages.adposition_id', '=', 'ad_positions.id')
	         ->join('ad_categories','packages.adcategory_id', '=', 'ad_categories.id')
             ->where('static_ads.status', 2)
             ->select('static_ads.id as static_id','static_ads.title as static_ad_title','static_ads.image as static_ad_image','static_ads.link as static_ad_link', 'packages.name as package_name', 'ad_pages.name as page_name'
             	, 'ad_categories.name as category_name', 'ad_positions.name as position_name', 'static_ads.reject_reason as reject_reason','users.first_name as u_first_name','users.id as u_last_name','static_ads.created_at as created_at', 'users.email as email', 'users.mobile as mobile','users.id as u_id')
             ->paginate(10);
            
    	return view('advertising.adminStaticAdsRejectlist',compact('allRejectStaticAds'));
    }

    public function adminStaticAdsApprovedlist()
    {
    	 $allApprovedStaticAds= DB::table('static_ads')
	        ->join('users', 'static_ads.user_id', '=', 'users.id')
	         ->join('packages','static_ads.package_id', '=', 'packages.id')
	         ->leftJoin('ad_pages','packages.adpage_id', '=', 'ad_pages.id')
	         ->leftJoin('ad_positions','packages.adposition_id', '=', 'ad_positions.id')
	         ->join('ad_categories','packages.adcategory_id', '=', 'ad_categories.id')
             ->where('static_ads.status', 1)
             ->select('static_ads.id as static_id','static_ads.title as static_ad_title','static_ads.image as static_ad_image','static_ads.link as static_ad_link', 'packages.name as package_name', 'ad_pages.name as page_name'
             	, 'ad_categories.name as category_name', 'ad_positions.name as position_name', 'static_ads.reject_reason as reject_reason','users.first_name as u_first_name','users.id as u_last_name','static_ads.created_at as created_at', 'users.email as email', 'users.mobile as mobile','users.id as u_id', 'static_ads.start_date as start_date', 'static_ads.end_date')
             ->paginate(10);
    	return view('advertising.adminStaticAdsApprovedlist',compact('allApprovedStaticAds'));
    }

    public function rejectStaticAd(Request $request,$static_id)
    {
    
    	DB::table('static_ads')
            ->where('id',$static_id)
			->update(['reject_reason' => $request->reject,'status' => 2]
            	);

			return redirect('/adminStaticAdsRejectlist');

    }
    public function adminStaticAdsPaymentMethod($user_id,$static_ad_id)
    {
    	$account=Account::where('user_id',$user_id)->where('status' ,1)->orderBy('id', 'desc')->first();
    	$users=User::where('id',$user_id)->where('status' ,1)->first();
    	$staticAd = StaticAd::where('id', $static_ad_id)->first();
    	$discountOffers = DiscountOffer::orderBy('created_at', 'desc')->where('status', 1)->get();
    	$packages = Package::orderBy('created_at', 'desc')->where('status',1)->where('adcategory_id' ,'<=' ,2)->get();
    	// dd($packages);
    	return view('advertising.adminStaticAdsPaymentMethod',compact('account','staticAd','discountOffers','packages','users'));
    }


    public function saveStaticAccountDetail(Request $request,$staticAd_id)
    {
    	//dd($request->all());

    	$duration=$request->duration;
    	$end_date_count=time()+(86400*$duration);
    	$start_date=date('Y-m-d H:i:s' , time());
    	$end_date =date('Y-m-d H:i:s', $end_date_count);

    	$transaction_no=0;

    	if(!empty($request->transaction_id))
    	{
    		$transaction_no=$request->transaction_id;
    	}
    	if(!empty($request->recipt_no))
    	{
    		$transaction_no=$request->recipt_no;
    	}
    	if(!empty($request->cheque_no))
    	{
    		$transaction_no=$request->cheque_no;
    	}

    	DB::table('static_ads')
            ->where('id',$staticAd_id)
			->update(['support_id' => Auth::id(),'payment_method' => $request->payment_method,'transaction_id' => $transaction_no,'discount_offer_id' => $request->discount_offer_id,'recieved_amount' => $request->recieved_amount,'package_id' => $request->package_id,'price' => $request->package_price,'start_date' => $start_date,'end_date' => $end_date,'status' => 1]
            	);

$total_user_balance=$request->pervious_balance+$request->recieved_amount-$request->package_price+$request->discount_amount;
			
		$account = new Account;
        $account->user_id 			= $request->u_id;
        //$account->property_id 		= $request->p_id;staticAd_id
        $account->staticAd_id 		= $request->staticAd_id;
        $account->previous_balance 	= $request->pervious_balance;
        $account->recieved_amount 	= $request->recieved_amount;
        $account->payable_amount 	= $request->total_amount;
        $account->total_balance 	= $total_user_balance;  
        $account->status 			= 1;
        $account->save();
        return redirect('/adminStaticAdsApprovedlist');


    }
}
