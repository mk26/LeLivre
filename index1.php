<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LeLivre">
    <meta name="author" content="Group 8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>LeLivre</title>
    <script src="jquery-2.1.0.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
body {
    padding-top: 50px;
    padding-bottom: 20px;
    }
    </style>
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="images/logo.png" height="29px" alt="LeLivre"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			  <li class="active"><a href="#">Home</a></li>
			  <li class="inactive"><a href="books.html">Books</a></li>
			  <li class="inactive"><a href="authors.html">Authors</a></li>
          </ul>

          <form class="navbar-form navbar-right">
			  <h7 style="color:#FFFFFF">Customer login&nbsp&nbsp&nbsp</h7>
            <div class="form-group">
              <input type="text" placeholder="User" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="jumbotron">
      <div class="container">
            <div class="col-md-offset-0">
  	<h1>Welcome</h1>
        <p>To view  books and leave reviews, click below</p>
        <p><a href="products.html" class="btn btn-primary btn-lg" role="button">Browse Books &raquo;</a></p>
      </div>
	<div class="row">
		<div class="col-lg-12 ">
			<h2>Featured Books</h2>
		<div id="featured" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#featured" data-slide-to="0" class="active"></li>
    <li data-target="#featured" data-slide-to="1"></li>
    <li data-target="#featured" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/f1.png" alt="Offer 1">
      <div class="carousel-caption">
       	Offer 1
      </div>
    </div>
    <div class="item">
      <img src="images/f2.png" alt="Offer 2">
      <div class="carousel-caption">
        Offer 2
      </div>
    </div>
     <div class="item">
      <img src="images/f3.png" alt="Offer 3">
      <div class="carousel-caption">
        Offer 3
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#offers" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#offers" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  </div>
  </div>
  </div>  
    </div>
  </div>
    <div class="container">
      <hr>
      <footer>
        <p>&copy; Group 8, 2014</p>
      </footer>
    </div>
  </body>
</html>
