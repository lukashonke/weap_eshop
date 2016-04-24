<?php

?>
<div class="admin_form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=admin_add_user" method="post">
		Jmeno uzivatele: <input type="text" name="name"><br>
		Prijmeni uzivatele: <input type="text" name="last_name"><br>
		Email uzivatele: <input type="text" name="email"><br>
		Heslo uzivatele: <input type="text" name="pwd"><br>
			<input type="submit">
    </form>
</div>