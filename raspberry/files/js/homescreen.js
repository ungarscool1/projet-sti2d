function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    // add a zero in front of numbers<10
    m = checkTime(m);
    document.getElementById('time').innerHTML = h + ":" + m;
    t = setTimeout(function() {
        startTime()
    }, 1000);
}
startTime();
updateMain("light");


function updateMain(tab) {
    var url = "http://" + window.location.hostname + ":" + window.location.port;
    if (tab === "light") {
        loadDivAsync("main", url  + "/files/html/lightCtrl.php");
    } else if (tab === "window") {
        loadDivAsync("main", url  + "/files/html/windowCtrl.php");
    } else if (tab === "shutter") {
        loadDivAsync("main", url  + "/files/html/shutterCtrl.php");
    } else if (tab === "settings") {
        loadDivAsync("main", url + "/files/html/settings.php")
    }
}

function loadDivAsync(div, url) {
    $.ajax({
        async: true,
        type: "GET",
        url: url,
        data: null,
        success: function (html) {
            $("#" + div).html(html);
        },
        error: function () {
            loadDivAsync(div, url);
        }
    });
}

function updateFrame() {
    var url = "http://" + window.location.hostname + ":" + window.location.port;
    loadDivAsync("lumBadge", url + "/core/lumieres/counter.php");
    loadDivAsync("volBadge", url + "/core/volets/counter.php");
    loadDivAsync("fenBadge", url + "/core/fenetres/counter.php");
    loadDivAsync("wifi", url + "/files/html/signalStrengh.php");

    t = setTimeout(function() {
        updateFrame();
    }, 10000);
}
updateFrame();