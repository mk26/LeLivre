<?php session_start();
require_once('connection.php');

function authenticate($username, $password)
{
    $query = pg_query("SELECT * FROM CUSTOMER WHERE username = '$username' AND password = '$password'");
	$customer = pg_fetch_array($query);

    if(!$query || $customer==NULL || $username==NULL || $password==NULL) {
		header("Location: signin.php"."?login=failed");
    }
    else 
    {
        $_SESSION['username']=$customer['username'];
        $_SESSION['cname']=$customer['c_name'];      
		header("Location: ".$_SESSION['url']);
    }
}

if(isset($_POST['login']))
authenticate($_POST['username'], $_POST['password']);

?>