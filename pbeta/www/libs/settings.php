<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

//DB INFO
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_DATABASE = "pbeta";

//Force HTTPS connections using the HSTS header.
$STRICT_TRANSPORT_SECURITY = false;
//STS timeout in seconds
$STS_TIMEOUT = 501;

//set SECURE flag for all cookies.
$SECURE_COOKIES = false;

//Add random passwords and notepads randomly to strengthen plausible deniability.
//safe to disable it when the website is being used a lot, as the other people's data have the same effect.
//true - on, false - off
$PLAUSIBLE_DENIABILITY = true;

//enable or disable cookie encryption key change on every page load
//disable for high load server
//true - on, false - off
$CHANGE_COOKIE_KEYS = true;

//encrypts the cookie encryption key in the database (provides some extra protection of attacker has access to db and not src, i.e sqli)
$ENCRYPT_COOKIE_KEY = true;

$RNG_COUNTER_INCREMENT = 7;

//TODO: Change the following keys. PasswordBolt is still secure if these keys are known.
//RNG_SALT is just used like normal salt, SERVER_PRIVATE_KEY is used to encrypt the cookies and optionally encrypt the cookie's encryption key in the ramtable
//SERVER_HMAC_KEY is like salt for hashes the server does
//SERVER_MISC_SALT is more salt (see security.php and passwordbolt.php if you want to know exactly how these values get used)

//KEY FOR THE RANDOM DATA GENORATOR, CAN BE CHANGED OFTEN
$RNG_SALT = "MyHf6fD9bFuXGYl9wkCbTDHyo5E9KICWwr5g6ebzAo4H5AhzI3f7W2hkt3Ucoiqk";

//The Server's Private Key. - MUST BE 768 BITS in HEX (256 for each cipher)
$SERVER_PRIVATE_KEY = "6BA25408194FF07285243AD8FA5C645DF02B452BB25EC0F79120809A4F8167C6DE7FF53E4AC30440A6F9E191BB6B685F610D526F035E05388D7C8C933B37F09DAA2BB4C322371159CBA2A641AC7864FB9C58EB1B807AFEFBA088635388AB660A";

//The Server's Private HMAC Key.
$SERVER_HMAC_KEY = "Uj5UpVNameIg1stf3t7522SmpXXYy6wirtV2pVcbmKUcsBkRNvCmGulaMHdkyx0n";

//Salt to be used whenever the hash should be server-specific.
$SERVER_MISC_SALT = "niISqvPkMfwLwLpAtTYZU1UATeKlPwhk1gTIYyJPam8TlqMpZ18uz7LwvlCDC10g";

?>
