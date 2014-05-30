<?php

//build connection to database;
$db_connection = pg_connect("host=localhost port=5432 dbname=lelivre user=zhenzhen")or die('Could not connect:'.pg_last_error());

//test user authentication
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
            //die("Username and password don't match!)";
            echo "Username and password don't match!";
    }
}

//tester
//authenticate('jane2', 'hellodb');

/* 
test ViewAccount: return user information in array;
row[0] = username; row[1] = email; row[2] = pw; row[3] = name; row[4] = date_of_birth;
*/
function viewUserInfo($username)
{
    $sql = "SELECT * FROM CUSTOMER WHERE Username = '$username'";
    $result = pg_query($query);
    while ($row = pg_fetch_row($result)) {
        return $row;
    }
}

//tester
//var_dump(viewAccount('jane2'));


/*
Update User Email
*/
function updateUserInfo($username, $attribute, $newValue)
{
    if ($attribute == 'email') {
        $sql = "UPDATE customer SET email = '$newValue' WHERE username = '$username'";
        $result = pg_query($sql);
    } else if ($attribute == 'c_name') {
        $sql = "UPDATE customer SET c_name = '$newValue' WHERE username = '$username'";
        $result = pg_query($sql);
    } else if ($attribute == 'password') {
        $sql = "update customer set password = '$newValue' where username = '$username'";
        $result = pg_query($sql);
    } else if ($attribute == 'birth_date') {
        $sql = "update customer set birth_date = '$newValue' where username = '$username'";
        $result = pg_query($sql);
    } else if ($attribute == 'shipping_addr') {
        $sql = "update customer set shipping_addr = '$newValue' where username = '$username'";
        $result = pg_query($sql); 
    }
}

//tester
//updateUserInfo('ryan24', 'c_name','Ryan Willton');

/*
View user transaction history ordered by dates;
row[0] = date row[1] = bookname row[2] = qty;
*/
function userTransaction($username)
{
    $sql = "SELECT t.date_time, b.title, t.quantity FROM book as b, transaction as t WHERE b.isbn = t.isbn AND t.username = '$username' ORDER BY t.date_time";
    $result = pg_query($sql);
    $trans = array();
    while ($row = pg_fetch_row($result)) {
        $trans[] = $row;
    }
    return $trans;
}

//tester
//userTransaction('jane2');

/*
get book's isbn, title, year ,type, price and publish_house by name;
*/
function getBookInfoByTitle($title)
{
    $sql = "SELECT isbn, title, year, type, price, p_house FROM book WHERE title = '$title'";
    $result = pg_query($sql);
    $book = array();
    while ($row = pg_fetch_row($result)) {
        $book[] = $row;
    }
    print_r($book);
    return $book;
}

//tester;
//getBookInfoByTitle('The Boy in the Suitcase');

/*
get book's author(s) by booke title;
*/
function getBookAuthorByTitle($title)
{
    $sql = "SELECT DISTINCT b.title, a.a_name FROM book as b, book_author as ba, author as a
    WHERE b.isbn = ba.isbn AND ba.a_id = a.a_id AND b.title = '$title'";
    $result = pg_query($sql);
    $authors = array();
    while ($row = pg_fetch_row($result)) {
        $authors[] = $row;
    }
    print_r($authors);
    return $authors;
}

//tester
//getBookAuthorByTitle('The Boy in the Suitcase');

/*
get book's genre(s) by title;
row[0] = title, row[1] = genre;
*/
function getBookGenreByTitle($title)
{
    $sql = "SELECT DISTINCT title, g_name FROM book, genre_book
    WHERE book.isbn = genre_book.isbn  AND book.title = '$title'";
    $result = pg_query($sql);
    $genres= array();
    while ($row = pg_fetch_row($result)) {
        $genres[] = $row;
    }
    print_r($genres);
    return $genres;
}

//tester
//getBookGenreByTitle('The Boy in the Suitcase');

/*
get book's isbn, title, year ,type, price and publish_house by isbn
*/
function getBookInfoByISBN($isbn)
{
    $sql = "SELECT isbn, title, year, type, price, p_house FROM book WHERE isbn = '$isbn'";
    $result = pg_query($sql);
    $book = array();
    while ($row = pg_fetch_row($result)) {
        $book[] = $row;
    }
    print_r($book);
    //return $book;
}

