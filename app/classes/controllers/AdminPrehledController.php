<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 22:06
 */

namespace app\classes\controllers;

use libs\Controller;
use libs\View;

class AdminPrehledController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('default');
        $this->openDb();
    }

    public function index()
    {
        if($this->isAdminLogged())
        {
            $this->template->set('title', 'prehled');

            $prehled = new \app\classes\models\Prehled($this->db);

            $pocetKnih = $prehled->getPocetKnih();
            $pocetUziv = $prehled->getPocetUziv();
            $pocetObjednavek = $prehled->getPocetObjednavek();

            $content = new View('admin_prehled');
            $content->set('pocet_knih', $pocetKnih);
            $content->set('pocet_uziv', $pocetUziv);
            $content->set('pocet_objednavek', $pocetObjednavek);
            $this->template->content = $content->render();

            echo $this->template->render();
        }
    }
}