<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewUserSendmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user ,$id)
    {
        $this->user=$user;
        $this->id =$id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.newuser');
    }
}
