<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
   public function userAccountDetail()
   {
   	return view('account.userAccountDetail');
   }
}
