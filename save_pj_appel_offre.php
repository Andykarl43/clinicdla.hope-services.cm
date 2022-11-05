<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");
?>
<?php

if ($_POST) {
    $id = $_POST['id_offre'];
    $date_pj = date('y-m-d');


    if (!empty(($_FILES))) {

        $file_count = count($_FILES['fichier']);
        $autorized_extensions = array('.DOCX', '.docx', '.DOC', '.doc', '.PPTX', '.pptx', '.XLSX', '.xlsx', '.CSV', '.csv', '.pdf', '.PDF', '.jpeg', '.JPEG', '.jpg', '.JPG');

        // echo 'counter : ' . $file_count . '<br/>';

        // for ($i = 0; $i < $file_count; $i++) {
        $file_name = $_FILES['fichier']['name']; //[$i];

        $file_extension = strrchr($file_name, ".");
        $file_content = $_FILES['fichier']['tmp_name']; //[$i];
        $file_size = $_FILES['fichier']['size']; //[$i];
        $file_dest = 'files/' . $file_name;

        // if ($i == 1 || $i == 4) {
        //     $date_signature = $_POST['date_signature_' . $i];
        //     $date_reception = date("Y-m-s");
        // }
        // if ($i == 2 || $i == 3) {
        //     $date_signature = date("Y-m-s");
        //     $date_reception = date("Y-m-s");
        // }
        // if ($i == 0) {
        //     $date_signature = $_POST['date_signature_' . $i];
        //     $date_reception = $_POST['date_reception_' . $i];
        // }

//            echo 'File '.$i.' : '.$file_name.'<br/>';
//            echo '-> : '.$file_extension.'<br/>';
//            echo '-> : '.$file_content.'<br/>';
//            echo '-> : '.$file_size.'<br/>';
//            echo '-> : '.$file_dest.'<br/>';

        if (in_array($file_extension, $autorized_extensions)) {
            if ((move_uploaded_file($file_content, $file_dest) && ($_FILES['fichier']['error'] == 0))) {
                // save dans la table pièce jointe
                $stmp = "INSERT INTO pj_appel_offre(id_offre, nom_pj, lien,date_pj)
                                                VALUES('$id','$file_name', '$file_dest','$date_pj')";
                $sql = $db->query($stmp);

                // $etat = "UPDATE etat_academique SET  nom_pj=:file_name, lien=:file_dest
                // where id_perso ='$id' and  ";
                // $req = $db->prepare($etat);
                //         $req->bindParam(':file_name', $file_name);
                //         $req->bindParam(':file_dest', $file_dest);
                //          $req->execute();

                // $stmp = "INSERT INTO pj_etat_academique(id_personnel, nom_pj, lien)
                //                         VALUES('$id','$file_name', '$file_dest')";
                // $sql = $conn->query($stmp);

                // echo "<div class='alert alert-success'>File " . $i . " have been saved !</div><br/>";
            } else {
                // echo "<div class='alert alert-danger'>File " . $i . " have not been saved !</div><br/>";
            }

        } else {
            // echo "<div class='alert alert-danger'>Type de document N°" . $i . " pas autorisé ! (docx, xlsx, pptx, csv,jpeg, jpg et pdf). Vous devez choisir au moins un document autorisé sinon l'enregistrement ne se fera pas.</div>";
        }
        //  }
    }

    if ($id) {
        ?>
        <script>
            alert('Pièce(s) jointe(s) a été bien enregistrée.');
            window.location.href = 'details_offre.php?id=<?=$id?>';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error.');
            window.location.href = 'details_offre.php?id=<?=$id?>';
        </script>
        <?php

    }


}
?>