<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:35
 */

namespace app\classes\models;

class Carts
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addItem($idUser, $idBook)
    {
        $sql = "INSERT INTO cart (id_user, id_book) VALUES ('$idUser', '$idBook')";
        DbTools::query($this->db, $sql);
    }

    public function removeItem($idUser, $idBook)
    {
        $sql = "DELETE FROM cart WHERE id_user='$idUser' AND id_book='$idBook'";
        DbTools::query($this->db, $sql);
    }

    public function removeAllItems($idUser)
    {
        $sql = "DELETE FROM cart WHERE $idUser='$idUser'";
        DbTools::query($this->db, $sql);
    }

    public function getAllCarts()
    {
        $sql = "SELECT * FROM cart O JOIN users U ON O.id_user=U.id JOIN books B ON O.id_book=B.id_book ORDER BY O.id_user";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getCart($idUser)
    {
        $sql = "SELECT * FROM cart O JOIN users U ON O.id_user=U.id JOIN books B ON O.id_book=B.id_book WHERE U.id='$idUser' ORDER BY O.id_user";
        return DbTools::queryReturnAll($this->db, $sql);
    }
}