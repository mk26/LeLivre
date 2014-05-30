<?php session_start();

require_once('connection.php');

$user = $_SESSION['username'];
$reviews;

function displayReview($query)
{
global $reviews, $user;
$reviews = pg_fetch_all($query);
echo "<hr>";
if($reviews==NULL) echo "No reviews found <br><hr>";
else{
foreach($reviews as $review)
{
	for($x=1; $x<=$review['rating']; $x++)
	echo "<i class='glyphicon glyphicon-star'></i>";
	for($x=5; $x>$review['rating']; $x--)
	echo "<i class='glyphicon glyphicon-star-empty'></i>";
	echo "<br>";
	echo "<h5>".$review['review']."</h5>";
	echo "<h6 class=\"text text-info\">".$review['username']."</h6>";
	if ($review['username'] == $user) echo "<a href=\"freviews.php?delete=".$review['review_id'].
"\"><button type=\"button\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-remove\"></span>&nbsp;&nbsp;Remove</button></a>";
	echo "<hr>";
}
}
}

function getUserRating($isbn)
{
	global $user;
	$query = pg_query("SELECT rating FROM REVIEW_BOOK WHERE username = '$user' AND isbn = '$isbn'");
	$userRating = pg_fetch_array($query);
	echo $userRating['rating'];
}

function getUserReview($isbn)
{
	global $user;
	$query = pg_query("SELECT review FROM REVIEW_BOOK WHERE username = '$user' AND isbn = '$isbn'");
	$userReview = pg_fetch_array($query);
	echo $userReview['review'];
}
?>