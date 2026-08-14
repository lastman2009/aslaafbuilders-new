
@include("includes.header-new")

@include('partials.header.navbar')
<?php
 $buffer=ob_get_contents();

    ob_end_clean();
    // Restart output buffering immediately: ending it above closes PHP's
    // SAPI-level buffer (output_buffering ini setting) too, which forces
    // headers to be sent on the next echo below — silently dropping the
    // session/CSRF cookie Laravel queues on Response::send() for any
    // first-time visit to a page using this layout.
    ob_start();
    // $buffer=str_replace("%TITLE%",$title.' - '.Config::get("name.name.app"),$buffer);
    if(isset($title))
    {      
    $buffer=str_replace("%TITLE%", $title ,$buffer);
    }
    
    //$buffer=str_replace("%TITLE%",$title ,$buffer);  
    if(isset($description))
    {      
    $buffer=str_replace("%DESCRIPTION%", $description ,$buffer);
    }
     if(isset($keyword))
    { 
    $buffer=str_replace("%KEYWORD%", $keyword ,$buffer);
    }

    echo $buffer;
?>
@yield('body')

@include("includes.footer-new")