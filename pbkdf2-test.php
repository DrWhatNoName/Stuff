<?php
require('pbkdf2.php');
$password = "foobar";
$good_hash = create_hash($password);
echo "Example hash: $good_hash\n";
if(validate_password($password,$good_hash)){
	echo "Password is good";
} else {
	echo "password is bad";
}
?>
