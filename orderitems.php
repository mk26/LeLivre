<?php session_start();
require_once('connection.php');

$user = $_SESSION['username'];
$orderID = $_GET['order'];
$card;
$total = 0;

function orderItems($orderID)
{
	global $user,$card;
    $sql = "SELECT b.title, t.quantity, t.checkout_price, t.card_no, b.isbn FROM book as b, transaction as t WHERE b.isbn = t.isbn AND t.username = '$user' AND t.order_id = '$orderID' ORDER BY b.title";
    $result = pg_query($sql);
    $trans = array();
    while ($row = pg_fetch_row($result)) {
        $trans[] = $row;
    }
    return $trans;
}

function displayOrderItems()
{
	global $user, $orderID, $card, $total;
    $results = orderItems($orderID);
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
			<td><a href=book.php?book=".$row[4].">".$row[0]."</a></td>
			<td>".$row[1]."</td>
			<td> $ ".$row[2]."</td>
			</tr>";
			$card = $row[3];
			$total += $row[2];
		}
	}
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Order items">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>Order Items</title>

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

    <div class="container panel panel-default">
        <br>
        <!-- Order Items -->
        <ol class="breadcrumb">
            <li><a href="manage.php">Account</a>
            </li>
            <li><a href="manage.php#orders">Orders</a>
            </li>
            <li class="active">Order <? echo "#LL3268987".$orderID; ?></li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Order Items</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Book</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? displayOrderItems(); ?>
                    </tbody>
                    <tfoot>
                        <tr class="success">
                            <td></td>
                            <th></th>
                            <td class="text-success"><? echo "$ ".$total; ?></td>
                        </tr>
                    </tfoot>
                </table>
				<h5 class="text-success"><span class="glyphicon glyphicon-credit-card "></span>&nbsp; Paid using credit card ending in <strong><? echo substr($card,-4);?></strong></h5>
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

</html>