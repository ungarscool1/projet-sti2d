<?php
require __DIR__ . '/../core.php';

$lumieres = $db->query("SELECT * FROM devices WHERE type = 'Oplichten'");
while ($lumiere = $lumieres->fetch()) {
    if ($lumiere['status'] == 1) {
        if ($lumiere['multi'] == 1) {
            $url = "http://" . $lumiere['ip'] . "/allume/" . $lumiere['multiId'] . "";
        } else {
            $url = "http://" . $lumiere['ip'] . "/allume";
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $return = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($code == 200 OR $code == "200") {
            $db->query("UPDATE `devices` SET `status` = 0 WHERE `id` = " . $lumiere['id']);
        }
    }
}
// Tout a été allumer !