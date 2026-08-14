<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use DB;
use File;
use App\Map;
use App\Meta;
class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function image_tiles()
    {

        return view('imageTiles.image_tile');
       

    }

    public function upload_image_tiles()
    {

        // return view('imageTiles.uploadImage');
         return view('maptiles.mapuploader');

    }

    public function show_uploaded_image(Request $request)
    {   
        //dd($request->file('upload')->getClientOriginalExtension());
        // $extention=$request->file('upload')->getClientOriginalExtension();
        // $extention =strtolower($extention);
        // if($extention=='jpg' || $extention=='jpeg')
        // {
        //     //dd($request->file('upload')->getClientOriginalName());
        //     $pic_name = $request->file('upload')->getClientOriginalName();
        //     $pic_name= str_replace(".".$extention,"",$pic_name);
        //     $map = new Map;
        //     $map->image = $pic_name;
        //     $map->status = 1;
        //     $map->save();
        // }
        // //return view('imageTiles.uploaded_images');
        return view('maptiles.mapTileList');
    }

    public function show_container($image)
    {

        //return view('imageTiles.tile_image_show',compact('image'));
        return view('maptiles.showMap',compact('image'));

    }


    public function frontendSearchMaps(Request $request)
    {
        //dd($request->search);
        $search=$request->search;
        if(!empty($search))
        {
            $maps=Map::where('status', 1)->where('image', 'like', '%' . $search . '%')->paginate(2);
            
        }

        else
        {
            $maps=Map::where('status', 1)->paginate(8);
        }

        
        $new_maps = array();
        foreach ($maps as $map) {
            $new_maps[$map->image] = $map->image;
        }
        require_once('inc/pa.php');
        require_once('inc/functions.php');

        $images = get_existing_images();
        $meta=Meta::find(11);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('frontwebsite.map.searchMap',compact('images','new_maps','maps','title','description','keyword'));
    }
    public function areaMap($image)
    {
        // dd($image);
        return view('frontwebsite.map.areaMap',compact('image'));
    }
     public function mapToPhase()
    {   
        
        $maps=Map::getMaps();
        $cities = $this->getAllCities();
        return view('frontwebsite.map.assignMap',compact('cities','maps'));

    }

    public function assignMaptoPhase(Request $request)
    {
        // dd($request->all());
        $table =DB::table('phases') 
        ->where('phases.id',$request->phase)
        ->update(array(
                "phases.map_name" => $request->map,
        ));
        return back();
    }
}