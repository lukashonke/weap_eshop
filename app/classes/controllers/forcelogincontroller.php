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

class ForceLoginController extends Controller
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

        $this->template->set('title', 'login');

        $this->template->set('message', 'Please login here');

        $content = new View('login');

        $content->set('message', '<h2>Please login first.</h2>');

        $this->template->content = $content->render();

        $this->setPageParameters();

        echo $this->template->render();
    }
}