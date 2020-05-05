<table>
    <tbody>
    <tr>
        <th>Thème: </th>
        <td><button id="theme-clair">Clair</button><button id="theme-sombre">Sombre</button></td>
    </tr>
    <tr>
        <th>Afficher l'heure: </th>
        <td><button id="display-time">Oui</button> <button id="hide-time">Non</button></td>
    </tr>
    <tr>
        <th>Eteindre l'écran après x minutes: </th>
        <td><button>Oui</button> <button>Non</button></td>
    </tr>
    </tbody>
</table>

<script>
    document.getElementById("theme-clair").addEventListener("click", function (e) {
        e.preventDefault();

        document.getElementById("home").setAttribute("class", "theme-clair");

        var xhr = new XMLHttpRequest();

        var data = new FormData(this);

        var url = "http://127.0.0.1/core/settings/design/changeTheme.php?theme=clair";

        xhr.open("GET", url, true);
        xhr.send();
        return false;
    });
    document.getElementById("theme-sombre").addEventListener("click", function (e) {
        e.preventDefault();

        document.getElementById("home").setAttribute("class", "theme-sombre");

        var xhr = new XMLHttpRequest();

        var data = new FormData(this);

        var url = "http://127.0.0.1/core/settings/design/changeTheme.php?theme=sombre";

        xhr.open("GET", url, true);
        xhr.send();
        return false;
    });
    document.getElementById("display-time").onclick = function () {
        document.getElementById("time").setAttribute("style", "display: block;");

        var xhr = new XMLHttpRequest();

        var data = new FormData(this);

        var url = "http://127.0.0.1/core/settings/design/changeTimeDisplay.php?time=true";

        xhr.open("GET", url, true);
        xhr.send();
        return false;
    }
    document.getElementById("hide-time").onclick = function () {

        document.getElementById("time").setAttribute("style", "display: none;");

        var xhr = new XMLHttpRequest();

        var data = new FormData(this);

        var url = "http://127.0.0.1/core/settings/design/changeTimeDisplay.php?time=false";

        xhr.open("GET", url, true);
        xhr.send();
        return false;
    }

</script>