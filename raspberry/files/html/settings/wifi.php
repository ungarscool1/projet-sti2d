<?php
    $wifis = array("      LVL-Network", "      Test-Network","      I <3 Chrome", "      Spotify > Deezer (du soir)", "      Réseau wifi");
    //exec("sudo iwlist wlan1 scan | grep \"SSID\"", $wifis);
?>

<form id="wificonf">
    <div class="form-group" style="display: block;" id="ssiddiv">
        <input style="display: none;" value="" name="ssid" id="ssid"/>
        <?php
        foreach ($wifis as $wifi) {
            if (!strpos($wifi, 'LVL')) {
                //$len = strlen($wifi) - 6;
                echo "<button class='' onclick='document.getElementById(\"ssiddiv\").style.display = \"none\"; document.getElementById(\"passdiv\").style.display = \"block\";  document.getElementById(\"ssid\").value = \"" . /*substr(*/$wifi/*, 27,-1)*/ . "\"'>" . /*substr(*/$wifi/* ,27,-1)*/ . "</button>";

            }
        }
        ?>
    </div>
    <div class="form-group" id="passdiv" style="display: none;">
        <input type="password" class="form-control" name="password" required placeholder="Mot de passe"/>
        <button type="submit" class="btn btn-success">Se connecter</button><br>
    </div>
</form>

<script>
    document.getElementById("wificonf").addEventListener("submit", function (e) {
        e.preventDefault();

        var xhr = new XMLHttpRequest();

        var data = new FormData(this);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Tout a été éteint");
                alert("Les paramètres wifi ont été modifiés.");
            } else if (this.readyState == 4) {
            }
        };

        var url = "http://127.0.0.1/core/settings/wifi.php";

        xhr.open("POST", url, true);
        xhr.send(data);
        return false;
    });
</script>
