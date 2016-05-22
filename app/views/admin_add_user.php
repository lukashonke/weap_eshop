<?php

?>
<div class="admin_form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=admin_add_user<?= $edit ?>" method="post">
		Jmeno uzivatele: <input type="text" value="<?= $default_name ?>"name="name"><br>
		Prijmeni uzivatele: <input type="text" value="<?= $default_lastname ?>"name="last_name"><br>
		Email uzivatele: <input type="text" value="<?= $default_email ?>"name="email"><br>
		Heslo uzivatele: <input type="text" value="<?= $default_password ?>"name="pwd"><br>
			<input type="submit">
    </form>
</div>