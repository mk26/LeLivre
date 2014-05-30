<?php session_start();
require_once('connection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="LeLivre - Navbar">
    <meta name="author" content="COEN280-Group8">

    <title>Navbar</title>
</head>

<body>
    <!-- LELIVRE Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" height="26" alt="LeLivre">
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="inactive"><a href="index.php">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Books <b class="caret"></b></a>
                        <ul class="dropdown-menu scrollable-menu">
                            <li class="dropdown-header">BY STATS</li>
                            <li><a href="search_results.php?top">Top Selling</a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-header">BY GENRE</li>
                            <li><a href="search_results.php?prefgenres"><span class="glyphicon glyphicon-heart text-danger"></span>&nbsp;<em>Preferred</em></a>
                            </li>
                            <li><a href="search_results.php?genre=Adventure">Adventure</a>
                            </li>
							<li><a href="search_results.php?genre=Art">Art</a>
                            </li>
                            <li><a href="search_results.php?genre=Biography">Biography</a>
                            </li>
                            <li><a href="search_results.php?genre=Business">Business</a>
                            </li>
                            <li><a href="search_results.php?genre=Classics">Classics</a>
                            </li>
                            <li><a href="search_results.php?genre=Comics">Comics</a>
                            </li>
                            <li><a href="search_results.php?genre=Crime">Crime</a>
                            </li>
                            <li><a href="search_results.php?genre=Education">Education</a>
                            </li>
                            <li><a href="search_results.php?genre=Fables">Fables</a>
                            </li>
                            <li><a href="search_results.php?genre=Fantasy">Fantasy</a>
                            </li>
                            <li><a href="search_results.php?genre=Fiction">Fiction</a>
                            </li>
                            <li><a href="search_results.php?genre=Food">Food</a>
                            </li>
                            <li><a href="search_results.php?genre=Health">Health</a>
                            </li>
                            <li><a href="search_results.php?genre=History">History</a>
                            </li>
                            <li><a href="search_results.php?genre=Horror">Horror</a>
                            </li>
                            <li><a href="search_results.php?genre=Music">Music</a>
                            </li>
                            <li><a href="search_results.php?genre=Non-Fiction">Non-Fiction</a>
                            </li>
							<li><a href="search_results.php?genre=Philosophy">Philosophy</a>
                            </li>
							<li><a href="search_results.php?genre=Poetry">Poetry</a>
                            </li>
                            <li><a href="search_results.php?genre=Politics">Politics</a>
                            </li>
                            <li><a href="search_results.php?genre=Religion">Religion</a>
                            </li>
                            <li><a href="search_results.php?genre=Romance">Romance</a>
                            </li>
                            <li><a href="search_results.php?genre=Sci-Fi">Sci-Fi</a>
                            </li>
                            <li><a href="search_results.php?genre=Science">Science</a>
                            </li>
							<li><a href="search_results.php?genre=Society">Society</a>
                            </li>
                            <li><a href="search_results.php?genre=Sports">Sports</a>
                            </li>
                            <li><a href="search_results.php?genre=Travel">Travel</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="inactive"><a href="cart.php">Cart <span class="badge"><? echo $_SESSION['cartqty']?></span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
                        session_start();
                        if(isset($_SESSION['username']))
                        {
                        	echo $_SESSION['cname']; 
                        }
                        else echo "Account"; ?>
<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">ACCOUNT</li>
                            <li> 
						<?php 
                        session_start();
                        if(isset($_SESSION['username']))
                        {
                        	echo "<a href=\"manage.php\">Manage account </a>";
                        	echo "<li class=\"divider\"></li>";
							echo "<li><a href=\"logout.php\"><span class=\"text-danger\">
							<span class=\"glyphicon glyphicon-log-out\"></span>&nbsp;Sign out ";								echo $_SESSION['username']." </span></a>";
                        }
                        else echo "<a href=\"signin.php\">Sign in"."</a>"; 
                               
                        
                        ?>

                        </ul>
                        </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
