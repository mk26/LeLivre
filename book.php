<?php 
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

require_once('connection.php');
require_once('reviews.php');

$book;

function search($keyword, $query)
{
	global $book;
    $book = pg_fetch_array($query);

    	$genres=NULL;
    	$isbn = $book['isbn'];
}

function getAuthors($isbn)
{
$authorquery = pg_query("SELECT * FROM AUTHOR A, BOOK_AUTHOR BA WHERE BA.isbn = '$isbn' AND BA.a_id = A.a_id");
		$authorresults = pg_fetch_all($authorquery);
		{
			foreach ($authorresults as $author){
				 echo "<a href=\"author.php?author=".$author['a_id']."\">".$author['a_name']."</a>"; 
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

function getAvgBook($title)
{
    $sql = "SELECT ROUND(AVG(CAST(CAST (review_book.rating AS char)AS INT)),2) FROM book, review_book
    WHERE book.isbn = review_book.isbn AND book.title = '$title' GROUP BY book.title";
    $result = pg_query($sql);
    $avgscore = pg_fetch_row($result);
    if ($avgscore[0]!=0) echo "&nbsp; <label class=\"label label-warning\"><span class=\"glyphicon glyphicon-star\"></span> ".$avgscore[0]."</label>"; 
}

if(isset($_GET['book']))
{
$isbn = $_GET['book'];
$query = pg_query("SELECT * FROM BOOK B, AUTHOR A, BOOK_AUTHOR BA WHERE B.isbn = '$isbn' AND B.isbn=BA.isbn AND A.a_id=BA.a_id");
search($isbn, $query);
}
?>
<!DOCTYPE html>



<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="LeLivre - Book">
    <meta name="author" content="COEN280-Group8">
    <link rel="shortcut icon" href="images/favicon32.png">

    <title>Book - <? echo $book['title'] ?></title>

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
    
    <script>
    function saveValue(target, target2){
	var stepVal = document.getElementById(target).value;
	var isbnVal = document.getElementById(target2).value;

	}
	</script>
	
</head>

<body>
    <?php include_once('navbar.php') ?>

    <div class="container panel panel-default">
        <br>
        <!-- Book Items -->
        <ol class="breadcrumb">
            <li><a href="author.php?author=<? echo $book['a_id']?>"><? echo $book['a_name']?></a>
            </li>
            <li class="active"><? echo $book['title']?></li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Book - details</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="book_covers/<? echo $book['title']?>.jpg" alt="Book Cover" height="320" width="320">
                            <div class="caption">
                                <h3 class="text-info"><? echo $book['title'];  getAvgBook($book['title']);?></h3>
                                <a href="author.php?author=<? echo $book['a_id']?>"><h4 class="text-info"><? getAuthors($isbn);?></h4></a>
                                <p><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;<? getGenres($isbn); ?></p>
                                <hr>
                                <h5><span class="glyphicon glyphicon-home"></span>&nbsp; <? echo $book['p_house']." (".$book['year'].")" ?></h5>
                                <h5><span class="glyphicon glyphicon-barcode"></span>&nbsp; <? echo $book['isbn']?></h5>
                                <h5><span class="glyphicon glyphicon-file"></span>&nbsp; <? echo "<span class=\"label label-primary\">".$book['type']."</span>";?></h5>
                                <p><a href="#" class="btn btn-lg btn-default" role="button" disabled="disabled"><? echo "$".$book['price'] ?></a>
                                    <a href="fcart.php?add=<?echo $book['isbn']?>" class="btn btn-lg btn-success" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Add to cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="well col-md-8">
                        <h5><strong>Description</strong></h5>
                        <p><? echo $book['preview'] ?></p>
                        <div class="panel panel-default">
                            <div class="panel-heading"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;<strong>Ratings and Reviews</strong>
                            </div>

                            <div class="panel-body" style="overflow-x:hidden">
<form name="reviews" action="freviews.php" method="post">
<input type="text" name="isbn" value="<?echo $book['isbn']?>" hidden>
<input type="number" data-max="5" data-min="1" name="rating" value="<?echo getUserRating($isbn);?>" class="rating">
<input type="text" name="review" value="<?echo getUserReview($isbn);?>">
<button class="btn btn-primary" type="submit" name="postr">Post</button>
</form>								<?
								$isbn = $book['isbn'];
								$title = $book['title'];
								echo "<h4>User Reviews</h4>";
								$query = pg_query("SELECT * FROM REVIEW_BOOK WHERE isbn='$isbn'");
								displayReview($query); 
								echo "<br><strong>REVIEWS FOR OTHER EDITIONS OF ".$title."</strong>";
								$query = pg_query("SELECT username, rating, review FROM review_book, book WHERE review_book.isbn = book.isbn and book.title = '$title' EXCEPT SELECT username, rating, review FROM REVIEW_BOOK WHERE isbn='$isbn'");
								displayReview($query);
								?>
							</div>
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

<?php
?>

</html>