<?php
require __DIR__ . DIRECTORY_SEPARATOR . "../../config.php";
if ($displayTime == true) {
    $displayTime = "block";
} else {
    $displayTime = "none";
}
?>
<section id="home" class="theme-<?= $theme ?>" style="display: block; width: 100vw; height: 100vh;">
    <div id="status" class="status">
        <div id="batterie"></div>
        <div id="wifi"></div>
        <div id="time" style="display: <?= $displayTime ?>;"></div>
    </div>

    <div id="tabs">
        <ul class="tabs">
            <li><button onclick="updateMain('light')">Lumières <span id="lumBadge" class="badge">3</span></button></li>
            <li><button onclick="updateMain('shutter')">Volets <span id="volBadge" class="badge">0</span></button></li>
            <li><button onclick="updateMain('window')">Fenêtres <span id="fenBadge" class="badge">5</span></button></li>
            <li><button onclick="updateMain('settings')">Paramètres</button></li>
        </ul>
    </div>

    <div id="main"></div>

</section>