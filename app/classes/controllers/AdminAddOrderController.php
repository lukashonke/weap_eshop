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

class AdminAddOrderController extends Controller
{
	public function __construct()
	{
		$this->setTemplate('admin_default');
	}

	public function index()
	{
		$orders = new Orders($this->openDb());

		$idUser = $_POST['id_user'];
		$idBook = $_POST['id_book'];
		$idOrder = $_POST['id_order'];

		if ($idOrder == 0 || $idOrder == "") {
			$idOrder = $orders->generateNextOrderId();
		}

		if (strlen($idUser) == 0 || strlen($idBook) == 0)
		{
			$this->redirect("admin_home/select/3");
			return;
		}

		$orders->addOrder($idOrder, $idUser, $idBook, date("Y-m-d H:i:s"));
		$this->redirect("admin_home/select/3");
	}

	public function edit($id)
	{

	}
}