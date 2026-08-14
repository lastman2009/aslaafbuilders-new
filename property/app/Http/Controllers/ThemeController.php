<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use File;

class ThemeController extends Controller
{
    public function createprofileTheme()
    {
        // return File::get(public_path() . '/unzips/atif/index.html');

        return view('profileTheme.createUploadProfileTheme');
    }

    public function uploadProfileTheme(Request $request)
    {
        if (file_exists(public_path('unzips/' . $request->name))) {
            echo "File " . $request->name . "  already exist";
        } else {
            $theme = new Theme;
            $theme->name = $request->name;
            $theme->description = $request->description;
            $theme->status = 1;
            $theme->frequency = 0;
            $theme->thumbnail = 'thumbnail.jpg';
            $theme->save();
            return view('profileTheme.createUploadProfileTheme');
        }
    }

    public function updateProfiletheme()
    {
        $files = File::directories('unzips');
        return view('profileTheme.updateUploadProfileTheme', compact('files'));
    }

    public function uploadUpdatedProfileTheme(Request $request)
    {
        File::deleteDirectory("unzips/" . $request->name);
        $theme = new Theme;
        $theme->name = $request->name;
        $theme->description = $request->description;
        $theme->status = 1;
        $theme->frequency = 0;
        $theme->thumbnail = 'thumbnail.jpg';
        $theme->save();
        $files = File::directories('unzips');
        return view('profileTheme.updateUploadProfileTheme', compact('files'));
    }

    public function previewProfileTheme()
    {
        dd('hahahahahahhaha tenu nae pata abi discus hona hay');
    }
}