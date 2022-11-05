<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    $nom = strtoupper($_POST['nom']);
    $open_close = 0;
    $i = 0;

    $query = "SELECT  count(id_poste) as total from poste where  nom='" . $nom . "'   ";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tables as $table) {
        $total = $table['total'];
        echo $total;

    }
    $iResult = $db->query("SELECT  count(id_poste) as total from poste  ");

    while ($data = $iResult->fetch()) {

        $i = $data['total'];
        echo $i;


    }
    if ($total == 0) {
        $id_poste = $i + 1;

        $sql = "INSERT INTO poste (nom,id_poste,open_close)
                                  VALUES (?,?,?)";
        $req = $db->prepare($sql);
        $req->execute(array($nom, $id_poste, $open_close));

        if ($req) {
            ?>
            <script>
                alert('Poste a été bien enregistrée.');
                // window.location.href='<?=$liste['option5_link']?>?witness=1';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Error.');
                window.location.href = '<?=$liste['option5_link']?>?witness=-1';
            </script>
            <?php

        }
    } elseif ($total == 1) {
        $open_close = 0;

        $query1 = " UPDATE poste SET  open_close=:open_close WHERE  nom='" . $nom . "' ";

        $sql1 = $db->prepare($query1);
        $sql1->bindParam(':open_close', $open_close);
        $sql1->execute();

    } else {
        ?>
        <script>
            alert('Poste existe déjà.');
            // window.location.href='<?=$liste['option5_link']?>?witness=-1';
        </script>
        <?php


    }


}
?>