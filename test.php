<?php
/**
 * Created by PhpStorm.
 * User: honke_000
 * Date: 21. 4. 2016
 * Time: 23:55
 */
echo "proc to nejde";

$post = explode("&", file_get_contents('php://input'));

var_dump($_POST);
var_dump($post);

echo getcwd();

?>
