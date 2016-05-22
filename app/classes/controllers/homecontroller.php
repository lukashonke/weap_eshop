<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 21:26
 */

namespace app\classes\controllers;

use libs\Controller;
use libs\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('default');
        $this->page = "home";
    }

    public function index()
    {
        $this->template->set('title', 'prehled');

        $content = new View('home');
        //$content->set('pocet_objednavek', $pocetObjednavek);

        $this->template->set('content', $content->render());

        $this->setPageParameters();

        echo $this->template->render();
    }
}