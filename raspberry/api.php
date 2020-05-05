<?php
    require __DIR__ . '/core/core.php';
    $method = $_GET['method'];
    if ($method == "devices") {
        if ($_GET['getId'] == "1") {
            $statement = $db->query("SELECT id FROM devices WHERE ip = '" . $_SERVER['REMOTE_ADDR'] ."'");
            $device = $statement->fetch();
            $response = $device['id'];
        } else {
            $oplichten = array();
            $klep = array();
            $raam = array();
            $statement = $db->query("SELECT * FROM devices WHERE type = 'Oplichten'");
            while ($light = $statement->fetch()) {
                $oplichten[] = array("id" => $light['id'], "name" => $light['name'], "multi" => $light['multi'], "multiId" => $light['multiId'], "status" => $light['status']);
            }
            $statement = $db->query("SELECT * FROM devices WHERE type = 'Klep'");
            while ($shutter = $statement->fetch()) {
                $klep[] = array("id" => $shutter['id'], "name" => $shutter['name'], "multi" => $shutter['multi'], "multiId" => $shutter['multiId'],  "status" => $shutter['status']);
            }
            $statement = $db->query("SELECT * FROM devices WHERE type = 'Raam'");
            while ($window = $statement->fetch()) {
                $raam[] = array("id" => $window['id'], "name" => $window['name'], "multi" => $window['multi'], "multiId" => $window['multiId'],  "status" => $window['status']);
            }
            $response = array("oplichten" => $oplichten, "klep" => $klep, "raam" => $raam);
        }
    } else {
        if ($_POST) {
            $url = "http://127.0.0.1/core/";
            if ($_POST['id'] == null || empty($_POST['id']) || $_POST['status'] == null || $_POST['status'] == "") {
                $response = array("message" => "Message mal formulé", "values" => array("id" => $_POST['id'], "status" => $_POST['status']), "code" => 000);
            } else {
                $device = $db->query("SELECT `name` FROM devices WHERE id = " . $_POST['id']);
                $device = $device->fetch();
                $db->query("UPDATE `devices` SET `status` = " . intval($_POST['status']) . " WHERE `id` = " . $_POST['id']);
                $response = array("message" => $device['name'] . " vient de changer d'état", "code" => 200);
            }
        }
    }
    header("Content-Type: application/json");
    echo json_encode($response);

