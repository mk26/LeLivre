<?php session_start();
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
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
        <meta name="description" content="LeLivre - Review Order">
        <meta name="author" content="COEN280-Group8">
        <link rel="shortcut icon" href="images/favicon32.png">

        <title>LeLivre - Review Order</title>

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

            <ol class="breadcrumb">
                <li><a href="cart.php">Cart</a>
                </li>
                <li class="active">Order</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Review Order Items</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Book</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? displayCartItemsR(); ?>
                        </tbody>
                        <tfoot>
                            <tr class="info">
                                <td><strong>Total</strong></td>
                                <td class="text-info"><? if($qtytotal!=0) echo $qtytotal; ?></td>
                                <td class="text-success"><? if($sumprice!=0) echo "$ ".$sumprice; ?></td>
                                <td class="text-success"><? if($amtprice!=0) echo "$ ".$amtprice; ?></td>
                            </tr>
                        </tfoot>
                    </table><hr>
                    <h5 class="text-success"><span class="glyphicon glyphicon-credit-card "></span>&nbsp; Pay using credit card :</h5>
                    <form class="form-horizontal" role="form" name="order" id="order" action="orderreceipt.php" method="post">
                        <? getAllCards();?>
                        <br>
                        <hr>
                        <div class="col-sm-10">			 

                            <button type="submit" class="btn btn-success btn-lg" name="checkout" <? if($_SESSION['cartqty']==0 || $results==NULL) echo "disabled";?>><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Place order</button>

                        </div>
                    </form>
                    <a href="cart.php"><button class="btn btn-danger btn-lg" name="goback"><span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</button></a>

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
$user = $_SESSION['username'];
$results;
function getAllCards()
{
    global $user, $results;
    $query = pg_query("SELECT * FROM CREDITCARD WHERE username='$user'");
    $results = pg_fetch_all($query);
    if($results==NULL) 
    {
        echo"<tr class=\"alert alert-info\">
    	<td>No Cards found.</td>
    	<td><a href=\"manage.php\"><button type=\"button\" class=\"btn btn-primary\" id=\"addnewcard\" data-toggle=\"modal\" data-target=\"#addcard\"><span class=\"glyphicon glyphicon-plus\"></span>&nbsp;&nbsp;Add new card</button></a></td>
    	<td></td>
    	</tr>";
    }
    else
    {
        foreach (($results) as $row)
        {
            $expiryDate = substr($row['exp_date'],0,7);
            echo "<input type=\"radio\" name=\"cards[]\" value=\"".$row['card_no']."\" checked>&nbsp;&nbsp;".$row['card_no']." | EXP: ".$expiryDate." | (".$row['type'].")<br>";
        }
    }
}
    ?>
</html>