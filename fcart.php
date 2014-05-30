<?php
require_once('connection.php');
$user = $_SESSION['username']; 
$sumprice;
$amtprice;
$qtytotal;

function changeQty($isbn, $qty)
{
	global $user;
    if ($qty == 0) 
    { 
        deleteItem($isbn);
    } 
    else 
    {
        $sql = "UPDATE cart SET quantity = $qty WHERE username = '$user' AND isbn = '$isbn'";
        $result = pg_query($sql);
    }
}

function deleteItem($isbn)
{
	$user = $_SESSION['username'];
    $query = pg_query("DELETE FROM cart WHERE username = '$user' AND isbn = '$isbn'");
}

function addToCart($isbn, $qty)
{
	global $user;
    $query = pg_query("SELECT isbn, quantity FROM cart WHERE username = '$user' AND isbn = '$isbn'");
    $item = pg_fetch_array($query);

    if ($item['isbn']==$isbn) 
    { 
		$newqty=$item['quantity']+1;
        changeQty($isbn, $newqty);
    } 
    else 
    { 	
        $sql = "INSERT INTO cart VALUES('$user', '$isbn', $qty)";
        $result = pg_query($sql);
    }
}

function displayCartItems()
{	
	global $sumprice, $amtprice, $qtytotal;
	$user = $_SESSION['username'];
	$query = pg_query("SELECT B.title, B.type, B.price, C.isbn, C.quantity FROM BOOK B, CART C WHERE C.username = '$user' AND B.isbn=C.isbn");
    $items = pg_fetch_all($query);
	$_SESSION['cartqty'] = count($items);

	if ($items == NULL) {
	    echo"<tr class=\"alert alert-info\">
    	<td>No items in cart.</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	</tr>";
    	$_SESSION['cartqty'] = 0;
    	}
    else {
	foreach ($items as $item)
	{
		$amt = $item['price'] * $item['quantity'];

		$sumprice += $item['price'];
		$amtprice += $amt;
		$qtytotal +=  $item['quantity'];
		
		echo "<tr>
		<td class=\"col-xs-10\">".$item['title']."&nbsp;&nbsp;<label class=\"label label-primary\">".$item['type']."</label></td>
		<input type=\"text\" class=\"hidden\" id=\"".$item['isbn']."\" value=\"".$item['isbn']."\">
		<td><input type=\"number\" class=\"form-control input-sm\" min=\"0\" step=\"1\" placeholder=\"Qty\" name=\"qty\" id=\"".$item['isbn']."A"."\" onchange=\"saveValue('".$item['isbn']."A"."','".$item['isbn']."')\" value=\"".$item['quantity']."\"></td>
		<td class=\"col-xs-1\"> $ ".$item['price']."</td>
		<td class=\"col-xs-1\"> $ ".$amt."</td>
		<td class=\"col-xs-2\"><a href=\"cart.php?remove=".$item['isbn']."\"><button type=\"button\" class=\"btn input-sm btn-danger\"><span class=\"glyphicon glyphicon-remove\"></button></a></td>
		</tr>";
	}
	}
}

function displayCartItemsR()
{	
	global $sumprice, $amtprice, $qtytotal;
	$user = $_SESSION['username'];
	$query = pg_query("SELECT B.title, B.type, B.price, C.isbn, C.quantity FROM BOOK B, CART C WHERE C.username = '$user' AND B.isbn=C.isbn");
    $items = pg_fetch_all($query);
	$_SESSION['cartqty'] = count($items);

	if ($items == NULL) {
	    echo"<tr class=\"alert alert-info\">
    	<td>No items in cart.</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	</tr>";
    	$_SESSION['cartqty'] = 0;
    	}
    else {
	foreach ($items as $item)
	{
		$amt = $item['price'] * $item['quantity'];

		$sumprice += $item['price'];
		$amtprice += $amt;
		$qtytotal +=  $item['quantity'];
		
		echo "<tr>
		<td class=\"col-xs-10\">".$item['title']."&nbsp;&nbsp;<label class=\"label label-primary\">".$item['type']."</label></td>
		<input type=\"text\" class=\"hidden\" id=\"".$item['isbn']."\" value=\"".$item['isbn']."\">
		<td>".$item['quantity']."</td>
		<td class=\"col-xs-1\"> $ ".$item['price']."</td>
		<td class=\"col-xs-1\"> $ ".$amt."</td>
		</tr>";
	}
	}
}


if(isset($_GET['add']))
{
	$isbn = $_GET['add'];
	$qty = 1;
	addToCart($isbn, $qty);
	header("Location: cart.php");

}

if(isset($_POST['update']))
{
	$qty = $_POST['update'];
	$isbn = $_POST['isbn'];
	changeQty($isbn, $qty);
	header("Location: cart.php");

}

if(isset($_GET['remove']))
{
	$isbn = $_GET['remove'];
	deleteItem($isbn);
	header("Location: cart.php");
}
?>