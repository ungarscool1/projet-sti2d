<?php
    if ($_POST) {
        $configFile = __DIR__ . "/../../config.php";
        if ($_POST['type']=="login") {
            $json = json_encode(array('email' => $_POST['email'], 'password' => $_POST['password'], 'app_name' => "Central domotique"));
        } else {
            $json = json_encode(array('name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password']));
        }

        $ch = curl_init('https://sin.ungarscool1.tk/api/v1/auth/' . $_POST['type']);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
        $response = curl_exec($ch);
        $data = json_decode($response);
        if (!isset($data->message)) {
            $token = $data->token_type . " " . $data->access_token;
            file_put_contents($configFile, str_replace("token = null", "token = " . $token, file_get_contents($configFile)));
            header("Location: index.php?step=3");
        } else {
            $error = true;
        }
    }
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Installation 2/6</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="background-color: #2c3e50;">
<center>
    <div class="thumbnail" style="position: absolute; top: 25vh; left: 15vw; width: 360px; min-width: 360px; min-height: 295px; height: 295px; border-radius: 20px;">
        <div class="caption">
            <h1 id="titre" style="margin-bottom: 0px;">Se connecter à LVL</h1>
            <small style="text-align: left; margin: 0 0 50px 0;">ou <a id="typeselector1" href="#" onclick="document.getElementById('namediv').style.display = 'none'; document.getElementById('type').value = 'login'; document.getElementById('titre').innerText = 'Se connecter à LVL'; document.getElementById('typeselector0').style.display = 'block'; document.getElementById('typeselector1').style.display = 'none';" style="color: #95a5a6;">Connectez-vous</a><a id="typeselector0" href="#" onclick="document.getElementById('namediv').style.display = 'block'; document.getElementById('type').value = 'signup'; document.getElementById('titre').innerText = 'S\'inscrire à LVL';" style="color: #95a5a6;">Inscrivez-vous</a></small>
            <br><br>
            <form action="#" method="post">
                <?php
                    if ($error) {
                        echo "<span class=\"invalid-feedback\" role=\"alert\"><strong>Identifiants invalide</strong></span>";
                    }
                ?>
                <input name="type" id="type" value="login"/>
                <div class="form-group" id="namediv">
                    <input type="text" class="form-control" name="name" placeholder="Prénom Nom"/>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Adresse mail"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" required placeholder="Mot de passe"/>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Se connecter</button><br>
                <small style="text-align: left; margin: 0 0 50px 0;">ou <a href="index.php?step=3" style="color: #95a5a6;">Passez</a></small>
            </form>
        </div>
    </div>
</center>
</body>
</html>