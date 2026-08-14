<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Redirect;

class PasswordController extends Controller
{

    public function resetPassword(Request $request)
    {
	  
    	 $user=User::where('id',Auth::id())->first();
    	 $password =bcrypt($request->password);
    	 $check=Hash::check($request->password, $user->password);
    	 if($check == true)
    	 	{
    	 		$user->password =bcrypt($request->new_password);
    	 		$user->update();
                // dd('asdasd');
                return redirect('/password')->with('error', 'Wrong Old Passowrd');

            }
            else
            {
                
    	 		return redirect('/password')->with('message', 'Password Updated!');
    	 		
    	 	}		

    	 	

    }
}
