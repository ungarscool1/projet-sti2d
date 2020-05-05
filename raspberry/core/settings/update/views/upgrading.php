<html>
    <head>
        <title>Upgrading to new version...</title>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Roboto:300);
            body {
                background-color: #1d68a7;
                color: #fff;
                font-family: 'Roboto', sans-serif;
                font-weight: 300;
                width: 100vw;
                height: 100vh;
                margin: 0;
                overflow: hidden;
            }
            h1 {
                position: relative;
                top: 29vh;
                left: 20vw;
            }
            .progress-bar {
                position: relative;
                top: 35vh;
                left: 5vw;
                width: 75vw;
                height: 5px;

                background-color: #1d2124;
            }
            .progress-bar .progress {
                background-color: #FFFFFF;
                height:5px;
                width: 0%;
            }
        </style>
    </head>
    <body>
        <h1>Mise à jour de l'appareil...</h1>
        <div class="progress-bar">
            <div id="prog" class="progress"></div>
        </div>
    </body>
</html>
<?php
require '../update.php';
$updater = new update();
$updater->upgrade();