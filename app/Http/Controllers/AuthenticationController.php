<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use Redirect;
use Session;
use Validator;
use Mail;
use Illuminate\Support\Facades\Request as Input;
use Socialite;
use Illuminate\Mail\Mailer;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Cache;
use App\Events\NewUser;
use Event;
use App\UserCharacterType;
use App\CharacterType;
use App\UserCharacterDetail;
use App\PHPMailer\PHPMailer;
use App\PHPMailer\SMTP;
use App\PHPMailer\Exception;
use View;
use \Crypt;
use Response;
use App\Statistic;
use App\AgencyWebsite;
use DB;
class AuthenticationController extends Controller
{
	private $upload = 'image/logo';
	const ACTIVE_USER = 1;
		///FACE BOOK //////
    public function redirectToProvider()
    {
        // dd(Socialite::driver('facebook')->redirect());
    	return Socialite::driver('facebook')->redirect(); 
    }

    public function handleProviderCallback()
	{
	  
    	try{
            $users=Socialite::driver('facebook')->user();
        }catch(Exception $e){
       
            return redirect('auth/facebook');
        }
        // dd($users);
        $authUser = $this->findOrCreateUser($users ,"facebook");
        Auth::login($authUser);
        return redirect()->back();
    }
    	///Gmail //////
	public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderGoogleCallback()
    {
        $users = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateUser($users ,"google");
        Auth::login($authUser);
        return redirect('/');
    }

 //    public function login(Request $request)
 //    {
 //    	$rules = array (
	// 			'username' => 'required',
	// 			'password' => 'required' 
	// 	);
	// 	$validator = Validator::make ( Input::all (), $rules );
	// 	if ($validator->fails ()) {
	// 		return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
	// 	} else {
	// 		$field = "";
	// 		if(!is_numeric($request->get ( 'username' ))){
	// 			$field = "email";
	// 			$data=$request->get ( 'username' );
	// 		}else{
	// 			$field = "telephone";
	// 			$data =$this->sanitizeNumber($request->get ( 'username' ));
	// 		}

	// 		if (Auth::attempt ( array (
	// 			$field => $data,
	// 			'password' => $request->get ( 'password' ),
	// 			'status' => 1
	// 		) )) {
	// 				session ( [ 
	// 						'name' => $request->get ( 'username' ) 
	// 				] );
	// 				// return Redirect::back ();
	// 				return redirect()->back();
	// 		} else
	// 		 {

	// 		 	 $phone =$this->sanitizeNumber($request->username);
 //                if(!empty($phone))
 //                {
 //                    $user=User::where('telephone',$phone)->first();
 //                }else{
 //                    $user=User::where('email', $request->username)->first();
 //                }
			 
	// 			// $user=User::where('email', $request->username)->orWhere('telephone',$phone)->first();
				

	// 			// dd($request->all());	
	// 			if($user != null)
	// 			{		

	// 				if($user->status == 0)
	// 				{
	// 					Cache::flush();
	// 					// return Redirect::back()->withErrors(["Please Activate Your Account First :)"]);
	// 				return redirect('/loginForm')->with('error', 'Please Activate Your Account First ');
	// 				}
	// 				else if($user->status == 2)
	// 				{
	// 					return redirect('/loginForm')->with('error', 'Due to some reason your account is block');
	// 				}
					
	// 			}
	// 			return Redirect::back()->withErrors(["Wrong Credentials"]);
	// 		}	
	// 	}
	// }


