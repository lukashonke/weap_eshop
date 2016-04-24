<?php

?>
<div class="admin_form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=admin_add_book" method="post">
		Jmeno knihy: <input type="text" name="jmeno"><br>
		Autor knihy: <input type="text" name="autor"><br>
		Vydavatel knihy: <input type="text" name="vydavatel"><br>
		Cena knihy: <input type="text" name="cena"><br>
		Kategorie: <input type="text" name="kategorie""><br>
		Popis knihy: <textarea name="popis"></textarea><br>
			<input type="submit">
    </form>
</div>