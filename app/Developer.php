<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use App\ImageHelper;

class Developer extends Model
{
    public function addDeveloper($request ,$property_id)
    {	
    	$this->name = $request['name'];
    	$this->contact = $request['contact'];
    	$this->email = $request['email'];
    	$this->description = $request['description'];
    	$this->property_id =$property_id;
    	if(!empty($request['image']))
    	$this->image =$this->upload_single_image_with_water_mark($request['image']);
    	$this->save();
    }

    public function isLive(){
        return $_SERVER['SERVER_NAME'] == "127.0.0.1" ? false : true;
    }
    public function getPublicPath(){
        return $this->isLive()? "" : "/public";
    }

    public function upload_single_image_with_water_mark($img)
    { 
        $img_helper = new ImageHelper;
        $pic_name = $img->getClientOriginalName();
        $new_name = time() . '.' .$pic_name;
        $img->move(base_path() .  $this->getPublicPath().'/images/property/developer/', 'original_'.$new_name);
        $targetPath = base_path() .  $this->getPublicPath().'/images/property/developer/';
        $path = $new_name;
        $path = 'original_'.$new_name; 
        $img_helper->load($targetPath. $path);
        $img_helper->resize(300,300);
        $img_helper->saveImage($targetPath.'original_'.$new_name); 
        $watermark =Image::make(base_path() .$this->getPublicPath().'/images/'.'water-mark.png');
        $original_image =Image::make(base_path() .$this->getPublicPath().'/images/property/developer/'.'original_'.$new_name);
        $resizePercentage = 70;//70% less then an actual image (play with this value)
        $watermarkSize = round($original_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
        $watermark->resize($watermarkSize, null, function ($constraint) {
        $constraint->aspectRatio();
        });
        $original_image->insert($watermark, 'center');
        $original_image->save(base_path() .  $this->getPublicPath().'/images/property/developer/original_'.$new_name);
        return $new_name;
    }
    public function updateDeveloper($request)
    {
        $this->name = $request['name'];
        $this->contact = $request['contact'];
        $this->email = $request['email'];
        $this->description = $request['description'];
        if(!empty($request['image']))
        $this->image =$this->upload_single_image_with_water_mark($request['image']);
        $this->save();
    }
}
