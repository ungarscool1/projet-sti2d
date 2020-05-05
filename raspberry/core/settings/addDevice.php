<?php
require __DIR__ . '/../core.php';
if ($_POST) {
    $device = $_POST['name'];
    $pos = $_POST['pos'];
    if (strpos($device, "Raam") OR strpos($device, "Kelp")) {
        $name = substr($device, 0, 21);
        $type = substr($device, 4, 4);
    }
    if (strpos($device, "Oplichten")) {
        $name = substr($device, 0, 26);
        $type = substr($device, 4, 9);
    }
    $name = str_replace("-", " ", $name);
    $pos = str_replace(",", ", ", $pos);
    $ip = substr($device, (strpos($device, "(") + 1));
    $ip = substr($ip, 0, strpos($ip, ")"));
    $db->exec("INSERT INTO devices (`name`, `type`, `ip`, `pos`) VALUES ('" . $name . "', '" . $type . "', '" . $ip . "', '" . $pos . "')");
}