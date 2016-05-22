<?php
namespace app\classes\controllers;

use libs\Controller;
use libs\View;

/**
 * Created by PhpStorm.
 * User: Lukas
 */
class ErrorController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('default');
        $this->page = "home";
    }

    public function index()
    {
        $this->notFound();
    }

    public function notFound()
    {
        $this->template->set('title', '404 NOT FOUND');
        $content = new View('404');
        $this->template->content = $content->render();

        $this->setPageParameters();
        
        echo $this->template->render();
    }
}