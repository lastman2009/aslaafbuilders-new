<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with the verification demo app.
            Please follow the link below to verify your email address
            {{$user->name}} </br>


            <h1>Activation code</h1>
           {{ URL::to('register/verify/'.$id.'/'. $user->activation_code) }}<br/>
           <a href="http://localhost:8000/register/verify/{{$id}}/{{$user->activation_code}}">Click me</a>
        </div>

    </body>
</html>  