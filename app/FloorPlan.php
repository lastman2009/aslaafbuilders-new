<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use App\ImageHelper;
use App\Property;
class FloorPlan extends Model
{
    public function FloorPlans($data ,$count ,$id)
    {	
    	// dd($count);
	   for($i=0; $i<$count ; $i++)
        {		
            $paymentPlan =new FloorPlan;
            $paymentPlan->title =$data['title'][$i];
            $paymentPlan->description =$data['description'][$i];
             if(!empty($data['image'][$i])){
            $paymentPlan->image =$this->upload_single_image_with_water_mark($data['image'][$i]);
             }
            $paymentPlan->property_id =$id;
            $paymentPlan->save();
          
        }
    }
    public function isLive(){
        return $_SERVER['SERVER_NAME'] == "127.0.0.1" ? false : true;
    }
    public function getPublicPath(){
        // Uploads must always land inside the web root. This used to key off
        // isLive(), which was true for any host other than 127.0.0.1, so both
        // "localhost" and production wrote outside public/ and 404ed.
        return "/public";
    }



    public function upload_single_image_with_water_mark($img)
    { 
        $original_image_size = ["width" => 1024, "height" => 768];
        $thumb_image_size = ["width" => 107, "height" => 80];

        $img_helper = new ImageHelper;
        $pic_name = $img->getClientOriginalName();
        $new_name = time() . '.' .$pic_name;
        $img->move(base_path() .  $this->getPublicPath().'/images/property/floorPlan/', 'original_'.$new_name);
        $targetPath = base_path() .  $this->getPublicPath().'/images/property/floorPlan/';
        $path = $new_name;
        $path = 'original_'.$new_name; 
        $img_helper->load($targetPath. $path);
        $img_helper->resize(1024,768);
        $img_helper->saveImage($targetPath.'original_'.$new_name);
        $img_helper->load($targetPath. $path);
        $img_helper->resize(200,150);
        $img_helper->saveImage($targetPath.'thumb_'.$new_name); 
        $watermark =Image::make(base_path() .$this->getPublicPath().'/images/'.'water-mark.png');
        $original_image =Image::make(base_path() .$this->getPublicPath().'/images/property/floorPlan/'.'original_'.$new_name);
        $resizePercentage = 70;//70% less then an actual image (play with this value)
        $watermarkSize = round($original_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
        $watermark->resize($watermarkSize, null, function ($constraint) {
        $constraint->aspectRatio();
        });
        $original_image->insert($watermark, 'center');
        $original_image->save(base_path() .  $this->getPublicPath().'/images/property/floorPlan/original_'.$new_name);
        $thumb_image =Image::make(base_path() .$this->getPublicPath().'/images/property/floorPlan/'.'thumb_'.$new_name);
        $watermarkSize = round($thumb_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
        $watermark->resize($watermarkSize, null, function ($constraint) {
        $constraint->aspectRatio();
        });
        $thumb_image->insert($watermark, 'center');
        $thumb_image->save(base_path() .  $this->getPublicPath().'/images/property/floorPlan/thumb_'.$new_name);    
        return $new_name;
    }
    
     public function update_all_old($data)
    {       

            for($i=0; $i<count($data['id']) ; $i++)
            {
                $floorPlan =FloorPlan::find($data['id'][$i]);
                $floorPlan->title =$data['title'][$i];
                $floorPlan->description =$data['description'][$i];
                if(!empty($data['image'][$i]))
                {
                    $floorPlan->image =$this->upload_single_image_with_water_mark($data['image'][$i]);
                }
                $floorPlan->update();
            }
    }
     public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
