<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use Illuminate\Http\Request;
use App\Client;
use DB;
use App\PropertyValueAssessment;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadImagesView()
    {
      
        return view('uploadFiles.uploadFileView');
    }
    public function blogImageGallery(){
       
        $images =  DB::table('image_uploads')->orderBy('id', 'desc')->get();
            // dd($images[0]->image);
        // $ImageUpload = $ImageUpload[0]->image;
        // $images = explode(';', $ImageUpload );
     // dd($images);
        return view('uploadFiles.blogImageGallery',compact('images'));

    }

    public function uploaded_images_save(Request $request)
    {
        $array = $request->images;

        $images = $this->upload_multiple_image_save_in_folder($array, 'uploaded_images');


        $img_string = implode(';', $images);
        $uploads = new ImageUpload;

        $uploads->title = $request->title;
        $uploads->description = $request->description;
        $uploads->image = $img_string;
        $uploads->save();

        return back();

    }
    public function valueProperties(){
        $valueProperties = PropertyValueAssessment::get();
        return view('uploadFiles.valueProperty')->with(compact('valueProperties'));
    }


}