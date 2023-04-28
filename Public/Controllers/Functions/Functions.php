<?php
require(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Config.php');
define('URL',$_SERVER['HTTP_HOST']);
function Uri_Redirect($uri)
{
    return("<script>location.assign(json_encode($uri))</script>");
}
function Uri_Root($uri)
{
    echo(URL."$uri");
}


?>
