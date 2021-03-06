<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 21:26
 */

namespace app\classes\controllers;

use app\classes\models\Carts;
use libs\Controller;
use libs\View;

class ViewBookController extends Controller
{
    public function __construct()
    {
        $this->setTemplate('default');
        $this->page = "home";
    }

    public function index()
    {
        $this->redirect("home");
    }

    public function id($option)
    {
        $this->template->set('title', 'prehled');

        $books = new \app\classes\models\Books($this->openDb());
        $content = new View('viewbook');

        $bookData = $books->getBook($option[0]);

        $this->bookPage = $bookData->category;

        $content->set('id_book', $bookData->id_book);
        $content->set('book_name', $bookData->book_name);
        $content->set('author', $bookData->author);
        $content->set('description', $bookData->description);
        $content->set('price', $bookData->price);
        $content->set('category', $bookData->category);

        $this->template->set('content', $content->render());

        $this->setPageParameters();

        echo $this->template->render();
    }

    public function add($option)
    {
        if($this->isLogged())
        {
            $idBook = $option[0];
            $idUser = $_SESSION['logged_id'];

            $carts = new Carts($this->openDb());
            $carts->addItem($idUser, $idBook);

            $this->redirect("cart");
        }
        else // neni prihlaseny - pouze uloz do SESSION cart
        {
            if(!isset($_SESSION['cart']))
            {
                $_SESSION['cart'] = array();
            }

            $idBook = $option[0];
            $currentCart = $_SESSION['cart'];

            array_push($currentCart, $idBook);
            //$currentCart[count($currentCart)] = $idBook;

            $_SESSION['cart'] = $currentCart;
            $this->redirect("cart");
        }
    }

    public function remove($option)
    {
        if($this->isLogged())
        {
            $idBook = $option[0];
            $idUser = $_SESSION['logged_id'];

            $carts = new Carts($this->openDb());
            $carts->removeItem($idUser, $idBook);

            $this->redirect("cart");
        }
        else // neni prihlaseny - odeber ze SESSION cartu
        {
            if(!isset($_SESSION['cart']))
            {
                $_SESSION['cart'] = array();
            }

            $idBook = $option[0];
            $currentCart = $_SESSION['cart'];

            $bookIndex = array_search($idBook, $currentCart);
            unset($currentCart[$bookIndex]);

            $_SESSION['cart'] = $currentCart;
            $this->redirect("cart");
        }
    }

    private function addMenu()
    {
        /*$menuView = new View('admin_menu');
        $menuString = $menuView->render();

        $this->template->set('menu', $menuString);*/
    }
}