<?php
include("pbkdf2.php");
define("PBKDF2_HASH_ALGORITHM", "sha512");
define("PBKDF2_ITERATIONS", 2000);
define("PBKDF2_SALT_BYTES", 22);
define("PBKDF2_HASH_BYTES", 60);
define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);
define("HASH_SALT", mcrypt_create_iv(PBKDF2_SALT_BYTES, MCRYPT_DEV_URANDOM));

$hash = hash_pbkdf2($hash, 'DrWhat', HASH_SALT, PBKDF2_ITERATIONS, PBKDF2_HASH_BYTES, false);


