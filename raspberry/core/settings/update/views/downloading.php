<div class="modal-body">
    <h1>Téléchargement de la mise à jour...</h1>
    <div class="progress-bar"><div id="prog" class="progress"></div></div>
</div>
<style>
    .progress-bar {
        position: relative;
        top: 2.5vh;
        width: 75vw;
        height: 5px;

        background-color: #1d2124;
    }
    .progress-bar .progress {
        background-color: #FFFFFF;
        height:5px;
        width: 100%;
    }
</style>
<?php
require __DIR__ . '/../update.php';
$updater = new update();
$download = $updater->download();