//tester
//getBookInfoByISBN('978-0156947981');

/*
get book's author(s) by book isbn;
*/
function getBookAuthorByISBN($isbn)
{
    $sql = "SELECT DISTINCT b.title, a.a_name FROM book as b, book_author as ba, author as a
    WHERE b.isbn = ba.isbn AND ba.a_id = a.a_id AND b.isbn = '$isbn'";
    $result = pg_query($sql);
    $authors = array();
    while ($row = pg_fetch_row($result)) {
        $authors[] = $row;
    }
    print_r($authors);
    return $authors;
}

//tester
//getBookAuthorByISBN('978-1559364584');


/*
get book's genre(s) by title;
row[0] = title, row[1] = genre;
*/
function getBookGenreByISBN($isbn)
{
    $sql = "SELECT title, g_name FROM book, genre_book
    WHERE book.isbn = genre_book.isbn  AND book.isbn = '$isbn'";
    $result = pg_query($sql);
    $genres= array();
    while ($row = pg_fetch_row($result)) {
        $genres[] = $row;
    }
    print_r($genres);
    return $genres;
}

//tester
//getBookGenreByISBN('978-1559364584');

/*
select books based on genre;
*/
function booksByGenre($genre)
{
    $sql = "SELECT DISTINCT title FROM book, genre_book WHERE book.isbn = genre_book.isbn
    AND genre_book.g_name = '$genre'";
    $result = pg_query($sql);
    $book = array();
    while ($row = pg_fetch_row($result)) {
        $book[] = $row;
    }
    print_r($book);
    return $book;
}

//tester
//booksByGenre('Fiction');

/*
get the stock of a certain book; input is isbn;
*/
function getStockByISBN($isbn)
{
    $sql = "SELECT stock FROM book WHERE isbn = '$isbn'";
    $result = pg_query($sql);
    $stock = pg_fetch_row($result);
    print_r($stock);
    return $stock;
}

//tester
//getStockByISBN('978-0061122415');

/*
get the stock of a certain book; input is title and type;
*/
function getStockByTitle($title, $type)
{
    $sql = "SELECT stock FROM book WHERE title = '$title' AND type = '$type'";
    $result = pg_query($sql);
    $stock = pg_fetch_row($result);
    print_r($stock);
    return $stock;
}

//tester
//getStockByTitle('The Boy in the Suitcase', 'Hardcover');

/*
get registered credit card under a customer;
*/
function getCreditCard($username)
{
    $sql = "SELECT card_no FROM customer, creditcard WHERE customer.username = creditcard.username AND customer.username = '$username'";
    $result = pg_query($sql);
    $card_no = array();
    while ($row = pg_fetch_row($result)) {
        $card_no[] = $row;
    }
    print_r($card_no);
    return $card_no;
}

//tester
//getCreditCard('ryan24');

/*
get review of a book; username, score and review
*/
function getBookReview($title)
{
    $sql = "SELECT username, review, rating FROM book, review_book WHERE book.isbn = review_book.isbn AND book.title = '$title'";
    $result = pg_query($sql);
    $review = array();
    while ($row = pg_fetch_row($result)) {
        $review[] = $row;
    }
    print_r($review);
    return $review;
}

//tester
//getBookReview('The Boy in the Suitcase');

/*
get average score for a book; return a score; search by book title;
*/
function getAvgBook($title)
{
    $sql = "SELECT ROUND(AVG(CAST(CAST (review_book.rating AS char)AS INT)),2) FROM book, review_book
    WHERE book.isbn = review_book.isbn AND book.title = '$title' GROUP BY book.title";
    $result = pg_query($sql);
    $avgscore = pg_fetch_row($result);
    //print_r($avgscore); 
    return $avgscore;
}

//tester
//getAvgBook('The Boy in the Suitcase');


/*
get review of an author; score and review;
*/
function getAuthorReview($a_name)
{
    $sql = "SELECT username, review, rating FROM author, review_author 
    WHERE author.a_id = review_author.a_id AND author.a_name= '$a_name'";
    $result = pg_query($sql);
    $review = array();
    while ($row = pg_fetch_row($result)) {
        $review[] = $row;
    }
    print_r($review);
    return $review;
}

