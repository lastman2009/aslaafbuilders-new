<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\UserInterest;
use Auth;
use DB;

class InterestController extends Controller
{
    public function index()
    {	$selected_interests=UserInterest::where('user_id',Auth::id())->get();
    	$selected=array();
    	foreach($selected_interests as $selected_interest)
    	{
    		$selected[] =$selected_interest->interest_id;
    	}
    	$interests =Interest::where('status',1)->get();
    	$interestsdelete =Interest::where('status',0)->get();

    	return view('interest.index',compact('interests','interestsdelete','selected'));
    }

    public function store(Request $request)
    {
    	$interest = new Interest(['name' => $request->name]);
    	$interest->save();
    	return back();
    }

    public function delete($id)
    {

    	$interest =Interest::find($id);
    	$interest->status=0;
    	$interest->save();
    	return back();

    }
    public function reterive($id)
    {
    	$interest =Interest::find($id);
    	$interest->status=1;
    	$interest->save();
    	return back();

    }
    public function edit($id)
    {	
    	$interest =Interest::find($id);
    	return view('interest.edit',compact('interest'));
    }

    public function update(Request $request ,$id)
    {
    	$interest =Interest::find($id);
     	$interest->name= $request->name;
     	$interest->save();
    	return redirect('/interest');

    }
    public function assignInterest(Request $request)
    {
    	$id=Auth::id();
    	$check=UserInterest::where('user_id',Auth::id())->first();
    	if(!empty($check))
    	{
    		// DB::table('user_interests')->where('user_id',Auth::id())->delete();

    		UserInterest::where('user_id',Auth::id())->delete();
    	}
    	if(!empty($request->interests)){
    		
	   	  	foreach($request->interests as $interest)
			{
	  			$assign_interest=new UserInterest;
	  			$assign_interest->user_id =$id;
	  			$assign_interest->interest_id= $interest;
	  			$assign_interest->save();
	  		}
    	}
  		return back();
    }
}
