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

class RegisterController extends Controller
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

        $this->template->set('title', 'register');

        $this->template->set('message', 'Registration finished, login now.');

        $content = new View('register');
        $this->template->content = $content->render();

        $this->setPageParameters();

        echo $this->template->render();
    }

    public function doRegister()
    {
        if($this->isLogged())
        {
            $this->redirect("home");
            return;
        }

        $users = new Users($this->openDb());

        $name = htmlspecialchars($_POST['name']);
        $lastName = htmlspecialchars($_POST['last_name']);
        $email = htmlspecialchars($_POST['email']);
        $pwdRaw = htmlspecialchars($_POST['pwd']);
        $pwdRaw2 = htmlspecialchars($_POST['pwd2']);

        if (strlen($name) == 0 || strlen($lastName) == 0 || strlen($email) == 0 || strlen($pwdRaw) == 0 || $pwdRaw != $pwdRaw2)
        {
            $this->redirect("register");
            return;
        }

        $pass = md5($pwdRaw);

        $users->addUser($name, $lastName, $email, $pass);

        $this->template->set('title', 'register');

        $this->template->set('message', 'Registration finished, login now.');

        $content = new View('login');
        $this->template->content = $content->render();

        $this->setPageParameters();

        echo $this->template->render();
    }
}