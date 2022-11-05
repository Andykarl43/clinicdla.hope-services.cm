
<?php
setlocale(LC_CTYPE, 'fr_FR');
require('fpdf/fpdf.php');
try{
    $db = new PDO('mysql:host=localhost;dbname=ch6183b13e1fa50_clinic;charset=utf8', 'ch6183b13e1fa50_clinic_root', '!&bxmMs[KB%l');

}catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}


function dateDifference($start_date, $end_date)
{
    // calulating the difference in timestamps
    $diff = strtotime($start_date) - strtotime($end_date);

    $start_y = date("Y",strtotime($start_date));
    $start_m  = date("m",strtotime($start_date));
    $start_d  = date("d",strtotime($start_date));

    $end_y = date("Y",strtotime($end_date));
    $end_m = date("m",strtotime($end_date));
    $end_d = date("d",strtotime($end_date));

    if($start_y == $end_y AND $start_m == $end_m AND $start_d > $end_d){
        return -1;
    }
    if($start_y == $end_y AND $start_m > $end_m){
        return -1;
    }
    if($start_y > $end_y){
        return -1;
    }

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return ceil(abs($diff / 86400));
}

//    Tes requetes
$id_caisse=$_REQUEST['id_caisse'];

if (!empty($id_caisse)) {
    $id_caisse = $_REQUEST['id_caisse'];
    $cpt = 0;

    $date_c_com = date('Y-m-d');


    $id_hist_caisses = [];



    $cpt = 0;

    $i = 1;

    $query = "SELECT * from historique_caisse where id_caisse='$id_caisse'  order by id_hist_caisse asc";
    $q = $db->query($query);
    while ($row = $q->fetch()) {
        $id_hist_caisse = $row['id_hist_caisse'];
        $id_caisse = $row['id_caisse'];
        $id_hist_caisses[$id_hist_caisse]=$id_hist_caisse ;
        $ref_caisse[$id_hist_caisse] = $row['ref_caisse'];
        $id_beneficiaire= $row['id_beneficiaire'];
        $id_perso  = $row['id_perso'];
        $statut  = $row['statut'];
        $date_hist[$id_hist_caisse]  = $row['date_hist'];
        $type_beni = $row['type_beni'];
        $montant_entre[$id_hist_caisse] = $row['montant_entre'];
        $montant_sortie[$id_hist_caisse] = $row['montant_sortie'];
        $service  = $row['service'];

        $sql = "SELECT * from caisse where id_caisse = '$id_caisse'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            // $nom_benificiaire=$table['nom_p'].' '.$table['prenom_p'];
            $nom_caisse = $table['caisse'];
        }

        $sql = "SELECT * from service where id_service = '$service'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            // $nom_benificiaire=$table['nom_p'].' '.$table['prenom_p'];
            $nom_service[$id_hist_caisse] = $table['nom'];
        }
        if (empty($service)) {
            $nom_service[$id_hist_caisse] = 'N/A';
        }

        $sql = "SELECT * from personnel where id_personnel = '$id_perso'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $nom[$id_hist_caisse] = $table['nom'] . ' ' . $table['prenom'];
        }
        if (empty($nom)) {
            $nom[$id_hist_caisse] = 'N/A';
        }


