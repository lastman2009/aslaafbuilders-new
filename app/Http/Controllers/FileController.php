<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
use App\City;
use App\FileModel;
use App\FileListing;
use Response;
class FileController extends Controller
{

    public function addFiles()
    {
        $files =FileModel::all();

    	$cities = $this->getAllCities();
    	return view('dashboard.fileIndex.fileindex',compact('cities','files'));
    }

    public function addfileName(Request $request)
    {

    	$file=new FileModel;
    	$file->addfile($request);
    	return back();
    }
    public function delete_files(Request $request)
    {		
    	$file = FileModel::find($request->id);
    	$file->delete();
    	// dd($file);
    	return Response::json(['success'=> true]);
    }	

    public function fileListing($id ,$file_title)
    {	
        $file_listings =FileListing::getListing($id);
    	return view('dashboard.fileIndex.fileListing',compact('file_title','id','file_listings'));
    }

    public function addFileListing(Request $request)
    {   

        $file =new FileListing;
        $file = $file->addFileListing($request);
        return back();

    }
    public function getAllCities()
    {
        if(Cache::has('all_city')){  
            $cities = Cache::get('all_city');
        }
        else{
            $cities = Cache::remember('all_city',120, function() {
             return City::get();
            });
        }
        return $cities;
    }


    public function graphdata(Request $request)
    {
        
        // dd($request->all());
        $file=FileModel::where('city_id' ,$request->city_id)->where('town_id' ,$request->town_id)->where('phase_id' ,$request->phase_id)->first();
        // dd($file);
        if(!empty($file))
        {   
            if($request->area == 0 && $request->type == '0')
            {
         
             $file_listings =FileListing::where('file_model_id' , $file->id)->get();
           
            }
            elseif($request->area == 0)
            {
                // dd($request->type);
                // dd('2');

                $file_listings =FileListing::where('file_model_id' , $file->id)->where('type',$request->type)->get();
            }
            elseif($request->type == '0')
            {
       
                $file_listings =FileListing::where('file_model_id' , $file->id)->where('area',$request->area)->get();
            }
            else{

            
            $file_listings =FileListing::where('file_model_id', $file->id)->where('area',$request->area)->where('type',$request->type)->get();
               
            }

        }

        return view('frontwebsite.file.ajaxfile',compact('file','file_listings'));
    }
}
