<?php 
session_start();
/*if(isset($_GET['genre']))
$_SESSION['url'] = $_SERVER['REQUEST_URI'];*/


function getAvgAuthor($a_id)
{
    $sql = "SELECT ROUND(AVG(CAST(CAST (review_author.rating AS char)AS INT)),2) FROM review_author WHERE a_id = $a_id";
    $result = pg_query($sql);
    $avgscore = pg_fetch_row($result);
    if ($avgscore[0]!=0) echo "&nbsp; <label class=\"label label-warning\"><span class=\"glyphicon glyphicon-star\"></span> ".$avgscore[0]."</label>"; 
}

function getAvgBook($title)
{
    $sql = "SELECT ROUND(AVG(CAST(CAST (review_book.rating AS char)AS INT)),2) FROM book, review_book
    WHERE book.isbn = review_book.isbn AND book.title = '$title' GROUP BY book.title";
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
        <meta name="description" content="LeLivre - Search Results">
        <meta name="author" content="COEN280-Group8">
        <link rel="shortcut icon" href="images/favicon32.png">

        <title>LeLivre - Search Results</title>

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
        <?php include_once('navbar.php'); ?>

        <div class="container panel panel-default">
            <br>
            <div class="panel panel-info">
                <div class="panel-heading"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Search
                
                    <?php
require_once('connection.php');

function search($keyword,$query)
{

    $results = pg_fetch_all($query);
    if($results==NULL) {
    echo"for <em> $keyword </em> returned nothing. Please try using a different keyword";
    	echo "&nbsp;&nbsp;&nbsp;<a href=\"".$_SESSION['url']."\"><span class=\"glyphicon glyphicon-chevron-left\"></span>&nbsp; Back to previous page</a></div>";}
else{
    echo"for <em> $keyword </em> returned ".count($results)." items";
	echo "&nbsp;&nbsp;&nbsp;<a href=\"".$_SESSION['url']."\"><span class=\"glyphicon glyphicon-chevron-left\"></span>&nbsp; Back to previous page</a></div>";
	echo "<div class=\"panel-body\">";
    foreach (($results) as $row)
    {
    	$isbn = $row['isbn'];
        echo "<div class=\"col-md-4\">
<div class=\"thumbnail\">
    <img src=\"images/book_covers/".$row['title'].".jpg\" alt=\"Book Cover\" height=\"120\" width=\"120\" class=\"col-md-4 img-responsive\">
    <div class=\"caption\">
        <a href=\"book.php?book=".$isbn."\"><h4 class=\"text-info\">".$row['title']."</h4></a>"; 
        echo "<h5 class=\"text-info\">"; getAuthors($isbn);        
        echo "</h5><p><span class=\"glyphicon glyphicon-tags\"></span>&nbsp;&nbsp;";
        getGenres($isbn);
        echo "</p><hr><div class=\"\">
        <h5><span class=\"glyphicon glyphicon-home\"></span>&nbsp;".$row['p_house']." (".$row['year'].")</h5>
        <h5><span class=\"glyphicon glyphicon-barcode\"></span>&nbsp;".$row['isbn']."</h5>
        <h5><span class=\"glyphicon glyphicon-file\"></span>&nbsp;<span class=\"label label-primary\">".$row['type']."</span>";getAvgBook($row['title']);
        echo "</h5><p><a href=\"#\" class=\"btn btn-lg btn-default\" role=\"button\" disabled=\"disabled\">$".$row['price']."</a>
        <a href=\"fcart.php?add=".$isbn."\" class=\"btn btn-lg btn-success\" role=\"button\"><span class=\"glyphicon glyphicon-shopping-cart\"></span>&nbsp;Add to cart</a>
        </p></div>
    </div>
</div>
</div>";}
}
}

function getAuthors($isbn)
{
$authorquery = pg_query("SELECT * FROM AUTHOR A, BOOK_AUTHOR BA WHERE BA.isbn = '$isbn' AND BA.a_id = A.a_id");
		$authorresults = pg_fetch_all($authorquery);
		{
			foreach ($authorresults as $author){
				 echo "<a href=\"author.php?author=".$author['a_id']."\">".$author['a_name']."</a>"; 
				 getAvgAuthor($author['a_id']);
				 if (count($authorresults)!=1) echo " | ";

				 
 			}
		}
}

function getGenres($isbn)
{
        $genrequery = pg_query("SELECT g_name FROM GENRE_BOOK WHERE isbn = '$isbn'");
		$genreresults = pg_fetch_all($genrequery);
		{
			foreach ($genreresults as $genre){
				echo "<a href=\"search_results.php?genre=".$genre['g_name']."\"><label class=\"label label-info\">".$genre['g_name']."</label></a>&nbsp;";
				 //if (count($genreresults)!=1) echo " | ";
 			}
		}
}

if(isset($_GET['query']))
{
$keyword = $_GET['query'];
$query = pg_query("SELECT * FROM BOOK B WHERE B.title ILIKE '%$keyword%' OR B.isbn ILIKE '%$keyword%'");
search($keyword,$query);
}

if(isset($_GET['genre']))
{
$genre = $_GET['genre'];
$query = pg_query("SELECT * FROM BOOK B, GENRE_BOOK GB WHERE B.isbn=GB.isbn AND GB.g_name ILIKE '$genre'");
search($genre,$query);
}

if(isset($_GET['author']))
{
$author = $_GET['author'];
$query = pg_query("SELECT * FROM BOOK B, AUTHOR A, BOOK_AUTHOR BA WHERE A.a_name ILIKE '%$author%' AND B.isbn=BA.isbn AND A.a_id=BA.a_id");
search($author,$query);
}

if(isset($_GET['prefgenres']))
{
$user = $_SESSION['username'];
$keyword = "Recommended for ".$user;
$query = pg_query("SELECT * FROM BOOK B, GENRE_BOOK GB, GENRE_CUSTOMER GC WHERE B.isbn=GB.isbn AND GB.g_name=GC.g_name AND GC.username='$user'");
search($keyword,$query);
}

if(isset($_GET['top']))
{
$user = $_SESSION['username'];
$keyword = "Top selling";
$query = pg_query("SELECT * FROM BOOK B, TRANSACTION T WHERE B.isbn=T.isbn");
search($keyword,$query);
}

?>
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