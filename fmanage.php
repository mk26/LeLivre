<?php
require_once('connection.php');

$user = $_SESSION['username'];
$query = pg_query("SELECT * FROM CUSTOMER WHERE username = '$user'");
$cust = pg_fetch_array($query);

function get_bday()
{
    global $cust;
    $bdate = $cust['birth_date'];
    if($bdate==NULL) echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#addbday\"><span class=\"glyphicon glyphicon-plus\"></span>&nbsp;&nbsp;Add birthday</button>
";
    else 
    {
        echo $bdate;
        echo "&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#addbday\"><span class=\"glyphicon glyphicon-pencil\"></span>&nbsp;&nbsp;Edit</button>
";}

}

function updateBirthday($bdate)
{
    global $user;
	$query = pg_query("UPDATE CUSTOMER SET birth_date = '$bdate' WHERE username='$user'");
	if(!$query)
	{
        header("Location: manage.php"."?updbday=failed");
	}
	else header("Location: manage.php");
}

function changePassword($oldpass,$newpass)
{
    global $cust, $user;
    if($oldpass==$cust['password'])
    {
        $query = pg_query("UPDATE CUSTOMER SET password = '$newpass' WHERE username='$user'");
        header("Location: manage.php"."?change=success");
    }
    else header("Location: manage.php"."?change=failed");
}

function deleteAccount()
{
    global $user;
    $query = pg_query("DELETE FROM CUSTOMER WHERE username = '$user'");
    session_destroy();
    echo "<link href=\"frameworks/css/bootstrap.min.css\" rel=\"stylesheet\">";
    echo "<div class=\"jumbotron\"><div class=\"alert alert-danger container\">Your account was deleted successfully</div></div>";
    echo "<div class=\"container\"><a href=\"index.php\"><span class=\"glyphicon glyphicon-home\"></span>&nbsp;Back to Home</a></div>";
}

function saveBillingInfo($cardNumber, $cardType, $expiryDate, $holderName, $address)
{
    global $user;
    $expiryDate = $expiryDate."-28";
    $query = pg_query("INSERT INTO CREDITCARD VALUES ('$holderName','$cardType','$address','$user','$cardNumber','$expiryDate')");
    header("Location: manage.php");
}

function getAllCards()
{
    global $user;
    $query = pg_query("SELECT * FROM CREDITCARD WHERE username='$user'");
    $results = pg_fetch_all($query);
    if($results==NULL) 
    {
    echo"<tr class=\"alert alert-info\">
    	<td>No Cards found.</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	</tr>";
	}
    else
    {
    	foreach (($results) as $row)
		{
			$expiryDate = substr($row['exp_date'],0,7);
			echo "<tr>
			<td><a href=card.php?card=\"".$row['card_no']."\">".$row['card_no']."</a></td>
			<td>".$expiryDate."</td>
			<td>".$row['type']."</td>
			<td><a href=\"fmanage.php?deletecard=".$row['card_no']."\"><button type=\"button\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-remove\"></span>&nbsp;&nbsp;Remove</button></a>
			</tr>";
		}
	}
}

function deleteCard($cardNumber)
{
global $user;
$cardno = trim($cardNumber,'"');
$query = pg_query("DELETE FROM CREDITCARD WHERE username = '$user' AND card_no = '$cardno'");
header("Location: manage.php");
}

function updateGenres($genres)
{
	global $user;
	$preflistquery = pg_query("DELETE FROM genre_customer WHERE username = '$user'");
	/*$preflist = pg_fetch_all($preflistquery);
	$prefs = array();
	foreach ($preflist as $pref)
	{
		$prefs[] = $pref['g_name'];
	}*/
	foreach ($genres as $genre)
	{
	//if(!in_array($genre,$prefs))
	$query = pg_query("INSERT INTO GENRE_CUSTOMER VALUES ('$genre', '$user')");
	}
	header("Location: prefgenre.php");
}

function userTransaction($username)
{
    $sql = "SELECT t.order_id, t.date_time, SUM(t.quantity) FROM transaction t WHERE t.username = '$username' GROUP BY t.order_id, t.date_time, t.quantity ORDER BY t.order_id DESC";
    $result = pg_query($sql);
    $trans = array();
    while ($row = pg_fetch_row($result)) {
        $trans[] = $row;
    }
    return $trans;
}

function displayOrderHistory()
{
	global $user;
    $results = userTransaction($user);
    if($results==NULL) 
    {
    echo"<tr class=\"alert alert-info\">
    	<td>No order history found.</td>
    	<td></td>
    	<td></td>
    	</tr>";
	}
    else
    {
    	foreach (($results) as $row)
		{
			echo "<tr>
			<td><a href=orderitems.php?order=".$row[0].">"."#LL3268987".$row[0]."</a></td>
			<td>".$row[1]."</td>
			<td>".$row[2]."</td>
			</tr>";
		}
	}
}

if(isset($_POST['change']))
{
    changePassword($_POST['oldpass'],$_POST['newpass']);
}

if(isset($_POST['delete']))
{
    deleteAccount();
}

if(isset($_POST['savecard']))
{
    saveBillingInfo($_POST['cno'],$_POST['ctype'],$_POST['expdate'],$_POST['hname'],$_POST['addr']);
}

if(isset($_GET['deletecard']))
{
   deleteCard($_GET['deletecard']);
}

if(isset($_POST['updatebday']))
{
	updateBirthday($_POST['bdate']);
}

if(isset($_POST['updgenres']))
{
	updateGenres($_POST['genre']);
}

?>