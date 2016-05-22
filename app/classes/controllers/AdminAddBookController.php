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

class AdminAddBookController extends Controller
{
	public function __construct()
	{
		$this->setTemplate('admin_default');
	}

	public function index()
	{
		$books = new Books($this->openDb());

		$jmeno = $_POST['jmeno'];
		$autor = $_POST['autor'];
		$cena = $_POST['cena'];
		$popis = $_POST['popis'];
		$kategorie = $_POST['kategorie'];

		if (strlen($jmeno) == 0 || strlen($autor) == 0 || strlen($cena) == 0 || strlen($kategorie) == 0)
		{
			$this->redirect("admin_home/select/1");
			return;
		}

		if(strlen($popis) == 0)
			$popis = "Popis neni zadan.";
		
		$books->addBook($jmeno, $autor, $cena, $popis, $kategorie);
		$this->redirect("admin_home/select/1");
	}

	public function edit($id)
	{
		$books = new Books($this->openDb());

		$jmeno = $_POST['jmeno'];
		$autor = $_POST['autor'];
		$cena = $_POST['cena'];
		$popis = $_POST['popis'];
		$kategorie = $_POST['kategorie'];

		if (strlen($jmeno) == 0 || strlen($autor) == 0 || strlen($cena) == 0 || strlen($kategorie) == 0)
		{
			$this->redirect("admin_home/select/1");
			return;
		}

		if(strlen($popis) == 0)
			$popis = "Popis neni zadan.";

		$books->editBook($id[0], $jmeno, $autor, $cena, $popis, $kategorie);
		$this->redirect("admin_home/select/1");
	}
}