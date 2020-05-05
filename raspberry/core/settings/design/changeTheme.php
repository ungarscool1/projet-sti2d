<?php
$config = __DIR__ . DIRECTORY_SEPARATOR . "../../../config.php";
if (strpos(file_get_contents($config), "sombre")) {
    file_put_contents($config, str_replace("sombre", $_GET['theme'], file_get_contents($config)));
} else {
    file_put_contents($config, str_replace("clair", $_GET['theme'], file_get_contents($config)));
}