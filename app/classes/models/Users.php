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
		$stm = $this->db->prepare("INSERT INTO users (user_name, lastname, email, password) VALUES (?,?,?,?)");

		$stm->execute(array($name, $lastname, $email, $password));
    }

    public function editUser($id_user, $name, $lastname, $email, $password)
    {
        $sql = "UPDATE users SET user_name='$name', lastname='$lastname', email='$email', password='$password' WHERE id='$id_user'";
        DbTools::query($this->db, $sql);
    }

    public function existsName($name)
    {
		$stm = $this->db->prepare("SELECT count(*) FROM users WHERE user_name=?");

		$stm->execute(array($name));

		return $stm->fetchColumn() > 0;
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

    public function getPassword($name)
    {
		$stm = $this->db->prepare("SELECT password FROM users WHERE user_name=?");

		$stm->execute(array($name));

		return $stm->fetchColumn();
    }

    public function GetUserId($naame)
    {
        $stm = $this->db->prepare("SELECT id FROM users WHERE user_name=?");

        $stm->execute(array($naame));

        return $stm->fetchColumn();
    }

    public function getUserEmail($id)
    {
        $stm = $this->db->prepare("SELECT email FROM users WHERE id=:id");

        $stm->execute(array(
            ':id' => $id
        ));

        return $stm->fetchColumn();
    }

    public function GetLastName($id)
    {
        $stm = $this->db->prepare("SELECT lastname FROM users WHERE id=:id");

        $stm->execute(array(
            ':id' => $id
        ));

        return $stm->fetchColumn();
    }
}