<?php
if ($_POST) {
    if ($_POST['statut'] == "1") file_put_contents("btn.php", "1");
    else file_put_contents("btn.php", "0");
    die(201);
}
?>

<html>
    <head>
        <title>Vérifiaction de l'arduino</title>
        <script src="../files/js/jQuery.js"></script>
    </head>
    <body>
        <h1>Vérification de l'arduino</h1>
        <h5>Connecté ? <p id="ardStatus"></p></h5>
        <h5>Bouton appuyé ? <p id="btnStatus"></p></h5>
    <script>
        sync();
        function sync() {
            loadHtmlAsync("ardStatus", "http://127.0.0.1:" + window.location.port + "/test/getArduino.php");
            loadHtmlAsync("btnStatus", "http://127.0.0.1:" + window.location.port + "/test/btn.php");
            t = setTimeout(function() {
                sync();
            }, 250);
        }
        function loadHtmlAsync(id, url) {
            $.ajax({
                async: true,
                type: "GET",
                url: url,
                data: null,
                success: function (html) {
                    $("#" + id).html(html);
                },
                error: function () {
                    loadHtmlAsync(id, url);
                }
            });
        }
    </script>
    </body>
</html>