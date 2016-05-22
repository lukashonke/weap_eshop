<?php

?>
<div class="admin_form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=cart/sendOrder" method="post">
		Jmeno: <input type="text" name="name" value="<?= $def_name ?>"  required><br>
		Prijmeni <input type="text" name="last_name" value="<?= $def_lastname ?>" required><br>
		Email <input type="email" name="email" value="<?= $def_email ?>" required><br>
		Mesto <input type="text" name="town" required><br>
		Ulice <input type="text" name="street" required><br>

		<select name="order_method" value="">
			<option value="dobirka">Dobírkou</option>
			<option value="karta">Platba kartou</option>
		</select>

			<input type="submit">
    </form>
</div>