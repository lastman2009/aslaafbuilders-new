<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meta;
class MetaController extends Controller
{
   
   public function index()
   {

   	$metas =new Meta();

   	$allData = $metas->getData();
   	return view('dashboard.meta.index',compact('allData'));
   }

   public function store(Request $request)
   {
   	$meta =new Meta();
   	$meta->storeData($request);
   	return redirect()->route('meta');
   }

   public function storeMeta(Request $request ,$id)
   {

   	$meta =Meta::find($id);
   	$meta->updateMeta($request);
   	return redirect()->route('meta');
   	
   }
}
