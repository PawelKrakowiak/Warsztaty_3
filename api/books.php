<?php
require_once 'src/connection.php';
require_once 'src/book.php';

$books = Book::loadAllBooksFromDB($connection);

foreach($books as $book){
    $jsonBook = json_encode($book);
    echo $jsonBook . "<hr>";
}