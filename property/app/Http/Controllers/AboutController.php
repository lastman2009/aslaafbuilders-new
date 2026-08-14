<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Meta;

class AboutController extends Controller
{
    public function index(){
        $content = About::find(1);
        $meta=Meta::find(3);
        $title =$meta->meta_title;
        $description =$meta->meta_description;
        $keyword =$meta->meta_keyword;
        return view('pages.about-us', compact('content','title','description','keyword'));
    }
    public function edit(){
//        dd('aliuw');
        $content = About::find(1);
        return view('dashboard.pages.aboutUsContent', compact('content'));
    }
    public function update(Request $request){
        $about = About::find(1);
        $about->first_area = $request->first_area;
        $about->second_area = $request->second_area;
//        $about->third_area = $request->third_area;
        $about->update();
        return back();
    }
}
