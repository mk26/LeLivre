<?php session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['username']))
{
header("Location:signin.php");
}
require_once('fmanage.php');
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="LeLivre - Sign up">
        <meta name="author" content="COEN280-Group8">
        <link rel="shortcut icon" href="images/favicon32.png">

        <title>LeLivre - Account</title>

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
                        cno: 
                        {
                            validators: 
                            {
                                digits: {
                                    message: 'The credit card number is not valid'
                                },
                                stringLength: {
                                    min: 16,
                                    max: 16,
                                    message: 'The credit card number is not valid'
                                },
                                notEmpty: {
                                    message: 'Cannot be blank'
                                }
                            }
                        },

                        expdate: 
                        {
                            validators: 
                            {
                                date: {
                                    format: 'YYYY-MM',
                                    message: 'Invalid date entered'
                                },
                                notEmpty: {
                                    message: 'Cannot be blank'
                                }
                            }
                        },

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
              
                var changed = "<? if(isset($_GET['change'])) echo "true"; ?>";
                if (changed=="true") {
                    $('#changepass').modal('show');}
                    
				var bchanged = "<? if(isset($_GET['updbday'])) echo "true"; ?>";
                if (bchanged=="true") {
                    $('#addbday').modal('show');}
                    
                    
				$('#changepass').on('hidden.bs.modal', function (e) {
					window.location.href = "manage.php"
})
            });
        </script>
    </head>

    <body>
        <?php include_once('navbar.php') ?>

        <div class="container panel panel-default">
            <br>

            <!-- Account Info -->
            <div class="panel panel-primary">
                <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Account Details</div>
                <div class="panel-body">

                    <ul class="list-group  col-md-6">
                        <li class="list-group-item"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Name&nbsp;&nbsp;<strong><? echo $_SESSION['cname'];?></strong>
                        </li>
                        <li class="list-group-item"><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;Username&nbsp;&nbsp;<strong><? echo $_SESSION['username'];?></strong>
                        </li>
						<li class="list-group-item"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Email&nbsp;&nbsp;<strong><? echo $cust['email'];?></strong>
                        </li>                        
                        <li class="list-group-item"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Birthday&nbsp;&nbsp;<strong><?get_bday();?></strong>
                        </li>

                    </ul>
                    <div class="list-group-item col-md-6">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#changepass"><span class="glyphicon glyphicon-asterisk"></span>&nbsp;&nbsp;Change password</button>
                         <a href="prefgenre.php"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;Manage preferred genres</button></a>
                                           </div>
                    
					<div class="list-group-item col-md-6">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteacc"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Delete Account</button>
  
                    </div>
                </div>
            </div>

            <!-- Modal - Change password -->
            <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="changepasslabel"><span class="glyphicon glyphicon-asterisk"></span>&nbsp;&nbsp;Change Password</h4>
                        </div>
                        <div class="modal-body">
                            <h4> Enter passwords</h4><br>
                            <form class="form-horizontal" role="form" action="fmanage.php" method="post">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="oldpass" name="oldpass" placeholder="Enter your current password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Enter a new password">
                                    </div>
                                </div><br><br>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <? if($_GET['change']=='failed')
{echo "<div class=\"alert alert-danger\">Invalid password. Please try again.</div>";
}

if($_GET[change]=='success')
echo "<div class=\"alert alert-success\">Password Changed successfully</div>";
?>                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="change"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Change password</button></form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal - Delete Account -->
            <div class="modal fade" id="deleteacc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="delacclabel"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Delete Account</h4>
                        </div>
                        
                        <div class="modal-body">
                            <h4> Are you sure you want to delete your account?</h4>
                            <p>Your account information and all other data associated with it will be deleted permanently.</p>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default col-md-4" data-dismiss="modal">Close</button>
                            <form class="col-md-4" action="functions.php" method="post"><button type="submit" class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Confirm Delete Account</button></form>
                        </div>
                        
                    </div>
                </div>
            </div>


            <!-- Modal - Add bday -->
            <div class="modal fade" id="addbday" tabindex="-1" role="dialog" aria-labelledby="addbdaylabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="addbdaylabel"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Birthday</h4>
                        </div>
                        
                        <div class="modal-body">
                        <h4>Enter your birthday</h4><br>
                        
                        <form class="form" role="form" id="bday" action="fmanage.php" method="post">
							<label for="bdate" class="control-label">Birthday (YYYY-MM-DD)</label>
							<input type="month" class="form-control" id="bdate" name="bdate" value="<? echo $cust['birth_date']; ?>">
							
							 <? if($_GET['updbday']=='failed')
{
echo "<br><div class=\"alert alert-danger\">Invalid date. Please check your entry.</div>";
}
?></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="updatebday"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Save birthday</button></form>
						</div>
                    </div>
                </div>
            </div>


            <!-- Modal - Add card -->
            <div class="modal fade" id="addcard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp; Enter card details</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form" role="form" id="billinfo" action="fmanage.php" method="post">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <div class="col-md-8">
                                            <label for="cno" class="control-label">Card Number</label>
                                            <input type="text" class="form-control" id="cno" name="cno" placeholder="Card number">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="col-md-4">
                                            <label for="ctype" class="control-label">Card Type</label>
                                            <select class="form-control" id="ctype" name="ctype">
                                                <option value="master">Master</option>
                                                <option value="visa">Visa</option>
                                                <option value="discover">Discover</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="expdate" class="control-label">Expiry Date</label>
                                            <input type="month" class="form-control" id="expdate" name="expdate">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="cfname" class="col-sm-4 control-label">Card holder name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="cfname" name="hname" placeholder="Enter your full name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="ctype" class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="addr" name="addr" placeholder="Address">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="savecard"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Save card</button>
                                </form></div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <!-- Billing Info -->
            <div class="panel panel-success">
                <div class="panel-heading"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Billing info</div>
                <div class="panel-body">
                    <button type="button" class="btn btn-primary" id="addnewcard" data-toggle="modal" data-target="#addcard"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add new card</button>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Card no.</th>
                                <th>Expiry</th>
                                <th>Type</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? getAllCards(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <br>

            <!-- Order History -->
            <div class="panel panel-info">
                <div class="panel-heading"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Order History</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th id="orders">Order ID</th>
                                <th>Date</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
							<? displayOrderHistory(); ?>
                        </tbody>
                    </table>
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