<p>Numéro de série:
<?php
$serial = array();
exec("sudo cat /proc/cpuinfo | grep Serial | cut -d ' ' -f 2", $serial);
echo $serial[0];
?></p>
<p>Model: LVL Central v1</p>
<p>Version logiciel: 0.0.7.15</p>
<p>Mise à jour de sécurité logiciel: 7 Juin 2019</p>
<p>Build: 2019.6.7.1104</p>