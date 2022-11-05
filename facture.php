<?php

require('fpdf/fpdf.php');
try {
    $db = new PDO('mysql:host=localhost;dbname=ch6183b13e1fa50_clinic;charset=utf8', 'ch6183b13e1fa50_clinic_root', '!&bxmMs[KB%l');

} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}

$id = $_REQUEST['id'];

function dateDifference($start_date, $end_date)
{
    // calulating the difference in timestamps
    $diff = strtotime($start_date) - strtotime($end_date);

    $start_y = date("Y", strtotime($start_date));
    $start_m = date("m", strtotime($start_date));
    $start_d = date("d", strtotime($start_date));

    $end_y = date("Y", strtotime($end_date));
    $end_m = date("m", strtotime($end_date));
    $end_d = date("d", strtotime($end_date));

    if ($start_y == $end_y and $start_m == $end_m and $start_d > $end_d) {
        return -1;
    }
    if ($start_y == $end_y and $start_m > $end_m) {
        return -1;
    }
    if ($start_y > $end_y) {
        return -1;
    }

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return ceil(abs($diff / 86400));
}

if (!empty($id)) {
    $id_ab = $_REQUEST['id'];
    $na = 0;

    $query = "SELECT * FROM abonnement WHERE id=$id_ab";
    $q = $db->query($query);
    while ($row = $q->fetch()) {
        $na = $row['na'];
        $dd = $row['date_debut'];
        $df = $row['date_fin'];
        $df_min = date("Y-m-d", strtotime($df));
        $mensualite = $row['mensualite'];
        $module = $row['id_module'];
        $query1 = "SELECT * from services WHERE id = $module";
        $q1 = $db->query($query1);
        while ($row1 = $q1->fetch()) {
            $module = $row1['libelle'];
        }
        $np = $row['np'];
        $query2 = "SELECT * FROM partenaires WHERE np = '$np'";
        $q2 = $db->query($query2);
        while ($row2 = $q2->fetch()) {
            $rs_p = $row2['rs'];
            $quartier_p = $row2['quartier'];
            $ville_p = $row2['ville'];
            $tel_p = $row2['tel'];
            $pays_p = $row2['pays'];
            $rccm = $row2['rccm'];
            $cc = $row2['cc'];
        }
        $query3 = "SELECT * from ville where id=$ville_p";
        $q3 = $db->query($query3);
        while ($row3 = $q3->fetch()) {
            $ville_p = $row3['intitule'];
        }
        $query4 = "SELECT * from pays where id_pays=$pays_p";
        $q4 = $db->query($query4);
        while ($row4 = $q4->fetch()) {
            $pays_p = $row4['intitule_pays'];
        }
        $query5 = "SELECT * from quartier where id_quat=$quartier_p";
        $q5 = $db->query($query5);
        while ($row5 = $q5->fetch()) {
            $quartier_p = $row5['nom'];
        }
    }

    $rs = "";
    $nr = "";
    $pr = "";
    $ville = "";
    $pays = "";
    $tel = "";

    $query = "SELECT * FROM entites WHERE na=$na";
    $q = $db->query($query);
    while ($row = $q->fetch()) {
        $rs = $row['rs'];
        $nr = $row['nom_resp'];
        $pr = $row['prenom_resp'];
        $tel = $row['tel'];
        $ville = $row['ville'];
        $query1 = "SELECT * from ville where id=$ville";
        $q1 = $db->query($query1);
        while ($row1 = $q1->fetch()) {
            $ville = $row1['intitule'];
        }

        $pays = $row['pays'];
        $query2 = "SELECT * from pays where id_pays=$pays";
        $q2 = $db->query($query2);
        while ($row2 = $q2->fetch()) {
            $pays = $row2['intitule_pays'];
        }
    }

    $duree = dateDifference($dd, $df);
    $qte = (int)($duree / 30);
    $prix = $mensualite / 30 * $duree;
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

$pdf->Cell(130, 5, $rs_p, 0, 0);
$pdf->Cell(59, 5, 'FACTURE', 0, 1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(130, 5, $quartier_p, 0, 0);
$pdf->Cell(59, 5, '', 0, 1);//end of line

$pdf->Cell(130, 5, $ville_p . ', ' . $pays_p, 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(34, 5, $date, 0, 1);//end of line

$pdf->Cell(130, 5, 'Phone: ' . $tel_p, 0, 0);
$pdf->Cell(25, 5, 'Facture #', 0, 0);
$pdf->Cell(34, 5, $id_ab, 0, 1);//end of line

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'N. client', 0, 0);
$pdf->Cell(34, 5, $na, 0, 1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1);//end of line

//billing address
$pdf->Cell(100, 5, 'Information client', 0, 1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $nr . ' ' . $pr, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $rs, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $ville . ', ' . $pays, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $tel, 0, 1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1);//end of line

//invoice contents
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(80, 5, 'Module', 1, 0);
$pdf->Cell(25, 5, 'Qte (mois)', 1, 0);
$pdf->Cell(42, 5, 'P.U (Fcfa)', 1, 0);
$pdf->Cell(42, 5, 'Prix (Fcfa)', 1, 1);//end of line

$pdf->SetFont('Arial', '', 12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(80, 5, $module, 1, 0);
$pdf->Cell(25, 5, $qte, 1, 0);
$pdf->Cell(42, 5, number_format($mensualite), 1, 0, 'R');
$pdf->Cell(42, 5, number_format($prix), 1, 1, 'R');//end of line

//summary
$pdf->Cell(80, 5, '', 0, 0);
$pdf->Cell(25, 5, '', 0, 0);
$pdf->Cell(42, 5, 'Total HT', 0, 0, 'R');
$pdf->Cell(42, 5, number_format($prix), 1, 1, 'R');//end of line

$pdf->Cell(80, 5, '', 0, 0);
$pdf->Cell(25, 5, '', 0, 0);
$pdf->Cell(42, 5, 'IR (5.5%)', 0, 0, 'R');
$ir = $prix * 5.5 / 100;
$pdf->Cell(42, 5, number_format($ir), 1, 1, 'R');//end of line

$pdf->Cell(80, 5, '', 0, 0);
$pdf->Cell(25, 5, '', 0, 0);
$pdf->Cell(42, 5, 'Total TTC', 0, 0, 'R');
$prix = $prix + $ir;
$pdf->Cell(42, 5, number_format($prix), 1, 1, 'R');//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 20, '', 0, 1);//end of line

//define a new font style
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(80, 5, 'Site web : www.syges.cm', 0, 0, 'R');
$pdf->Cell(40, 5, 'Email : support@syges.cm', 0, 1, 'R');
$pdf->Cell(125, 5, '', 0, 1, 'R');
$pdf->Cell(80, 5, 'RCCM : ' . $rccm, 0, 0, 'R');
$pdf->Cell(40, 5, 'NUI : ' . $cc, 0, 1, 'R');

$pdf->Output();

?>

