<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\Town;
use App\Phase;
use App\Block;
use App\FileListing;

class FileModel extends Model
{

	protected $table ="files";


  public function fileListing()
  {

  	return $this->hasMany(FileListing::class);
  }
   public function addfile($request)
   {
   	// dd($request);
   		$this->title =$request->title;
   		$this->city_id =$request->city_id;
   		$this->town_id =$request->town_id;
   		$this->phase_id =$request->phase_id;
   		$this->block_id = $request->block_id;
   		$this->url= $this->makeURL($request);
   		$this->save();
   		return true;
   }

   protected function makeURL($request)
   {
   		return $this->getCityName($request->city_id).' '.$this->getTownName($request->town_id).' '.$this->getPhaseName($request->phase_id).' '.$this->getBlockName($request->block_id);
   }
   protected function getCityName($city_id)
   {
   		if(!empty($city_id)){
   			return City::find($city_id)->name;
   		}
   		return "";
   } 
   protected function getTownName($town_id)
   {
		if(!empty($town_id)){
			return Town::find($town_id)->name;
		}
		return "";
   } 

   protected function getPhaseName($phase_id)
   {
		if(!empty($phase_id)){
			return Phase::find($phase_id)->name;
		}
		return "";
   } 

   protected function getBlockName($block_id)
   {
		if(!empty($block_id)){
			return Block::find($block_id)->name;
		}
		return "";
   } 


}
