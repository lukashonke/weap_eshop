<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 21:26
 */

namespace app\classes\controllers;

use app\classes\models\Books;
use libs\Controller;
use libs\View;

class CategoryController extends Controller
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

    public function select($option)
    {
        $this->template->set('title', 'categorie');
        $content = new View('books');
        $this->bookPage = $option[0];

        $books = new \app\classes\models\Books($this->openDb());

        $allBooks = $books->getBooksByCategory($option[0]);
        $content->set('all_books', $allBooks);
        $content->set('categoryId', $option[0]);

        $this->template->set('content', $content->render());

        $this->setPageParameters();

        echo $this->template->render();
    }
}