<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:35
 */

namespace app\classes\models;

class Orders
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function generateNextOrderId()
    {
        $sql = "SELECT MAX(id_order) FROM orders";
        $max = DbTools::queryReturnFirstColumn($this->db, $sql);
        return $max + 1;
    }

    public function addOrder($idOrder, $idUser, $idBook, $date)
    {
        $sql = "INSERT INTO orders (id_order, id_user, id_book, order_date) VALUES ('$idOrder', '$idUser', '$idBook', '$date')";
        DbTools::query($this->db, $sql);
    }

    public function solveOrder($idOrder)
    {
        $sql = "UPDATE orders SET solved=1 WHERE id_order='$idOrder'";
        DbTools::query($this->db, $sql);
    }

    public function addFullOrder($idOrder, $idUser, $idBook, $date, $town, $street, $order_method, $name, $lastname, $email)
    {
        $stm = $this->db->prepare("INSERT INTO orders (id_order, id_user, id_book, order_date, address_town, address_street, order_method, username, lastname, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stm->execute(array($idOrder, $idUser, $idBook, $date, $town, $street, $order_method, $name, $lastname, $email));
    }

    public function removeOrder($idOrder)
    {
        $sql = "DELETE FROM orders WHERE id_order='$idOrder'";
        DbTools::query($this->db, $sql);
    }

    public function removeAllOrdersForBook($idBook)
    {
        $sql = "DELETE FROM orders WHERE id_book='$idBook'";
        DbTools::query($this->db, $sql);
    }

    public function removeAllOrdersForUser($idUser)
    {
        $sql = "DELETE FROM orders WHERE id_user='$idUser'";
        DbTools::query($this->db, $sql);
    }

    public function getOrders()
    {
        $sql = "SELECT * FROM orders O JOIN books B ON O.id_book=B.id_book ORDER BY O.id_order";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getSolvedOrders()
    {
        $sql = "SELECT * FROM orders O JOIN books B ON O.id_book=B.id_book WHERE solved=1 ORDER BY O.id_order";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getUnsolvedOrders()
    {
        $sql = "SELECT * FROM orders O JOIN books B ON O.id_book=B.id_book WHERE solved=0 ORDER BY O.id_order";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getOrdersForBook($idBook)
    {
        $sql = "SELECT * FROM orders O JOIN users U ON O.id_user=U.id JOIN books B ON O.id_book=B.id_book WHERE O.id_book='$idBook'";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getOrdersForUser($idUser)
    {
        $sql = "SELECT * FROM orders O JOIN users U ON O.id_user=U.id JOIN books B ON O.id_book=B.id_book WHERE O.id_user='$idUser'";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getOrdersById($idOrder)
    {
        $sql = "SELECT * FROM orders O JOIN users U ON O.id_user=U.id JOIN books B ON O.id_book=B.id_book WHERE O.id_order='$idOrder'";
        return DbTools::queryReturnAll($this->db, $sql);
    }
}