	    public function login(Request $request)
    {
    	$rules = array (
				'username' => 'required',
				'password' => 'required'
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
		} else {
			$field = "";
			if(!is_numeric($request->get ( 'username' ))){
				$field = "email";
				// return Response::json("email ha");
				$data=$request->get ( 'username' );
			}else{
				$field = "telephone";

				$data =$this->sanitizeNumber($request->get ( 'username' ));
			}

			if (Auth::attempt ( array (
				$field => $data,
				'password' => $request->get ( 'password' ),
				'status' => 1
			) )) {
					session ( [
							'name' => $request->get ( 'username' )
					] );
					if(!empty($request->identifier)){
						$data=Auth::user();
						return Response::json($data);
					}

					// return Redirect::back ();
					return redirect()->back();
			} else
			 {

				 //return Response::json($request->username);


			 	 $phone =$this->sanitizeNumber($request->username);
				if(!empty($phone)){
					$user=User::where('telephone',$phone)->first();
				}else{
					$user=User::where('email', $request->username)->first();
				}




				// dd($request->all());
				if($user != null)
				{

					if($user->status == 0)
					{
						Cache::flush();

						if(!empty($request->identifier)){
							return Response::json(3);
						}
						// return Redirect::back()->withErrors(["Please Activate Your Account First :)"]);
					return redirect('/loginForm')->with('error', 'Please Activate Your Account First ');
					}
					else if($user->status == 2)
					{
						if(!empty($request->identifier)){
							return Response::json(2);
						}
						return redirect('/loginForm')->with('error', 'Due to some reason your account is block');
					}

				}
				if(!empty($request->identifier)){
					return Response::json(0);
				}
				//return Redirect::back()->withErrors(["Wrong Credentials"]);
                 return redirect('/loginForm')->with('error', 'Wrong Credentials');
			}
		}
	}
// 	public function register(Request $request)
// 	{

// 		if($this->isExist($request->username) != true)
// 		{
// 			$field = $request->get ('username');


// 			$rules = array (
// 					'username' => 'required|min:4',
// 					'password' => 'required|min:6'
// 			);
// 			$validator = Validator::make ( Input::all (), $rules );
// 			if ($validator->fails ()) {

// 				return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
// 			} else {
// 			$user = new User ();
// 				if(!is_numeric($field))
// 				{
// 					if($this->isEmail($field))
// 					{
// 						$user->email = $field;
// 					}
// 					else
// 					{
// 						return redirect('/register')->with('error', 'Please Enter Email correctly');
// 					}
// 				}
// 				else
// 				{
// 					if(strlen($field) >= 9)
// 					{
// 						if($number = $this->sanitizeNumber($field)){
// 						$user->telephone = $number;
// 						}else
// 						{
// 							return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
// 						}
// 					}else
// 					{
// 						return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
// 					}
// 				}
// 				$user->activation_code = $this->generateCode($request->username);

// 				$user_name = explode(' ', $request->get ( 'first_name' ));

// 				$user->first_name = $user_name[0];
// 				if(isset($user_name[1])){
// 					$last_name = $user_name[1];
// 					if(isset($user_name[2])){
// 						for($i=2; $i<count($user_name); $i++){
// 							$last_name .= ' '.$user_name[$i];
// 						}
// 					}
// 					$user->last_name = $last_name;
// 				}
// 				$user->status = 1;
// 				$user->role_id = 2;
// 				$user->password = Hash::make ( $request->get ( 'password' ) );
// 				$user->remember_token = $request->get ( '_token' );
// 				$user->save ();
// 				//////Add static total users  temperory///////
// 				$propertyobject = new Statistic();
//             	$propertyobject->updateStats('total_user');
// 				/////Create USer Character Type /////////////
// 				$userCharacterType =new UserCharacterType;
// 				$userCharacterType->user_id =$user->id;
// 				$userCharacterType->status=0;
// 				$userCharacterType->character_type_id =CharacterType::where('name','agent')->first()->id;
// 				$userCharacterType->save();
// 				if(!is_numeric($field)){
				    
// 				    if(!empty($request->identifier))
//     				{
//     					return Response::json('2');
//     				}
// 					// Event::fire(new NewUser($user));

// 					return redirect('/loginForm')->with('status', 'We sent you an activation code. Check your email.');
// 				}
// 				else
// 				{
// 					// $uri = "http://www.hajanaone.com/api/sendsms.php?apikey=YG1UgPRYPdB9&phone=$user->telephone&sender=SmartSMS&message=localhost:8000/activate/$user->activation_code";
// 					// get_headers($uri);
// 					// return redirect('/activate/user')->with('status', 'We sent you an activation code. Check your Mobile Phone.');
// 				if(!empty($request->identifier))
// 				{
				
// 					return Response::json('1');
// 				}
// 				else {
// 					return redirect('/loginForm')->with('status', 'Welcome to Rightdeed ');
// 				}

// 				}
// 			}
// 		}
// 		else
// 		{
//             	if(!empty($request->identifier))
// 				{
				
// 					return Response::json('0');
// 				}
// 			return Redirect::back()->withErrors(['Email/Mobile is invalid or already Exist " Try Again"']);
// 			// return Redirect::back()->with('msg', 'Email/Mobile allready Exist " Try Again"');
// 		}
// 	}

public function dataEntrySignup(Request $request)
{
    $condition_message = $this->isExist($request);
    if($condition_message == false)
    {
        $field = $request->get ('username');
        $rules = array (
            'username' => 'required|min:4',
            'password' => 'required|min:6'
        );
        $validator = Validator::make ( Input::all (), $rules );
        if ($validator->fails ()) {

            return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
        } else {
            $user = new User ();
            if(!is_numeric($field))
            {
                if($this->isEmail($field))
                {
                    $user->email = $field;
                }
                else
                {
                    return redirect('/register')->with('error', 'Please Enter Email correctly');
                }
            }
            else
            {
                if(strlen($field) >= 9)
                {
                    if($number = $this->sanitizeNumber($field)){
                        $user->telephone = $number;
                    }else
                    {
                        return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
                    }
                }else
                {
                    return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
                }
            }
            $user_name = explode(' ', $request->get ( 'first_name' ));

            $user->first_name = $user_name[0];
            if(isset($user_name[1])){
                $last_name = $user_name[1];
                if(isset($user_name[2])){
                    for($i=2; $i<count($user_name); $i++){
                        $last_name .= ' '.$user_name[$i];
                    }
                }
                $user->last_name = $last_name;
            }
            $user->status = 1;
            $user->role_id = 2;
            $user->password = Hash::make ( $request->get ( 'password' ) );
            $user->remember_token = $request->get ( '_token' );
            $user->save ();
            /////Create USer Character Type /////////////
            $userCharacterType =new UserCharacterType;
            $userCharacterType->user_id =$user->id;
             $userCharacterType->status=1;
            $userCharacterType->character_type_id =CharacterType::where('name','agent')->first()->id;
            $userCharacterType->save();
            if(!is_numeric($field)){

                return redirect('/loginForm')->with('status', 'Welcome to Rightdeed');
            }
            else
            {
                    return redirect('/loginForm')->with('status', 'Welcome to Rightdeed ');
            }
        }
    }
}
public function register(Request $request)
	{
	   
	  	// return Response::json($request->all());
		$condition_message = $this->isExist($request);
		//return $condition_message;
		if($condition_message == false)
		{
			$field = $request->get ('username');


			$rules = array (
					'username' => 'required|min:4',
					'password' => 'required|min:6'
			);
			$validator = Validator::make ( Input::all (), $rules );
			if ($validator->fails ()) {

				return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
			} else {
			$user = new User ();
				if(!is_numeric($field))
				{
					if($this->isEmail($field))
					{
						$user->email = $field;
					}
					else
					{
						return redirect('/register')->with('error', 'Please Enter Email correctly');
					}
				}
				else
				{
					if(strlen($field) >= 9)
					{
						if($number = $this->sanitizeNumber($field)){
						$user->telephone = $number;
						}else
						{
							return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
						}
					}else
					{
						return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
					}
				}
				$user->activation_code = $this->generateCode($request->username);

				$user_name = explode(' ', $request->get ( 'first_name' ));

				$user->first_name = $user_name[0];
				if(isset($user_name[1])){
					$last_name = $user_name[1];
					if(isset($user_name[2])){
						for($i=2; $i<count($user_name); $i++){
							$last_name .= ' '.$user_name[$i];
						}
					}
					$user->last_name = $last_name;
				}
				// $user->status = 0;
                $user->status = 1;
				$user->role_id = 2;
				$user->password = Hash::make ( $request->get ( 'password' ) );
				$user->remember_token = $request->get ( '_token' );
				$user->save ();
				/////Create USer Character Type /////////////
				$userCharacterType =new UserCharacterType;
				$userCharacterType->user_id =$user->id;
				$userCharacterType->status=0;
				// $userCharacterType->status=1;
				$userCharacterType->character_type_id =CharacterType::where('name','agent')->first()->id;
				$userCharacterType->save();
				if(!is_numeric($field)){
					//Event::fire(new NewUser($user));
				    
				//  	$this->verificationEmail($user);
					//@TODO
				// 	return redirect('/loginForm')->with('status', 'We sent you an activation code. Check your email.');
				if(!empty($request->identifier))
					{
					         $data= "Registered Successfully";
						return Response::json(1);
					}
					
				return redirect('/loginForm')->with('status', 'You are registered , Please login now');
				}
				else
				{
				    // $uri = "http://www.hajanaone.com/api/sendsms.php?apikey=YG1UgPRYPdB9&phone=$user->telephone&sender=SMS-ALERT&message=http://rightdeed.com/activate/$user->activation_code";
					///////////////get_headers($uri);
					if(!empty($request->identifier))
					{
						
				// 		$data= "We sent you an activation code. Check your Mobile Phone.";
				        // $data= "Registered Successfully";
						return Response::json(1);
					}
					else
					{
						return redirect('/loginForm')->with('status', 'Welcome to Rightdeed ');
					}
				}
			}
		}
		else
		{
			if(!empty($request->identifier))
			{	
				return Response::json($condition_message);
			}
			return Redirect::back()->withErrors([$condition_message.' " Try Again"']);
			// return Redirect::back()->with('msg', 'Email/Mobile allready Exist " Try Again"');
		}
	}

