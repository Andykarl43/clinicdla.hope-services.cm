<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    // strtoupper($_POST['nom_quat']);
    $prix_t_exa = $_POST['prix_t_exa'];
    $id_cat_exa = $_POST['id_cat_exa'];
    $nom1 = strtolower($_POST['nom']);
    $nom2 = ucwords($nom1);
    // echo $nom2;
    $open_close = 0;

    $sql = "INSERT INTO type_exa (nom,prix_t_exa,id_cat_exa)
                                  VALUES (?,?,?)";
    $req = $db->prepare($sql);
    $req->execute(array($nom2,$prix_t_exa,$id_cat_exa));


    if ($req) {
        ?>
        <script>

                          window.location.href = 'liste_type_examen.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
                        window.location.href = 'liste_type_examen.php?witness=-1';
        </script>
        <?php

    }


}
?>