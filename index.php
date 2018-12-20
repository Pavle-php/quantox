<!DOCTYPE html>
<html>
<head>
	<title>Quantox Test</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<a href="index.php?trylogin">Login</a><br>
<a href="index.php?trysignup">Signup</a><br>
<a href="index.php?trysearch">Search</a><br>

<?php
function autoload($class){
	require_once "classes/$class.php";
}
spl_autoload_register('autoload');
Session::getInstance();



if(isset($_GET['trylogin'])){include "view/login.php"; $login=true;}
if(isset($_GET['trysignup'])){include "view/signup.php";}

if(isset($_GET['trysearch'])){include "search.php";}


?>
 </body>
</html>