//tester
//getAuthorReview('Michael Lewis');


/*
get average score for an author; return a score; search by author id;
*/
function getAvgAuthor($a_id)
{
    $sql = "SELECT ROUND(AVG(CAST(CAST (review_author.rating AS char)AS INT)),2) FROM review_author WHERE a_id = $a_id";
    $result = pg_query($sql);
    $avgscore = pg_fetch_row($result);
    //print_r($avgscore); 
    return $avgscore;
}

//tester
//getAvgAuthor(10);


/*
get author info by author name; row[0] = name; row[1] = birthday; row[2] = birth_place; row[3] = biography;
*/
function getAuthorInfo($a_name)
{
    $sql = "SELECT * FROM author WHERE a_name = '$a_name'";
    $result = pg_query($sql);
    $author = array();
    while ($row = pg_fetch_row($result)) {
        $author[] = $row;
    }
    print_r($author);
    return $author;
}

//tester
//getAuthorInfo('Blake Crouch');


/*
sign up a new user; providing username, password, email, full name, birthday;
*/
function signup($username, $email, $pw, $c_name, $birth_date)
{
    $sql = "SELECT username FROM customer WHERE username = '$username'";
    $result = pg_query($sql);
    $user = array();
    while ($row = pg_fetch_row($result)) {
        $user[] = $row;
    }
    if (in_array($username, $user[0])) {
        die("Username already taken, choose another one.");
    } else {
        $sql = "INSERT INTO customer VALUES ('$username', '$email', '$pw', '$c_name', '$birth_date')";
        $result = pg_query($sql);
    }
}

//tester;
//signup('jane2','jane@gmail.com', 'he','Jane Zhang','1999-02-04');
//signup('emily11', 'emily11@gmail.com', 'hellodb', 'Emily Johnson', '1990-01-03');


/*
get customer preferred genres; input username output genre array;
*/
function getPreferredGenre($username)
{
    $sql = "SELECT g_name FROM genre_customer WHERE username = '$username'";
    $result = pg_query($sql);
    $genres = array();
    while ($row = pg_fetch_row($result)) {
        $genres[] = $row;
    }
    print_r($genres);
    return $genres;
}

//tester
//getPreferredGenre('jane2');


/*
View transaction history by customer's username;
row[0] = date_time; row[1] = isbn; row[2] = title; row[3] = type; row[4] = quantity; row[5] = checkout_price;
*/
function getTransHistory($username)
{
    $sql = "SELECT t.date_time, b.isbn, b.title, b.type, t.quantity, t.checkout_price
    FROM book as b, transaction as t WHERE b.isbn = t.isbn AND t.username = '$username'";
    $result = pg_query($sql);
    $history = array();
    while ($row = pg_fetch_row($result)) {
        $history[] = $row;
    }
    print_r($history);
    return $history;
}

//tester
//getTransHistory('ryan24');

/*
Add item(s) to a cart;
row[0] = username; row[1] = isbn; row[2] = quantity;
*/
function addToCart($username, $isbn, $qty)
{
    $sql1 = "SELECT isbn, quantity FROM cart WHERE username = '$username' AND isbn = '$isbn'";
    $result = pg_query($sql1);
    $item = array();
    while ($row = pg_fetch_row($result)) {
        $item[] = $row;
    }
    if (sizeof($item != 0)) {
        changeQty($username, $isbn, ($qty + $item[0][1]));
    } else {
        $sql = "INSERT INTO cart VALUES('$username', '$isbn', $qty)";
        $result = pg_query($sql);
    }
}

//tester
//addToCart('jane2', '978-1612183954',2);


/*
Change quantity in cart;
*/
function changeQty($username, $isbn, $qty)
{
    if ($qty == 0) {
        deleteItem($username, $isbn);
    } else {
        $sql = "UPDATE cart SET quantity = $qty WHERE username = '$username' AND isbn = '$isbn'";
        $result = pg_query($sql);
    }
}

//tester
//changeQty('jane2', '978-1612183954', 2);

/*
delete item(s) in the cart;
*/
function deleteItem($username, $isbn)
{
    $sql = "DELETE FROM cart WHERE username = '$username' AND isbn = '$isbn'";
    $result = pg_query($sql);
}

//tester
//deleteItem('jane2', '978-1612183954');

