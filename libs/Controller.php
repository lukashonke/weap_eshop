<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 19:06
 */

namespace libs;

use PDO;
use PDOException;

class Controller
{
    public $template = null;

    public $db = null;

    protected function setTemplate($template)
    {
        $this->template = new View($template, true);
    }

    protected function openDb()
    {
        //PDO options
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        // database PDO connector
        $db_init = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;

        //PDO connector vzdy musi byt v try catch bloku
        //viz. http://www.php.net/manual/en/pdo.connections.php
        try {
            $this->db = new PDO($db_init, DB_USER, DB_PASS, $options);
        }
        catch (PDOException $e) {
            //muzeme vyjimku zalogovat do extra logu pro DB admina
            // priklad : logDBException($e);
            //znovu vyhodime pro vychozi error handler
            throw $e;
        }

        return $this->db;
    }

    public function isAdminLogged()
    {
        if(!isset($_SESSION['admin_logged']))
        {
            $this->redirect("admin_login");
            return false;
        }
        return true;
    }

    public function redirect($controller)
    {
        header("Location: index.php?url=" .$controller);
        header("Connection: close");
        exit();
    }
}