<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Checkout">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>LeLivre - Checkout</title>

    <!-- Scripts -->
    <script src="frameworks/js/jquery-2.1.0.min.js"></script>
    <script src="frameworks/js/bootstrap.js"></script>

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
    <?php include_once( 'navbar.php') ?>

    <div class="container panel panel-default">
        <br>
        <ol class="breadcrumb">
            <li><a href="cart.php">Cart</a>
            </li>
            <li><a href="revieworder.php">Order</a></li>
			<li class="active">Confirm order</li>
        </ol>
        <!-- Billing Info -->
        <div class="panel panel-success">
            <div class="panel-heading"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Confirm your Billing info</div>
            <div class="panel-body">
                <form class="form" role="form">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-xs-4 col-xs-offset-1">
                                <label for="cno" class="control-label">Card Number</label>
                                <input type="text" class="form-control" id="cno" placeholder="Card number">
                            </div>
                            <div class="col-xs-2">
                                <label for="ctype" class="control-label">Card Type</label>
                                <input type="text" class="form-control" id="ctype" placeholder="Card type">
                            </div>                            
                            <div class="col-xs-2">
                                <label for="expdate" class="control-label">Expiry Date</label>
                                <input type="month" class="form-control" id="expdate">
                            </div>
							<div class="col-xs-2">
                                <label for="cvv" class="control-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" placeholder="CVV">
                            </div>
                        </div>
                    </div>
                </form>
               
                <hr>
                
                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="form-group col-sm-12 col-sm-offset-2">
                            <label for="cfname" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="cfname" placeholder="First name">
                            </div>
                            <label for="clname" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="clname" placeholder="Last name">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-sm-offset-4">
                            <label for="ctype" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="addr" placeholder="Address">
                            </div>
                        </div>
                    </div>

                    <hr>
					<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-ok"></span>&nbsp; Confirm Purchase</button>
					
                </form>
                <hr>
                	<a href="revieworder.php"><button class="btn btn-danger" name="goback"><span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</button></a>
            </div>

        </div>

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