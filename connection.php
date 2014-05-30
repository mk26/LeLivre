<?php
$conn = pg_connect("host=localhost port=5432 dbname=lelivre user=karthik")or die('Connection error : '.pg_last_error());
session_start();
?>