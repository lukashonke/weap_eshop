<?php

?>
<div class="admin_form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=admin_add_order<?= $edit ?>" method="post">
		ID Uzivatele: <input type="text" name="id_user"><br>
		ID Knihy: <input type="text" name="id_book"><br>
		ID Objednavky (0 pro vytvoreni nove): <input type="text" name="id_order"><br>
			<input type="submit">
    </form>
</div>