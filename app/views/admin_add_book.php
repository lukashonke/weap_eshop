<?php

?>
<div class="admin_form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=admin_add_book<?= $edit ?>" method="post">
		Jmeno knihy: <input type="text" placeholder="<?= $default_name ?>" name="jmeno"><br>
		Autor knihy: <input type="text" placeholder="<?= $default_author ?>" name="autor"><br>
		Vydavatel knihy: <input type="text" placeholder="<?= $default_vydavatel ?>" name="vydavatel"><br>
		Cena knihy: <input type="text" placeholder="<?= $default_price ?>" name="cena"><br>
		Kategorie: <input type="text" placeholder="<?= $default_category ?>" name="kategorie""><br>
		Popis knihy: <textarea name="popis" placeholder="<?= $default_description ?>"></textarea><br>
			<input type="submit">
    </form>
</div>