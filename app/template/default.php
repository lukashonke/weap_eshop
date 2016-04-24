<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dokument bez názvu</title>
<link href="<?php echo BASE_DIR; ?>/static/css/admin_css.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">
<header><h1>Administrace eshopu</h1></header>
<nav>
    <span class="navbutton"><a href="index.php">HOME</a></span>
    <span class="navbutton"><a href="index.php?url=admin_settings">SETTINGS</a></span>
    <span class="navbutton"><a href="index.php?url=admin_prehled">OVERVIEW</a></span>
    <span class="navbutton"><a href="index.php?url=admin_logout">LOGOUT</a></span>
</nav>

<main>
    <?php

    if(isset($menu))
        echo $menu;

    ?>

    <div id="content">
        <?= $content;?>
    </div>;
</main>

<footer>(C) 2016 Lukas Honke</footer>
</div>
</body>
</html>