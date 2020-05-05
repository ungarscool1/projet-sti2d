<?php
require 'config.php';
if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contrôle domotique</title>
        <script src="files/js/jQuery.js"></script>
        <link rel="stylesheet" href="files/css/lock.css">
        <link rel="stylesheet" href="files/css/home.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="height: 100vh; width: 100vw; margin: 0;">
    <?php
        require 'files/html/homescreen.php';
    ?>
    <script src="files/js/homescreen.js"></script>
    </body>
</html>

