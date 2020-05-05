<?php
/**
 *
 * Etape 1: Recup l'appareil concerné
 * Etape 2: Recup les infos de l'appareil
 * Etape 3: Envoyer la requête
 * Etape 4: Modifier le statut de l'appareil dans la base de donnée
 *
 */

require __DIR__ . '/../core.php';

$deviceId = $_GET['device'];

$device = $db->query("SELECT * FROM devices WHERE id = " . $deviceId);
$device = $device->fetch();
    if ($device['multi'] == 1) {
        $url = "http://" . $device['ip'] . "/allume/" . $device['multiId'] . "";
    } else {
        $url = "http://" . $device['ip'] . "/allume";
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
        if ($device['status'] == 0 OR $device['status'] == '0') {
            $db->query("UPDATE `devices` SET `status` = 1 WHERE `id` = " . $deviceId);
        } else {
            $db->query("UPDATE `devices` SET `status` = 0 WHERE `id` = " . $deviceId);
        }
    }