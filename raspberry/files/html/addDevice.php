<?php
    $devices = array();
    exec("arp -a | grep \"LVL\"", $devices);
?>
<div class="modal-body manage">
    <h1>Ajouter un nouvelle appareil</h1>
    <form id="addDevice">
        <div id="add1" style="display: block;">
            <div>
                <select name="adddevice">
                    <option value="none">Sélectionner votre appareil</option>
                    <?php
                    $index = 0;
                    foreach ($devices as $device) {
                        if (strpos($device, "Raam") OR strpos($device, "Kelp")) $name = substr($device, 0, 21);
                        if (strpos($device, "Oplichten")) $name = substr($device, 0, 26);
                        $name = str_replace("-", " ", $name);
                        echo "<option value='" . $device . "'>" . $name . "</option>";
                        $index++;
                    }
                    ?>
                </select>
            </div>
        </div>
        <div id="add2" style="display: none;">
            <img id="addmap">
        </div>
        <button class="" id="addDeviceSubmit" type="submit">Suivant</button>
    </form>
</div>

<script>
    if (document.getElementById("home").className === "theme-sombre") {
        document.getElementById("addmap").setAttribute("src", "http://127.0.0.1/files/img/rdc-theme-sombre.png");
    } else {
        document.getElementById("addmap").setAttribute("src", "http://127.0.0.1/files/img/rdc-theme-clair.png");
    }
    document.getElementById("addDevice").addEventListener("submit", function (e) {
        e.preventDefault();
        var x = 0;
        var y = 0;
        if (document.getElementById("add1").style.display === "block") {
            if (document.getElementsByName("adddevice")[0].value !== "none") {
                document.getElementById("add1").style.display = "none";
                document.getElementById("add2").style.display = "block";
                document.getElementsByClassName("manage")[0].style.margin = "-2% auto";
                console.debug("Configuration de " + document.getElementsByName("adddevice")[0].value);
                document.getElementById("addDeviceSubmit").innerText = "Ajouter";
                var handler = function (e) {
                    let addDeviceDevice = document.createElement("button");
                    addDeviceDevice.style.position = "absolute";
                    addDeviceDevice.innerText = document.getElementsByName("adddevice")[0].value;
                    addDeviceDevice.style.zIndex = 2;
                    addDeviceDevice.style.top = e.pageY + "px";
                    addDeviceDevice.style.left = e.pageX + "px";
                    y = e.pageY - document.getElementById("addmap").offsetTop;
                    x = e.pageX - document.getElementById("addmap").offsetLeft;
                    document.getElementById("ContextMenu").appendChild(addDeviceDevice);
                    document.getElementById("addmap").removeEventListener("click", handler);
                };
                document.getElementById("addmap").addEventListener("click", handler);
            } else {
                alert("Veuillez choisir un appareil");
            }
        } else {
            var xhr = new XMLHttpRequest();
            alert("X="+x+"\nY="+y);
            var data = "name=" + document.getElementsByName("adddevice")[0].value + "&pos=(" + x + "," + y + ")";
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status != 200) {
                    alert("Une erreur est survenue...");
                }
            };

            var url = "http://127.0.0.1/core/settings/addDevice.php";

            xhr.open("POST", url, true);

            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
            document.getElementById("ContextMenu").style.display = "none";
        }
    });
</script>
