<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 23:58
 */

namespace app\classes\controllers;

use app\classes\models\Users;
use libs\Controller;
use libs\View;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('default');
        $this->page = "login";
    }

    public function index()
    {
        if($this->isLogged())
        {
            $this->redirect("home");
            return;
        }

        if(isset($_POST['name']) && isset($_POST['pwd']))
        {
            $name = htmlspecialchars($_POST['name']);
            $pwd = htmlspecialchars($_POST['pwd']);

            $users = new Users($this->openDb());

            $rightPass = $users->getPassword($name);

            if(md5($pwd) == $rightPass)
            {
                $_SESSION['cart'] = null;
                $_SESSION['logged'] = true;
                $_SESSION['logged_name'] = $name;

                $id = $users->getUserId($name);

                $_SESSION['logged_id'] = $id;
                $_SESSION['logged_email'] = $users->getUserEmail($id);
                $_SESSION['logged_lastname'] = $users->getLastName($id);
                $this->redirect("home");
                return;
            }
            else
            {
                $this->template->set('message', 'Wrong name and password!');
            }
        }

        $this->template->set('title', 'login');

        $this->template->set('message', 'Please login here');

        $content = new View('login');
        $this->template->content = $content->render();

        $this->setPageParameters();

        echo $this->template->render();
    }
}