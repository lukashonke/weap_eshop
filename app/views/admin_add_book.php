<?php

?>
<div class="admin_form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=admin_add_book<?= $edit ?>" method="post">
		Jmeno knihy: <input type="text" value="<?= $default_name ?>" name="jmeno"><br>
		Autor knihy: <input type="text" value="<?= $default_author ?>" name="autor"><br>
		Cena knihy: <input type="text" value="<?= $default_price ?>" name="cena"><br>
		Kategorie: <input type="text" value="<?= $default_category ?>" name="kategorie""><br>
		Popis knihy: <textarea name="popis"><?= $default_description ?></textarea><br>
			<input type="submit">
    </form>
</div>