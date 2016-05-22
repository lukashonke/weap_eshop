<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 21:26
 */

namespace app\classes\controllers;

use app\classes\models\Carts;
use app\classes\models\Orders;
use libs\Controller;
use libs\View;

class CartController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('default');
        $this->page = "cart";
    }

    public function index()
    {
        if($this->isLogged())
        {
            $idUser = $_SESSION['logged_id'];

            $this->template->set('title', 'prehled');

            $content = new View('cart');

            $carts = new Carts($this->openDb());
            $allItems = $carts->getCart($idUser);
            $content->set('all_books', $allItems);

            $this->template->set('content', $content->render());

            $this->setPageParameters();

            echo $this->template->render();
        }
        else
        {
            $this->redirect("forcelogin");
        }
    }

    public function order()
    {
        if($this->isLogged())
        {
            $idUser = $_SESSION['logged_id'];
            $userName = $_SESSION['logged_name'];
            $lastName = $_SESSION['logged_lastname'];
            $email = $_SESSION['logged_email'];

            $this->template->set('title', 'prehled');

            $content = new View('order');

            /*$carts = new Carts($this->openDb());
            $allItems = $carts->getCart($idUser);
            $content->set('all_books', $allItems);*/

            $content->set('def_name', $userName);
            $content->set('def_lastname', $lastName);
            $content->set('def_email', $email);

            $this->template->set('content', $content->render());

            $this->setPageParameters();

            echo $this->template->render();
        }
        else
        {
            $this->redirect("forcelogin");
        }
    }

    public function sendOrder()
    {
        if($this->isLogged())
        {
            if(isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['town']) && isset($_POST['street']) && isset($_POST['order_method']))
            {
                $idUser = $_SESSION['logged_id'];

                $this->template->set('title', 'prehled');

                $content = new View('order_sent');

                $order_name = htmlspecialchars($_POST['name']);
                $order_lastname = htmlspecialchars($_POST['last_name']);
                $order_email = htmlspecialchars($_POST['email']);
                $address_town = htmlspecialchars($_POST['town']);
                $address_street = htmlspecialchars($_POST['street']);
                $order_method = htmlspecialchars($_POST['order_method']);

                $carts = new Carts($this->openDb());
                $orders = new Orders($this->openDb());

                $newId = $orders->generateNextOrderId();

                $allItems = $carts->getCart($idUser);

                foreach ($allItems as $row)
                {
                    $orders->addFullOrder($newId, $idUser, $row->id_book, date("Y-m-d H:i:s"), $address_town, $address_street, $order_method, $order_name, $order_lastname, $order_email);
                }

                $carts->removeAllItems($idUser);

                $this->template->set('content', $content->render());

                $this->setPageParameters();

                echo $this->template->render();
            }
        }
        else
        {
            $this->redirect("forcelogin");
        }
    }

    private function addMenu()
    {
        /*$menuView = new View('admin_menu');
        $menuString = $menuView->render();

        $this->template->set('menu', $menuString);*/
    }
}