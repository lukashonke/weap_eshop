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

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('default');
    }

    public function index()
    {
        if($this->isAdminLogged())
        {
            $this->select(0);
        }
    }

    public function select($option)
    {
        if(!$this->isAdminLogged())
            return;

        switch ($option[0])
        {
            case 0: // zakladni prehled

                $this->template->set('title', 'prehled');

                    // ziskat data pro prehled
                $prehled = new \app\classes\models\Prehled($this->openDb());

                $pocetKnih = $prehled->getPocetKnih();
                $pocetUziv = $prehled->getPocetUziv();
                $pocetObjednavek = $prehled->getPocetObjednavek();

                $content = new View('admin_prehled');
                $content->set('pocet_knih', $pocetKnih);
                $content->set('pocet_uziv', $pocetUziv);
                $content->set('pocet_objednavek', $pocetObjednavek);

                $this->template->set('content', $content->render());

                $this->addMenu();

                echo $this->template->render();
                break;
            case 1: // sprava knih
                $this->template->set('title', 'sprava knih');

                $content = new View('admin_books');

                $books = new \app\classes\models\Books($this->openDb());
                $allBooksString = $books->getBooks(); //TODO pridat knihy

                $addBookForm = new View('admin_add_book');
                $content->set('add_book_form', $addBookForm->render());
                $content->set('all_books', $allBooksString);

                $this->template->set('content', $content->render());

                $this->addMenu();

                echo $this->template->render();
                break;
            case 2: // sprava uzivatelu
                $this->template->set('title', 'sprava uzivatelu');
                $content = new View('admin_users');

                $users = new \app\classes\models\Users($this->openDb());
                $allUsersString = $users->getUsers(); //TODO pridat knihy

                $addUserForm = new View('admin_add_user');
                $content->set('add_user_form', $addUserForm->render());
                $content->set('all_users', $allUsersString);

                $this->template->set('content', $content->render());

                $this->addMenu();

                echo $this->template->render();
                break;
            case 3: // sprava objednavek
                $this->template->set('title', 'sprava objednavek');
                $content = new View('admin_orders');

                $orders = new \app\classes\models\Orders($this->openDb());
                $allOrdersString = $orders->getOrders(); //TODO pridat knihy

                $addOrderForm = new View('admin_add_order');
                $content->set('add_order_form', $addOrderForm->render());
                $content->set('all_orders', $allOrdersString);

                $this->template->set('content', $content->render());

                $this->addMenu();

                echo $this->template->render();
                break;
        }
        //index();
    }

    private function addMenu()
    {
        $menuView = new View('admin_menu');
        $menuString = $menuView->render();

        $this->template->set('menu', $menuString);
    }

    /*public function demo($params = null)
    {

    }*/
}