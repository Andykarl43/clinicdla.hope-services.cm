<?php

try {
    // $db = new PDO('mysql:host=localhost;dbname=apfood_syges_btp;charset=utf8', 'apfood_syges_btp_root', 'jk5N{^-&znT{');
    $db = new PDO('mysql:host=localhost;dbname=apfood_st_syges;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
?>