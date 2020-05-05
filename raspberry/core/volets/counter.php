<?php
require __DIR__ . "/../core.php";
$lumieres = $db->prepare("SELECT id FROM devices WHERE type = 'Klep' AND status = 1");
$lumieres->execute();
echo $lumieres->rowCount();