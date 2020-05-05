<table class="settings">
    <tbody>
        <tr>
            <th>
                <ul>
                    <li class="settings-cat"><button onclick="loadDivAsync('menu', 'http://127.0.0.1/files/html/settings/design.php')">Apparence</button></li>
                    <li class="settings-cat"><button onclick="loadDivAsync('menu', 'http://127.0.0.1/files/html/settings/code.php')">Code</button></li>
                    <li class="settings-cat"><button onclick="loadDivAsync('menu', 'http://127.0.0.1/files/html/settings/privacy.php')">Confidentialité </button></li>
                    <li class="settings-cat"><button onclick="loadDivAsync('menu', 'http://127.0.0.1/files/html/settings/wifi.php')">Connexion Wi-Fi</button></li>
                    <li class="settings-cat"><button onclick="loadDivAsync('menu', 'http://127.0.0.1/files/html/settings/update.php')">Mise à jour</button></li>
                    <li class="settings-cat"><button onclick="loadDivAsync('menu', 'http://127.0.0.1/files/html/settings/about.php')">A propos</button></li>
                </ul>
            </th>
            <td><div id="menu"></div></td>
        </tr>
    </tbody>
    <script>
        loadDivAsync('menu', 'http://127.0.0.1/files/html/settings/design.php')
    </script>
</table>