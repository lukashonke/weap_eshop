<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<title>Book Eshop</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="jumbotron-narrow.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">

  <div class="header clearfix">
    <nav class="navbar-inverse">
      <ul class="nav nav-pills pull-right">
        <li role="presentation"><p class="navbar-text"><?= $loginfo ?></p></li>
        <li role="presentation" <?php if(isset($page) && $page == "home") echo "class=\"active\""?>><a href="index.php">Home</a></li>
        <li role="presentation" <?php if(isset($page) && $page == "cart") echo "class=\"active\""?>><a href="index.php?url=cart">Cart</a></li>
        <li role="presentation" <?php if(isset($page) && $page == "login") echo "class=\"active\""?>><a href="index.php?url=<?php if(isset($logout)) echo $logout; else echo "login" ;?>"><?php if(isset($logout)) echo $logout; else echo "Login" ;?></a></li>
        <li role="presentation" <?php if(isset($page) && $page == "admin") echo "class=\"active\""?>><a href="index.php?url=admin_home">Admin</a></li>
      </ul>
    </nav>
    <h3 class="text-muted">Book Eshop</h3>
  </div>

  <div class="row">
    <div class="col-xs-6 col-md-4">
      <div class="list-group">

        <div class="my_dropdown"> <a href="#" class="list-group-item <?php if(isset($bookPage) && $bookPage > 0 && $bookPage <= 5) echo "active"?>">
          <h4 class="list-group-item-heading">Česká beletrie</h4>
          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
          </a>
          <div class="my_hidden_dropdown">
            <div class="list-group"> <a href="index.php?url=category/select/<?= \libs\Categories::CESKE_ROMANY?>" class="list-group-item"> Romány </a> <a href="index.php?url=category/select/<?= \libs\Categories::CESKE_SCIFI?>" class="list-group-item">Sci-fi, Fantasy</a> <a href="index.php?url=category/select/<?= \libs\Categories::CESKE_DETEKTIVKY?>" class="list-group-item">Detektivky</a> <a href="index.php?url=category/select/<?= \libs\Categories::CESKE_POVIDKY?>" class="list-group-item">Povídky</a> <a href="index.php?url=category/select/<?= \libs\Categories::CESKE_KOMIKSY?>" class="list-group-item">Komiksy</a> </div>
          </div>
        </div>

        <div class="my_dropdown"> <a href="#" class="list-group-item <?php if(isset($bookPage) && $bookPage >= 6 && $bookPage <= 10) echo "active"?>">
          <h4 class="list-group-item-heading">Světová beletrie</h4>
          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
          </a>
          <div class="my_hidden_dropdown">
            <div class="list-group"> <a href="index.php?url=category/select/<?= \libs\Categories::SVETOVE_ROMANY?>" class="list-group-item"> Romány </a> <a href="index.php?url=category/select/<?= \libs\Categories::SVETOVE_SCIFI?>" class="list-group-item">Sci-fi, Fantasy</a> <a href="index.php?url=category/select/<?= \libs\Categories::SVETOVE_DETEKTIVKY?>" class="list-group-item">Detektivky</a> <a href="index.php?url=category/select/<?= \libs\Categories::SVETOVE_POVIDKY?>" class="list-group-item">Povídky</a> <a href="index.php?url=category/select/<?= \libs\Categories::SVETOVE_KOMIKSY?>" class="list-group-item">Komiksy</a> </div>
          </div>
        </div>

        <div class="my_dropdown"> <a href="#" class="list-group-item <?php if(isset($bookPage)  && $bookPage > 11 && $bookPage <= 15) echo "active"?>">
          <h4 class="list-group-item-heading">Naučná literatura</h4>
          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
          </a>
          <div class="my_hidden_dropdown">
            <div class="list-group"> <a href="index.php?url=category/select/<?= \libs\Categories::NAUCNA_CESTOVANI?>" class="list-group-item"> Cestování </a> <a href="index.php?url=category/select/<?= \libs\Categories::NAUCNA_HISTORIE?>" class="list-group-item">Historie</a> <a href="index.php?url=category/select/<?= \libs\Categories::NAUCNA_ZDRAVI?>" class="list-group-item">Zdraví a fitness</a> <a href="index.php?url=category/select/<?= \libs\Categories::NAUCNA_ODBORNA?>" class="list-group-item">Odborná literatura</a> <a href="index.php?url=category/select/<?= \libs\Categories::NAUCNA_FILOZOFIE?>" class="list-group-item">Filozofie</a> </div>
          </div>
        </div>

        <div class="my_dropdown"> <a href="#" class="list-group-item <?php if(isset($bookPage) && $bookPage >= 15 && $bookPage <= 17) echo "active"?>">
          <h4 class="list-group-item-heading">Dětská literatura</h4>
          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
          </a>
          <div class="my_hidden_dropdown">
            <div class="list-group"> <a href="#" class="list-group-item"> Pohádky </a> <a href="#" class="list-group-item">Horory</a> </div>
          </div>
        </div>

        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8">

      <?= $content;?>

      <nav>


    </div>
  </div>
  <footer class="footer">
    <p>&copy; 2016 Lukas Honke</p>
  </footer>
</div>
<!-- /container -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
