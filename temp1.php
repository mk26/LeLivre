<?php
require_once('connection.php');

function signup($username, $email, $pw, $c_name, $birth_date)
{
    $query = pg_query("SELECT username FROM CUSTOMER WHERE username = '$username'");
    $checkuser = pg_fetch_array($query);
    var_dump($checkuser);

    if ($username==$checkuser['username'])
    {
	    
	    echo "Error";
    }
    else
    {
		$insquery=pg_query("INSERT INTO customer VALUES ('$username', '$email', '$pw', '$c_name', '$birth_date')");
		echo "Success";
    }
    /*while ($row = pg_fetch_row($result)) {
        $user[] = $row;
    }
    if (in_array($username, $user[0])) {
        die("Username already taken, choose another one.");
    } else {
        $sql = "INSERT INTO customer VALUES ('$username', '$email', '$pw', '$c_name', '$birth_date')";
        $result = pg_query($sql);
    }*/
}

//signup($_POST['username'], $_POST['email'], $_POST['password'], $_POST['cname'], $_POST['dob']);

signup('a', 'a@a.com', 'a','a', '');

?>