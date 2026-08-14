<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageCenter extends Model
{
    public function sendMessage($request)
    {

    	$newMessage =new MessageCenter();
    	$newMessage->user_id =$request->user_id;
    	$newMessage->property_id =$request->property_id;
    	$newMessage->phone =$request->phone;
    	$newMessage->name =$request->name;
    	$newMessage->message =$request->message;
    	$newMessage->save();
    	return true;

    }
}
