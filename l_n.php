<?php

include('first.php');
include("php/db.php");
include('php/main_side_navbar.php');

?>

    <!--Content-->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><i class="fas fa-user-nurse" style="color: silver"></i> Liste des Infirmières(iers)
                </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Hello M/Mme XXX, il est <?= date("G:i"); ?> en ce jour du <?= dateToFrench("now", "l j F Y"); ?>
                        .
                    </li>
                </ol>
                <div class="row">
                    <div class="col-xl-12">


                        <b>
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" style="float: right;">
                                <li class="nav-item">
                                    <a class="btn btn-primary" href="nouveau_nurse.php">
                                        <i class="fas fa-user-md"></i>
                                        Nouveau infirmière(ier)
                                    </a>
                                </li>
                            </ul>
                        </b>


                    </div>
                </div>
                <div class="col-md-12">
                    <hr/>
                </div>
            </div>
            <!--                Main Body              -->
            <div class="row doctor-grid">
                <?php

                $query = "SELECT * from nurse  order by nom_n,prenom_n asc";
                $q = $db->query($query);
                while ($row = $q->fetch()) {
                    $id_nurse = $row['id_nurse'];
                    $nom_n = $row['nom_n'];
                    $prenom_n = $row['prenom_n'];
                    $id_depart = $row['id_depart'];
                    $phone_n = $row['phone_n'];
                    $ville_n = $row['ville_n'];
                    $region_n = $row['region_n'];
                    // $profession = $row['profession'];

                    ?>
                    <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                                <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-03.jpg"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false"><i
                                        class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="modifier_nurse.php?id=<?=$id_nurse?>"><i
                                            class="fas fa-pen"></i> Edit</a>
                                    <a class="dropdown-item" href="delete_nurse.php?id=<?=$id_nurse?>" onclick="Supp(this.href); return(false);"><i class="fas fa-trash"></i>
                                        Delete</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="details_medecin.php"><?=$prenom_n?></a></h4>
                            <div class="doc-prof"><?php

                                $sql = "SELECT DISTINCT * from departement where id_depart = '$id_depart'";

                                $stmt = $db->prepare($sql);
                                $stmt->execute();

                                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($tables as $table) {
                                    echo $table['nom'];
                                }

                                ?></div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> <?= $region_n .', '. $ville_n?>
                            </div>
                        </div>
                    </div>
                <?php }

                ?>
                <!-- <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-07.jpg"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false"><i
                                        class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">Marie Wells</a></h4>
                        <div class="doc-prof">Psychiatrist</div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> United States, San Francisco
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-04.jpg"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false"><i
                                        class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">Henry Daniels</a></h4>
                        <div class="doc-prof">Cardiologist</div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> United States, San Francisco
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-11.jpg"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false"><i
                                        class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">Mark Hunter</a></h4>
                        <div class="doc-prof">Urologist</div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> United States, San Francisco
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="#"><img alt="" src="assets/img/doctor-thumb-12.jpg"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false"><i
                                        class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">Michael Sullivan</a></h4>
                        <div class="doc-prof">Ophthalmologist</div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> United States, San Francisco
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-02.jpg"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false"><i
                                        class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i
                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">Linda Barrett</a></h4>
                        <div class="doc-prof">Dentist</div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> United States, San Francisco
                        </div>
                    </div>
                </div> -->

            </div>
            <!--                End Body              -->

            <div class="row">
                <div class="col-md-12">
                    <hr/>
                </div>
            </div>

    </div>
    </main>
    </div>
<?php
if (isset($_GET['witness'])) {
    $witness = $_GET['witness'];

    switch ($witness) {
        case '1';
            ?>
            <script>
                Swal.fire(
                    'Succès',
                    'Opération effectuée avec succès !',
                    'success'
                )
            </script>
            <?php
            break;
        case '-1';
            ?>
            <script>
                Swal.fire({
                    icon: 'Erreur',
                    title: 'Oops...',
                    text: 'Une erreur s\'est produite !',
                    footer: 'Reéssayez encore'
                })
            </script>
            <?php
            break;

    }
}
?>


    <!--//Footer-->
<?php
include('foot.php');
?>