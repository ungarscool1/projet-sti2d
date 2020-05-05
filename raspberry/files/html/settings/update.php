<?php
require __DIR__ . '/../../../core/settings/update/update.php';
$updater = new update();
$check = $updater->check();
if ($GLOBALS['need_update']) {
    ?>
    Une nouvelle version est disponible ! (<?= $check->version ?>, <?= $check->size ?>)<br>
    Ajouts: <ul>
        <?php
        $additions = explode(",", $check->ajout);
        if (!empty($additions[0])) {
            foreach ($additions as $addition) {
                echo "<li>{$addition}</li>";
            }
        } else {
            echo "Rien";
        }
        ?>
    </ul>
    <br>Suppressions:<ul>
        <?php
        $removeds = explode(",", $check->remove);
        if (!empty($removeds[0])) {
            foreach ($removeds as $removed) {
                echo "<li>{$removed}</li>";
            }
        } else {
            echo "Rien";
        }
        ?>
    </ul>
    <button onclick="loadDivAsync('modalupdate', 'http://127.0.0.1/core/settings/update/views/downloading.php'); document.getElementById('modalupdate').style.display = 'block';">Télécharger la mise à jour</button>
    <div id="modalupdate" class="modal"></div>
<?php
} else {
    if ($check == "Pas d'internet") {
        ?>
        Vous n'avez pas de connexion internet


        <?php
    } else {
        ?>
        Il n'y a pas de mise à jour
        <?php
    }
}