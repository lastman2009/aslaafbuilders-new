<?php
    ob_start();?>
	@include( 'includes_admin.header' )	
    <?php
    $buffer=ob_get_contents();
    ob_end_clean();
    $buffer=str_replace("%TITLE%",$title." - ".Config::get("name.name.app"),$buffer);
    $buffer=str_replace("%META%","NEW META",$buffer);

    echo $buffer;
?>