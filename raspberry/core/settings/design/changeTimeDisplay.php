<?php
$config = __DIR__ . DIRECTORY_SEPARATOR . "../../../config.php";
if (strpos(file_get_contents($config), "$displayTime = true")) {
    file_put_contents($config, str_replace("$displayTime = true", "$displayTime = " . $_GET['time'], file_get_contents($config)));
} else {
    file_put_contents($config, str_replace("$displayTime = false", "$displayTime = " . $_GET['time'], file_get_contents($config)));
}