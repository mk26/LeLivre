<?php session_start();
if(isset($_SESSION['username']))
{
	header("Location:index.php");
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Sign in">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>LeLivre - Sign in</title>

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
		        
	<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login</div>
		<div class="panel-body">
	<form class="form-horizontal col-md-6" role="form" action="login.php" method="post">
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
	  
	    <div class="col-sm-offset-2 col-sm-10">
	    <? if($_GET[login]=='failed')
	    echo "<div class=\"alert alert-danger\">Invalid Username/Password. Try again</div><hr>";
	    ?>
	     <button type="submit" class="btn btn-primary" name="login">Sign in</button>
	    </div>
	  </div>
	</form>
	
	</div>
	
	
		</div><h4> Don't have an account yet?</h4><a class="btn btn-lg btn-primary" href="signup.php" role="button">Sign up now&nbsp;<span class="glyphicon glyphicon-chevron-right"></span></a>
<hr>
	<!-- Bottom Bar -->
	<nav class="navbar navbar-default navbar-bottom" role="navigation">
		<div class="container">
			<p class="navbar-text navbar-left">&copy; KARTHIK & ZHEN, 2014</p>
		</div>
	</nav>
	</div>
</body>
</html>