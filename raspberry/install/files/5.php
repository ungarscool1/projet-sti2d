<?php
if ($_POST) {
    $configFile = __DIR__ . "/../../config.php";
    file_put_contents($configFile, str_replace("diagnostic = false", "diagnostic = true", file_get_contents($configFile)));
    header("Location: index.php?step=6");
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Installation 5/6</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="background-color: #2c3e50;">
<center>
    <div class="thumbnail" style="position: absolute; top: 5vh; left: 25vw; width: 50vw; min-width: 50vw; min-height: 90vh; height: 90vh; border-radius: 20px;">
        <div class="caption">
            <h1 style="margin-bottom: 0px;">Envoyer des diagnostiques à LVL</h1>
            <br><br>
            <form action="#" method="post">
                <div class="form-group">
                    <textarea class="form-control" style="resize: none; height: 71vh;" disabled><?php require 'text/diag.php'?></textarea>
                </div>
                <div class="form-group">
                    <a href="?step=6" class="btn btn-danger">Je refuse</a>
                    <button type="submit" class="btn btn-success">J'accepte</button>
                </div><br>
            </form>
        </div>
    </div>
</center>
</body>
</html>