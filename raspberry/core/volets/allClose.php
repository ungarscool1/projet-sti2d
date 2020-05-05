<?php
require __DIR__ . '/../core.php';

$volets = $db->query("SELECT * FROM devices WHERE type = 'volet' && status = 1");

while ($volet = $volets->fetch()) {
    if ($lumiere['status'] == 1) {
        $url = "http://" . $lumiere['ip'] . "/fermer";

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
// Tout a été fermés !