<?php
$db_connection = pg_connect("host=localhost port=5432 dbname=lelivre user=karthik")or die('Could not connect:'.pg_last_error());
//$query = 'SELECT "ISBN", "Title" FROM "BOOK"';
//$result = pg_query($db_connection, $query);
//while ($row = pg_fetch_row($result)) {
    //echo "isbn" . $row[0]." ".$row[1];
    //echo "<br>";
//}


/*//test user authentication
function authenticate($username, $pw)
{
    $sql = pg_query('SELECT "Username", "Password" FROM "CUSTOMER"');
    $num_tuple = pg_affected_rows($result);
    $counter = 0;
    while ($row = pg_fetch_row($sql)) {
        if ($row[0] == $username && $row[1] == $pw) {
            echo "success!<br>";
            //to next webpage
            break;
        }
        $counter++;
        if ($counter == $num_tuple)
            echo "Username and password don't match! <br>";
    }
}

//aut`henticate('jane2', 'hellodb');
//authenticate('ryan24', '1234');

//test ViewAccount
function viewAccount($username)
{
    $query = 'SELECT * FROM "CUSTOMER"';
    $sql = pg_query($query);
    while ($row = pg_fetch_row($sql)) {
        if ($row[0] == $username) {
            //var_dump($row);
            return $row;
        }
        //return $row;
    }
}
//var_dump(viewAccount('jane2'));
*/

//Update User Email
function updateEmail($username, $newEmail)
{
    $query = "UPDATE CUSTOMER SET Email = '$newEmail' WHERE Username = '$username'";
    $sql = pg_query($query);
   
}
updateEmail('jane2', 'hello');

?>
