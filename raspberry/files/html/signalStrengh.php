<?php
$link = array();
exec("sudo iwconfig wlan1 | grep \"Link Quality\"", $link);
echo "<img style='width: 20px; height: 20px;' src='http://127.0.0.1/files/img/logoWifi/" . round(intval(substr($link[0],23, -25)) / 70 * 4) . ".png'/>";