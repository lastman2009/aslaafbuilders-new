<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrivacyPolicy;
use DB;
use App\Http\Requests\StorePrivacyPolicyPost;
class PrivatePolicyController extends Controller
{
    public function edit()
    {  
    	$privacyPolicy = PrivacyPolicy::find(1);
        return view('privacyPolicy.editPrivatePolicy', compact('privacyPolicy'));
    }

    public function update(StorePrivacyPolicyPost $request)
    {
    	$privacyPolicy = PrivacyPolicy::find(1);
        $privacyPolicyUpdate = $request->all();
        $privacyPolicy->update($privacyPolicyUpdate);
        return redirect('dashboard/privatePolicy/edit');
    }
    public function privatePolicy()
    {   
        // dd('2');
        $privacyPolicy = PrivacyPolicy::find(1);
        return view('privacyPolicy.privacyPolicyMain', compact('privacyPolicy'));
    }
}
