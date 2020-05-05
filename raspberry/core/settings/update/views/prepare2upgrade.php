<div class="modal-body">
    <h1>Préparation de la mise à jour...</h1>
    <p>Mise à jour dans: <span id="prepare2upgrade"></span></p>
    <div class="progress-bar"><div id="prog" class="progress"></div></div>
    <button class="cancelUpdate" onclick="cancelUpdate()">Annuler</button>
    <button class="forceUpdate" onclick="temps = 5;">Faire la maj mtn</button>
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
    .cancelUpdate {
        background-color: #c0392b;
        width: 150px;
        height: 50px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: #c0392b solid 1px;
        color: #fff;
    }
</style>
<script>
    var temps = 90;
    var tempsmax = 90;
    var preparation = setInterval(function () {
        if (temps===0) window.location.href = "http://127.0.0.1/core/settings/update/views/upgrading.php";
        else {
            temps--;
            document.getElementById('prepare2upgrade').innerText = temps + "s";
            document.getElementById('prog').style.width = (temps / tempsmax) * 100 + "%";
        }
    }, 1000);
    function cancelUpdate() {
        clearInterval(preparation);
        document.getElementById('modalupdate').style.display = 'none';
    }
</script>