<?php

use app\Bootstrap;

require('app/config.php');

spl_autoload_extensions('.php');
spl_autoload_register();

session_start();

$app = new Bootstrap();