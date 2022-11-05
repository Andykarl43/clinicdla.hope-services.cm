<?php

if (isset($_POST['submit_update_user']) != "") {
    $id_user = $_POST['id_user'];
    $salle = $_POST['salle'];
    $secteur = $_POST['secteur'];

    try {
        // Create prepared statement info project
        if ($salle != "" && $secteur != "") {
            $query = "UPDATE users SET salle=:salle, secteur=:secteur WHERE id_users =:id_user";

            $req = $db->prepare($query);

            // Bind parameters to statement
            $req->bindParam(':salle', $salle);
            $req->bindParam(':secteur', $secteur);
            $req->bindParam(':id_user', $id_user);

            $req->execute();

            if ($req) {
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

        if ($salle == "") {
            $query = "UPDATE users SET secteur=:secteur WHERE id_users =:id_user";

            $req = $db->prepare($query);

            // Bind parameters to statement
            $req->bindParam(':secteur', $secteur);
            $req->bindParam(':id_user', $id_user);

            $req->execute();

            if ($req) {
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

        if ($secteur == "") {
            $query = "UPDATE users SET salle=:salle WHERE id_users =:id_user";

            $req = $db->prepare($query);

            // Bind parameters to statement
            $req->bindParam(':salle', $salle);
            $req->bindParam(':id_user', $id_user);

            $req->execute();

            if ($req) {
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

    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>
