<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageCenter;
use Auth;
use App\UserCharacterType;
use Response;
use App\CharacterType;
use App\Events\WebsiteEmail;
use Event;
use App\PHPMailer\PHPMailer;
use App\PHPMailer\SMTP;
use App\PHPMailer\Exception;
use View;
use App\PropertyValueAssessment;

class MessageController extends Controller
{
    public function contactMessage(Request $request)
    {
          
        $message = new MessageCenter();
        $message->sendMessage($request);
        return back();

    }

    public function messages_List()
    {
        
    	$messages =MessageCenter::where('user_id',Auth::id())->get();
        // dd(Auth::id());
    	return view('dashboard.message.message-list',compact('messages'));
    }

    public function deleteMessage($id)
    {
        $message =MessageCenter::find($id);
        $message->delete();
        return Response::json(['success' => 'deleted']);
    }

    // public function contactMessagefromWebsite(Request $request,$email )
    // {   
     
    //     $data= array();
    //     $data['email']=$request->email;
    //     $data['name']=$request->name;
    //     $data['phone']=$request->phone;
    //     $data['message']=$request->message;
    //     // $data['read_status']=0;
        
    //     Event::fire(new WebsiteEmail($email ,$data));
    //     return back();
    // }
    
     public function contactMessagefromWebsite(Request $request,$email )
    {   
     
       $data= array();
        $data['email']=$request->email;
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['message']=$request->message;
        // $data['read_status']=0;

        $view = View::make('email.websiteContactEmail',compact('data'));
        $contents = (string) $view;
        $contents = $view->render();
        // dd('a');
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
            $mail->setFrom($email, "RightDeed");
            $mail->Subject = "Property Message";
            $mail->MsgHTML($contents);
            $mail->addAddress($request->email, "Rightdeed Mail Subscription");
            $mail->send(); 
            // if(!$mail->send()) 
            //     {
            //     // return back()-with('error',"Error occur");
            //         dd('not send');
            //     }
            //     else{
            //         dd('112');
            //     } 

            }
             catch (phpmailerException $e) {
            dd($e);
            } catch (Exception $e) {
            dd($e);
            }
        return back();
    }

    public function markMessageAsRead($id){
        $message = MessageCenter::find($id);
        $message->read_status = 1;
        return $message->update()? Response::json(["success" => "Status changed as read"]) : Response::json(["error" => false]);
    }
    
     public function getMessageCount()
    {
        $count =MessageCenter::where('user_id',Auth::id())->where('read_status',0)->count();
        return Response::json(['count' => $count]);
    }
  public function homeContactForm(Request $request)
    {
        dd('HomeContactForm');
    }
    public function propertyValueAssessmentPost(Request $request)
   {
       // dd($request->all());
   $save = PropertyValueAssessment::create($request->all());
    return Response::json(["success" => "Your Request For Property Assesment Has Forward"]);
   }
}
