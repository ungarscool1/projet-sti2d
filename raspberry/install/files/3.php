<?php
if ($_POST) {
    $configFile = __DIR__ . "/../../config.php";
    $code = $_POST['code'];
    file_put_contents($configFile, str_replace("code = null", "code = " . $code, file_get_contents($configFile)));
    file_put_contents($configFile, str_replace("lockTime = null", "lockTime = " . $_POST['lockTime'], file_get_contents($configFile)));
    header("Location: index.php?step=4");
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Installation 3/6</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="background-color: #2c3e50;">
<center>
    <div class="thumbnail" style="position: absolute; top: 25vh; left: 15vw; width: 360px; min-width: 360px; min-height: 295px; height: 295px; border-radius: 20px;">
        <div class="caption">
            <h1 style="margin-bottom: 0px;">Configurer un code</h1>
            <small style="text-align: left; margin: 0 0 50px 0;">ou <a href="?step=4" style="color: #95a5a6;">Ignorez</a></small>
            <br><br>
            <form action="#" method="post">
                <div id="lock" style="display: none; width: 100vw; height: 100vh; background-color: #2c3e50; color: #fff; font-family: 'Roboto', sans-serif; font-weight: 300;">
                    <div id="lock.unlock" class="lock-unlock">
                        <input type="password" class="lock-unlock-code" name="code" disabled id="lock.unlock.code" value=""/>
                        <table class="lock-unlock-keypad">
                            <thead></thead>
                            <tbody>
                            <tr>
                                <th><button class="lock-unlock-btn-num" onclick="addNumToCode(1)">1</button></th>
                                <td><button class="lock-unlock-btn-num" onclick="addNumToCode(2)">2</button></td>
                                <td><button class="lock-unlock-btn-num" onclick="addNumToCode(3)">3</button></td>
                            </tr>
                            <tr>
                                <th><button class="lock-unlock-btn-num" onclick="addNumToCode(4)">4</button></th>
                                <td><button class="lock-unlock-btn-num" onclick="addNumToCode(5)">5</button></td>
                                <td><button class="lock-unlock-btn-num" onclick="addNumToCode(6)">6</button></td>
                            </tr>
                            <tr>
                                <th><button class="lock-unlock-btn-num" onclick="addNumToCode(7)">7</button></th>
                                <td><button class="lock-unlock-btn-num" onclick="addNumToCode(8)">8</button></td>
                                <td><button class="lock-unlock-btn-num" onclick="addNumToCode(9)">9</button></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><button class="lock-unlock-btn-num" onclick="addNumToCode(0)">0</button></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</center>
<script>
    function addNumToCode(number) {
        var curCode = document.getElementById("lock.unlock.code").value + number;
        document.getElementById("lock.unlock.code").value = curCode;
        console.log("Mdp: "+curCode);
        if (curCode.length===4) {

        }
    }
</script>
</body>
</html>