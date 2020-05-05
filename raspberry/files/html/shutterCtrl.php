<?php
require __DIR__.'/../../core/core.php';

$volets = $db->query("SELECT * FROM devices WHERE type = 'Klep'");
?>
<table>
    <tbody>
    <tr>
        <th>
            <div id="control">
                <form id="allOn">
                    <button class="btn-right-round" type="submit">Tout ouvrir</button>
                </form>
                <form id="allOff">
                    <button class="btn-right-round" type="submit">Tout fermer</button>
                </form>
                <form id="perso1">
                    <button class="btn-perso" type="submit">Perso 1</button>
                </form>
                <form id="perso2">
                    <button class="btn-perso" type="submit">Perso 2</button>
                </form>
                <form id="perso3">
                    <button class="btn-perso" type="submit">Perso 3</button>
                </form>
                <div id="manage">
                    <form id="add">
                        <button class="btn-manage" type="submit">+</button>
                    </form>
                    <form id="modify">
                        <button class="btn-manage" type="submit">&times;</button>
                    </form>
                </div>
            </div>
        </th>
        <td>
            <div class="map">
                <?php
                $index = 0;
                while ($volet = $volets->fetch()) {
                    $pos = $volet['pos'];
                    $x = substr($pos, 1, (strpos($pos, ", ") - 1));
                    $y = substr($pos, (strpos($pos, ",") + 2));
                    $y = substr($y, 0, strpos($y, ")"));
                    echo '<form id="shutter-' . $index . '">';
                    echo '<button id="shutterBtn-' . $index . '" style="position: absolute; top: 0px; left: 0px;">' . $volet['status'] . '</button>';
                    echo '</form>';
                    echo "<script>
                            document.getElementById('shutterBtn-" . $index . "').style.top = (" . $y . " + 136) + \"px\";
                            document.getElementById('shutterBtn-" . $index . "').style.left = (" . $x . " + 249) + \"px\";
                            document.getElementById('shutter-" . $index . "').addEventListener('submit', function(e) {
                            e.preventDefault();
                            var xhr = new XMLHttpRequest();

                            var data = new FormData(this);

                            xhr.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    updateMain('shutter');
                                } else if (this.readyState == 4) {
                                }
                            };

                            var url = \"http://127.0.0.1/core/volets/ctrl.php?device=" . $volet['id'] . "\";

                            xhr.open(\"GET\", url, true);
                            xhr.send(data);
                            return false;
                            });</script>";
                    $index++;
                }
                ?>
                <img id="map"/>
            </div>
        </td>
    </tr>
    </tbody>

</table>

<div class="modal" id="ContextMenu"></div>

<script>

    if (document.getElementById("home").className === "theme-sombre") {
        document.getElementById("map").setAttribute("src", "http://127.0.0.1/files/img/rdc-theme-sombre.png");
    } else {
        document.getElementById("map").setAttribute("src", "http://127.0.0.1/files/img/rdc-theme-clair.png");
    }

    document.getElementById("allOn").addEventListener("submit", function (e) {
        e.preventDefault();

        var xhr = new XMLHttpRequest();

        var data = new FormData(this);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Tout a été allumées");
                updateMain('shutter');
            } else if (this.readyState == 4) {
            }
        };

        var url = "http://127.0.0.1/core/volets/allOpen.php";

        xhr.open("GET", url, true);
        xhr.send(data);
        return false;
    });


    document.getElementById("allOff").addEventListener("submit", function (e) {
        e.preventDefault();

        var xhr = new XMLHttpRequest();

        var data = new FormData(this);

        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log("Tout a été éteint");
                updateMain('shutter');
            } else if (this.readyState == 4) {
            }
        };

        var url = "http://127.0.0.1/core/volets/allClose.php";

        xhr.open("POST", url, true);
        xhr.send(data);
        return false;
    });

    document.getElementById("perso1").addEventListener("submit", function (e) {
        e.preventDefault();
    });
    document.getElementById("perso2").addEventListener("submit", function (e) {
        e.preventDefault();
    });
    document.getElementById("perso3").addEventListener("submit", function (e) {
        e.preventDefault();
    });
    document.getElementById("add").addEventListener("submit", function (e) {
        e.preventDefault();
        loadDivAsync("ContextMenu", "http://127.0.0.1/files/html/addDevice.php");
        document.getElementById("ContextMenu").style.display = "block";
    });
    document.getElementById("modify").addEventListener("submit", function (e) {
        e.preventDefault();
        loadDivAsync("ContextMenu", "http://127.0.0.1/files/html/modifyDevice.php");
        document.getElementById("ContextMenu").style.display = "block";
    });
</script>