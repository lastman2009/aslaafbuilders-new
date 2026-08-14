<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyType;
use Response;

class PropertyTypeController extends Controller
{
    public function index()
    {
    	$propertyTypes =PropertyType::where('status',1)->where('parent',0)->get();
    	$trashedPropertyTypes =PropertyType::where('status',0)->where('parent',0)->get();
    	// dd($propertyTypes);
    	return view('propertyType.index',compact('propertyTypes','trashedPropertyTypes'));
    }

    public function store(Request $request)
    {
    	// dd($request->all());
    	if(empty($request->parent))
    	{
    		$propertyType =new PropertyType(['name'=>$request->name ,'status' => 1]);
       	}
    	else
    	{
    		$propertyType =new PropertyType(['name'=>$request->name ,'status' => 1 ,'parent' => $request->parent]);
    	}
    	$propertyType->save();
    	return redirect('propertyTypes')->with('status', 'Property Type Added!');

    }
    public function delete($id)
    {
    	$propertyType=PropertyType::find($id);
    	$propertyType->status=0;
    	$propertyType->update();
    	return redirect('propertyTypes')->with('alert', 'Property Type trashed!');
    }
     public function unTrash($id)
    {
    	$propertyType=PropertyType::find($id);
    	$propertyType->status=1;
    	$propertyType->update();
    	return redirect('propertyTypes')->with('alert', 'Property Type untrashed!');
    }
    public function edit($id)
    {
    	$propertyType=PropertyType::find($id);

    	return view('propertyType.edit',compact('propertyType'));
    }

    public function update(Request $request,$id)
    {
    	$propertyType=PropertyType::find($id);
    	$propertyType->name= $request->name;
    	$propertyType->update();
    	return redirect('propertyTypes')->with('alert', 'Property Type updated!');

    }
    public function detail($id)
    {		$deletedetails=PropertyType::where('parent',$id)->where('status',0)->get();
    		$name=PropertyType::find($id)->name;
    		$details=PropertyType::where('parent',$id)->where('status',1)->get();

    		return view('propertyType.detail',compact('details','name','deletedetails'));
   	}
   	public function typeDelete($id)
   	{
    	$propertyType=PropertyType::find($id);
    	$propertyType->status= 0;
    	$propertyType->update();
    	return back();

   	}

   	public function typeEdit($id)
   	{

   	}
   	public function typeReterive($id)
   	{
   		$propertyType=PropertyType::find($id);
    	$propertyType->status= 1;
    	$propertyType->update();
    	return back();
   	}
   	
   	public function getPropertyTypesAPI()
   	{
   	    	$propertyTypes =PropertyType::where('status',1)->get();
   	    	return Response::json($propertyTypes);
   	}

    public function getPropertyTypeChildData(Request $request)
    {
      if(!empty($request->identifier))
      {
        $propertyType =new  PropertyType();
        $allData['data'] =$propertyType->getPropertyChild($request);
        return Response::json($allData);
      }
    }

}
