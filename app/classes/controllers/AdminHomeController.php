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
        $this->setTemplate('admin_default');
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
                $addBookForm->set('edit', '');

                $addBookForm->set('default_name', "");
                $addBookForm->set('default_author', "");
                $addBookForm->set('default_vydavatel', "");
                $addBookForm->set('default_price', "");
                $addBookForm->set('default_category', "");
                $addBookForm->set('default_description', "");

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
                $addUserForm->set('edit', '');

                $addUserForm->set('default_name', "");
                $addUserForm->set('default_lastname', "");
                $addUserForm->set('default_email', "");
                $addUserForm->set('default_password', "");

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
                $addOrderForm->set('edit', '');
                $content->set('add_order_form', $addOrderForm->render());
                $content->set('all_orders', $allOrdersString);

                $this->template->set('content', $content->render());

                $this->addMenu();

                echo $this->template->render();
                break;
        }
        //index();
    }

    public function editUser($id)
    {
        $this->template->set('title', 'editace uzivatele');
        $content = new View('admin_users');

        $addUserForm = new View('admin_add_user');
        $addUserForm->set('edit', '/edit/' . $id[0]);

        $users = new \app\classes\models\Users($this->openDb());
        $userData = $users->getUser($id[0]);

        $addUserForm->set('default_name', $userData->user_name);
        $addUserForm->set('default_lastname', $userData->lastname);
        $addUserForm->set('default_email', $userData->email);
        $addUserForm->set('default_password', $userData->password);

        $content->set('add_user_form', $addUserForm->render());
        $content->set('info', 'Editace uzivatele ' . $id[0]);

        $this->template->set('content', $content->render());

        $this->addMenu();

        echo $this->template->render();
    }

    public function editOrder($id)
    {
        $this->template->set('title', 'editace objednavky');
        $content = new View('admin_orders');

        $addOrderForm = new View('admin_add_order');
        $addOrderForm->set('edit', '/edit/' . $id[0]);
        $content->set('add_order_form', $addOrderForm->render());
        $content->set('info', 'Editace objednavky ' . $id[0]);

        $this->template->set('content', $content->render());

        $this->addMenu();

        echo $this->template->render();
    }

    public function editBook($id)
    {
        $this->template->set('title', 'editace knihy');
        $content = new View('admin_books');

        $addBookForm = new View('admin_add_book');
        $addBookForm->set('edit', '/edit/' . $id[0]);

        $books = new \app\classes\models\Books($this->openDb());
        $bookData = $books->getBook($id[0]);

        $addBookForm->set('default_name', $bookData->book_name);
        $addBookForm->set('default_author', $bookData->author);
        $addBookForm->set('default_price', $bookData->price);
        $addBookForm->set('default_category', $bookData->category);
        $addBookForm->set('default_description', $bookData->description);

        $content->set('add_book_form', $addBookForm->render());
        $content->set('info', 'Editace knihy ' . $id[0]);

        $this->template->set('content', $content->render());

        $this->addMenu();

        echo $this->template->render();
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