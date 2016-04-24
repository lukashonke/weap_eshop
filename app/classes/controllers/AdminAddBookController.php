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
		$this->setTemplate('default');
	}

	public function index()
	{
		$books = new Books($this->openDb());

		$jmeno = $_POST['jmeno'];
		$autor = $_POST['autor'];
		$vydavatel = $_POST['vydavatel'];
		$cena = $_POST['cena'];
		$popis = $_POST['popis'];
		$kategorie = $_POST['kategorie'];
		
		$books->addBook($jmeno, $autor, $vydavatel, $cena, $popis, $kategorie);
		$this->redirect("admin_home/select/1");
	}

	public function edit($id)
	{
		$books = new Books($this->openDb());

		$jmeno = $_POST['jmeno'];
		$autor = $_POST['autor'];
		$vydavatel = $_POST['vydavatel'];
		$cena = $_POST['cena'];
		$popis = $_POST['popis'];
		$kategorie = $_POST['kategorie'];

		$books->editBook($id[0], $jmeno, $autor, $vydavatel, $cena, $popis, $kategorie);
		$this->redirect("admin_home/select/1");
	}
}