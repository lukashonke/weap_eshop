<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 19. 4. 2016
 * Time: 22:10
 */

?>

ID knihy: <?= $id_book ?> <br>
Jmeno knihy: <?= $book_name ?> <br>
Autor knihy: <?= $author ?> <br>
Popis knihy: <?= $description ?> <br>
Cena knihy: <?= $price ?>

<div><a class="btn btn-default" href="index.php?url=category/select/<?= $category ?>" role="button">Back</a>

<a class="btn btn-primary" href="index.php?url=viewbook/add/<?= $id_book ?>" role="button">Add to cart</a></div>
