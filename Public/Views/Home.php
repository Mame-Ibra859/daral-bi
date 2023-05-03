<?php

use App\User\UserClass;

require(__DIR__.DIRECTORY_SEPARATOR.'Require.php');

$userClass=new UserClass($bdd);
$userClass->VerifyUser('macmac030998@gmail.com','123');
require(__DIR__.DS.'Body'.DS.'Header.php');
?>