    public function SmsActivation($code = "")
	{	
		// $code= $request->activation;
		if( ! $code)
        {
           	return redirect('/activate/user')->with('error', 'NO Activation Code :)');        
        }
        else
		{
			$user =User::where('activation_code' ,$code)->first();
			// dd(strcmp($user->activation_code, $code));
			if(!empty($user))
			{
				if (strcmp($user->activation_code, $code) == 0) {
					$user->status =1;
					$user->activation_code="";
					$user->update();
					return redirect('/loginForm')->with('active', 'Thanks for Activation');
				}
			}
			return redirect('/activate/user')->with('error', 'Wrong Activation Code :)');    
		}
		return redirect('/activate/user')->with('error', 'no code exist');    
	}
	// public function register(Request $request) 
	// {
		
	// 	if($this->isExist($request->username) != true)
	// 	{
	// 		$field = $request->get ('username');
			
	// 		$rules = array (	
	// 				'username' => 'required|min:4',
	// 				'password' => 'required|min:6' 
	// 		);
	// 		$validator = Validator::make ( Input::all (), $rules );
	// 		if ($validator->fails ()) {

	// 			return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
	// 		} else {				 
	// 		$user = new User ();
	// 			if(!is_numeric($field))
	// 			{
	// 				if($this->isEmail($field))
	// 				{
	// 					$user->email = $field;						
	// 				}
	// 				else
	// 				{
	// 					return redirect('/register')->with('error', 'Please Enter Email correctly');
	// 				}
	// 			}
	// 			else
	// 			{	
	// 				if(strlen($field) >= 9)
	// 				{
	// 					if($number = $this->sanitizeNumber($field)){
	// 					$user->telephone = $number;	
	// 					}else
	// 					{
	// 						return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
	// 					}
	// 				}else
	// 				{
	// 					return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
	// 				}
	// 			}
	// 			$user->activation_code = $this->generateCode($request->username);

