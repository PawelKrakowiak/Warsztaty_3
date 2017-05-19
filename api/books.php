<?php
require_once 'src/connection.php';
require_once 'src/book.php';

$books = Book::loadAllBooksFromDB($connection);

echo json_encode($books);