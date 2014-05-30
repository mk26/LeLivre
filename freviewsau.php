<?php session_start();

require_once('connection.php');

$user = $_SESSION['username'];

function updateRating($aid, $rating, $review)
{
	global $user;
	if ($rating==0) $rating=1;
	$query = pg_query("UPDATE REVIEW_AUTHOR SET rating = '$rating', review = '$review' WHERE username = '$user' AND a_id = '$aid'");

}

function postRating($aid, $rating, $review)
{
	global $user;	
	if ($rating==0) $rating=1;
	$query = pg_query("INSERT INTO REVIEW_AUTHOR VALUES ('$user','$aid','$review','$rating')");
}

if(isset($_POST['postr']))
{
	global $user;
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$aid = $_POST['aid'];
	$query = pg_query("SELECT * FROM REVIEW_AUTHOR WHERE username = '$user' AND a_id = '$aid'");
	$ratingp = pg_fetch_array($query);
	if($ratingp==NULL) postRating($aid, $rating, $review);
	else updateRating($aid, $rating, $review);
	header("Location: ".$_SESSION['url']);
}

if(isset($_GET['delete']))
{
	global $user;
	$review_id = $_GET['delete'];
	$query = pg_query("DELETE FROM REVIEW_AUTHOR WHERE username = '$user' AND review_id = $review_id");
	header("Location: ".$_SESSION['url']);
}
?>