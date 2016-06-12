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
        $stm = $this->db->prepare("INSERT INTO cart (id_user, id_book) VALUES (?,?)");

        $stm->execute(array($idUser, $idBook));
    }

    public function removeItem($idUser, $idBook)
    {
        $stm = $this->db->prepare("DELETE FROM cart WHERE id_user=? AND id_book=?");

        $stm->execute(array($idUser, $idBook));
    }

    public function removeAllItems($idUser)
    {
        $stm = $this->db->prepare("DELETE FROM cart WHERE id_user=?");

        $stm->execute(array($idUser));
    }

    public function getAllCarts()
    {
        $sql = "SELECT * FROM cart O JOIN users U ON O.id_user=U.id JOIN books B ON O.id_book=B.id_book ORDER BY O.id_user";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getCart($idUser)
    {
        $stm = $this->db->prepare("SELECT * FROM cart O JOIN users U ON O.id_user=U.id JOIN books B ON O.id_book=B.id_book WHERE U.id=? ORDER BY O.id_user");

        $stm->execute(array($idUser));

        return $stm;
    }
}