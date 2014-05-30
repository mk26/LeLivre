<?php
require_once('connection.php');

function search($keyword)
{
$query = pg_query("SELECT * FROM BOOK WHERE title LIKE '%$keyword%'");
$results = pg_fetch_all($query);
foreach ($results as $row)
echo "<div class=\"col-sm-6 col-md-4\">
<div class=\"thumbnail\">
    <div class=\"caption\">
        <h3 class=\"text-info\">".$row['title']."</h3>
        <h4 class=\"text-info\">Author Name</h4>
        <p><span class=\"glyphicon glyphicon-tag\"></span>&nbsp; Genres</p>
        <hr>
        <h5><span class=\"glyphicon glyphicon-home\"></span>&nbsp;".$row['p_house']." (".$row['year'].")</h5>
        <h5><span class=\"glyphicon glyphicon-barcode\"></span>&nbsp;".$row['isbn']."</h5>
        <h5><span class=\"glyphicon glyphicon-file\"></span>&nbsp;".$row['type']."</h5>
        <p><a href=\"#\" class=\"btn btn-lg btn-default\" role=\"button\" disabled=\"disabled\">$".$row['price']."</a>
        <a href=\"#\" class=\"btn btn-lg btn-success\" role=\"button\"><span class=\"glyphicon glyphicon-shopping-cart\"></span>&nbsp;Add to cart</a>
        </p>
    </div>
</div>
</div>";
}

search($_GET['query']);
?>