	// 			$user_name = explode(' ', $request->get ( 'first_name' ));

	// 			$user->first_name = $user_name[0];
	// 			if(isset($user_name[1])){
	// 				$last_name = $user_name[1];
	// 				if(isset($user_name[2])){
	// 					for($i=2; $i<count($user_name); $i++){
	// 						$last_name .= ' '.$user_name[$i];
	// 					}
	// 				}
	// 				$user->last_name = $last_name;
	// 			}
	// 			$user->status = 0;
	// 			$user->role_id = 2;
	// 			$user->password = Hash::make ( $request->get ( 'password' ) );
	// 			$user->remember_token = $request->get ( '_token' );
	// 			$user->save ();
	// 			/////Create USer Character Type /////////////
	// 			$userCharacterType =new UserCharacterType;
	// 			$userCharacterType->user_id =$user->id;
	// 			$userCharacterType->status=0;
	// 			$userCharacterType->character_type_id =CharacterType::where('name','agent')->first()->id;
	// 			$userCharacterType->save();
	// 			if(!is_numeric($field)){

	// 				$email =$this->verificationEmail($user);

	// 				// Event::fire(new NewUser($user));
				
	// 				return redirect('/loginForm')->with('status', 'We sent you an activation code. Check your email.');	
	// 			}
	// 			else
	// 			{
	// 				// $uri = "http://www.hajanaone.com/api/sendsms.php?apikey=YG1UgPRYPdB9&phone=$user->telephone&sender=SmartSMS&message=localhost:8000/activate/$user->activation_code";
	// 				// get_headers($uri);
	// 				// return redirect('/activate/user')->with('status', 'We sent you an activation code. Check your Mobile Phone.');
	// 			return redirect('/loginForm')->with('status', 'Welcome to Rightdeed ');
	// 			}
	// 		}
	// 	}
	// 	else
	// 	{
		
	// 		return Redirect::back()->withErrors(['Email/Mobile is invalid or already Exist " Try Again"']);
	// 		// return Redirect::back()->with('msg', 'Email/Mobile allready Exist " Try Again"');
	// 	}
	// }

	 public function verificationEmail($user)
    {
    	
    	 define("ENCRYPTION_KEY", "!@#$%^&*");
        $id = encrypt($user->id, ENCRYPTION_KEY);
    				$view = View::make('email.verify',compact('user','id'));
			        //$contents = (string) $view;
			        $contents = $view->render();
			   		
			        $mail =new PHPMailer;
			    try {
			         $mail->isSMTP(); 
		            $mail->CharSet = "utf-8"; 
		            $mail->SMTPAuth = true;  
		            $mail->SMTPSecure = "SSL"; 
		            $mail->Host = "c57407.sgvps.net";
		            $mail->Port = 587; 
		            $mail->Username = "support@rightdeed.com";
		            $mail->Password = "HG,zT=F0G705ki{6!h";
			        $mail->setFrom("support@rightdeed.com", "RightDeed");
			        $mail->Subject = "Rightdeed Activation Request";
                    $mail->MsgHTML($contents);
                    $mail->addAddress($user->email, "Rightdeed Mail Subscription");
                   if(!$mail->send()) 
                    {
                      
                           return back()-with('error',"Error occur");
                    } 
                    
			    } catch (phpmailerException $e) {
			        dd($e);
			    } catch (Exception $e) {
			        dd($e);
			    }
			    return true;

    }




