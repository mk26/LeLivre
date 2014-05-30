<?php
require_once('connection.php');
include_once('login.php');

function signup($username, $email, $password, $cname, $bdate)
{
    $query = pg_query("SELECT username FROM CUSTOMER WHERE username = '$username'");
    $checkuser = pg_fetch_array($query);
    if ($checkuser['username']==$username)
    {
		header("Location: signup.php"."?user=exists");
    }
    else if ($username==NULL || $email==NULL || $password==NULL || $cname==NULL)
    {
    	header("Location: signup.php"."?signup=failed");
	} 
	else
	{
		if ($bdate==NULL) $insquery=pg_query("INSERT INTO CUSTOMER VALUES ('$username', '$email', '$password', '$cname')");
		else $insquery=pg_query("INSERT INTO CUSTOMER VALUES ('$username', '$email', '$password', '$cname', '$bdate')");
		authenticate($username, $password);
    }
}

if(isset($_POST['signup']))
signup($_POST['username'], $_POST['email'], $_POST['password'], $_POST['cname'], $_POST['dob']);

?>