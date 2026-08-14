<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FileModel;
class FileListing extends Model
{
    public function file()
    {
   		return $this->belongsTo(FileModel::class);
    }

    public function addFileListing($request)
    {
    	$check =FileListing::where('file_model_id' ,$request->id)->where('purpose',$request->purpose)->where('type',$request->type)->where('area',$request->area)->orderBy('created_at', 'desc')->first();
    	if(empty($check))
    	{
			$this->title = $request->title;
			$this->area = $request->area;
	    	$this->type = $request->type;
	    	$this->price = $request->price;
	    	$this->purpose = $request->purpose;
	    	$this->date = $request->date;
	    	$this->contact = $request->contact;
	    	$this->file_model_id = $request->id;
	    	$this->difference= 0.00;	
	    	$this->index = 100;
	    	$this->color = "G";
	    	$this->save();
	    	return $this;
    	}
    	else
    	{	
    		$this->title = $request->title;
    		$this->area = $request->area;
	    	$this->type = $request->type;
	    	$this->price = $request->price;
	    	$this->contact = $request->contact;
	    	$this->purpose = $request->purpose;
	    	$this->date = $request->date;
	    	$this->file_model_id = $request->id;
	    	if($check->price > $request->price)
	    	{
	    		$this->difference = $check->price - $request->price;	
	    		$difference= ($check->price/$request->price)*100;
	    		$this->index = ($difference/$check->index) * $check->index;		
	    		$this->color = "R";
	    	}
	    	else if($request->price > $check->price ) 
	    	{	
	    		$this->difference = $request->price - $check->price ;
	    		$difference= ($request->price/$check->price)*100;
	    		$this->index = ($difference/$check->index) * $check->index;
	    		$this->color = "G";
	    	}
	    	else
	    	{	
	    		$difference= ($check->price/$request->price)*100;
	    		$this->difference= 0.00;	
	    		$this->index = ($difference/$check->index) * $check->index;	
	    		$this->color = "G";
	    	}
	    	$this->save();
	    	return $this;
    	}

    }
    public static function getListing($file_id)
    {

    return FileListing::where('file_model_id',$file_id)->get();
    }
}
