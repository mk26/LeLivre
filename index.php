<?php session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>LeLivre</title>

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

	<!-- Carousel -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
				<form action="search_results.php" action="get">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search for books by name or ISBN" name="query">
                    <span class="input-group-btn">
		<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                    </form>
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
        <br>
        <h4 class="text text-info">Featured Books</h4>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/f1.png" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>The Alchemist</h1>
                            <p>Paulo Coelho</p>
                            <p><a class="btn btn-lg btn-primary" href="book.php?book=978-0061122415" role="button">View details</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="images/f2.png" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="text text-warning">The Fault in Our Stars</h1>
                            <p class="text text-warning">John Green</p>
                            <p><a class="btn btn-lg btn-primary" href="book.php?book=978-0142424179" role="button">View details</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="images/f3.png" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Lost In Italy</h1>
                            <p>Stacey Joy Netzel</p>
                            <p><a class="btn btn-lg btn-primary" href="book.php?book=978-1466410480" role="button">View details</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
		
        
        <!-- Sign up info -->
		<br>
        <div class="jumbotron">
			<h3>Don't have an account yet?, Think no more. Signing up takes just under a minute and is completely free.</h3><br>
			
            <p><a class="btn btn-lg btn-primary" href="signup.php" role="button">Sign up now</a>
            </p>
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