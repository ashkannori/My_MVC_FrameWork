<?php

define("APP_NAME", "MY MVC");
define("BASE_URL", "https://$_SERVER[HTTP_HOST]:8000");
define("BASE_DIR", realpath(__DIR__ . "/../"));

$current_rout = explode("?", $_SERVER["REQUEST_URI"])[0];
$current_rout = substr($current_rout, 1);
echo $current_rout;

define("CURRENT_ROUTE", $current_rout);