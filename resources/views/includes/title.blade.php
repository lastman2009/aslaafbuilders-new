<?php
    ob_start();?>
    @if(Auth::check())
    @include('includes.authHeader') 
    @else
    @include('includes.header') 
    @endif
    <?php
    $buffer=ob_get_contents();
   
    ob_end_clean();
   //  $buffer=str_replace("%TITLE%",$title.' - '.Config::get("name.name.app"),$buffer);

    
    $buffer=str_replace("%TITLE%",$title ,$buffer);  
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