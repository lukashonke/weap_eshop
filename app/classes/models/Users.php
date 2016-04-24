<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:35
 */

namespace app\classes\models;

class Users
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addUser($name, $lastname, $email, $password)
    {
        $sql = "INSERT INTO users (user_name, lastname, email, password) VALUES ('$name', '$lastname', '$email', '$password')";
        DbTools::query($this->db, $sql);
    }

    public function editUser($id_user, $name, $lastname, $email, $password)
    {
        $sql = "UPDATE users SET user_name='$name', lastname='$lastname', email='$email', password='$password' WHERE id='$id_user'";
        DbTools::query($this->db, $sql);
    }

    public function removeUser($id)
    {
        $sql = "DELETE FROM users WHERE id='$id'";
        DbTools::query($this->db, $sql);
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        return DbTools::queryReturnAll($this->db, $sql);
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id='$id'";
        return DbTools::queryReturnFirstRow($this->db, $sql); // vratit jen jeden
    }
}