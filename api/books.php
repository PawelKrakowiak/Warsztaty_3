<?php
require_once 'src/connection.php';
require_once 'src/book.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $book = Book::loadBookFromDB($connection, $id);
        echo json_encode($book);
    }else{
        $books = Book::loadAllBooksFromDB($connection);
        echo json_encode($books);
    }
}

