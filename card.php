<?php session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['username']))
{
header("Location:signin.php");
}

require_once('connection.php');

$user = $_SESSION['username'];

$userquery = pg_query("SELECT * FROM CUSTOMER WHERE username = '$user'");
$cust = pg_fetch_array($userquery);

$allcardsquery = pg_query("SELECT * FROM CREDITCARD WHERE username = '$user'");
$cards = pg_fetch_all($allcardsquery);

function viewCard($cardNumber)
{
global $user;
$cardno = trim($cardNumber,'"');
$query = pg_query("SELECT * FROM CREDITCARD WHERE username = '$user' AND card_no = '$cardno'");
$card = pg_fetch_array($query);
return $card;
}

function updateBillingInfo($cardNumber, $cardType, $expiryDate, $holderName, $address)
{
	//echo "UPDATE";
    global $user;
    $cardno = trim($cardNumber,'"');
    $query = pg_query("UPDATE CREDITCARD SET billingaddress = '$address', holder_name='$holderName' WHERE card_no = '$cardno' AND username='$user'");
    header("Location: card.php"."?card=".$cardNumber."&update=success");
}

if(isset($_GET['card']))
{
   $card=viewCard($_GET['card']);
}

if(isset($_POST['update']))
{
  	updateBillingInfo($_POST['cno'],$_POST['ctype'],$_POST['expdate'],$_POST['hname'],$_POST['addr']);
}

?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="LeLivre - Account - Card details">
        <meta name="author" content="COEN280-Group8">
        <link rel="shortcut icon" href="images/favicon32.png">

        <title>LeLivre - Account - Card details</title>

        <!-- Scripts -->
        <script src="frameworks/js/jquery-2.1.0.min.js"></script>
        <script src="frameworks/js/bootstrap.min.js"></script>
        <script src="frameworks/js/bootstrapValidator.min.js"></script>

        <link href="frameworks/css/bootstrap.min.css" rel="stylesheet">
        <link href="frameworks/css/bootstrapValidator.min.css" rel="stylesheet">

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
        <script>
            $(document).ready(function() {
                $('#billinfo').bootstrapValidator( {
                    excluded: [':disabled'],
                    feedbackIcons: 
                    {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: 
                    {
                        hname: 
                        {
                            validators: 
                            {
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'The Full Name can consist of alphabetical characters and spaces only'
                                },
                                notEmpty: {
                                    message: 'Cannot be blank'
                                }
                            }
                        },

                        addr: 
                        {
                            validators: 
                            {
                                notEmpty: {
                                    message: 'Cannot be blank'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    </head>

    <body>
        <?php include_once('navbar.php') ?>

        <div class="container panel panel-default">
            <br>
			<?
	    if($_GET[update]=='success')
	   echo "<div class=\"alert alert-success\">Updated successfully</div><hr>";
	    ?>
	            <ol class="breadcrumb">
            <li><a href="manage.php">Account</a>
            </li>
            <li class="active">Details for Card #<? echo $card['card_no']; ?></li>
        </ol>
       

            <form class="form" role="form" id="billinfo" action="card.php" method="post">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <div class="col-md-8">
                                            <label for="cno" class="control-label" >Card Number</label>
                                            <input type="text" class="form-control" id="cno" name="cno" placeholder="Card number" value="<? echo $card['card_no']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="col-md-4">
                                            <label for="ctype" class="control-label">Card Type</label>
                                            <select class="form-control" id="ctype" name="ctype" disabled>
                                                <option value="master" <?if($card['type']=='master')echo "selected";?>>Master</option>
                                                <option value="visa" <?if($card['type']=='visa')echo "selected";?>>Visa</option>
                                                <option value="discover" <?if($card['type']=='discover')echo "selected";?>>Discover</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="expdate" class="control-label">Expiry Date (YYYY-MM)</label>
                                            <input type="month" class="form-control" id="expdate" name="expdate" value="<? echo $card['exp_date']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="cfname" class="col-sm-4 control-label">Card holder name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="cfname" name="hname" placeholder="Enter your full name" value="<? echo $card['holder_name']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="ctype" class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="addr" name="addr" placeholder="Address" value="<? echo $card['billingaddress']; ?>">
                                        </div>
                                    </div>
                                </div>
								<button type="submit" class="btn btn-primary" name="update"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Update card</button>&nbsp;&nbsp;
                                </form>
                                <br>
            
            <!-- Bottom Bar -->
            <nav class="navbar navbar-default navbar-bottom" role="navigation">
                <div class="container">
                    <p class="navbar-text navbar-left">&copy; KARTHIK & ZHEN, 2014</p>
                </div>
            </nav>
        </div>
</body>


</html>