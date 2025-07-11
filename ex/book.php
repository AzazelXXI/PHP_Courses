<?php

class Book
{
    private $title;
    private $author;
    private $price;

    public function __construct($title, $author, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSummary() {
        return '<h3>'. $this->title. ' - '. $this->author. ' - '. $this->price .'</h3>';
    }
}

$book1 = new Book('The Alchemist', 'Paulo Coello', '10$');

echo $book1->getSummary();
