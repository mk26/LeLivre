<?php session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['username']))
{
header("Location:signin.php");
}
require_once('fcart.php');
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Cart items">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>Your Cart</title>

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
		.table tr { 
		font-size: 16px; 
		}
    </style>
    
    <script>
    function saveValue(target, target2){
	var stepVal = document.getElementById(target).value;
	var isbnVal = document.getElementById(target2).value;
	$.ajax({ url: 'fcart.php',
         data: {update: stepVal, isbn: isbnVal},
         type: 'post',         
         success: function() {
    window.location.reload(true);
}
         });
	}
	</script>
</head>

<body>
	<?php include_once('navbar.php') ?>
		        
	<div class="container panel panel-default">
	<br>
	<!-- Cart Items -->	
	<div class="panel panel-default">
		<div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Items in cart</div>
		<div class="panel-body">
	<table class="table table-hover">
	<thead>
	<tr>
		<th>Book</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Amount</th>
		<th>Remove</th>
	</tr>
	</thead>
	<tbody>
		<? displayCartItems(); ?>
	</tbody>
	<tfoot>
		<tr class="info">
			<td><strong>Total</strong></td>
			<td class="text-info"><? if($qtytotal!=0) echo $qtytotal; ?></td>
			<td class="text-success"><? if($sumprice!=0) echo "$ ".$sumprice; ?></td>
			<td class="text-success"><? if($amtprice!=0) echo "$ ".$amtprice; ?></td>
			<td></td>
		</tr>
	</tfoot>
				
	</table>

	<a href="revieworder.php"><button type="button" class="btn input-lg btn-primary" <? if     ($_SESSION['cartqty']==0) echo "disabled";?>>Proceed to Checkout &nbsp;<span class="glyphicon glyphicon-chevron-right"></button></a>
	
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