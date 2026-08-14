<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserCharacterType;
use Auth;
use Illuminate\Support\Facades\Request as Input;
use App\CharacterType;
use App\City;
use App\UserProduct;
use App\UserCharacterDetail;
use Response;
use DB;
use App\Meta;
class UserController extends Controller
{

    const DELETE_USER = 3;
    const ACTIVE_USER = 1;

    protected $user_update_fields = ['first_name', 'last_name', 'email', 'mobile', 'telephone', 'address', 'cnic', 'city', 'is_agent','website','image'];
    protected $agent_update_fields = ['agency_name', 'agency_telephone', 'agency_location'];
    protected $vendor_update_fields = ['vendor_company', 'vendor_location', 'vendor_telephone', 'vendor_experience','vendor_description'];
    protected $architect_update_fields = ['architect_company', 'architect_location', 'architect_telephone', 'architect_experience','architect_description'];
    //   public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charactertypes =CharacterType::where('status',1)->get();

        $users=User::where('status','1')->get();
        return view('user.index',compact('users','charactertypes')); 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('user.edit',compact('user'));
    }
    public function update($id, $haystack, $request){
  
        $user =User::find($id);
        foreach($haystack as $field){
            $user->$field = $request->$field;
        }
        $user->update();
        return back();
    }
    
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateUser(Request $request, $id){
        return $this->update($id, $this->user_update_fields, $request);
    }
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateAgent(Request $request, $id){
        return $this->update($id, $this->agent_update_fields, $request);
    }
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateArchitect(Request $request, $id){
        return $this->update($id, $this->architect_update_fields, $request);
    }
    
    public function updateVendor(Request $request, $id){
        return $this->update($id, $this->vendor_update_fields, $request);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $user =User::find($id);
        $user->status=3;
        $user->update();
        return Response::json(['success' => 'trashed']);
    }
    public function showTrash(){
        $users=User::where('status','3')->get();
        return view('user.trash',compact('users')); 
    }
    public function retrieveTrash($id){
        $user =User::find($id);
        $user->status =$this->ACTIVE_USER;
        $user->update();
        return back();
    }
     public function assignCharacterRole(Request $request)
    {

            $userCharacterType =UserCharacterType::where('user_id',Auth::id())->where('character_type_id',$request->id)->first();
            $status="";
            if(empty($userCharacterType))
            {   
                $status=$request->status;
                $userCharacterType =new UserCharacterType;
                $userCharacterType->user_id=Auth::id();
                $userCharacterType->character_type_id=$request->id;
                $userCharacterType->status= $request->status;
                $userCharacterType->save();

            }
            else
            {
                $status=$request->status;
                $userCharacterType->status =$request->status;
                $userCharacterType->update();  
            }
        return Response::json(['success' =>$status ,'data' => $userCharacterType]);
    }

    public function userList()
    {
        $users= User::where('role_id',2)->where('status' , 1)->orWhere('status' ,2)->paginate(15);
    
        return view('user.userlisting',compact('users'));
    }
    public function blockOrActive($id)
    {

        $user =User::find($id);
      
        switch ($user->status) {
            case '1':
                $user->status=2;
                break;
            case '2':
                 $user->status=1;
                break;
        }
        $user->update();
        return Response::json(['success' => 'upDated']);
    }

    public function architectureInventorySearch()
    {
        $user_character_details='';
        $cities = City::all();

        return view('user.architectureInventorySearch', compact('cities','user_character_details'));
    }

      public function architectureInventorySearchResult(Request $request)
    {         
        $name=$request->name;
        $id=$request->id;
        $city_id=$request->city_id;
        
        $cities = City::all();
        if(empty($request->name) && empty($request->id) && empty($request->city_id)){
            // dd("hello");
            $user_characters= DB::table('user_character_details')
            ->select('user_character_details.name as name','user_character_details.telephone as telephone','user_character_details.website as website','user_character_details.location as location', 'user_character_details.user_id as user_id', 'user_character_details.experience as experience', 'cities.name as city_name','character_types.id as character_types_id')
            ->leftjoin('user_character_types', 'user_character_types.id', '=', 'user_character_details.user_character_type_id')
            ->leftjoin('character_types', 'character_types.id', '=', 'user_character_types.character_type_id')
            ->leftjoin('cities', 'cities.id', '=', 'user_character_details.city_id')
            ->where('user_character_types.status',1)
            ->where(['character_types.id' => 3]);
             $user_character_details = $user_characters->get();
        }else{

            $user_characters= DB::table('user_character_details')
            ->leftjoin('user_character_types', 'user_character_types.id', '=', 'user_character_details.user_character_type_id')
            ->leftjoin('character_types', 'character_types.id', '=', 'user_character_types.character_type_id')
            ->leftjoin('cities', 'cities.id', '=', 'user_character_details.city_id')
            ->where(['character_types.id' => 3]);
            if(!empty($name))
            {
                $user_characters->where('user_character_details.name', 'like', '%'.$name.'%');
            }
            if(!empty($id))
            {
                $user_characters->where('user_character_details.id',$id );
            }
            if(!empty($city_id))
            {
                $user_characters->where('user_character_details.city_id',$cities );
            }
            $user_characters->select('user_character_details.name as name','user_character_details.telephone as telephone','user_character_details.website as website','user_character_details.location as location', 'user_character_details.user_id as user_id', 'user_character_details.experience as experience', 'cities.name as city_name');
            $user_character_details = $user_characters->get();

        }
             

           // dd ($user_character_details);
        return view('user.architectureInventorySearch', compact('cities','user_character_details'));
    }
     public function vendorInventorySearch()
    {
         $user_character_details='';
         $cities = City::all();
        $products= UserProduct::groupBy('title')->get();


        return view('user.vendorInventorySearch', compact('cities','user_character_details','products'));
        
    }

   


    public function mainArchitectureList()
    {
        $list=array();
         $architectures =UserCharacterType::where('character_type_id', 3)->where('status',1)->get();
         foreach ($architectures as $architectur) {
            $data = UserCharacterDetail::where('user_character_type_id',$architectur->id)->first();
        if(!empty($data))
        {

            $list[] =$data;
        }
         }
        $meta=Meta::find(16);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('user.mainArchitectureList',compact('list','title','description','keyword'));

    }
    
     public function vendorInventorySearchResult(Request $request)
    { 
        // dd($request->all());
        $name=$request->name;
        $id=$request->id;
        $city_id=$request->city_id;
        $product=$request->product;
        $products= UserProduct::groupBy('title')->get();
        $cities = City::all();

        if(empty($request->name) && empty($request->id) && empty($request->city_id) && empty($request->product)){
            // dd("hello");

            $user_characters= DB::table('user_character_details')
            ->select('user_character_details.name as name','user_character_details.telephone as telephone','user_character_details.website as website','user_character_details.location as location', 	'user_character_details.user_id as user_id', 'user_character_details.experience as experience', 'cities.name as city_name','character_types.id as character_types_id')
            ->join('user_character_types', 'user_character_types.id', '=', 'user_character_details.user_character_type_id')
            ->leftjoin('character_types', 'character_types.id', '=', 'user_character_types.character_type_id')
            ->leftjoin('cities', 'cities.id', '=', 'user_character_details.city_id')
            ->where('user_character_types.status',1)
            
            ->where(['character_types.id' => 2]);

            
             $user_character_details = $user_characters->get();
              //dd($user_character_details);
        }else{
            $user_characters= DB::table('user_character_details')
            ->leftjoin('user_character_types', 'user_character_types.id', '=', 'user_character_details.user_character_type_id')
            ->leftjoin('character_types', 'character_types.id', '=', 'user_character_types.character_type_id')
            ->leftjoin('cities', 'cities.id', '=', 'user_character_details.city_id')
            ->leftjoin('user_products', 'user_products.user_id', '=', 'user_character_details.user_id')
            ->where(['character_types.id' => 2]);
            if(!empty($name))
            {
                $user_characters->where('user_character_details.name', 'like', '%'.$name.'%');
            }
            if(!empty($id))
            {
                $user_characters->where('user_character_details.id',$id );
            }
            if(!empty($city_id))
            {
                $user_characters->where('user_character_details.city_id',$cities );
            }
            if(!empty($product))
            {
                $user_characters->where('user_products.title', 'like', '%'.$product.'%' );
            }
             $user_characters->select('user_character_details.name as name','user_character_details.telephone as telephone','user_character_details.website as website','user_character_details.location as location', 'user_character_details.user_id as user_id', 'user_character_details.experience as experience', 'cities.name as city_name', 'user_products.title as product_name');
             $user_character_details = $user_characters->get();
        }
        // dd($user_characters);
        return view('user.vendorInventorySearch', compact('cities','user_character_details','products'));
    }

     public function mainVendorList()
    {

        $vendorlists=array();
         $vendors =UserCharacterType::where('character_type_id', 2)->where('status',1)->get();
         // dd($vendors);
         foreach ($vendors as $vendor) {

            $data = UserCharacterDetail::where('user_character_type_id',$vendor->id)->first();
            if(!empty($data))
            {
            $vendorlists[] =$data;
            }
            
         }
        $meta=Meta::find(15);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('user.mainVendorList',compact('vendorlists','title','description','keyword'));

    }
}
