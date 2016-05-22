<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 23:58
 */

namespace app\classes\controllers;

use libs\Controller;
use libs\View;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('default');
    }

    public function index()
    {
        unset($_SESSION['logged']);
        unset($_SESSION['logged_name']);
        //$_SESSION['admin_logged'] = false;
        $this->redirect("home");
    }
}