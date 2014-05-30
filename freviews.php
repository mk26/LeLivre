<?php session_start();

require_once('connection.php');

$user = $_SESSION['username'];

function updateRating($isbn, $rating, $review)
{
	global $user;
	if ($rating==0) $rating=1;
	$query = pg_query("UPDATE REVIEW_BOOK SET rating = '$rating', review = '$review' WHERE username = '$user' AND isbn = '$isbn'");

}

function postRating($isbn, $rating, $review)
{
	global $user;
	if ($rating==0) $rating=1;
	$query = pg_query("INSERT INTO REVIEW_BOOK VALUES ('$user','$isbn','$review','$rating')");
}

if(isset($_POST['postr']))
{
	global $user;
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$isbn = $_POST['isbn'];
	$query = pg_query("SELECT * FROM REVIEW_BOOK WHERE username = '$user' AND isbn = '$isbn'");
	$ratingp = pg_fetch_array($query);
	if($ratingp==NULL) postRating($isbn, $rating, $review);
	else updateRating($isbn, $rating, $review);
	header("Location: ".$_SESSION['url']);
}

if(isset($_GET['delete']))
{
	global $user;
	$review_id = $_GET['delete'];
	$query = pg_query("DELETE FROM REVIEW_BOOK WHERE username = '$user' AND review_id = $review_id");
	header("Location: ".$_SESSION['url']);

}
?>