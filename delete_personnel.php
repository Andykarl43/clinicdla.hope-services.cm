<?php
include("first.php");
include('php/navbar_links.php');
include("php/db.php");

// if (isset($_POST['id'])) {
//     $id_personnel = $_POST['id'];
//     // echo $id_personnel;

//     $query = "DELETE FROM personnel WHERE id_personnel='$id_personnel'";
//     $sql = $conn->query($query);


//     if ($sql)
//     {
//         echo "<script>
// alert('Personnel a été supprimé.');
//                 window.location.href='liste_personnel.php?witness=1';
//             </script>";
//     }
//     else
//     {

//         echo "<script>
// alert('Personnel n\'a pas été supprimé.');
//                 window.location.href='liste_personnel.php?witness=-1';
//             </script>";
//     }
// }

if ($_POST) {


    /*--------------------------------- ETAT INFOS RH -------------------------------------*/
    $id = $_POST['id_personnel'];
    // echo $id;

    $open_close = 1;

    $query1 = " UPDATE personnel SET  open_close=:open_close    
                    WHERE id_personnel= '$id' ";


    $sql1 = $db->prepare($query1);

    // Bind parameters to statement
    $sql1->bindParam(':open_close', $open_close);
    $sql1->execute();


    if ($sql1) {
        ?>
        <script>
            window.location.href = '<?=$personnel['option2_link']?>?witness=1';
        </script>
        <?php
    } else {
        ?>
        <script>

            window.location.href = '<?=$personnel['option2_link']?>?witness=-1';
        </script>
        <?php

    }


}

?>
