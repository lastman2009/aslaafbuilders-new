<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Town;
use App\Phase;
use App\Block;
use Response;
use \Cache;
use App\Statistic;
use Config;
use App\Location;


class LocationController extends Controller
{
    
    public function index()
    {

    	// $data = Phase::with(['town.city' => function($query) {
     //    $query->where('user_id','=', $id);
     //    }])->orderBy('created_at')->get(); 


    	// $data = Block::with('phase.town.city')->get();

   		
    	// $city=City::where('name','Starkport')->first();
    	// $data = $city->load('towns.phases.blocks');
    	// dd($data);

        $cities =$this->getAllCities();
        $towns=[];
        $phases=[];
        $blocks=[];
    // 	$cities =City::all();
    // 	$towns=Town::all();
    // 	$phases=Phase::all();
    // 	$blocks=Block::all();

    	return view('location.add_location',compact('cities','towns','blocks','phases'));
    }

    public function store(Request $request)
    {
    // 	dd($request->all());   
    	$town_id = 0; 
    	if(!isset($request->town))
    	{
	    	$town_id =$request->oldTown;
    	}
    	else
    	{
	    	$town_id = $this->addTown($request);
    	}

    	$phase_id =0;
	    if(!isset($request->phase))
    	{	
    		$phase_id = $request->oldphase;
    	}
    	else
    	{
            
	    	$phase_id = $this->addPhase($request, $town_id);
    	}   
    	if($this->addBlock($request,$phase_id)){
    		return back(); // with some success message	
    	}
    	return back(); // with some error message
		
			
	}
    
    public function addTown($request){
    	$town=new Town;
    	$town->city_id=$request->city;
		$town->name =$request->town;
    	$town->save();
    	 $propertyobject = new Statistic();
        $propertyobject->updateStats('total_towns');
    	return $town->id;
    }
    public function addPhase($request ,$town_id){
    // 	dd($request->all()); 
    	$phase =new Phase;
    	$phase->town_id = $town_id;
		$phase->name =$request->phase;
		$phase->save();
// 		dd($phase);
        return $phase->id;

    }
    public function addBlock($request, $phase_id){
    	$blocks = explode(',', $request->block);
	    foreach($blocks as $block){
	    	$block_new =new Block;
	    	$block_new->phase_id = $phase_id;
	    	$block_new->name =$block;
	    	$block_new->save();
    	}
    	return true;
    }
    public function locationCity(Request $request ,$id)
    {	

    	
    }
    public function cityTown($id)
    {
    	
   }
   	public function townPhase($id)
   	{

   		

   	}
    public function getCity($id)
    {
// stop... break time :)
    }
    public function getTown($id)
    {
    	
    }
       public function getPhase($id)
    {
    	
    }
    public function getBlock($id)
    {
    	
    }
    /*City_id*/

    public function getTownList($id){
        
      $towns = Location::getTownListObject($id);
      return view('location.town',compact('towns'));
    }
    public function getTownList_file($id){
        
      $towns = Location::getTownListObject($id);
      return view('location.town_file',compact('towns'));
    }
    public function getPhaseList($id){
      $phases = Location::getPhaseListObject($id);
      return view('location.phase',compact('phases'));
    }
     public function getPhaseList_file($id){
      $phases = Location::getPhaseListObject($id);
      return view('location.phase_file',compact('phases'));
    }
    public function getBlockList($id){
      $blocks = Location::getBlockListObject($id);
      return view('location.block',compact('blocks'));
    }    
    /*Pass all ids  to get  address list*/
    public function getLocation($city_id ,$town_id ,$phase_id ,$block_id )
    {
    	/* will return data according to ids  given */
    }

  public function addCity(Request $request)
    {   

        $cities = City::all();
        return Response::json( $cities);

    }

    public function updateTown(Request $request,$id)
    { 

        $town =Town::find($id);
        $town->name=$request->name;
        $town->update();
        return Response::json(['success' => 'updated']);
    }

    public function edit()
    {
        $cities =City::all();
        $towns=Town::all();
        $phases=Phase::all();
        $blocks=Block::all();

        return view('location.edit',compact('cities','towns','blocks','phases'));   
    }

    public function locationedit(Request $request)
    {
      
        if(!empty($request->edittown) && !empty($request->oldTown) )
       {
            // dd($request->oldTown);
           $town=Town::find($request->oldTown);
           $town->name=$request->edittown;
           $town->update(); 
        }
        if(!empty($request->editphase) && !empty($request->oldphase))
        {
           $phase=Phase::find($request->oldphase);
           $phase->name=$request->editphase;
           $phase->update(); 
        }
         if(!empty($request->editblock) && !empty($request->oldblock))
        {
           $block=Block::find($request->oldblock);
           $block->name=$request->editblock;
           $block->update(); 
         }
         return back();
        
    }
     public function getCitycomplete(Request $request)
     { 
           $city =Town::where('city_id',$request->city_id)->get();
           return Response::json($city);
     }
     public function getCityName($id)
     { 
       $name =City::find($id)->name;
         return Response::json($name);
     }  
      public function getTownName($id)
     {
        $name =Town::find($id)->name;
        return Response::json($name);
     }
      public function getPhaseName($id)
     {
        $name =Phase::find($id)->name;
        return Response::json($name);
     }
      public function getBlockName($id)
     {
        $name =Block::find($id)->name;
        return Response::json($name);
     }
     
    public function getCityId(Request $request)
    {
        if(!empty($request->identifier))
        {      
        $city_id =City::where("name" ,$request->city_name)->first();
        if(!empty($city_id))
        return Response::json($city_id->id);
        else
        return Response::json("No Result Found");
        }
        return Response::json("lol Dont try this shit Again");
    }
    public function getTownId(Request $request)
      { 
        if(!empty($request->identifier))
        { 
          $town=Town::where('city_id',$request->city_id)->where('name',$request->town_name)->first();
            if(!empty($town))
            {
                $data =$town->id;
              return Response::json($data);
            }
            else
            {
              return Response::json("no data found");
            }
        }

      }
      
    public function getAllPhaseAccordingToTown(Request $request)
    {
        if(!empty($request->identifier))
        {
          $data =Phase::where('town_id',$request->town_id)->get();
          if(!$data->isEmpty())
              {
              return Response::json($data);
              }
          else
            {
              return Response::json(0);
            }
        }
          return Response::json(0);    
    }
       public function getAllBlockAccordingToPhase(Request $request)
    {
      if(!empty($request->identifier))
        {
          $data =Block::where('phase_id',$request->phase_id)->get();
          if(!$data->isEmpty())
              {
              return Response::json($data);
              }
          else
            {
              return Response::json(0);
            }
        }
          return Response::json(0);  
    }
 
}