	public function sendVerificationEmail($user){
		define("ENCRYPTION_KEY", "!@#$%^&*");
		$id = encrypt($user->id, ENCRYPTION_KEY);
		
		$data = ['name' =>$user->name,'activation_code' =>$user->activation_code ,'id' =>$id];
		Mail::send('email.verify', $data, function($message)
		{
		    $message->to('atifmalik2009@gmail.com', 'Jon Doe')->subject('Welcome!');
		}); 
			
		return redirect('/login')->with('status', 'We sent you an activation code. Check your email.');	
	}

	public function logout() {
		Session::flush ();
		Auth::logout ();
		return Redirect::back ();
	}

// 	public function isExist($username)
// 	{
// 		$field = '';
// 	 	if(is_numeric($username)){
// 	 		$field = 'telephone';
// 	 		$name = $this->sanitizeNumber($username);
// 	 		if(!empty($name))
// 	 			$username =$this->sanitizeNumber($username);
// 	 		else 
// 					return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
			
// 	 	}else{
// 	 		$field = 'email';
// 	 	}
// 	 	$data=User::where($field,$username)->first();
// 	 	if(!empty($data))
// 	 	{
// 	 		return true;
// 	 	}
// 	 	return false;
// 	}

public function isExist($request)
	{
		$username=$request->username;
		$field = '';
	 	if(is_numeric($username))
	 	{
	 		$field = 'telephone';
	 		$name = $this->sanitizeNumber($username);
	 		if(!empty($name))
	 		{
	 			$username =$this->sanitizeNumber($username);
	 		}
	 		else 
	 		{
				return 'Please Enter mobile Number correctly';
	 		}
			
	 	}
	 	else if (filter_var($username, FILTER_VALIDATE_EMAIL))
	 	{
	 		$field = 'email';
	 	}else{
	 		return 'Enter correct Email format';
	 	}
	 	$data=User::where($field,$username)->first();
	 	//return $data;
	 	if(!empty($data))
	 	{
	 		if($field == 'email')
				return 'Email is Already Register';
			else 
				return 'Mobile No already Registered';
	 	}
	 	return false;
	}
	public function generateCode($username)
	{
		$code = str_random(5);
		return !is_numeric($username) ? md5($code) : $code; 
	}

