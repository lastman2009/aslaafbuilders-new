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
    public function blogImageGallery(Request $request){

        $perPage = (int) $request->input('per_page', 20);
        $perPage = in_array($perPage, [12, 24, 48, 96], true) ? $perPage : 24;

        $search = trim((string) $request->input('q', ''));

        // The `image` column holds a ';'-joined list, so one row can expand to
        // several images. Rows are paginated (not individual images) because the
        // column is read this way everywhere else in the app.
        $rows = ImageUpload::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%')
                      ->orWhere('image', 'like', '%' . $search . '%');
                });
            })
            ->orderByDesc('id')
            ->paginate($perPage)
            ->withQueryString();

        // Flatten each row's ';'-joined filenames into one image per card.
        $images = [];
        foreach ($rows as $row) {
            foreach (array_filter(array_map('trim', explode(';', (string) $row->image))) as $file) {
                $images[] = [
                    'id'          => $row->id,
                    'file'        => $file,
                    'title'       => $row->title,
                    'description' => $row->description,
                    'created_at'  => $row->created_at,
                    'url'         => asset('/images/uploaded_images/' . $file),
                ];
            }
        }

        return view('uploadFiles.blogImageGallery', compact('rows', 'images', 'perPage', 'search'));
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