<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:35
 */

namespace app\classes\models;

class Books
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addBook($name, $author, $dodavatel, $price, $description, $category)
    {
        $sql = "INSERT INTO books (book_name, author, description, price, category) VALUES ('$name', '$author', '$description', '$price', '$category')";
        DbTools::query($this->db, $sql);
    }

    public function removeBook($id)
    {
        $sql = "DELETE FROM books WHERE id_book='$id'";
        DbTools::query($this->db, $sql);
    }

    public function getBooks()
    {
        $sql = "SELECT * FROM books";
        return DbTools::queryReturnAll($this->db, $sql);
    }

}