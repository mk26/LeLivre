<?php session_start();
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['username']))
{
header("Location:signin.php");
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Order receipt">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>Order Receipt</title>

    <!-- Scripts -->
    <script src="frameworks/js/jquery-2.1.0.min.js"></script>
    <script src="frameworks/js/bootstrap.min.js"></script>

    <link href="frameworks/css/bootstrap.min.css" rel="stylesheet">



    <!-- Extra Styles -->
    <style type="text/css">
        body {
            padding-top: 80px;
        }
        .scrollable-menu {
            height: auto;
            max-height: 600px;
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <?php include_once('navbar.php') ?>

    <div class="container panel panel-success">
        <br>
        
        <div class="panel panel-heading">
        Order confirmation
        </div>
        
        <div class="jumbotron">        
			<h3>Thanks for your order with LeLivre.</h3>
			<h4>Your order number is #LL3268987 <? gettid();?></h4><br>
			<a href="index.php"><button class="btn btn-primary" name="goback"><span class="glyphicon glyphicon-home"></span>&nbsp;Go to main page</button></a>
        </div>
        
        </div>

        <!-- Bottom Bar -->
        <nav class="navbar navbar-default navbar-bottom" role="navigation">
            <div class="container">
                <p class="navbar-text navbar-left">&copy; KARTHIK & ZHEN, 2014</p>
            </div>
        </nav>
    </div>
</body>

<?
function completeTransaction($username, $card_no)
{
	$_SESSION['cartqty'] = 0;
    $sql1 = "SELECT MAX(order_id) FROM transaction";
    $result1 = pg_query($sql1);
    $cur_id = pg_fetch_row($result1);
    $order_id = $cur_id[0] + 1;
    $sql2 = "SELECT isbn, quantity FROM cart WHERE username = '$username'";
    $result2 = pg_query($sql2);
    $items = array();
    while ($row = pg_fetch_row($result2)) {
        $items[] = $row;
    }
    //print_r($items);
    for ($i = 0; $i < sizeof($items); $i++) {
        $isbn = $items[$i][0];
        $sql3 = "SELECT price FROM book WHERE isbn = '$isbn'";
        $result3 = pg_query($sql3);
        $unit_price = pg_fetch_row($result3);
        $checkout_price = $unit_price[0] * $items[$i][1];
        $quantity = $items[$i][1];
        date_default_timezone_set('America/Los_Angeles');
        $datetime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO transaction VALUES('$username', $order_id, '$isbn', '$quantity', $checkout_price, $card_no, '$datetime')";
        $result = pg_query($sql);
    }
    $sql5 = "DELETE FROM cart WHERE username = '$username'";
    $result5 = pg_query($sql5);
}

function gettid()
{
	$user = $_SESSION['username'];
	$query = pg_query("SELECT MAX(order_id) FROM transaction WHERE username = $user;");
	$row = pg_fetch_array($query);
	echo $row[0];
}

if(isset($_POST))
{
	$cards = $_POST['cards'];
	$user = $_SESSION['username'];
	$card_no = $cards[0];
	completeTransaction($user,$card_no);
}
?>

</html>