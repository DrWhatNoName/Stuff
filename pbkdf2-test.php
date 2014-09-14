<?php
include("pbkdf2.php");


$hash = create_hash("DrWhat");

echo $hash.PHP_EOL;

var_dump(validate_password("DrWhat",$hash));

