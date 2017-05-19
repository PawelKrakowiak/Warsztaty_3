<?php

class Book implements JsonSerializable{

    private $id;
    private $author;
    private $title;
    private $publicationDate;
    private $description;

    public function __construct() {
        $this->id = -1;
        $this->author = "";
        $this->title = "";
        $this->publicationDate = "";
        $this->description = "";
    }

    public function getId() {
        return $this->id;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPublicationDate() {
        return $this->publicationDate;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setAuthor($author) {
        $this->author = $author;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setPublicationDate($publicationDate) {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function delete($connection) {
        $sql = "DELETE FROM Books WHERE id=$this->id";
        if($connection->query($sql)){
            echo "Book deleted from DB";
            return true;
        }
        return false;
    }

    public function update($connection, $author, $title, $publicationDate, $description) {
        $sql = "UPDATE Books SET author='$this->author', title='$this->title', "
             . "publication_date='$this->publicationDate', description='$this->description'";
        if($connection->query($sql)){
            echo "Book data updated";
            return true;
        }
        return false;
    }
    
    public function jsonSerialize() {
        return [
            "author" => "$this->author",
            "title" => "$this->title",
            "publication_date" => "$this->publicationDate",
            "description" => "$this->description"          
        ];
    }

    static public function create($connection, $author, $title, $publicationDate, $description) {

        $sql = "INSERT INTO Books(author, title, publication_date, description) "
                . "VALUES('$author', '$title', $publicationDate', $description')";
        if ($connection->query($sql)) {
            echo "Book saved to DB";
            return true;
        }
        return false;
    }

    static public function loadBookFromDB($connection, $id) {
        $sql = "SELECT * FROM Books WHERE id=$id";
        $result = $connection->query($sql);
        if ($result) {
            $book = $result->fetch_assoc();
            return $book;
        }
        return false;
    }

    static public function loadAllBooksFromDB($connection) {
        $sql = "SELECT * FROM Books";
        $result = $connection->query($sql);
        $ret = [];
        foreach($result as $row){
            $loadedBook = new Book();
            $loadedBook->id = $row['id'];
            $loadedBook->author = $row['author'];
            $loadedBook->description = $row['description'];
            $loadedBook->publicationDate = $row['publication_date'];
            $loadedBook->title = $row['title'];
            $ret[] = $loadedBook;
        }
        return $ret;
    }

}
