<?php
$db_connection = pg_connect("host=localhost port=5432 dbname=lelivre user=karthik")or die('Connection error : '.pg_last_error());

function authenticate($username, $password)
{
echo($_POST['username']);
$query = pg_query("SELECT * FROM CUSTOMER WHERE username = '$username' AND password = '$password'");
if(pg_last_error()) {
echo "Username/password Invalid";
}
else echo "Logged in successfully";
}
authenticate($_POST['username'], $_POST['password']);

?>