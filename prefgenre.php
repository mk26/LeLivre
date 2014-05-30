<?php session_start();
require_once('connection.php');

if(!isset($_SESSION['username']))
{
	header("Location:signin.php");
}
	$user = $_SESSION['username'];
	$preflistquery = pg_query("SELECT * FROM genre_customer WHERE username = '$user'");
	$preflist = pg_fetch_all($preflistquery);
	$prefs = array();
	foreach ($preflist as $pref)
	{
		$prefs[] = $pref['g_name'];
	}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Account - Manage Preferred Genres">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>LeLivre - Account - Manage Preferred Genres</title>

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
		<div class="panel panel-info">
		<div class="panel-heading"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;Manage preferred genres</div>
		<div class="panel-body">
	<form class="form-horizontal" role="form" action="fmanage.php" method="post">
	    <label><input type="checkbox" name="genre[]" value="Adventure" <? if(in_array('Adventure', $prefs)) echo "checked"; ?>>&nbsp; Adventure</label><br>
	    <label><input type="checkbox" name="genre[]" value="Art" <? if(in_array('Art', $prefs)) echo "checked"; ?>>&nbsp; Art</label><br>
	    <label><input type="checkbox" name="genre[]" value="Biography" <? if(in_array('Biography', $prefs)) echo "checked"; ?>>&nbsp; Biography</label><br>
	    <label><input type="checkbox" name="genre[]" value="Business" <? if(in_array('Business', $prefs)) echo "checked"; ?>>&nbsp; Business</label><br>
	    <label><input type="checkbox" name="genre[]" value="Classics" <? if(in_array('Classics', $prefs)) echo "checked"; ?>>&nbsp; Classics</label><br>
	    <label><input type="checkbox" name="genre[]" value="Comics" <? if(in_array('Comics', $prefs)) echo "checked"; ?>>&nbsp; Comics</label><br>
	    <label><input type="checkbox" name="genre[]" value="Crime" <? if(in_array('Crime', $prefs)) echo "checked"; ?>>&nbsp; Crime</label><br>
	    <label><input type="checkbox" name="genre[]" value="Education" <? if(in_array('Education', $prefs)) echo "checked"; ?>>&nbsp; Education</label><br>
	    <label><input type="checkbox" name="genre[]" value="Fables" <? if(in_array('Fables', $prefs)) echo "checked"; ?>>&nbsp; Fables</label><br>
	    <label><input type="checkbox" name="genre[]" value="Fantasy" <? if(in_array('Fantasy', $prefs)) echo "checked"; ?>>&nbsp; Fantasy</label><br>
	    <label><input type="checkbox" name="genre[]" value="Fiction" <? if(in_array('Fiction', $prefs)) echo "checked"; ?>>&nbsp; Fiction</label><br>
	    <label><input type="checkbox" name="genre[]" value="Food" <? if(in_array('Food', $prefs)) echo "checked"; ?>>&nbsp; Food</label><br>
	    <label><input type="checkbox" name="genre[]" value="Health" <? if(in_array('Health', $prefs)) echo "checked"; ?>>&nbsp; Health</label><br>
	    <label><input type="checkbox" name="genre[]" value="History" <? if(in_array('History', $prefs)) echo "checked"; ?>>&nbsp; History</label><br>
	    <label><input type="checkbox" name="genre[]" value="Horror" <? if(in_array('Horror', $prefs)) echo "checked"; ?>>&nbsp; Horror</label><br>
	    <label><input type="checkbox" name="genre[]" value="Music" <? if(in_array('Music', $prefs)) echo "checked"; ?>>&nbsp; Music</label><br>
	    <label><input type="checkbox" name="genre[]" value="Non-fiction" <? if(in_array('Non-fiction', $prefs)) echo "checked"; ?>>&nbsp; Non-fiction</label><br>
	    <label><input type="checkbox" name="genre[]" value="Philosophy" <? if(in_array('Philosophy', $prefs)) echo "checked"; ?>>&nbsp; Philosophy</label><br>
	    <label><input type="checkbox" name="genre[]" value="Poetry" <? if(in_array('Poetry', $prefs)) echo "checked"; ?>>&nbsp; Poetry</label><br>
	    <label><input type="checkbox" name="genre[]" value="Politics" <? if(in_array('Politics', $prefs)) echo "checked"; ?>>&nbsp; Politics</label><br>
	    <label><input type="checkbox" name="genre[]" value="Religion" <? if(in_array('Religion', $prefs)) echo "checked"; ?>>&nbsp; Religion</label><br>
	    <label><input type="checkbox" name="genre[]" value="Romance" <? if(in_array('Romance', $prefs)) echo "checked"; ?>>&nbsp; Romance</label><br>
	    <label><input type="checkbox" name="genre[]" value="Sci-fiction" <? if(in_array('Sci-fiction', $prefs)) echo "checked"; ?>>&nbsp; Sci-Fi</label><br>
	    <label><input type="checkbox" name="genre[]" value="Science" <? if(in_array('Science', $prefs)) echo "checked"; ?>>&nbsp; Science</label><br>
	    <label><input type="checkbox" name="genre[]" value="Society" <? if(in_array('Society', $prefs)) echo "checked"; ?>>&nbsp; Society</label><br>
	    <label><input type="checkbox" name="genre[]" value="Sports" <? if(in_array('Sports', $prefs)) echo "checked"; ?>>&nbsp; Sports</label><br>
	    <label><input type="checkbox" name="genre[]" value="Travel" <? if(in_array('Travel', $prefs)) echo "checked"; ?>>&nbsp; Travel</label><br><br>
	  <div class="form-group">
		  <div class="col-sm-10">
	    <? if($_GET[update]=='success')
	    echo "<div class=\"alert alert-success\">Saved successfully</div><hr>";?>
	    <button type="submit" class="btn btn-success" name="updgenres"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Save preferences</button>
	    </div>
	  </div>
	</form>
	<a href="manage.php"><button class="btn btn-primary" name="goback"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Back</button></a>
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