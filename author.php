<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

require_once('connection.php');
require_once('reviewsau.php');


$author;

if(isset($_GET['author']))
{
global $author;
$id = $_GET['author'];
$query = pg_query("SELECT * FROM AUTHOR A WHERE A.a_id = '$id'");
$author = pg_fetch_array($query);
}

function getAvgAuthor($a_id)
{
    $sql = "SELECT ROUND(AVG(CAST(CAST (review_author.rating AS char)AS INT)),2) FROM review_author WHERE a_id = $a_id";
    $result = pg_query($sql);
    $avgscore = pg_fetch_row($result);
    if ($avgscore[0]!=0) echo "&nbsp; <label class=\"label label-warning\"><span class=\"glyphicon glyphicon-star\"></span> ".$avgscore[0]."</label>"; 
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Author">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>Author - <? echo $author['a_name'] ?></title>

    <!-- Scripts -->
    <script src="frameworks/js/jquery-2.1.0.min.js"></script>
    <script src="frameworks/js/bootstrap.min.js"></script>
	<script src="frameworks/js/bootstrap-rating-input.min.js"></script>


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

        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Author - details</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3 class="text-info"><? echo $author['a_name']; 				 getAvgAuthor($author['a_id']);
 ?></h3>
                                <h5 class="text-info"><span class="glyphicon glyphicon-globe"></span>&nbsp;<? echo $author['birth_place'] ?></h5>
                                <p><span class="glyphicon glyphicon-calendar"></span>&nbsp; <? echo $author['birth_date'] ?></p>
                                <hr>
								<a href="search_results.php?author=<?echo $author['a_name'] ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Browse books by author</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="well col-md-8">
                        <h5><strong>Biography</strong></h5>
                        <p><? echo $author['biography'] ?></p>
                        <div class="panel panel-default">
                            <div class="panel-heading"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;<strong>Ratings and Reviews</strong>
                            </div>

                            <div class="panel-body" style="overflow-x:hidden">
<form name="reviews" action="freviewsau.php" method="post">
<input type="text" name="aid" value="<?echo $author['a_id']?>" hidden>
<input type="number" data-max="5" data-min="1" name="rating" value="<?echo getUserRating($author['a_id']);?>" class="rating">
<input type="text" name="review" value="<?echo getUserReview($author['a_id']);?>">
<button class="btn btn-primary" type="submit" name="postr">Post</button>
</form>								<?
								$aid = $author['a_id'];
								$query = pg_query("SELECT * FROM REVIEW_AUTHOR WHERE a_id='$aid'");
								displayReview($query); ?>                            </div>
                        </div>

                    </div>
                </div>
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