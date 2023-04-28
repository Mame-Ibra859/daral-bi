<?php
//constantes
define("DS",DIRECTORY_SEPARATOR);
define("DBNAME","bebaempire");
define("DBUSER","root");
define("DBPASS","");
define("URI-LINK","DIRECTORY_SEPARATOR");

//variables
$errors=null;
$success=null;
//bdd
$bdd= new PDO('mysql:host=localhost;dbname=mtech;charset=utf8','root','')
?>