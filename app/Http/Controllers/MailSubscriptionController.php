<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PHPMailer\PHPMailer;
use App\PHPMailer\SMTP;
use App\PHPMailer\Exception;
use View;
use App\MailSubcription;
use App\UnSubscription;
use Response;
use App\Property;
use DB;
class MailSubscriptionController extends Controller
{
    public function emailSubscription(Request $request)
    {
        if(!empty($request->email))
        {

            $UnSubscription=UnSubscription::where('email',$request->email)->first();
        	$MailSubcription=MailSubcription::where('email' ,$request->email)->first();

            if(!empty($UnSubscription))
            {
                 $UnSubscription->delete();
            }

         
       		if(empty($MailSubcription))
       		{
                //  $properties=DB::select("SELECT * FROM properties WHERE id IN (1840,1872,1922,1891,1822,1808,1839) ORDER BY FIELD(id, 1840,1872,1922,1891,1822,1808,1839)ASC");
                $properties = Property::where('status',1)->whereIn('purpose', [1, 2, 3])->orderBy('created_at', 'desc')->limit(10)->get();
       			$mail =new MailSubcription;
       			$mail->email =$request->email;
     			$mail->save();

                $view = View::make('email.subscription',compact('mail','properties'));
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
                    $mail->Subject = "Email Subscription";
                    $mail->MsgHTML($contents);
                    $mail->addAddress($request->email, "Rightdeed Mail Subscription");
                    
                    if(!$mail->send()) 
                    {
                       return Response::json(['success'=>2]);
                    } 
                   else 
                   {
                       return Response::json(['success'=>1]);
                   }
                } catch (phpmailerException $e) {
                    dd($e);
                    
                } catch (Exception $e) {
                    dd($e);
                }
            }

                return Response::json(['success'=>3]);
        }
                return Response::json(['success'=>4]);

    }

    public function emailUnsubscription($email)
    {
        $MailSubcription=MailSubcription::where('email' ,$email)->first();

        if(!empty($MailSubcription))
        {
            $MailSubcription->delete();
            $UnSubscription =new UnSubscription;
            $UnSubscription->email =$email;
            $UnSubscription->save();

            return redirect('/')->with('status','You are UnSubscribed');


        }
        return redirect('/')->with('error','No Email Found');
    }
}
