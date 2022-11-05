<?php

require('fpdf/fpdf.php');
try {
    $db = new PDO('mysql:host=localhost;dbname=apfood_syges_btp;charset=utf8', 'root', '');

} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}

$id = $_REQUEST['id'];

// function dateDifference($start_date, $end_date)
// {
//     // calulating the difference in timestamps
//     $diff = strtotime($start_date) - strtotime($end_date);

//     $start_y = date("Y",strtotime($start_date));
//     $start_m  = date("m",strtotime($start_date));
//     $start_d  = date("d",strtotime($start_date));

//     $end_y = date("Y",strtotime($end_date));
//     $end_m = date("m",strtotime($end_date));
//     $end_d = date("d",strtotime($end_date));

//     if($start_y == $end_y AND $start_m == $end_m AND $start_d > $end_d){
//         return -1;
//     }
//     if($start_y == $end_y AND $start_m > $end_m){
//         return -1;
//     }
//     if($start_y > $end_y){
//         return -1;
//     }

//     // 1 day = 24 hours
//     // 24 * 60 * 60 = 86400 seconds
//     return ceil(abs($diff / 86400));
// }

if (!empty($id)) {
    $id_ch = $_REQUEST['id'];

    $query = "SELECT DISTINCT count(id_regle_client) as total from regle_client where id_regle_client='$id_ch' ";
    $q = $db->query($query);
    while ($row = $q->fetch()) {

        $total = $row['total'];
    }

    $query = "SELECT * from regle_client where id_regle_client=$id_ch";
    $q = $db->query($query);
    while ($row = $q->fetch()) {

        $id_regle_client = $row['id_regle_client'];
        $id_client = $row['id_client'];
        $id_choix = $row['id_choix'];
        $type = $row['type'];
        $montant = $row['montant'];
        $id_mode_paiement = $row['id_mode_paiement'];
        $id_card_bank = $row['id_card_bank'];
        $avance = $row['avance'];
        $date_transaction = $row['date_transaction'];
        $reste = $row['reste'];


        $sql = "SELECT DISTINCT * from client where id_client = '$id_client'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {

            $ref_client = $table['ref_client'];
            $raison_social_client = $table['raison_social_client'];
            $tel_client = $table['tel_client'];
            $pers_contact_client = $table['pers_contact_client'];
            $tel_client = $table['tel_client'];
            $ville_client = $table['ville_client'];
            $email_client = $table['email_client'];
        }

        if ($type == 'A') {
            $sql = "SELECT DISTINCT * from appel_offre where id_offre = '$id_choix'";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($tables as $table) {
                $ref = $table['ref_offre'];
                $objet = 'Objet: ' . $table['objet'];
                $info1 = 'N/A';
                $info2 = 'N/A';
            }

        } elseif ($type == 'M') {
            $sql = "SELECT DISTINCT * from marche where id_marche = '$id_choix'";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($tables as $table) {
                $ref = $table['ref_marche'];
                $objet = 'Objet: ' . $table['objet_marche'];
                $info1 = 'N/A';
                $info2 = 'N/A';
            }


        } else {
            $sql = "SELECT DISTINCT * from chantier where id_chantier = '$id_choix'";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($tables as $table) {
                $ref = $table['objet_chantier'];
                $objet = 'Nom du chantier: ' . $table['nom_chantier'];
                $info1 = 'tel: ' . $table['tel_chantier'];
                $info2 = 'adresse: ' . $table['adresse_chantier'];
            }

        }


    }

    // $duree = dateDifference($dd,$df);
    // $qte = (int) ($duree/30);
    // $prix = $mensualite/30 * $duree;
}

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // GFG logo image
        $this->Image('img/logo.jpeg', 10, 6, 80);

        // Set font-family and font-size
        $this->SetFont('Times', 'B', 20);

        // Move to the right
        $this->Cell(20);

        // Set the title of pages.
        $this->Cell(30, 20, ' ', 0, 2, 'C');

        // Break line with given space
        $this->Ln(5);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Set font-family and font-size of footer.
        $this->SetFont('Arial', 'I', 8);

        // set page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() .
            '/{nb}', 0, 0, 'C');
    }
}

$date = date("d/m/Y");

// Create new object.
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();

// Add new pages
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial', 'B', 14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130, 5, $raison_social_client, 0, 0);
$pdf->Cell(59, 5, 'FACTURE', 0, 1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(130, 5, $ville_client, 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(34, 5, $date, 0, 1);//end of line


$pdf->Cell(130, 5, $email_client, 0, 0);
// $pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(25, 5, 'Facture #', 0, 0);
$pdf->Cell(34, 5, $total, 0, 1);

$pdf->Cell(130, 5, 'Phone: ' . $tel_client, 0, 0);
//end of line

// $pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25, 5, 'N. client', 0, 0);
$pdf->Cell(34, 5, $ref, 0, 1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1);//end of line

//billing address
$pdf->Cell(100, 5, 'Information client', 0, 1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $objet, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $info1, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $info2, 0, 1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,$tel,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1);//end of line

//invoice contents
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(45, 5, 'Module', 1, 0, 'C');
$pdf->Cell(45, 5, 'Montant (Fcfa)', 1, 0, 'C');
$pdf->Cell(45, 5, 'Avance (Fcfa)', 1, 0, 'C');
$pdf->Cell(45, 5, 'Reste (Fcfa)', 1, 1, 'C');//end of line

$pdf->SetFont('Arial', '', 12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(45, 5, 'ACCES', 1, 0, 'C');
$pdf->Cell(45, 5, number_format($montant), 1, 0, 'C');
$pdf->Cell(45, 5, number_format($avance), 1, 0, 'C');
$pdf->Cell(45, 5, number_format($reste), 1, 1, 'C');//end of line


$pdf->Output();

?>