//  $n=SUBSTR($ref_caisse,0,3);

        switch ($type_beni) {
            case 'C';

                $sql = "SELECT * from caisse where id_caisse = '$id_beneficiaire'";

                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables as $table) {
                    $nom_benificiaire[$id_hist_caisse] = $table['caisse'];
                }
                if (empty($nom_benificiaire)) {
                    $nom_benificiaire[$id_hist_caisse] = 'N/A';
                }
                $statut_nom[$id_hist_caisse] = 'Transfert_caisse';
                break;
            case 'P';
                $sql = "SELECT * from patient where id_patient = '$id_beneficiaire'";

                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables as $table) {
                    // $nom_benificiaire=$table['nom_p'].' '.$table['prenom_p'];
                    $nom_benificiaire[$id_hist_caisse] = $table['ref_patient'];
                }
                if (empty($nom_benificiaire)) {
                    $nom_benificiaire[$id_hist_caisse] = 'N/A';
                }
                $statut_nom[$id_hist_caisse] = 'Règlement_patient';
                break;
            case 'M';
                $sql = "SELECT * from medecin where id_medecin = '$id_beneficiaire'";

                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables as $table) {
                    $nom_benificiaire[$id_hist_caisse] = $table['nom_m'] . ' ' . $table['prenom_m'];
                }
                if (empty($nom_benificiaire)) {
                    $nom_benificiaire[$id_hist_caisse] = 'N/A';
                }
                $statut_nom[$id_hist_caisse] = 'Frais de commission';
                break;
            case 'CH';
                $sql = "SELECT * from chirugien where id_chirugien = '$id_beneficiaire'";

                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables as $table) {
                    $nom_benificiaire[$id_hist_caisse] = $table['nom_c'] . ' ' . $table['prenom_c'];
                }
                if (empty($nom_benificiaire)) {
                    $nom_benificiaire[$id_hist_caisse] = 'N/A';
                }
                $statut_nom[$id_hist_caisse] = 'Frais de commission';
                break;
            case 'L';
                $sql = "SELECT * from laboratin where id_laboratin = '$id_beneficiaire'";

                $stmt = $db->prepare($sql);
                $stmt->execute();

                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tables as $table) {
                    $nom_benificiaire[$id_hist_caisse] = $table['nom_l'] . ' ' . $table['prenom_l'];
                }
                if (empty($nom_benificiaire)) {
                    $nom_benificiaire[$id_hist_caisse] = 'N/A';
                }
                $statut_nom[$id_hist_caisse] = 'Frais de commission';
                break;

        }

    }
}

//////////////





//    Fin des requetes

