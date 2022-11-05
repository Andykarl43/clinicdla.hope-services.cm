<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>

<?php

if ($_POST) {


    // strtoupper($_POST['nom_quat']);
    $nom1 = strtolower($_POST['nom']);
    $nom2 = ucwords($nom1);
    $nom3= trim( $nom1,  $characters = " \n\r\t\v\x00");

    // echo $nom2;
    $open_close = 0;
    $cpt=0;

    $query = "SELECT * from lits where open_close!=1  ";
    $q = $db->query($query);
    while($row = $q->fetch())
    {
        $inits =strtolower(trim( $row['nom'],  $characters = " \n\r\t\v\x00"));
        if($inits == $nom3){
            $cpt++;
        }

    }

    if($cpt==0){
        $sql = "INSERT INTO lits (nom)
                                  VALUES (?)";
        $req = $db->prepare($sql);
        $req->execute(array($nom2));

    }else{
        ?>
        <script>
            window.location.href = 'nouveau_lit.php?witness=-2';
        </script>
        <?php
    }


    if ($req) {
        ?>
        <script>

            window.location.href = 'nouveau_lit.php?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>
            window.location.href = 'nouveau_lit.php?witness=-1';
        </script>
        <?php

    }


}
?>