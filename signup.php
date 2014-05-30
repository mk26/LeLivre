<?php session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Sign up">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>LeLivre - Sign up</title>

	<!-- Scripts -->
	<script src="frameworks/js/jquery-2.1.0.min.js"></script>
    <script src="frameworks/js/bootstrap.js"></script>
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
                $('#signupform').bootstrapValidator( {
                    excluded: [':disabled'],
                    feedbackIcons: 
                    {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: 
                    {
                        username: 
                        {
                            validators: 
                            {
                                notEmpty: {
                                    message: 'Username Cannot be blank'
                                }
                            }
                        },
                        
						password: 
                        {
                            validators: 
                            {
                                notEmpty: {
                                    message: 'Password Cannot be blank'
                                }
                            }
                        },
                        
                        email: 
                        {
                        
                            validators: 
                            {
                            
                             	email: {
                                    message: 'Invalid email entered'
                                },
                                notEmpty: {
                                    message: 'Email ID Cannot be blank'
                                }
                            }
                        },

                        cname: 
                        {
                            validators: 
                            {
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'The Full Name can consist of alphabetical characters and spaces only'
                                },
                                notEmpty: {
                                    message: 'Name cannot be blank'
                                }
                            }
                        },

                        dob: 
                        {
                            validators: 
                            {
                                date: {
                                    format: 'YYYY-MM-DD',
                                    message: 'Invalid date entered'
                                },
                            }
                        },
                    
						}
                });
              
            });
        </script>


</head>

<body>
	<?php include_once('navbar.php') ?>
		        
	<div class="container">
	<form class="form-horizontal well" role="form" id="signupform" action="fsignup.php" method="post">
		<h3>Enter the following info to create a new account</h3>
		<hr>
	  <div class="form-group">
	    <label for="username" class="col-sm-2 control-label">Username</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="password" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="name" class="col-sm-2 control-label">Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="name" name="cname" placeholder="Name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="dob" class="col-sm-2 control-label">Birth Date (YYYY-MM-DD)</label>
	    <div class="col-sm-10">
	      <input type="date" class="form-control" id="dob" name="dob">
	    </div> 
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary" name="signup">Sign up</button>
	    </div>
	  </div>
	</form>
	
	<? if($_GET['user']=='exists')
	    echo "<div class=\"alert alert-danger\">Username already exists. Please choose a different name</div><hr>";
	    if($_GET['signup']=='failed')
	    echo "<div class=\"alert alert-danger\">Invalid details entered. Please check again</div><hr>";
	    ?>
	
	<div class="panel panel-info">
		<div class="panel-heading"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;Billing info</div>
		<div class="panel-body">
			<p>You can input your credit card info and address once you create your account, by choosing the <code>Account -> Manage account</code> option from the navigation bar.</p>
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