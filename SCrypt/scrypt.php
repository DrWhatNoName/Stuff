<?php 
include "class/scrypt.class.php";
echo "Hashing password hello with salt 1.\n\n";

$password = new Password;
$goodhash = $password::hash("Hello");

echo $goodhash."\n\n";
echo "Checking password against hash\n";

var_dump($password::check("hello",$goodhash));

if($password::check("hello",$goodhash))
	echo "Hash is good\n\n";
else
	echo "Hash is bad\n\n";

echo "DrWhat testing SCRYPT for PHP 5.5.6 at ".date("D M j G:i:s T Y").", with hex output.";