<?php

/**
 * Database config
 */
$host = "127.0.0.1";
$user = "root";
$pass = "g1HTCVja9kB";
$database = "domotique";

/*
if ($_SERVER['REMOTE_ADDR']!="127.0.0.1" || strpos($_SERVER[REMOTE_ADDR], '10.0.0.')) {
    die("<h1>Il est interdit d'accèder à ".$_SERVER['SERVER_ADDR']."</h1>");
}
if (is_dir("install")) {
    header("Location: /install/?step=1");
}*/

session_start();
$db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);