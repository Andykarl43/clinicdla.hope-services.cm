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

    $query = "SELECT * from chantier where id_chantier=$id_ch";
    $q = $db->query($query);
    while ($row = $q->fetch()) {

        $id_chantier = $row['id_chantier'];
        $ref_marche = $row['ref_marche'];
        $nom_chantier = $row['nom_chantier'];
        $montant_ttc_marche = $row['montant_ttc_marche'];
        $id_personnel = $row['id_personnel'];
        $id_pers_pointeur = $row['id_pers_pointeur'];
        $dure_chantier = $row['dure_chantier'];
        $etat = $row['etat'];


        $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_personnel'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $nom_pre1 = $table['nom'] . ' ' . $table['prenom'];
        }

        $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_pers_pointeur'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $nom_pre2 = $table['nom'] . ' ' . $table['prenom'];
        }

        if ($etat == 1) {

            $etat1 = "Achevé";

        } else {
            $etat1 = "En cours";

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

$pdf->Cell(130, 5, $id_chantier, 0, 0);
$pdf->Cell(59, 5, 'FACTURE', 0, 1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(130, 5, $ref_marche, 0, 0);
$pdf->Cell(59, 5, '', 0, 1);//end of line

$pdf->Cell(130, 5, $nom_chantier, 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(34, 5, $date, 0, 1);//end of line

$pdf->Cell(130, 5, 'Montant: ' . $montant_ttc_marche, 0, 0);
$pdf->Cell(25, 5, 'Facture #', 0, 0);
$pdf->Cell(34, 5, $id_chantier, 0, 1);//end of line

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Chef chantier', 0, 0);
$pdf->Cell(34, 5, $nom_pre1, 0, 1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1);//end of line

//billing address
$pdf->Cell(100, 5, 'Pointeur', 0, 1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $nom_pre2, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $dure_chantier, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $etat1, 0, 1);


$pdf->Output();

?>

