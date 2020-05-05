<?php
require 'update/update.php';
$updater = new update();
$check = $updater->check();
echo "\nVersion: " . $check->version;
echo "\nUrl de la maj: " . $check->url;
echo "\nTaille: " . $check->size;

echo "\nMaj !\n";