    public function isEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL)? true:false;
    }

    public function confirm($id,$activation_code )
    {	

        if(!$activation_code)
        {
           	return redirect('/loginForm')->with('error', 'Wrong Activation Code :)');        
        }
        define("ENCRYPTION_KEY", "!@#$%^&*");
	    $id = decrypt($id, ENCRYPTION_KEY);

        $user = User::find($id);
     	$id=$user->status;
     	
        if ($user->activation_code  == $activation_code && $id == 0)
        {
        	$user->status = 1;
	        $user->activation_code = null;
	        $user->save();
	    
    		return redirect('/loginForm')->with('active', 'Thanks for Activation');
        }
        if($id==2 && $user->activation_code == null)
        {	
        	return redirect('/loginForm')->with('block', 'Your Account has Blocked by Administration');
        }
         elseif($id==1 && $user->activation_code == null)
         {       	
           	return redirect('/loginForm')->with('already', 'Allready activated');
       	 }	
    }
    protected function findOrCreateUser($newUser,$from)
    {

    	if($from == "facebook")
    	{
	        $authUser = User::where('facebook_id', $newUser->id)->orWhere('email',$newUser->email)->first(); 	
	   	
	        if($authUser)
	        {
	        
	            return $authUser;
	        }
       		$user =new User;
       		if(isset($newUser->user['link']))
	        $user->facebook_link = $newUser->user['link'];
	        if(isset($newUser->user['email']))
	        $user->email =$newUser->user['email'];
        	$user->facebook_id =$newUser->id;
    	}
    	else if($from == "google")
    	{
    		 $authUser = User::where('google_id', $newUser->id)->orWhere('email',$newUser->email)->first(); 		
	        if($authUser)
	        {

	            return $authUser;
	        }
       		$user =new User;
	        $user->google_link = $newUser->user['url'];
	        $user->google_id =$newUser->id;
    	}	
        $user_name = explode(' ', $newUser->name);
		$user->first_name = $user_name[0];
		if(isset($user_name[1])){
			$last_name = $user_name[1];
			if(isset($user_name[2])){
				for($i=2; $i<count($user_name); $i++){
					$last_name .= ' '.$user_name[$i];
				}
			}
			$user->last_name = $last_name;
		}
		$user->status =1;
		$user->role_id = 2;
		$user->email =$newUser->email;
		// $user->image=$newUser->avatar;
		$user->save();
		$userCharacterType =new UserCharacterType;
		$userCharacterType->user_id =$user->id;
		$userCharacterType->status=0;
		$userCharacterType->character_type_id =CharacterType::where('name','agent')->first()->id;
		$userCharacterType->save();
		return $user;
	}

	public function loginRedirect()
	{
		if (Auth::check())
			{
				return redirect('/'); 
			}

		return view('includes.signinpage');
	}
	public function signupRedirect()
	{   
	    if(Auth::check())
        {
            return redirect()->route('home');
        }
		return view('includes.signuppage');
	}

	private function sanitizeNumber($field)
	{	

		{
			if($this->validateMobileNumber($field)){
					if(strlen($field) >= 9)
					{
					$array = str_split($field);
					$keys = array_keys($array);
					$last_index = end($keys);
					$number = array();
					for($i = $last_index; $i >= $last_index-9; $i--){
						$number[] = $array[$i];
					}
					$number = array_reverse($number);
					$number = implode("", $number);

					$number = "92".$number;
					
					return $number;
				}
				return redirect('/register')->with('error', 'Please Enter mobile Number correctly');
			}
		}
		
		return null;
	}
	private function validateMobileNumber($field){
		$code = substr($field, 0, -10);
		if($code === "0"){
			return true;
		}else if($code === "0092"){
			return true;
		}else if($code === "92"){
			return true;
		}else if($code === "+92"){
			return true;
		}else if($code === ""){
			return true;
		}else{
			return false;
		}
	}

	public function mobieActivation(Request $request)
	{	
		$code= $request->activation;
		if( ! $code)
        {
           	return redirect('/activate/user')->with('error', 'NO Activation Code :)');        
        }
        else
		{
			$user =User::where('activation_code' ,$code)->first();
			// dd(strcmp($user->activation_code, $code));
			if(!empty($user))
			{
				if (strcmp($user->activation_code, $code) == 0) {
					$user->status =1;
					$user->activation_code="";
					$user->update();
					return redirect('/loginForm')->with('active', 'Thanks for Activation');
				}
			}
			return redirect('/activate/user')->with('error', 'Wrong Activation Code :)');    
		}
		return redirect('/activate/user')->with('error', 'no code exist');    
	}

	public function singAgent(Request $request)
	{
// 		dd($request->username);

		if($this->isExist($request) != true)
		{
		  //  dd("here");
			$field = $request->username;
			
			$rules = array (	
					'username' => 'required|min:4',
					'password' => 'required|min:6' 
			);
			$validator = Validator::make ( Input::all (), $rules );
			if ($validator->fails ()) {

				return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
			} else {				 
			$user = new User ();
				if(!is_numeric($field))
				{
					if($this->isEmail($field))
					{
						$user->email = $field;						
					}
					else
					{
						return back()->with('error', 'Please Enter Email correctly');
					}
				}
				else
				{	
					if(strlen($field) >= 9)
					{
						if($number = $this->agentSanitizeNumber($field)){
						$user->telephone = $number;	
						}else
						{
							return back()->with('error', 'Please Enter mobile Number correctly');
						}
					}else
					{
						return back()->with('error', 'Please Enter mobile Number correctly');
					}
				}
				$user->activation_code = $this->generateCode($request->username);

				$user_name = explode(' ', $request->get ( 'first_name' ));

				$user->first_name = $user_name[0];
				if(isset($user_name[1])){
					$last_name = $user_name[1];
					if(isset($user_name[2])){
						for($i=2; $i<count($user_name); $i++){
							$last_name .= ' '.$user_name[$i];
						}
					}
					$user->last_name = $last_name; 
				}
				
				// /Atif changes ////
				// $user->status = 0;
				// faran changes
				$user->status = 1;	
				$user->mobile=$request->company_telephone;
				$user->role_id = 2;
				$user->password = Hash::make ( $request->get ( 'password' ) );
				$user->remember_token = $request->get ( '_token' );
				$user->save ();
				
				/////Create USer Character Type /////////////
				$userCharacterType =new UserCharacterType;
				$userCharacterType->user_id =$user->id;
				$userCharacterType->status=1;
				$userCharacterType->character_type_id =CharacterType::where('name','agent')->first()->id;
				$userCharacterType->save();


				$userCharacterDetial = new UserCharacterDetail;
				$userCharacterDetial->user_id =$user->id;
				$userCharacterDetial->user_character_type_id =$userCharacterType->id;
				$userCharacterDetial->name =$request->company_name;
				$userCharacterDetial->telephone =$request->company_telephone;
				$userCharacterDetial->location =$request->company_location;
				$userCharacterDetial->city_id =$request->city_id;
				if(!empty($request->logo)){
                    $listOfFiles = $this->uploadMed($request->logo);  
                    $userCharacterDetial->logo =$listOfFiles;
				}
				else
				{
					$userCharacterDetial->logo=json_encode(["agent-dummy.jpg"]);
				}
				$userCharacterDetial->save();
				$agencyWebsite =new AgencyWebsite();
				$status=1;
				$agencyWebsite->createNewWebsiteOnRegister($user,$status);	
					

				if(!is_numeric($field)){
					 //Event::fire(new NewUser($user));	
					 	//$this->verificationEmail($user);
					return redirect('/')->with('status', 'We sent you an activation code. Check your email.');	
				}
				else
				{
					// $uri = "http://www.hajanaone.com/api/sendsms.php?apikey=YG1UgPRYPdB9&phone=$user->telephone&sender=SmartSMS&message=localhost:8000/activate/$user->activation_code";
					// get_headers($uri);
					// return redirect('/activate/user')->with('status', 'We sent you an activation code. Check your Mobile Phone.');
				return redirect('/')->with('status', 'Welcome to Rightdeed ');
				}
			}
		}
		else
		{
		
			return Redirect::back()->withErrors(['Email/Mobile is invalid or already Exist " Try Again"']);
			// return Redirect::back()->with('msg', 'Email/Mobile allready Exist " Try Again"');
		}
	}

    private function agentSanitizeNumber($field)
	{	

		{
			if($this->validateMobileNumber($field)){
					if(strlen($field) >= 9)
					{
					$array = str_split($field);
					$keys = array_keys($array);
					$last_index = end($keys);
					$number = array();
					for($i = $last_index; $i >= $last_index-9; $i--){
						$number[] = $array[$i];
					}
					$number = array_reverse($number);
					$number = implode("", $number);

					$number = "92".$number;
					
					return $number;
				}
				return back()->with('error', 'Please Enter mobile Number correctly');
			}
		}
		
		return null;
	}

	private function uploadMed($filename)
    {

      $temp = $filename->getClientOriginalName();
      $name=$this->renameFile($temp);
      $listOfFiles[] = $name;
      $filename->move($this->upload, $name);
        return json_encode($listOfFiles);
    }

	public function renameFile($fileName)
    {
        $ext = substr(strtolower(strrchr($fileName, '.')), 1);
        $newFileName =$this->generateRandomCode($fileName) . '.' . $ext;
        return $newFileName;
    }
    public function generateRandomCode($fileName)
    {
        return $this->clean(str_shuffle($fileName) . date("Y-m-d-h-i-sa"));
    }

    public function clean($string)
    {
      $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.

       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
    
     public  function findOrCreateUserApi(Request $request)
    {
        // return Response::json($request->all());
    	if($request->identifier == "facebook")
    	{
    	    
	        $authUser = User::where('facebook_id', $request->email)->first();
	       
	        if($authUser)
	        { 
	            return Response::json($authUser);
	        }
	       
       		$user =new User;
        	$user->facebook_id =$request->email;
    	}
    	else 
    	{ 
    		$authUser = User::where('email', $request->email)->first(); 		
	        if($authUser)
	        {
	            return Response::json($authUser);    
	        }
       		$user =new User;
	        $user->email =$request->email;
    	}	
        $user_name = explode(' ', $request->name);
		$user->first_name = $user_name[0];
		if(isset($user_name[1])){
			$last_name = $user_name[1];
			if(isset($user_name[2])){
				for($i=2; $i<count($user_name); $i++){
					$last_name .= ' '.$user_name[$i];
				}
			}
			$user->last_name = $last_name;
		}
		$user->status =1;
		$user->role_id = 2;
		$user->save();
		
		$userCharacterType =new UserCharacterType;
		$userCharacterType->user_id =$user->id;
		$userCharacterType->status=0;
		$userCharacterType->character_type_id =CharacterType::where('name','agent')->first()->id;
		$userCharacterType->save();
		return Response::json($user);

	}
	
	
	/////Password Reset controller Functions////
	
	public function passwordReset(Request $request)
	{
		$user=User::where('email',$request->email)->first();
	
		if(!empty($user))
		{
			$user_find = DB::table('password_resets')->where('email', $request->email)->first();
			if(empty($user_find))
			{	
				

				$token = str_random(64);
				DB::table('password_resets')->insert(
					['email' => $request->email, 'token' => $token ,'created_at' => date('Y-m-d h:i:sa')]
				); 
			  
				$view = View::make('email.reset',compact('user','token'));
		        $contents = (string) $view;
		        $contents = $view->render();        
		         $mail =new PHPMailer;
		        try {
		           $mail->isSMTP(); 
		            $mail->CharSet = "utf-8"; 
		            $mail->SMTPAuth = true;  
		            $mail->SMTPSecure = "SSL"; 
		            $mail->Host = "vm818.tmdcloud.com";
		            $mail->Port = 587; 
		            $mail->Username = "support@rightdeed.com";
		            $mail->Password = "F;i_P!ibbW]y";
		            $mail->setFrom("subscribe@rightdeed.com", "RightDeed");
		            $mail->Subject = "Reset Password";
		            $mail->MsgHTML($contents);
		            $mail->addAddress($user->email, "Rightdeed Mail Subscription");
		            if(!$mail->send()) 
		                 {
		                     
		                 	if(!empty($request->identifier))
		                 	{
	            					return Response::json(0);    

		                 	}
		                 	return back()->with('error', 'Some internal Error');
		                 } 
			           else 
			            {
			                
		                 	if(!empty($request->identifier))
		                 	{
	            					return Response::json(1);    

		                 	}
			                return back()->with('success', 'email has sent for password reset');
			            }

					} 
				catch (phpmailerException $e)
		        {
		            dd($e);
		        }
		        catch (Exception $e) 
		        {
		           dd($e);
		        }
			}
			else
			{
				$token = str_random(64);
				DB::table('password_resets')->where('email',$request->email)->delete();
				DB::table('password_resets')->insert(
					['email' => $request->email, 'token' => $token,'created_at' => date('Y-m-d h:i:sa')]
				);
				 $view = View::make('email.reset',compact('user','token'));
		        $contents = (string) $view;
		        $contents = $view->render();

		         $mail =new PHPMailer;
		        try {
		           $mail->isSMTP(); 
		            $mail->CharSet = "utf-8"; 
		            $mail->SMTPAuth = true;  
		            $mail->SMTPSecure = "SSL"; 
		            $mail->Host = "c57407.sgvps.net";
		            $mail->Port = 587; 
		            $mail->Username = "support@rightdeed.com";
		            $mail->Password = "HG,zT=F0G705ki{6!h";
		            $mail->setFrom("subscribe@rightdeed.com", "RightDeed");
		            $mail->Subject = "Reset Password";
		            $mail->MsgHTML($contents);
		            $mail->addAddress($user_find->email, "Rightdeed Mail Subscription");
			            if(!$mail->send()) 
		                 {
		                     
		                 	if(!empty($request->identifier))
		                 	{
	            					return Response::json(0);    

		                 	}
		                 	return back()->with('error', 'Some internal Error');
		                 } 
			           else 
			            {
			                
		                 	if(!empty($request->identifier))
		                 	{
	            					return Response::json(1);    

		                 	}
			                return back()->with('success', 'email has sent for password reset');
			            }
					}
				catch (phpmailerException $e)
		        {
		            dd($e);
		        }
		         catch (Exception $e) 
		        {
		           dd($e);
		        }
			}
		}
		else
		{
		    
		                 	if(!empty($request->identifier))
		                 	{
	            					return Response::json(2);    

		                 	}
			return back()->with('warning', 'No Email Found');
		}
		
	}
	public function reset_password($email,$token)
	{

		$user = DB::table('password_resets')->where('email',$email)->first();
		if(!empty($user))
		{
			if($user->token == $token)
			return view('auth.passwords.reset_passowrd',compact('token'));
			else
			return redirect('/')->with('error', 'Token Expired or Mismatch');

		}
		else
		{
			return redirect('/')->with('error', 'No User Found');
		}
	}

	public function update_password(Request $request)
	{
		// dd($request->all());
		$token = DB::table('password_resets')->where('token',$request->token)->first();
		
		if(!empty($token))
		{
			if($request->password == $request->confirm_password)
			{
				$user=User::where('email',$token->email)->first();
				$user->password =bcrypt($request->confirm_password);
				$user->update();
				DB::table('password_resets')->where('token',$token->token)->delete();
				if(!empty($request->identifier))
				return Response::json('Password Reset');
				return redirect('/')->with('status', 'Reset Password');
			}
			else
			{
			if(!empty($request->identifier))
			return Response::json('Password Not Match');
			return back()->with('error', 'Password Not Match');
			}
		}
		if(!empty($request->identifier))
		return Response::json('Session Expired');
		return redirect('/')->with('error', 'Session Expired');
	}

   
    
}
