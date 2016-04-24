<?php
?>
<?php if(isset($message)) echo $message; ?>
<div class="login">
    <form class="form-signin" role="form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=admin_login" method = "post">
        <h4 class="form-signin-heading">Login here</h4>

        <input type="text" class = "form-control"
               name="name" placeholder = "username = admin"
               required autofocus></br>
        <input type="password" class = "form-control"
               name="pwd" placeholder = "password = admin" required>
        <button class="btn btn-lg btn-primary btn-block" type = "submit"
                name="login">Login</button>
    </form>
</div>