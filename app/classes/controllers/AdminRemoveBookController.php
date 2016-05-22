<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:48
 */

namespace app\classes\controllers;

use app\classes\models\Books;
use libs\Controller;

class AdminRemoveBookController extends Controller
{
	public function __construct()
	{
		$this->setTemplate('admin_default');
	}

	public function index()
	{
		$this->redirect("admin_home/select/1");
	}

	public function remove($id)
	{
		$books = new Books($this->openDb());
		$books->removeBook($id[0]);

		$this->redirect("admin_home/select/1");
	}
}