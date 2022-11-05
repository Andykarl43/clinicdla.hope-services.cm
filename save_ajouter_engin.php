<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php")
?>
<?php

if ($_POST) {
    $id_fact_location = $_POST['id_fact_location'];
    $id_engin = $_POST['id_engin'];
    $open_close = 0;

    $id = count($id_engin);
    echo $id . '</br>';


    for ($j = 0; $j < $id; $j++) {

        $i = 0;


        $query = "SELECT * from fact_engin where  id_fact_location='$id_fact_location[$j]' and  id_engin='" . $id_engin[$j] . "'  ";
        $q = $db->query($query);
        while ($row = $q->fetch()) {

            $i = $i + 1;
        }


        if ($id_engin[$j] != "" and $i == 0) {
            $sql = "INSERT INTO fact_engin (id_fact_location, id_engin,open_close)
                                VALUES(:id_fact_location,:id_engin,:open_close)";
            $req = $db->prepare($sql);

            // Bind parameters to statement
            $req->bindParam(':id_fact_location', $id_fact_location);
            $req->bindParam(':id_engin', $id_engin[$j]);
            $req->bindParam(':open_close', $open_close);
            // $req->bindParam(':session', $session[$j]);
            // $req->bindParam(':ecole', $ecole[$j]);
            // $req->bindParam(':mention', $mention[$j]);
            // $req->bindParam(':rang', $j);
            $req->execute();

            //        $query1 = "UPDATE engin SET id_regle_client=:id_regle_client where id_engin = '$id_client[$j]' ";

            // $sql1 = $db->prepare($query1);

            //      // Bind parameters to statement
            //     $sql1->bindParam(':id_regle_client', $id_regle_client);
            //     $sql1->execute();


        }


    }

    if ($id) {
        ?>
        <script>
            alert('Client a été ajouter.');
            window.location.href = 'details_fact_location.php?id=<?=$id_fact_location?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_fact_location.php?id=<?=$id_fact_location?>';
        </script>
        <?php

    }


}
?>