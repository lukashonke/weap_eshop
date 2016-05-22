<?php

?>
<div class="admin_form">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=register/doRegister" method="post">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
		</div>

		<div class="form-group">
			<label for="lastname">Lastname</label>
			<input type="text" class="form-control" id="lastname" name="last_name" placeholder="Lastname" required>
		</div>

		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="pwd" placeholder="Password" required>
		</div>

		<div class="form-group">
			<label for="password2">Password Again</label>
			<input type="password" class="form-control" id="password2" name="pwd2" placeholder="Password" required>
		</div>

		<button type="submit" class="btn btn-default">Submit</button>
	</form>

</div>