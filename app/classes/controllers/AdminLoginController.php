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

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('admin_default');
    }

    public function index()
    {
        if(isset($_POST['name']) && isset($_POST['pwd']))
        {
            $adminName = $_POST['name'];
            $adminPwd = $_POST['pwd'];

            if($adminName === "admin" && $adminPwd === "admin")
            {
                $_SESSION['admin_logged'] = true;
                $this->redirect("admin_home");
                return;
            }
            else
            {
                $this->template->set('message', 'Spatne jmeno a heslo!');
            }
        }

        $this->template->set('title', 'admin login');

        $content = new View('admin_login');
        $this->template->content = $content->render();

        echo $this->template->render();
    }
}