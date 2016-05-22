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

    public function addBook($name, $author, $price, $description, $category)
    {
        $sql = "INSERT INTO books (book_name, author, description, price, category) VALUES ('$name', '$author', '$description', '$price', '$category')";
        DbTools::query($this->db, $sql);
    }

    public function editBook($id_book, $name, $author, $price, $description, $category)
    {
        $sql = "UPDATE books SET book_name='$name', author='$author', description='$description', price='$price', category='$category' WHERE id_book='$id_book'";
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

    public function getBooksByCategory($cat)
    {
        $sql = "SELECT * FROM books WHERE category='$cat'";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getBook($id)
    {
        $sql = "SELECT * FROM books WHERE id_book='$id'";
        return DbTools::queryReturnFirstRow($this->db, $sql); // vratit jen jeden
    }

}