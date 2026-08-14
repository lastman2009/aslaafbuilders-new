<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HouseCityIndex;
use App\HouseCityTownIndex;
use App\PlotCityIndex;
use App\PlotCityTownIndex;
use App\CommercialCityIndex;
use App\CommercialCityTownIndex;
use App\City;
use App\Town;
use DB;
use App\Meta;

class IndexController extends Controller
{
    public function index($city_name = "", $city_id = "", $town_name = "", $town_id = "")
    {
        // by default LAHORE ; to be changed to Islamabad later on
        $meta=Meta::find(17);
         $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        $cities =City::all();
        $towns=Town::all();
        if(empty($city_id)){
            $houseCityIndexes = HouseCityIndex::orderBy('month','ASC')->orderBy('day','ASC')->where("city_id", 1)->get();
            $plotsCityIndexes = PlotCityIndex::where("city_id", 1)->get();
            $commercialCityIndexes = CommercialCityIndex::where("city_id", 1)->get();

            $houseCityTownList = HouseCityTownIndex::select(DB::raw("count(town_id) as index_count, cities.name as city, cities.id as city_id, towns.id as town_id, towns.name as town"))->where("house_city_town_indices.city_id", 1)->groupBy("town_id")
            ->leftjoin('cities', 'cities.id', '=', 'house_city_town_indices.city_id')
            ->leftjoin('towns', 'towns.id', '=', 'house_city_town_indices.town_id')
            ->get();
            // dd($houseCityTownList);
            $plotCityTownList = PlotCityTownIndex::select(DB::raw("count(town_id) as index_count, cities.name as city, cities.id as city_id, towns.id as town_id, towns.name as town"))->where("plot_city_town_indices.city_id", 1)->groupBy("town_id")
            ->leftjoin('cities', 'cities.id', '=', 'plot_city_town_indices.city_id')
            ->leftjoin('towns', 'towns.id', '=', 'plot_city_town_indices.town_id')
            ->get();
            $commercialCityTownList = CommercialCityTownIndex::select(DB::raw("count(town_id) as index_count, cities.name as city, cities.id as city_id, towns.id as town_id, towns.name as town"))->where("commercial_city_town_indices.city_id", 1)->groupBy("town_id")
            ->leftjoin('cities', 'cities.id', '=', 'commercial_city_town_indices.city_id')
            ->leftjoin('towns', 'towns.id', '=', 'commercial_city_town_indices.town_id')
            ->get();

        }else{
            if(!empty($town_id)){
                $houseCityIndexes = HouseCityTownIndex::where("city_id", $city_id)->where("town_id", $town_id)->get();
                $plotsCityIndexes = PlotCityTownIndex::where("city_id", $city_id)->where("town_id", $town_id)->get();
                $commercialCityIndexes = CommercialCityTownIndex::where("city_id", $city_id)->where("town_id", $town_id)->get();
                $houseCityTownList = HouseCityTownIndex::select(DB::raw("count(town_id) as index_count, cities.name as city, cities.id as city_id, towns.id as town_id, towns.name as town"))
                ->where("house_city_town_indices.city_id", $city_id)
                ->where("house_city_town_indices.town_id", $town_id)
                ->groupBy("town_id")
                ->leftjoin('cities', 'cities.id', '=', 'house_city_town_indices.city_id')
                ->leftjoin('towns', 'towns.id', '=', 'house_city_town_indices.town_id')
                ->get();
                // dd($houseCityTownList);
                $plotCityTownList = PlotCityTownIndex::select(DB::raw("count(town_id) as index_count, cities.name as city, cities.id as city_id, towns.id as town_id, towns.name as town"))
                ->where("plot_city_town_indices.city_id", $city_id)
                ->where("plot_city_town_indices.town_id", $town_id)
                ->groupBy("town_id")
                ->leftjoin('cities', 'cities.id', '=', 'plot_city_town_indices.city_id')
                ->leftjoin('towns', 'towns.id', '=', 'plot_city_town_indices.town_id')
                ->get();
                $commercialCityTownList = CommercialCityTownIndex::select(DB::raw("count(town_id) as index_count, cities.name as city, cities.id as city_id, towns.id as town_id, towns.name as town"))
                ->where("commercial_city_town_indices.city_id", $city_id)
                ->where("commercial_city_town_indices.town_id", $town_id)
                ->groupBy("town_id")
                ->leftjoin('cities', 'cities.id', '=', 'commercial_city_town_indices.city_id')
                ->leftjoin('towns', 'towns.id', '=', 'commercial_city_town_indices.town_id')
                ->get();
            }else{
                $houseCityIndexes = HouseCityIndex::where("city_id", $city_id)->get();
                $plotsCityIndexes = PlotCityIndex::where("city_id", $city_id)->get();
                $commercialCityIndexes = CommercialCityIndex::where("city_id", $city_id)->get();
            }
            // dd($houseCityIndexes);
           return view('index.price_index_search', compact('houseCityIndexes', 'plotsCityIndexes', 'commercialCityIndexes','cities','towns', 'houseCityTownList', 'plotCityTownList', 'commercialCityTownList','title','description','keyword'));
        }
    	return view('index.price_index', compact('houseCityIndexes', 'plotsCityIndexes', 'commercialCityIndexes','cities','towns', 'houseCityTownList', 'plotCityTownList', 'commercialCityTownList','title','description','keyword'));
    }
    
    public function searchResult(Request $request)
    {
       
        $cities =City::all();
        $towns=Town::all();
        $houseCityIndexes = HouseCityIndex::where("city_id", 1)->get();
        $plotsCityIndexes = PlotCityIndex::where("city_id", 1)->get();
        $commercialCityIndexes = CommercialCityIndex::where("city_id", 1)->get();

        return view('index.price_index', compact('houseCityIndexes', 'plotsCityIndexes', 'commercialCityIndexes','cities','towns'));
}
    

    //  public function indexSearch(Request $request)
    // {
         
    //     $cities =City::all();
    //     $towns=Town::all();
    //     $houseCityIndexes = HouseCityIndex::where("city_id", 1)->get();
    //     $plotsCityIndexes = PlotCityIndex::where("city_id", 1)->get();
    //     $commercialCityIndexes = CommercialCityIndex::where("city_id", 1)->get();
    // 	return view('index.price_index_search',compact('houseCityIndexes', 'plotsCityIndexes', 'commercialCityIndexes','cities','towns'));
    // }
    public function indexResult()
    {
    	return view('index.price_index_result');
    }
}
