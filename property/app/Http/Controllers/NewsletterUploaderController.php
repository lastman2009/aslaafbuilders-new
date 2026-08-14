<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
//use Chumper\Zipper\Zipper;
use League\Flysystem\Filesystem;
use League\Flysystem\ZipArchive\ZipArchiveAdapter;
//use Chumper\Zipper\Zipper;
use ZipArchive;
use File;


class NewsletterUploaderController extends Controller
{
    public function templeteUpload()
    {
        return view('newslatter.upload');
    }


     public function uploadZipFile()
    {

        return view('uploadFiles.uploadZipFileView');

    }

     public function uploadedZipFile()
    {
        // return File::get(public_path() . '/unzips/new theme/index.blade.php');
        return view('uploadFiles.uploadZipFileView');

    }



}
