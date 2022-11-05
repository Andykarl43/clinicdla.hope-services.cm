<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {

// strtoupper($_POST['nom_quat'])

    $code_guichet = strtoupper($_POST['code_guichet']);
    $numero_bank = strtoupper($_POST['numero_bank']);
    $numero_compte = strtoupper($_POST['numero_compte']);
    $cle_compte = strtoupper($_POST['cle_compte']);
    $propriete_compte = strtoupper($_POST['propriete_compte']);
    $open_close = 0;

    $sql = "INSERT INTO compte_bank (code_guichet,numero_bank,numero_compte,cle_compte,propriete_compte,open_close)
                                  VALUES (?,?,?,?,?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($code_guichet, $numero_bank, $numero_compte, $cle_compte, $propriete_compte, $open_close));

    if ($req) {
        ?>
        <script>
            alert('Le compte a été bien enregistrée.');
            window.location.href = '<?=$liste['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = '<?=$liste['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}
?>