/*
View cart item(s) of a customer;
row[0] = isbn; row[1] = quantity;
*/
function viewCart($username)
{
    $sql = "SELECT isbn, quantity FROM cart WHERE username = '$username'";
    $result = pg_query($sql);
    $items = array();
    while ($row = pg_fetch_row($result)) {
        $items[] = $row;
    }
    //print_r($items);
    return $items;
}

//tester
//viewCart('jane2');

/*
Get existing credit cards number of a customer;
row[0] = card_no;
*/
function getCard($username)
{
    $sql = "SELECT card_no FROM creditcard WHERE username = '$username'";
    $result = pg_query($sql);
    $cards = array();
    while ($row = pg_fetch_row($result)) {
        $cards[] = $row;
    }
    //print_r($cards);
    return $cards;
}

//tester
//getCard('ryan24');

/*
Complete a transaction; clear carts, together with credit card, write purchase items into transaction
*/
function completeTransaction($username, $card_no)
{
    $sql1 = "SELECT MAX(order_id) FROM transaction";
    $result1 = pg_query($sql1);
    $cur_id = pg_fetch_row($result1);
    $order_id = $cur_id[0] + 1;
    $sql2 = "SELECT isbn, quantity FROM cart WHERE username = '$username'";
    $result2 = pg_query($sql2);
    $items = array();
    while ($row = pg_fetch_row($result2)) {
        $items[] = $row;
    }
    //print_r($items);
    for ($i = 0; $i < sizeof($items); $i++) {
        $isbn = $items[$i][0];
        $sql3 = "SELECT price FROM book WHERE isbn = '$isbn'";
        $result3 = pg_query($sql3);
        $unit_price = pg_fetch_row($result3);
        $checkout_price = $unit_price[0] * $items[$i][1];
        $quantity = $items[$i][1];
        date_default_timezone_set('America/Los_Angeles');
        $datetime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO transaction VALUES('$username', $order_id, '$isbn', '$quantity', $checkout_price, $card_no, '$datetime')";
        $result = pg_query($sql);
    }
    $sql5 = "DELETE FROM cart WHERE username = '$username'";
    $result5 = pg_query($sql5);
}

//tester
//completeTransaction('jane2', '4207567887659999');


/*
Manage preferred genres: add preferred genres to corresponding customer;
input username and array of genres, genres that already exist in should not be added again;
delete and add should be implemtented seperately;
*/
function manageGenre($usernmae, $genrelist)
{
}

/*
Get top selling 3 books return book title, then call search book by title function;
*/
function getTopSellingBook()
{
    $sql = "SELECT book.title, SUM(quantity) FROM transaction, book WHERE book.isbn = transaction.isbn  GROUP BY title ORDER BY SUM(quantity) DESC";
    $result = pg_query($sql);
    $topselling = array();
    $counter = 0;
    while ($row = pg_fetch_row($result)) {
        $topselling[] = $row;
        $counter++;
        if ($counter == 3)
            break;
    }
    //print_r($topselling);
    return $topselling;
}

//tester
//getTopSellingBook();


/*
Get best rated 3 books, query by book title, return book title, then call search book by title;
*/
function getBestRatedBook()
{
    $sql = "SELECT title, ROUND(AVG(CAST(CAST(rb.rating AS char)AS INT)),2)
    FROM review_book as rb, book as b
    WHERE rb.isbn = b.isbn
    GROUP BY title
    ORDER BY ROUND(AVG(CAST(CAST (rb.rating AS char)AS INT)),2) DESC";
    $result = pg_query($sql);
    $bestrated = array();
    $counter = 0;
    while ($row = pg_fetch_row($result)) {
        $bestrated[] = $row;
        $counter++;
        if ($counter == 3)
            break;
    }
    //print_r($bestrated);
    return $bestrated;
}

//tester
//getBestRatedBook();


/*
Get review information for books of the same title;
*/
function getReview($title)
{
    $sql = "SELECT username, rating, review FROM review_book, book WHERE review_book.isbn = book.isbn and book.title = '$title'";
    $result = pg_query($sql);
    $reviews = array();
    while ($row = pg_fetch_row($result)) {
        $reviews[] = $row;
    }
    print_r($reviews);
    return $reviews;
}

//tester
getReview('After Party');



?>
