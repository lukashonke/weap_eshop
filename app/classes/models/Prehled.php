<?php

namespace app\classes\models;

/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 22:40
 */
class Prehled
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPocetKnih()
    {
        $sql = "SELECT count(*) FROM books";
        $result = $this->db->query($sql);
        return $result->fetchColumn();
    }

    public function getPocetUziv()
    {
        $sql = "SELECT count(*) FROM orders";
        $result = $this->db->query($sql);
        return $result->fetchColumn();
    }

    public function getPocetObjednavek()
    {
        $sql = "SELECT count(*) FROM users";
        $result = $this->db->query($sql);
        return $result->fetchColumn();
    }
}