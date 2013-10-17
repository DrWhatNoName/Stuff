<?php //The main homepage, not visible to users that are logged in so don't put important services here.
    //This file is part of Password Bolt.

    //Password Bolt is free software: you can redistribute it and/or modify
    //it under the terms of the GNU General Public License as published by
    //the Free Software Foundation, either version 3 of the License, or
    //(at your option) any later version.

    //Password Bolt is distributed in the hope that it will be useful,
    //but WITHOUT ANY WARRANTY; without even the implied warranty of
    //MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    //GNU General Public License for more details.

    //You should have received a copy of the GNU General Public License
    //along with Password Bolt.  If not, see <http://www.gnu.org/licenses/>.

	include('libs/settings.php');
	
	if($STRICT_TRANSPORT_SECURITY)
	{
		header("Strict-Transport-Security: max-age=$STS_TIMEOUT");
	}

	require_once ('libs/passwordbolt.php');
	//if the user is logged in, redirect them to the passwords page.
	$dontshow = false; //only show the login box if the user isn't logged in
	if(($user = PB::CheckLogin(false)) != "")
	{
		if(PB::CheckLogin(true) == "") //user is logged in but hasn't passed the skey stage yet
		{
			Header('Location: skey.php');
		}
		$dontshow = true; //don't show the login box, because they are logged in
	}

	include ('shortcuts/top.php');
?>
<script type="text/javascript">
function checkPass(){
	var pass = passform.pass.value;
	var i = 0;
	var counted = "";
	for(i = 0; i < pass.length; i++)
	{
		var chr = pass.substring(i,i+1);
		if(counted.indexOf(chr) == -1)
		{
			counted = counted + chr;
		}
	}
	unique = counted.length;
	len = pass.length;
	if(unique != 0)
		bits = len * Math.log(unique) / Math.log(2);
	else
		bits = 0;
	bits = Math.round(bits,0);

	if(bits > 256)
	{
		document.getElementById("passsec").innerHTML = "<div style=\"background-color:lime; width:100%;\">&nbsp;</div>";
	}
	else if(bits > 128)
	{
		document.getElementById("passsec").innerHTML = "<div style=\"background-color:green; width:100%;\">&nbsp;</div>";
	}
	else if(bits > 80)
	{
		document.getElementById("passsec").innerHTML = "<div style=\"background-color:yellow; width:50%;\">&nbsp;</div>";
	}
	else if(bits > 40)
	{
		document.getElementById("passsec").innerHTML = "<div style=\"background-color:orange; width:35%;\">&nbsp;</div>";
	}
	else
	{
		document.getElementById("passsec").innerHTML = "<div style=\"background-color:red; width:5%;\">&nbsp;</div>";
	}

}
checkPass();
</script>
<!--LOGIN BOX-->
<?php
//Show the login box and any custom messages such as account created, invalid password etc...
if($dontshow == false) //only show if the user isnt logged in.
{
	echo '
	<div  class="box">
	<div class="headerbar"><h3>Login</h3></div>
		<div id="login" class="insidebox">
			<b>*DO NOT LOG ON FROM AN UNTRUSTED COMPUTER*</b>
			<form action="login.php" method="post" enctype="multipart/form-data" name="passform">';
				//When an account is created, createaccount redirects to index.php?completed=true
	if(isset($_GET['completed'])) 
	{
		echo 'Your account has been created, you can now login. <br />When deleting your account, you will need to provide this key:<br />' . security::xsssani($_GET['delete']) ;
	} 
	echo '<table style="margin: 0 auto; font-weight:bold" >
		<tr><td>Username:</td><td> <input type="text" name="user" autocomplete="off" /> </td></tr>
		<tr><td>Password:</td><td> <input type="password" autocomplete="off" name="pass" id="passbox" onKeyUp="checkPass();" /></td></tr>
		<tr><td><input type="checkbox" name="vfy" value="doverify" />&nbsp;Verify:</td><td> <input type="password" autocomplete="off" name="passvfy" id="passbox" /></td></tr>
		<tr><td>Password Security:</td><td><div id="passsec" style="width:100%; height:20px;background-color:black;padding:2px;margin:0;">&nbsp;</div></td></tr>
		<tr><td>Keyfile:</td><td> <input type="file" name="file" id="file" /> </td></tr>
		<tr><td>Stay logged in for:&nbsp;</td><td> <input type="radio" name="time" value="15" />15 minutes &nbsp;&nbsp;<input type="radio" name="time" value="60" />60 minutes <br /><input type="radio" name="time" value="1440" checked />24 hours&nbsp;&nbsp;<input type="radio" name="time" value="525600" />Forever</td></tr>
		<tr><td><input type="submit" name="submit" value="Login" />	</td><td><a href="createaccount.php">Register </a></td></tr>';
	//?invalid=true when redirected from login.php (they signed in with bad info)
	if(isset($_GET['invalid'])) { echo 'Wrong username.';} 
	if(isset($_GET['vfyfail'])) { echo "The passwords you entered did not match."; }
								
	echo '</table>
	
			</form>
			<a href="random.php">Download random keyfile</a>
		</div>
	</div>';
}
?>
<?php
	include ('shortcuts/randomdata.php');
?>
<!--ABOUT BOX-->
<div class="box">
<div class="headerbar"><h3>About</h3></div>
	<div class="insidebox" >
	<center>
		Password Bolt is a password manager for the truly paranoid.
<br />
<br />
		<ul style="text-align:left; margin-left: 20px;">
			<li>Cascading block ciphers: SERPENT-TWOFISH-AES.</li>
			<li>Each block cipher has an independant 256 bit key.</li>
			<li>Keys are created with HMAC-SHA512 and HMAC-WHIRLPOOL.</li>
			<li>Optional in-browser encryption using BLOWFISH.</li>
			<li>Supports HTTP cookie SECURE flag.</li>
			<li>Supports Strict-Transport-Security (STS).</li>
			<li>Plausible Deniability.</li>
			<li>Server power off distroys cookie encryption key.</li>
		</ul>
		<br />

		</center>
	</div>
</div>

<?php 	
	include ('shortcuts/footer.php');
?>

<?php include ('libs/sqlclose.php'); ?>
