<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchTracking;
use DB;
use Auth;
use Response;

class SearchTrachController extends Controller
{ 
	public function userSearchHistory()
	{
      $searchTracks =SearchTracking::orderBy('created_at', 'desc')->where('user_id',Auth::id())->paginate(10);

      return view('history.userSearchHistory',compact('searchTracks'));

	} 
	public function searchHistory()
	{
      $searchTracks =SearchTracking::orderBy('created_at', 'desc')->paginate(10);

      return view('history.searchHistory',compact('searchTracks'));

	} 
    
}
