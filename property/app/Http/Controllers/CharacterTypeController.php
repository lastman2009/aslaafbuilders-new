<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CharacterType;

class CharacterTypeController extends Controller
{
    public function index()
    {
    	$characterTypes=CharacterType::where('status',1)->get();
    	$characterTrashDetails=CharacterType::where('status',0)->get();

    	return view('characterType.index',compact('characterTypes','characterTrashDetails'));
    }

    public function store(Request $request)
    {
    	$characterType=new CharacterType;
    	$characterType->name =$request->name;
       	$characterType->status =1;
       	$characterType->save();
    	return back();
    }

    public function edit($id)
    {
    	$characterType = characterType::find($id);

    	return view('characterType.edit',compact('characterType'));
    }

	public function update(Request $request ,$id)
    {
    	$characterType=CharacterType::find($id);
    	$characterType->name =$request->name;
       	$characterType->update();
    	return back();
    }

    public function destroy($id)
    {
    	$characterType=CharacterType::find($id);
    	$characterType->status =0;
    	$characterType->update();
    	return back();

    }
    public function reterive($id)
    {
    	$characterType=CharacterType::find($id);
    	$characterType->status =1;
       	$characterType->update();
    	return back();

    }
}
