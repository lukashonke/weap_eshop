<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:48
 */

namespace app\classes\controllers;

use app\classes\models\Books;
use app\classes\models\Orders;
use app\classes\models\Users;
use libs\Controller;

class AdminRemoveOrderController extends Controller
{
	public function __construct()
	{
		$this->setTemplate('admin_default');
	}

	public function index()
	{
		$this->redirect("admin_home/select/3");
	}

	public function remove($id)
	{
		$orders = new Orders($this->openDb());
		$orders->removeOrder($id[0]);

		$this->redirect("admin_home/select/3");
	}

	public function solve($id)
	{
		$orders = new Orders($this->openDb());
		$orders->solveOrder($id[0]);

		$this->redirect("admin_home/select/5");
	}
}