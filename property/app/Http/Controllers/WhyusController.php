<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhyUs;
use DB;
use App\Http\Requests\StoreWhyUsPost;


class WhyusController extends Controller
{
    public function edit()
    {
    	$whyUs = WhyUs::find(1);
        return view('whyus.editWhyUs', compact('whyUs'));
    }

    public function update(Request $request)
    {
      
    	$whyUs = WhyUs::find(1);
        $whyUsUpdate = $request->all();
        $whyUs->update($whyUsUpdate);
        return back();
    }

    public function whyusmain()
    {
    	$whyUs = WhyUs::find(1);
        return view('whyus.whyusMain', compact('whyUs'));
    }
}
