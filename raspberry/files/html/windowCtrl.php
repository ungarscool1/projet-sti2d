<?php
require __DIR__.'/../../core/core.php';

$lumieres = $db->query("SELECT * FROM devices WHERE type = 'Raam'");
?>
<table>
    <tbody>
    <tr>
        <th>

            <div id="manage">
                <form id="add">
                    <button class="btn-manage" type="submit">+</button>
                </form>
                <form id="modify">
                    <button class="btn-manage" type="submit">&times;</button>
                </form>
            </div>
        </th>
        <td>
            <div class="map">
                <?php
                $index = 0;
                while ($lumiere = $lumieres->fetch()) {
                    $pos = $lumiere['pos'];
                    $x = substr($pos, 1, (strpos($pos, ", ") - 1));
                    $y = substr($pos, (strpos($pos, ",") + 2));
                    $y = substr($y, 0, strpos($y, ")"));
                    echo '<form id="light-' . $index . '">';
                    echo '<button id="lightBtn-' . $index . '" style="position: absolute; top: 0px; left: 0px;">' . $lumiere['status'] . '</button>';
                    echo '</form>';
                    echo "<script>
                            document.getElementById('lightBtn-" . $index . "').style.top = (" . $y . " + 136) + \"px\";
                            document.getElementById('lightBtn-" . $index . "').style.left = (" . $x . " + 249) + \"px\";
                            document.getElementById('light-" . $index . "').addEventListener('submit', function(e) {
                            e.preventDefault();});</script>";
                    $index++;
                }
                ?>
                <img id="map"/>
            </div>
        </td>
    </tr>
    </tbody>
    <script>
        if (document.getElementById("home").className === "theme-sombre") {
            document.getElementById("map").setAttribute("src", "http://127.0.0.1/files/img/rdc-theme-sombre.png");
        } else {
            document.getElementById("map").setAttribute("src", "http://127.0.0.1/files/img/rdc-theme-clair.png");
        }
        document.getElementById("add").addEventListener("submit", function (e) {
            e.preventDefault();
            loadDivAsync("ContextMenu", "http://127.0.0.1/files/html/addDevice.php");
            document.getElementById("ContextMenu").style.display = "block";
        });
    </script>
</table>