class PDF extends FPDF
{
    // Page header
//	function Header()
//	{
//		// GFG logo image
////		$this->Image('img/logo.jpeg', 10, 6, 80);
//
//		// Set font-family and font-size
//		$this->SetFont('Times','B',20);
//
//		// Move to the right
//		$this->Cell(20);
//
//		// Set the title of pages.
//		$this->Cell(30, 20, ' ', 0, 2, 'C');
//
//		// Break line with given space
//		$this->Ln(1);
//	}

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

//$date = date("d/m/Y");

// Create new object.
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();

// Add new pages
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',10);
//header
$today = date("d/m/Y");
$pdf->Text(140, 6, '"Ville", le '.$today);

$pdf->Image('img/logo.jpeg', 23, 5, 20);


$pdf->SetFont('Arial','B',14);
$pdf->Text(60, 20, 'DETAILS DE LA CAISSE : '.$nom_caisse);

$pdf->SetFont('Arial','',12);
$pdf->Text(5, 40, 'Date d\'impression : '.date("d/m/Y", strtotime($date_c_com)));
$pdf->Text(5, 45, 'Nom caisse : '.$nom_caisse);
//$pdf->Text(5, 50, 'destinataire):');

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

//$pdf->Cell(130 ,5,iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE','2'),0,0);

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(15 ,5,'REF.',1,0);
$pdf->Cell(46 ,5,'ENTITE',1,0);
$pdf->Cell(18 ,5,'ENTRE',1,0);
$pdf->Cell(18 ,5,'SORTIE',1,0);
$pdf->Cell(24 ,5,'DATE',1,0);
$pdf->Cell(39,5,'MOTIF',1,0);//end of line
$pdf->Cell(30,5,'SERVICE',1,1);

$pdf->SetFont('Arial','',11);

$pdf->Cell(15 ,180,'',1,0);
$pdf->Cell(46 ,180,'',1,0);
$pdf->Cell(18 ,180,'',1,0);
$pdf->Cell(18 ,180,'',1,0);
$pdf->Cell(24 ,180,'',1,0);
$pdf->Cell(39 ,180,'',1,0);
$pdf->Cell(30 ,180,'',1,1);//end of line


// Contenu de ton bon

// Changer 50 par le nombre de produits, donc il faut mettre un compteur dans ta requete qui va compter le nombre de produits
$i=0;
$j=100;
$k=0;
$total_ttc_entre =0;
$total_ttc_sortie=0;
foreach ($id_hist_caisses as $id_med){
//
//    if($k>38){
//        $pdf->SetFont('Arial','',11);
//
//        $pdf->Cell(15 ,180,'',1,0);
//        $pdf->Cell(46 ,180,'',1,0);
//        $pdf->Cell(18 ,180,'',1,0);
//        $pdf->Cell(18 ,180,'',1,0);
//        $pdf->Cell(24 ,180,'',1,0);
//        $pdf->Cell(39 ,180,'',1,0);
//        $pdf->Cell(30 ,180,'',1,1);//end of line
//    }


    $pdf->Text(12, 70+$i, '#'.$k);
    $pdf->Text(27, 70+$i, 'nom_entite');
    $pdf->Text(72, 70+$i, $montant_entre[$id_med]); //$montant_entre[$id_med]
    $pdf->Text(90, 70+$i, $montant_sortie[$id_med]); //$montant_sortie[$id_med]
    //$total_ht = $prix_ht[$id_med]*$quantite[$id_med];
    $pdf->Text(109, 70+$i, date("d/m/Y", strtotime($date_hist[$id_med]))); //$date_hist[$id_med]
   // $tva = $total_ht*19.25/100;
    $pdf->Text(132, 70+$i, iconv('UTF-8', 'windows-1252',$statut_nom[$id_med]));//$statut_nom[$id_med]
    $pdf->Text(172, 70+$i,iconv('UTF-8', 'windows-1252',$nom_service[$id_med]) );//$nom_service[$id_med]
    $total_ttc_entre += $montant_entre[$id_med] ;
    $total_ttc_sortie += $montant_sortie[$id_med] ;
    $i += 5;
    $k++;
    //$total_ht =0;
    $tva = 0;
}


//summary
$pdf->Cell(15 ,5,'',0,0);
$pdf->Cell(46 ,5,'Total',0,0,'R');
$pdf->Cell(18 ,5,$total_ttc_entre,1,0);
$pdf->Cell(18 ,5,$total_ttc_sortie,1,0);
$pdf->Cell(24 ,5,'',0,0);
$pdf->Cell(39 ,5,'Solde ',0,0, 'R');
//$nap = $prix - $ir ;
$pdf->Cell(30,5,$total_ttc_entre-$total_ttc_sortie,1,1);//end of line4


//$pdf->SetFont('Arial','',12);
//$pdf->Text(15, 200, iconv('UTF-8', 'windows-1252','Préparer par  : '));
//$pdf->Text(85, 200,iconv('UTF-8', 'windows-1252', 'Vérifier par  : '));
//$pdf->Text(155, 200, iconv('UTF-8', 'windows-1252','Valider par  : '));


//
//$pdf->Cell(42 ,10,'Avance',0,0);
//$pdf->Cell(42 ,10,'29',0,1);
//
//$pdf->Cell(42 ,10,'Reste',0,0);
//$pdf->Cell(42 ,10,'30',0,1);
//
//$pdf->Cell(42 ,10,iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE','Date d\'échéance'),0,0);
//$pdf->Cell(42 ,10,'31',0,1);//end of line
//
////make a dummy empty cell as a vertical spacer
//$pdf->Cell(189 ,20,'',0,1);//end of line
//
////define a new font style
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(80 ,5,'Site web : www.syges.cm',0,0, 'R');
//$pdf->Cell(40 ,5,'Email : support@syges.cm',0,1, 'R');
//$pdf->Cell(125 ,5,'',0,1, 'R');
//$pdf->Cell(80 ,5,'32',0,0, 'R');
//$pdf->Cell(40 ,5,'33',0,1, 'R');

$pdf->Output();

?>
