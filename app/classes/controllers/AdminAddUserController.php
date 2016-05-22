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
		$this->setTemplate('admin_default');
	}

	public function index()
	{
		$users = new Users($this->openDb());

		$name = $_POST['name'];
		$lastName = $_POST['last_name'];
		$email = $_POST['email'];
		$pwdRaw = $_POST['pwd'];

		if (strlen($name) == 0 || strlen($lastName) == 0 || strlen($email) == 0 || strlen($pwdRaw) == 0)
		{
			$this->redirect("admin_home/select/2");
			return;
		}

		$pass = md5($pwdRaw);

		$users->addUser($name, $lastName, $email, $pass);
		$this->redirect("admin_home/select/2");
	}

	public function edit($id)
	{
		$users = new Users($this->openDb());

		$name = $_POST['name'];
		$lastName = $_POST['last_name'];
		$email = $_POST['email'];
		$pwdRaw = $_POST['pwd'];

		if (strlen($name) == 0 || strlen($lastName) == 0 || strlen($email) == 0 || strlen($pwdRaw) == 0)
		{
			$this->redirect("admin_home/select/2");
			return;
		}

		$pass = md5($pwdRaw);

		$users->editUser($id[0], $name, $lastName, $email, $pass);
		$this->redirect("admin_home/select/2");
	}
}