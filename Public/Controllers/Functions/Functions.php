<?php
require(dirname(__DIR__,2).DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Config.php');
if(strtolower($_SERVER['HTTP_HOST'])=='localhost' || $_SERVER['HTTP_HOST']=='127.0.0.1'):
    define('URL',$_SERVER['HTTP_HOST'].'/daral-bi/');
else:
    define('URL',$_SERVER['HTTP_HOST']);
endif;
function Uri_Root($uri)
{
    echo(URL."$uri");
}
function Uri_Redirect($uri)
{
?>
    <script>location.assign((<?= json_encode($uri) ?>))</script>
<?php
}



?>
