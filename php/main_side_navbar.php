<?php
include('navbar_links.php');

?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!--     <div class="sb-sidenav-menu-heading">Acceuil</div> -->
                    <a class="nav-link " href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Tableau de Bord
                    </a>

                    <!--  <div class="sb-sidenav-menu-heading">Utilitaires</div> -->
                    <?php
                    if($lvl == 3 || $lvl == 4 || $lvl == 5 || $lvl == 8 || $lvl == 9 || $lvl == 7 || $lvl == 11  ){
                    ?>

                    <!--****************************************CORPS MEDICAL****************************************-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages45"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="<?= $corps_medical['icon'] ?>"></i></div>
                        <?= $corps_medical['title'] ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages45" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                    <!--*******************************************MENU ENTITEES****************************************-->
                    <?php
                    if($lvl == 3 || $lvl == 4 || $lvl == 5 || $lvl == 8 || $lvl == 9 || $lvl == 7 || $lvl ==11 ){
                    ?>


                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError10"
                       aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $speciale['icon'] ?>"></i></div>
                        <?= $speciale['title'] ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError10" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav nav accordion" id="sidenavAccordionPages" >

                            <!--***************Médecin***********************-->
                            <?php
                            if($lvl == 4 || $lvl == 5 || $lvl == 7 || $lvl ==11 ){
                            ?>

                            <a class="nav-link collapsed" href="<?= $medecin['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $medecin['icon'] ?>"></i></div>
                                <?= $medecin['title'] ?>
                            </a>
                            <?php }?>

                            <!--***************Nurse***********************-->
                            <?php
                            if($lvl == 3 || $lvl == 4 || $lvl == 7 || $lvl ==11 ){
                            ?>

                            <a class="nav-link collapsed" href="<?= $nurse['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $nurse['icon'] ?>"></i></div>
                                <?= $nurse['title'] ?>
                            </a>
                            <?php }?>


                            <!--***************chirugien***********************-->
                            <?php
                            if($lvl == 4 || $lvl == 8 || $lvl == 7 || $lvl ==11 ){
                            ?>

                            <a class="nav-link collapsed" href="<?= $chirugien['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $chirugien['icon'] ?>"></i></div>
                                <?= $chirugien['title'] ?>
                            </a>
                            <?php }?>


                            <!--***************laboratin***********************-->
                            <?php
                            if($lvl == 4 || $lvl == 9 || $lvl == 7 || $lvl ==11 ){
                            ?>


                            <a class="nav-link collapsed" href="<?= $laboratin['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $laboratin['icon'] ?>"></i></div>
                                <?= $laboratin['title'] ?>
                            </a>
                            <?php }?>



                        </nav>
                    </div>
                    <?php
                    }
                    ?>

                    <?php
                    if( $lvl == 4  || $lvl == 7 || $lvl ==11 ){
                        ?>

                        <!--***************personnel***********************-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError11"
                               aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $generaliste['icon'] ?>"></i></div>
                                <?= $generaliste['title'] ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError11" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav nav accordion" id="sidenavAccordionPages" >


                                    <a class="nav-link collapsed" href="<?= $personnel['option2_link'] ?>" aria-expanded="false"
                                       aria-controls="pagesCollapseError">
                                        <div class="sb-nav-link-icon"><i class="<?= $personnel['icon'] ?>"></i></div>
                                        <?= $personnel['title'] ?>
                                    </a>
                                </nav>
                            </div>
                        <?php
                    }
                    ?>
                        </nav>
                    </div>
                    <?php }?>

                    <?php
                    if($lvl != 10  ){
                    ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="<?= $entite['icon'] ?>"></i></div>
                        <?= $entite['title'] ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages2" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                            <!--***************Patient***********************-->
                            <?php
                            if($lvl != 6 ){
                            ?>

                            <a class="nav-link collapsed" href="<?= $patient['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $patient['icon'] ?>"></i></div>
                                <?= $patient['title'] ?>
                            </a>
                            <?php
                            }
                            ?>
                            
                            <?php
                           /// if($lvl == 4 || $lvl == 7  ){
                            ?>

                            <!--<a class="nav-link collapsed" href="<?= $entreprise['option2_link'] ?>" aria-expanded="false"-->
                            <!--   aria-controls="pagesCollapseError">-->
                            <!--    <div class="sb-nav-link-icon"><i class="<?= $entreprise['icon'] ?>"></i></div>-->
                            <!--    <?= $entreprise['title'] ?>-->
                            <!--</a>-->

                            <!--<a class="nav-link collapsed" href="<?= $assurances['option2_link'] ?>" aria-expanded="false"-->
                            <!--   aria-controls="pagesCollapseError">-->
                            <!--    <div class="sb-nav-link-icon"><i class="<?= $assurances['icon'] ?>"></i></div>-->
                            <!--    <?= $assurances['title'] ?>-->
                            <!--</a>-->
                                <?php
                        //    }
                            ?>


                             <!--***************Fournisseurs***********************-->
                            <?php
                            if($lvl == 4 || $lvl == 6 || $lvl == 7 || $lvl ==11  ){
                            ?>

                            <a class="nav-link collapsed" href="<?= $fournisseur['option2_link'] ?>"
                               aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $fournisseur['icon'] ?>"></i></div>
                                <?= $fournisseur['title'] ?>
                            </a>
                                <?php
                            }
                            ?>

                        </nav>
                    </div>
                        <?php
                    }
                    ?>





                    <!--***************Appointment***********************-->
                    <?php
                    if($lvl != 2 and $lvl != 6 and $lvl != 10 and $lvl != 11 and $lvl != 2){
                        ?>

                    <a class="nav-link collapsed" href="<?= $appointment['option2_link'] ?>" aria-expanded="false"
                       aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $appointment['icon'] ?>"></i></div>
                        <?= $appointment['title'] ?>
                    </a>
                        <?php
                    }
                    ?>


                    <?php
                    if($lvl != 10  and $lvl != 6 and $lvl !=1 and $lvl != 11   ){
                    ?>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="<?= $service['icon'] ?>"></i></div>
                        <?= $service['title'] ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages5" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                    <!--***************consultation***********************-->
                            <?php
                            if( $lvl != 9 and $lvl !=8 ){
                            ?>
                    <a class="nav-link collapsed" href="<?= $consultation['option2_link'] ?>" aria-expanded="false"
                       aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $consultation['icon'] ?>"></i></div>
                        <?= $consultation['title'] ?>
                    </a>
                            <?php }?>


                    <!--***************Examen***********************-->
                            <?php
                            if($lvl == 2 || $lvl == 9 || $lvl == 4 || $lvl == 7 ||  $lvl == 5 ||  $lvl == 11 ||  $lvl == 12){
                            ?>


                    <a class="nav-link collapsed" href="<?= $examen['option2_link'] ?>" aria-expanded="false"
                       aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $examen['icon'] ?>"></i></div>
                        <?= $examen['title'] ?>
                    </a>

                            <?php }?>

                                <?php
                                if(  $lvl!=9 and $lvl!=8 ){
                                    ?>

                    <!--***************Hospitalisation***********************-->

                    <a class="nav-link collapsed" href="<?= $hospitalisation['option2_link'] ?>" aria-expanded="false"
                       aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $hospitalisation['icon'] ?>"></i></div>
                        <?= $hospitalisation['title'] ?>
                    </a>
                                <?php }?>

                                    <?php
                                    if( $lvl!=9 and $lvl!=3 ){
                                        ?>

                    <!--***************Equipements***********************-->

                    <a class="nav-link collapsed" href="<?= $operation['option2_link'] ?>" aria-expanded="false"
                       aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $operation['icon'] ?>"></i></div>
                        <?= $operation['title'] ?>
                    </a>
                    <!--*****************anesthésie*********************-->

                    <a class="nav-link collapsed" href="<?= $anesthesie['option2_link'] ?>" aria-expanded="false"
                       aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $anesthesie['icon'] ?>"></i></div>
                        <?= $anesthesie['title'] ?>
                    </a>
                    <!--*****************Ecographie*********************-->

                    <a class="nav-link collapsed" href="<?= $ecographie['option2_link'] ?>" aria-expanded="false"
                       aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $ecographie['icon'] ?>"></i></div>
                        <?= $ecographie['title'] ?>
                    </a>


                            <?php }?>

                    </nav>
                </div>
                        <?php
                    }
                    ?>

                    <?php
                    if( $lvl == 2 || $lvl == 4 || $lvl == 7 || $lvl == 5 || $lvl == 10  || $lvl == 12 ){
                        ?>
                    <!--***************Ordonnance***********************-->

                    <a class="nav-link collapsed" href="<?= $ordonnance['option2_link'] ?>" aria-expanded="false"
                       aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="<?= $ordonnance['icon'] ?>"></i></div>
                        <?= $ordonnance['title'] ?>
                    </a>
                        <?php
                    }
                        ?>



                    <?php
                    if($lvl == 2 || $lvl == 4 ||  $lvl == 7 || $lvl == 11 || $lvl == 12 ){
                    ?>

                    <!---------------********************* REGLEMENT ********************----------------->

                    <!-- <div class="sb-sidenav-menu-heading">Mon Espace</div> -->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages6"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="<?= $liste_fact['icon'] ?>"></i></div>
                        <?= $liste_fact['title'] ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages6" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                            <a href="<?= $liste_fact['option1_link'] ?>"
                               class="nav-link"><?= $liste_fact['option1_name'] ?></a>
                            <a href="<?= $liste_fact['option2_link'] ?>"
                               class="nav-link"><?= $liste_fact['option2_name'] ?></a>
                            <a href="<?= $liste_fact['option3_link'] ?>"
                               class="nav-link"><?= $liste_fact['option3_name'] ?></a>
                            <a href="<?= $liste_fact['option4_link'] ?>"
                               class="nav-link"><?= $liste_fact['option4_name'] ?></a>
                            <a href="<?= $liste_fact['option5_link'] ?>"
                               class="nav-link"><?= $liste_fact['option5_name'] ?></a>
                            <a href="<?= $liste_fact['option6_link'] ?>"
                               class="nav-link"><?= $liste_fact['option6_name'] ?></a>
                            <a href="<?= $liste_fact['option7_link'] ?>"
                               class="nav-link"><?= $liste_fact['option7_name'] ?></a>

                        </nav>
                    </div>
                        <?php
                    }
                    ?>

                   

                    <?php
                    if($lvl == 4 || $lvl == 6 ||  $lvl == 10 || $lvl == 11  ){
                    ?>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="<?= $mag['icon'] ?>"></i></div>
                        <?= $mag['title'] ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages3" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                           

                            <!--***************Produits***********************-->

                            <a class="nav-link collapsed" href="<?= $produit['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $produit['icon'] ?>"></i></div>
                                <?= $produit['title'] ?>
                            </a>
                            <?php
                            if($lvl == 4 || $lvl == 6 ||  $lvl == 10 ){
                            ?>

                            <!--***************Categories***********************-->

                            <a class="nav-link collapsed" href="<?= $cat_prod['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $cat_prod['icon'] ?>"></i></div>
                                <?= $cat_prod['title'] ?>
                            </a>
                             <?php } ?>

                            <!--***************Categories***********************-->

                            <!-- <a class="nav-link collapsed" href="<?= $four_prod['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $four_prod['icon'] ?>"></i></div>
                                <?= $four_prod['title'] ?>
                            </a> -->
                            <?php
                            if($lvl == 4 || $lvl == 6 || $lvl == 11 ){
                            ?>
                            <!--***************Magasin***********************-->

                            <a class="nav-link collapsed" href="<?= $mag_centrale['option2_link'] ?>"
                               aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $mag_centrale['icon'] ?>"></i></div>
                                <?= $mag_centrale['title'] ?>
                            </a>
                            <?php } ?>

                            <?php
                            if($lvl == 4 || $lvl == 10 || $lvl == 11 ){
                            ?>
                            <!--***************Pharmacie***********************-->

                            <a class="nav-link collapsed" href="<?= $mag_phar['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $mag_phar['icon'] ?>"></i></div>
                                <?= $mag_phar['title'] ?>
                            </a>

                            <?php } ?>
                            <!--***************Commande***********************-->
                            <?php
                            if($lvl == 4 || $lvl == 6 || $lvl == 11  ){
                            ?>

                            <a class="nav-link collapsed" href="<?= $commande['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $commande['icon'] ?>"></i></div>
                                <?= $commande['title'] ?>
                            </a>
                            <?php } ?>

                            <?php
                            if($lvl == 4 || $lvl == 10 || $lvl == 6   ){
                                ?>

                            <!--***************DEMANDE PRODUIT***********************-->

                            <a class="nav-link collapsed" href="<?= $demande_produit['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $demande_produit['icon'] ?>"></i></div>
                                <?= $demande_produit['title'] ?>
                            </a>
                            <?php } ?>
                        </nav>
                    </div>
                        <?php
                    }
                    ?>

                    <?php
                    if($lvl == 2 || $lvl == 4 ||  $lvl == 7 || $lvl == 11 || $lvl == 12){
                    ?>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages30"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="<?= $tresorie['icon'] ?>"></i></div>
                        <?= $tresorie['title'] ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages30" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                            <!--***************Transfert-Caisse***********************-->


                            <a class="nav-link collapsed" href="<?= $caisse['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $caisse['icon'] ?>"></i></div>
                                <?= $caisse['title'] ?>
                            </a>
                            <?php
                            if( $lvl == 4 ||  $lvl == 7 || $lvl == 11 || $lvl == 12 ){
                            ?>

                            <!--***************Dépense-Caisse***********************-->

                            <a class="nav-link collapsed" href="<?= $depense_caisse['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $depense_caisse['icon'] ?>"></i></div>
                                <?= $depense_caisse['title'] ?>
                            </a>

                            <?php }?>
                            
                            <?php
                            if(  $lvl == 12 ){
                            ?>

                            <!--***************Rapport-Caisse***********************-->

                            <a class="nav-link collapsed" href="<?= $rapport_caisse['option2_link'] ?>" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $rapport_caisse['icon'] ?>"></i></div>
                                <?= $rapport_caisse['title'] ?>
                            </a>

                            <?php }?>

                        </nav>
                    </div>
                    <?php
                    }
                    ?>


                    <!--  <div class="sb-sidenav-menu-heading">Tresoreries</div> -->

                    <!--*******************************************MENU TRESORERIE****************************************-->


                    <!-- <div class="sb-sidenav-menu-heading">Paramètre</div> -->
                    <?php
                    if( $lvl == 4 ||  $lvl == 7 ||  $lvl == 2  || $lvl == 11 || $lvl == 12){
                    ?>

                    <!--**************************Config***************************-->
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages7"
                       aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="<?= $conf['icon'] ?>"></i></div>
                        <?= $conf['title'] ?>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages7" aria-labelledby="headingOne"
                         data-parent="#sidenavAccordion">
                        <?php
                        if( $lvl == 4 ||  $lvl == 7 || $lvl == 2 ){
                        ?>
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                               data-target="#pagesCollapseError012" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                <?= $utilisateur['title'] ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError012" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php
                                    if( $lvl == 4 ||  $lvl == 7 || $lvl == 2 ){
                                    ?>

                                    <a href="<?= $user_list['option1_link'] ?>"
                                       class="nav-link"><?= $user_list['option1_name'] ?></a>
                                    <?php }?>

                                    <?php
                                    if( $lvl == 4 ||  $lvl == 7   ){
                                    ?>
                                    <a href="<?= $user_list['option2_link'] ?>"
                                           class="nav-link"><?= $user_list['option2_name'] ?></a>
                                    <a href="<?= $user_list['option3_link'] ?>"
                                       class="nav-link"><?= $user_list['option3_name'] ?></a>
                                    <?php }?>


                                </nav>
                            </div>
                        </nav>

                        <?php }?>
                        <?php
                        if($lvl == 2 || $lvl == 4 ||  $lvl == 7 || $lvl == 11 || $lvl == 12){
                            ?>
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                               data-target="#pagesCollapseError1" aria-expanded="false"
                               aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="<?= $liste['icon'] ?>"></i></div>
                                <?= $liste['title'] ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError1" aria-labelledby="headingOne"
                                 data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php
                                    if( $lvl == 4 ||  $lvl == 7 ||  $lvl == 2  || $lvl == 11 || $lvl == 12 ){
                                        ?>
                                    <?php
                                    if( $lvl == 4 ||  $lvl == 7  ){
                                        ?>
                                    <a href="<?= $liste['option1_link'] ?>"
                                       class="nav-link"><?= $liste['option1_name'] ?></a>
                                    <a href="<?= $liste['option2_link'] ?>"
                                       class="nav-link"><?= $liste['option2_name'] ?></a>
                                    <a href="<?= $liste['option3_link'] ?>"
                                       class="nav-link"><?= $liste['option3_name'] ?></a>
                                    <a href="<?= $liste['option4_link'] ?>"
                                       class="nav-link"><?= $liste['option4_name'] ?></a>
                                    <a href="<?= $liste['option6_link'] ?>"
                                       class="nav-link"><?= $liste['option6_name'] ?></a>
                                    <a href="<?= $liste['option7_link'] ?>"
                                       class="nav-link"><?= $liste['option7_name'] ?></a>
                                     <a href="<?= $liste['option8_link'] ?>"
                                       class="nav-link"><?= $liste['option8_name'] ?></a>
                                    <a href="<?= $liste['option9_link'] ?>"
                                       class="nav-link"><?= $liste['option9_name'] ?></a>
                                    <a href="<?= $liste['option10_link'] ?>"
                                       class="nav-link"><?= $liste['option10_name'] ?></a>
                                    <a href="<?= $liste['option21_link'] ?>"
                                       class="nav-link"><?= $liste['option21_name'] ?></a>
                                    <a href="<?= $liste['option22_link'] ?>"
                                       class="nav-link"><?= $liste['option22_name'] ?></a>
                                    <a href="<?= $liste['option14_link'] ?>"
                                       class="nav-link"><?= $liste['option14_name'] ?></a>
                                    <?php }?>

                                    <?php
                                    if( $lvl == 4 ||  $lvl == 7  ){
                                        ?>

                                    <a href="<?= $liste['option11_link'] ?>"
                                       class="nav-link"><?= $liste['option11_name'] ?></a>
                                    <a href="<?= $liste['option12_link'] ?>"
                                       class="nav-link"><?= $liste['option12_name'] ?></a>
                                    <?php } ?>
                                    <?php } ?>
                                    <a href="<?= $liste['option15_link'] ?>"
                                       class="nav-link"><?= $liste['option15_name'] ?></a>
                                    <a href="<?= $liste['option16_link'] ?>"
                                       class="nav-link"><?= $liste['option16_name'] ?></a>
                                    <a href="<?= $liste['option17_link'] ?>"
                                       class="nav-link"><?= $liste['option17_name'] ?></a>
                                    <a href="<?= $liste['option18_link'] ?>"
                                       class="nav-link"><?= $liste['option18_name'] ?></a>
                                    <a href="<?= $liste['option19_link'] ?>"
                                       class="nav-link"><?= $liste['option19_name'] ?></a>
                                    <a href="<?= $liste['option20_link'] ?>"
                                       class="nav-link"><?= $liste['option20_name'] ?></a>
                                       <a href="<?= $liste['option23_link'] ?>"
                                       class="nav-link"><?= $liste['option23_name'] ?></a>

                                </nav>
                            </div>

                        </nav>
                        <?php
                            }
                            ?>
                    </div>
                        <?php
                    }
                    ?>

                </div>
            </div>

            <div class="sb-sidenav-footer">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-center">- Copyright &copy; 2021 - SYGES</div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
