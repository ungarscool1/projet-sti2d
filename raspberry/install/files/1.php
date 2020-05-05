<?php
$wifis = array();
exec("sudo iwlist wlp35s0f3u3 scan | grep \"SSID\"", $wifis);
if ($_POST) {
    $wpa = "/etc/wpa_supplicant/wpa_supplicant.conf";
    file_put_contents($wpa,str_replace("%ssid%",$_POST['ssid'],file_get_contents($wpa)));
    file_put_contents($wpa,str_replace("%psk%",$_POST['password'],file_get_contents($wpa)));

    header("Location: index.php?step=2");
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Installation 1/6</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="background-color: #2c3e50;">
<center>
    <div class="thumbnail" style="position: absolute; top: 5vh; left: 25vw; width: 50vw; min-width: 50vw; min-height: 90vh; height: 90vh; border-radius: 20px;">
        <div class="caption">
            <h1 style="margin-bottom: 0px;">Configuration de la connexion wifi</h1>
            <br><br>
            <form action="#" method="post">
                <div class="form-group" style="display: block;" id="ssiddiv">
                    <input style="display: none;" value="" name="ssid" id="ssid"/>
                    <?php
                    foreach ($wifis as $wifi) {
                        if (!strpos($wifi, 'LVL')) {
                            $len = strlen($wifi) - 6;
                            echo "<a href='#' class='btn btn-lg btn-light' style='display: list-item' onclick='document.getElementById(\"ssiddiv\").style.display = \"none\"; document.getElementById(\"passdiv\").style.display = \"block\";  document.getElementById(\"ssid\").value = \"" . substr($wifi, 27,-1) . "\"'>" . substr($wifi, 27,-1) . "</a>";

                        }
                    }
                    ?>
                </div>
                <div class="form-group" id="passdiv" style="display: none;">
                    <input type="password" class="form-control" name="password" required placeholder="Mot de passe"/>
                </div>
                <button type="submit" class="btn btn-success">Se connecter</button><br>
            </form>
        </div>
    </div>
</center>
</body>
</html>