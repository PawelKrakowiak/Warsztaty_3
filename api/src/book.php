<?php

class Book{
    
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
    
    public function delete($connection){
        
    }
    
    public function update($connection, $author, $title, $publicationDate, $description){
        
    }
    
    
    static public function create($connection, $author, $title, $publicationDate, $description){
        
    }
    
    static public function loadBookFromDB($connection, $id){
        
    }
    
    static public function loadAllBooksFromDB($connection){
        
    }



            
}