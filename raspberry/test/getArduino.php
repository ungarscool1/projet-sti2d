<?php
$returns = array();
exec("arp -a", $returns);

if ($returns[0] != null) {
    echo "Connecté";
} else {
    echo "Déconnecté";
}