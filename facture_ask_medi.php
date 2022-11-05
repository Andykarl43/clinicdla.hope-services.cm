<?php
setlocale(LC_CTYPE, 'fr_FR');
require('fpdf/fpdf.php');
require('convertisseur.php');
try{
    $db = new PDO('mysql:host=localhost;dbname=apfood_st_syges;charset=utf8', 'root', '');

}catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}
$id_perso = $_REQUEST['id_perso'];

$lvl=$_REQUEST['lvl'];

$id_ask_medi=$_REQUEST['id_ask_medi'];

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


$id_medis = [];

if (!empty($id_ask_medi)) {
    $id_ask_medi = $_REQUEST['id_ask_medi'];
    $cpt=0;


//    Tes requetes

   if($lvl == 10)
        $query = "SELECT * from demande_medicament WHERE id_perso = '$id_perso' and etat_dst=1 and etat_src=1 order by id_ask_medi desc";
    else
        $query = "SELECT * from demande_medicament where etat_dst=1 and etat_src=1 order by id_ask_medi desc";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $id_ask_medi = $table['id_ask_medi'];
        $nom_salle = $table['nom_salle'];
        $responsable = $table['responsable'];
        $date_debut = $table['date_debut'];
        $date_valide = $table['date_valide'];
    }
        
        // $id_medi=$table['id_medi'];
        // $id_medis[$id_medi]=$id_medi;
        // $frais = $table['frais'];
        // $date_c_com = $table['date_c_com'];
        // $id_com = $table['id_com'];
        // $date_l_com=$table['date_l_com'];
        // $date_r_com=$table['date_r_com'];
        // $obs=$table['obs'];
        // $mode_paie=$table['mode_paie'];

        // $quantite[$id_medi]=$table['qt_com'];

//            Get drug's name


        $sql = "SELECT DISTINCT * from demande_materiel where  id_ask_medi='$id_ask_medi'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $id_medi= $table['id_medi'];
            $id_medis[$id_medi]=$id_medi;
            $quantite[$id_medi]= $table['quantite'];
            
                $sql = "SELECT DISTINCT * from medicament where id_medi = '$id_medi'";
        
                $stmt = $db->prepare($sql);
                $stmt->execute();
        
                $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                foreach ($tables as $table) {
                    $id = $table['id_medi'];
                    $ref_medi[$id_medi]  = $table['ref_medi'];
                    $nom_medi[$id_medi]  = $table['nom_medi']; // [id_medi => nom]
                    $id_type_medi[$id_medi] = $table['id_type_medi'];
                    $prix_ht[$id_medi] = $table['prix_unitaire'];
                    $prix_ttc[$id_medi] = $table['prix_u_v'];
                }

            $cpt++;
        }


//    Fin des requetes
}

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
//$pdf = new PDF('P','mm','A4');
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
$pdf->Text(60, 20, 'DEMANDE DE MEDICAMENT No Ref_ask_medi_'.$id_ask_medi.'');

$pdf->SetFont('Arial','',12);
$pdf->Text(5, 40, 'Date de la commande : '.date("d/m/Y", strtotime($date_debut)));
$pdf->Text(5, 45, 'Date de livraison : '.date("d/m/Y", strtotime($date_valide)));
$pdf->Text(5, 50, 'Fournisseur : '.iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE','MAGASIN'));
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
$pdf->Cell(62 ,5,'DESIGNATION',1,0);
$pdf->Cell(22 ,5,'P.U HT',1,0);
$pdf->Cell(15 ,5,'QTE',1,0);
$pdf->Cell(24 ,5,'TOTAL HT',1,0);
$pdf->Cell(22 ,5,'TVA',1,0);
$pdf->Cell(30 ,5,'TOTAL TTC',1,1);//end of line


$pdf->SetFont('Arial','',11);

$pdf->Cell(15 ,100,'',1,0);
$pdf->Cell(62 ,100,'',1,0);
$pdf->Cell(22 ,100,'',1,0);
$pdf->Cell(15 ,100,'',1,0);
$pdf->Cell(24 ,100,'',1,0);
$pdf->Cell(22 ,100,'',1,0);
$pdf->Cell(30 ,100,'',1,1);//end of line

// Contenu de ton bon

// Changer 50 par le nombre de produits, donc il faut mettre un compteur dans ta requete qui va compter le nombre de produits
$i=0;
$total_ttc =0;
$ctt=0;
foreach ($id_medis as $id_med){
    if($ctt<=18){
    $pdf->Text(12, 70+$i, '#'.$id_med);
    $pdf->Text(27, 70+$i, $nom_medi[$id_med]);
    $pdf->Text(88, 70+$i, $prix_ht[$id_med]);
    $pdf->Text(110, 70+$i, $quantite[$id_med]);
    $total_ht = $prix_ht[$id_med]*$quantite[$id_med];
    $pdf->Text(125, 70+$i, $total_ht);
    $tva = $total_ht*19.25/100;
    $pdf->Text(149, 70+$i, $tva);
    $pdf->Text(171, 70+$i, $total_ht+$tva);
    $total_ttc += $total_ht+$tva;
    $i += 5;
    $total_ht =0;
    $tva = 0;
    $ctt++;
    }
}


//summary
$pdf->Cell(20 ,5,'',0,0);
$pdf->Cell(45 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(20 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(25 ,5,'Net a payer',0,0, 'R');
//$nap = $prix - $ir ;
$pdf->Cell(30,5,$total_ttc,1,1);//end of line4


$pdf->SetFont('Arial','',12);
$pdf->Text(15, 200, iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE','Préparer par  : '));
$pdf->Text(85, 200,iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', 'Vérifier par  : '));
$pdf->Text(155, 200, iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE','Valider par  : '));

$pdf->Output();

?>
