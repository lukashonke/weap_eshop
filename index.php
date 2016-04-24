<?php

//use app\Bootstrap;

require('app/config.php');

spl_autoload_extensions('.php');

spl_autoload_register(
    function ($pClassName) {
        spl_autoload(strtolower(str_replace("\\", "/", $pClassName)));
    }
);

session_start();

$app = new app\Bootstrap();