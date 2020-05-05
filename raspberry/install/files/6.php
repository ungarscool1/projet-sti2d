<?php
if ($_POST) {
    exec("sudo rm -fr /var/www/html/install");
    header("Location: ../index.php");
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Installation 6/6</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="background-color: #2c3e50;">
<center>
    <div class="thumbnail" style="position: absolute; top: 25vh; left: 15vw; width: 360px; min-width: 360px; min-height: 175px; height: 175px; border-radius: 20px;">
        <div class="caption">
            <h1 style="margin-bottom: 0px;">Installation terminé !</h1>
            <br><br>
            <form action="#" method="post">
                <button type="submit" class="btn btn-success">Terminé l'installation</button><br>
            </form>
        </div>
    </div>
</center>
</body>
</html>