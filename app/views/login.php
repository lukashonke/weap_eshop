<?php
?>

<?php if(isset($message)) echo $message; ?>

<div class="login">
    <form class="form-signin" role="form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?url=login" method = "post">
        <h4 class="form-signin-heading">Login here</h4>

        <input type="text" class = "form-control"
               name="name" placeholder = "username"
               required autofocus></br>
        <input type="password" class = "form-control"
               name="pwd" placeholder = "password" required>
        <br>
        <button class="btn btn-lg btn-default" type = "submit"
                name="login">Login</button>
    </form>

</div>
<br>
<div><a class="btn btn-primary" href="index.php?url=register" role="button">Register</a></div>