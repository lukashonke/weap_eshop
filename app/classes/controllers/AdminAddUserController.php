<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:48
 */

namespace app\classes\controllers;


use app\classes\models\Books;
use app\classes\models\Users;
use libs\Controller;

class AdminAddUserController extends Controller
{
	public function __construct()
	{
		$this->setTemplate('default');
	}

	public function index()
	{
		$users = new Users($this->openDb());

		$name = $_POST['name'];
		$lastName = $_POST['last_name'];
		$email = $_POST['email'];
		$pwdRaw = $_POST['pwd'];

		$users->addUser($name, $lastName, $email, $pwdRaw);
		$this->redirect("admin_home/select/2");
	}
}