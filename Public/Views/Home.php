<?php


use App\Html\Form;
require(__DIR__.DIRECTORY_SEPARATOR.'Require.php');

$Form=new Form();
require(__DIR__.DS.'Body'.DS.'Header.php');
echo($Form->Input('checkbox',['name'=>'Email']));
?>