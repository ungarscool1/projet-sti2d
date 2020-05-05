<?php
    $devices = array("LVL Oplichten A32132EZDGRE (10.0.0.100) at 3c:dc:bc:e9:f8:15 on en0 ifscope [ethernet]",
        "LVL Raam Z443953JGSTR (10.0.0.35) at 3c:dc:bc:e9:f8:15 on en0 ifscope [ethernet]");
    //exec("sudo arp -a", $devices);
    if ($_POST) {
        $ip = substr($devices[$_POST['device']], strpos($devices[$_POST['device']], "(") + 1, -47);
        echo "Configuration de " . substr($devices[$_POST['device']], 0, 26) . " (" . $ip;
        /*
         * Configuration avec curl
         */
        $ch = curl_init("http://" . $ip . "/config");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, "appair=1");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        echo "<br>";
        if ($response == true) {
            echo "L'appareil n'a pas pu être trouvé";
        } else {
            echo "Réponse: " . $response;
            $db = new PDO('mysql:host=127.0.0.1;dbname=domotique', 'root', "Jaimemamaman01");

            $req = $db->prepare("INSERT INTO devices (`name`, `ip`, `room`, `status`) VALUES (:name, :ip, :room, :status)");
            $req->execute(array("name" => substr($devices[$_POST['device']], 0, 26),
                "ip" => $ip,
                "room" => "Cuisine",
                "status" => false));
        }
    }
?>

<form method="post">
    <select name="device">
        <?php
        $index = 0;
            foreach ($devices as $device) {
                /*if (!strpos($device, "LVL_network")) {
                    if (strpos($device,"LVL")) {*/
                        echo "<option value='" . $index . "'>" . substr($device, 0, 26) . "</option>";
                /*    }
                }*/
                $index++;
            }
        ?>
    </select>
    <button type="submit">Appair</button>
</form>