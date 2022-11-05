<?php

if (isset($_POST['submit_mdp']) != "") {
    $id_user = $_POST['id_user'];
    $mdp = $_POST['mdp'];
    $mdp = hash('sha256', $mdp);


    $sql = $conn->query("UPDATE users SET password = '$mdp' WHERE id_users=$id_user");

    if ($sql) {
        ?>
        <script>
            Toast.fire({
                icon: 'success',
                title: 'Opération effectuée avec succès'
            })
        </script>
        <?php
    } else {
        ?>
        <script>
            Toast.fire({
                icon: 'error',
                title: 'Error lors de l\'enregistrement'
            })
        </script>
        <?php
    }
}
?>
