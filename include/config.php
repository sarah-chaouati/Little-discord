<?php

define('HOST', "localhost");
define("LOGIN", "root");
define("PASS", "");
define("BDD", "chat");

$base=mysqli_connect(HOST,LOGIN,PASS,BDD);
mysqli_set_charset($base, "utf8")

?>