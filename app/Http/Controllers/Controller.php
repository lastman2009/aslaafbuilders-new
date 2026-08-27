<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;
use App\ImageHelper;
use \Cache;
use App\City;
use App\PropertyType;
use Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $allowed_image_extensions = ["png", "jpg", "jpeg"];
    protected $allowed_document_extensions = ["docx", "pdf", "docs"];

    public function isLive(){
        return $_SERVER['SERVER_NAME'] == "127.0.0.1" ? false : true;
    }
    public function getPublicPath(){
        // Uploads must always land inside the web root. This used to key off
        // isLive(), which was true for any host other than 127.0.0.1, so both
        // "localhost" and production wrote outside public/ and 404ed.
        return "/public";
    }
    public function isImage($image, $allowed_extensions = array()){
        return empty($allowed_extensions) ? $this->fileExtensionChecker($image, $this->allowed_image_extensions) : $this->fileExtensionChecker($image, $allowed_extensions);
    }
    public function isDocument($file, $allowed_extensions = array()){
        return empty($allowed_extensions) ? $this->fileExtensionChecker($file, $this->allowed_document_extensions) : $this->fileExtensionChecker($file, $allowed_extensions);

    }
    private function fileExtensionChecker($file, $allowed_extensions){
        return in_array(strtolower($file->getClientOriginalExtension()), $allowed_extensions) ? true : false;
    }
    public function upload_multiple_image_save_in_folder($images_array,$folderName)
    {
        $images = array();
        foreach ($images_array as $img) {
            $pic_name = $img->getClientOriginalName();
            $new_name = time() . '.' .$pic_name;
            $img->move(base_path() . $this->getPublicPath().'/images/'.$folderName, $new_name);
            $images[]=$new_name;
        }
        return $images;
    }
    public function imageResolution($image)
    {
        $width=1400;
        $height=875;
        $size=getimagesize($image);
        if($size[0]>=$width && $size[1]>=$height)
        {
            dd("you did it bro");
        }
        else
        {
            dd("Try again");
        }

    }

    public function upload_multiple_image_and_resize_save_in_folder($images_array,$folderName,$width,$height)
    {
        $flag=true;
        // dd("0");
        foreach ($images_array as $img) {
            // dd("1");
         if(!$this->isImage($img))
            {
                // dd("here");
                $flag = false;

            }
        }
        if(!$flag)
        {
            return false;

        }
        $images = array();
        foreach ($images_array as $img) {
            $pic_name = $img->getClientOriginalName();
            $new_name = time() . '.' .$pic_name;
            $thumb_image=Image::make($img)->fit($width, $height);
            $img->move(base_path() .  $this->getPublicPath().'/images/'.$folderName, $new_name);
            $thumb_image->save(base_path() .  $this->getPublicPath().'/images/'.$folderName.'/thumb_'.$new_name);
            $images[]=$new_name;
        }
        return $images;
    }

    public function upload_multiple_image_and_resize_save_in_folder_property($images_array,$folderName)
    { 

     $flag=true;
     
        foreach ($images_array as $img) {
         if(!$this->isImage($img))
            {
                $flag = false;
            }
        }
        if(!$flag)
        {
            return false;

        }

        $original_image_size = ["width" => 1024, "height" => 768];
        $thumb_image_size = ["width" => 274, "height" => 205];

        
        // foreach ($images_array as $img) {
        //      $watermark =Image::make(base_path() .$this->getPublicPath().'/images/'.'water-mark.png');
        //     $pic_name = $img->getClientOriginalName();
        //     $new_name = time() . '.' .$pic_name;
        //     $original_image=Image::make($img)->fit($original_image_size["width"], $original_image_size["height"]);
        //     $thumb_image=Image::make($img)->fit($thumb_image_size["width"], $thumb_image_size["height"]);  
            
        //     // $img->move(base_path() .  $this->getPublicPath().'/images/property/'.$folderName, $new_name);
        //     /*adding water mark here on original image*/

        //     $resizePercentage = 70;//70% less then an actual image (play with this value)
        //     $watermarkSize = round($original_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
            
        //     $watermark->resize($watermarkSize, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     });

        //     $original_image->insert($watermark, 'center');

           
        //     $original_image->save(base_path() .  $this->getPublicPath().'/images/property/'.$folderName.'/original_'.$new_name);
        //     /* adding watermark for thumbnail here */
        //      $resizePercentage = 70;//70% less then an actual image (play with this value)
        //     $watermarkSizeThumb = round($thumb_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
            
        //     $watermark->resize($watermarkSizeThumb, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     });
        //     $thumb_image->insert($watermark, 'center');
        //     $thumb_image->save(base_path() .  $this->getPublicPath().'/images/property/'.$folderName.'/thumb_'.$new_name);
        //     $images[]=$new_name;
        // }

         $img_helper = new ImageHelper;
        $images = array();

        foreach ($images_array as $img) {
          # code...

          $pic_name = $img->getClientOriginalName();
          $new_name = time() . '.' .$pic_name;

          $img->move(base_path() .  $this->getPublicPath().'/images/property/user_property/', 'original_'.$new_name);

          $targetPath = base_path() .  $this->getPublicPath().'/images/property/user_property/';
          $path = $new_name;
          $path = 'original_'.$new_name;
          
          $img_helper->load($targetPath. $path);
          $img_helper->resize(1024,768);
          $img_helper->saveImage($targetPath.'original_'.$new_name);

//            $targetPath2 = base_path() .  $this->getPublicPath().'/images/property/medium_property_images';
//            $img_helper->load($targetPath.'/'. $new_name);
//            $img_helper->resize(260,195);
//            $img_helper->saveImage($targetPath2.'/'.$new_name);

          $img_helper->load($targetPath. $path);
          $img_helper->resize(274,205);
          $img_helper->saveImage($targetPath.'thumb_'.$new_name); 
          
          /**/
          $watermark =Image::make(base_path() .$this->getPublicPath().'/images/'.'water-mark.png');
          /**/

          $original_image =Image::make(base_path() .$this->getPublicPath().'/images/property/user_property/'.'original_'.$new_name);

          $resizePercentage = 70;//70% less then an actual image (play with this value)
          $watermarkSize = round($original_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
          $watermark->resize($watermarkSize, null, function ($constraint) {
              $constraint->aspectRatio();
          });
          $original_image->insert($watermark, 'center');
          $original_image->save(base_path() .  $this->getPublicPath().'/images/property/user_property/original_'.$new_name);

          $thumb_image =Image::make(base_path() .$this->getPublicPath().'/images/property/user_property/'.'thumb_'.$new_name);
          $watermarkSize = round($thumb_image->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
          $watermark->resize($watermarkSize, null, function ($constraint) {
              $constraint->aspectRatio();
          });
          $thumb_image->insert($watermark, 'center');
          $thumb_image->save(base_path() .  $this->getPublicPath().'/images/property/user_property/thumb_'.$new_name);

          $images[] = $new_name;
        }
        return $images;
    }


    public function upload_video_in_folder($video,$folderName)
    {  
        $video_name = $video->getClientOriginalName();
        $new_name = time() . '.' .$video_name;
        $video->move(base_path() . $this->getPublicPath().'/images/'.$folderName, $new_name);
        return $new_name;
    }
    public function upload_single_image_and_resize_save_in_folder($img,$folderName,$width,$height)
    {
        $images ="";
        
            $pic_name = $img->getClientOriginalName();
            $new_name = time() . '.' .$pic_name;
            $thumb_image=Image::make($img)->fit($width, $height);
            $img->move(base_path() .  $this->getPublicPath().'/images/'.$folderName, $new_name);
            $thumb_image->save(base_path() .  $this->getPublicPath().'/images/'.$folderName.'/thumb_'.$new_name);
            $images=$new_name;
        
        return $images;
    }
    public function upload_single_map($img,$folderName)
    {   
        $images ="";
        
            $pic_name = $img->getClientOriginalName();
            $new_name = time() . '.' .$pic_name;
            $img->move(base_path() .  $this->getPublicPath().'/images/'.$folderName, $new_name);
            $images=$new_name;
        
        return $images;

    }
    public function upload_multiple_image_save_in_folder_document($images_array,$folderName)
    {
        $images = array();
        foreach ($images_array as $img) {
            $pic_name = $img->getClientOriginalName();
            $new_name = time() . '.' .$pic_name;
            $img->move(base_path() . $this->getPublicPath().'/'.$folderName, $new_name);
            $images[]=$new_name;
        }
        return $images;
    }
     public function upload_single_banner_image_and_resize_save_in_folder($img,$folderName,$width,$height)
    {
          $original_image_size = ["width" => 1920, "height" => 1165];
            $images ="";
        
            $pic_name = $img->getClientOriginalName();
            $new_name = time() . '.' .$pic_name;
            $thumb_image=Image::make($img)->fit($width, $height);
            $original_image=Image::make($img)->fit($original_image_size["width"], $original_image_size["height"]);


            // $img->move(base_path() .  $this->getPublicPath().'/images/'.$folderName, $new_name);

            $thumb_image->save(base_path() .  $this->getPublicPath().'/images/'.$folderName.'/thumb_'.$new_name);

            $original_image->save(base_path() .  $this->getPublicPath().'/images/'.$folderName.'/original_'.$new_name);

            $images=$new_name;
        
        return $images;
    }
    public function addwatermark()
    {
        $watermark =Image::make(base_path() .'/public'.'/images/'.'water-mark.png');
         
        $img =Image::make(base_path() .'/public'.'/images/'.'original_1503927003.dfgefswg.jpg');
        
        $resizePercentage = 70;//70% less then an actual image (play with this value)
        $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); //watermark 
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->insert($watermark, 'center');
        $img->save(base_path() .'/public'.'/images/'.'test/'.'150329820.jpg');
        dd("done");
    }
    public function getAllCities(){
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
    public function getAllPropertyTypes(){
        $bundle = [];
        if(Cache::has('propertyTypes')){  
           $bundle = Cache::get('propertyTypes');
        }
        else{
        
            $bundle = Cache::remember('propertyTypes',Config::get('cache.cache_duration'), function() {
                $data=[];

                $propertyTypes=PropertyType::where('status',1)->get();
                $parents = [];
                foreach($propertyTypes as $par){
                    if($par->parent == 0){
                        $parents[] = $par;
                    } 
                }
                $datas = [];
                foreach($parents as $parent){
                    foreach($propertyTypes as $types){
                        if($types->parent == $parent->id){
                            $datas[] = $types;
                        }
                    }
                    $data[$parent->id] = $datas;
                    $datas = [];
                }
                $propertyTypes = $parents;
                $bundle["data"] = $data;
                $bundle["propertyTypes"] = $propertyTypes;
                //dd($bundle);
                return $bundle;
            });
        }
        return $bundle;
    }
    
    public function phoneapi($mobile,$message)
    {
        $username = Config::get('phone.number');///Your Username
        $password = Config::get('phone.pass');///Your Password
        $sender = Config::get('phone.senderID');
        $mobile = $mobile;///Recepient Mobile Number
        $message = $message;
        $post = "sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&message=".urlencode($message)."";
        $url = "http://sendpk.com/api/sms.php?username=$username&password=$password&sender=BrandName&mobile=$mobile&message=$message";
        $ch = curl_init();
        $timeout = 30; // set to zero for no timeout
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        return $result;
    }
    
}

