
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

$id_reg_consul=$_REQUEST['id_reg_consul'];

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

if (!empty($id_reg_consul)){
    $id_reg_consul = $_REQUEST['id_reg_consul'];
    $cpt=0;


//    Tes requetes

    $sql = "SELECT * from regler_consul where id_reg_consul = '$id_reg_consul'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
       $ref_reg_consul = $table['ref_reg_consul'];
        $id_patient=$table['id_patient'];
        $payer=$table['payer'];
        $remise=$table['remise'];
        $somme=$table['somme'];
        $id_type_consul=$table['id_type_consul'];

//            Get drug's name
        $sql = "SELECT DISTINCT * from personnel where id_personnel = '$id_perso'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $nom_caissier= $table['nom'] . ' ' . $table['prenom'];
        }
        if(empty($id_perso_session)==""){
            $nom_caissier="N/A";
        }
        if(empty($id_perso)==""){
            $nom_caissier="N/A";
        }

        $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $nom_patient= $table['nom_p'] . ' ' . $table['prenom_p'];
        }

        $sql = "SELECT DISTINCT * from type_consul where id_type_consul = '$id_type_consul'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $type_consul= $table['nom'] ;
        }


        if(empty($id_type_consul)){
            $type_consul='N/A';
        }
        if(empty($ref_reg_consul)){
            $ref_reg_consul='N/A';
        }




//        $sql = "SELECT  * from medicament_ordo where  ref_medi_ordo='$ref_ordo'";
//
//        $stmt = $db->prepare($sql);
//        $stmt->execute();
//
//        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//        foreach ($tables as $row) {
//            $id_medi= $row['id_medi'];
//            $id_medis[$id_medi]=$id_medi;
//            $quantite[$id_medi]= $row['quantite_medi_ordo'];
//
//
//            $sql = "SELECT DISTINCT * from medicament where id_medi = '$id_medi'";
//
//            $stmt = $db->prepare($sql);
//            $stmt->execute();
//
//            $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//            foreach ($tables as $table) {
//                $ref_medi[$id_medi] = $table['ref_medi'];
//                $nom_medi[$id_medi] = $table['nom_medi']; // [id_medi => nom]
//                $prix_ht[$id_medi] = $table['prix_u_v'];
//                //$prix_ttc[$id_medi] = $table['prix_u_v'];
//            }
//
//            $cpt++;
//        }


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
$pdf = new PDF('P','mm',array(800,800));
$pdf->AliasNbPages();

// Add new pages
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',10);
//header
$today = date("d-m-Y - h:i A");

$pdf->SetFont('Arial','B',28);
$pdf->Text(70, 20, 'HOPE SERVICES');

$pdf->SetFont('Arial','',22);
$pdf->Text(43, 35, 'MONTE LIDO/CARREFOUR PAKITA');
$pdf->Text(75, 45, '+237 222 22 03 94');

$pdf->line(5,50,200,50);

$pdf->SetFont('Arial','',20);
$pdf->Text(100, 60, 'INVOICE / RECEIPT');

$pdf->SetFont('Arial','',18);
$pdf->Text(10, 70, 'Date');
$pdf->Text(85, 70, $today);

$pdf->Text(10, 80, 'Sales point');
$pdf->Text(85, 80, 'HOPE SERVICE');

$pdf->Text(10, 90, 'Session');
$session = date("G");
if(0 > $session && $session < 13){
    $session = "morning";
}elseif (12 > $session && $session < 18){
    $session = "afternoon";
}else{
    $session = "evening";
}
$pdf->Text(85, 90, $session);

$pdf->SetFont('Arial','B',20);
$pdf->Text(10, 100, 'Facture No: ');
$pdf->Text(85,100, $ref_reg_consul);

$pdf->SetFont('Arial','',18);
$pdf->Text(10, 110, 'Cashier');
$pdf->Text(85,110, ucfirst(strtolower($nom_caissier)) );

$pdf->Text(10, 120, 'Client');
$pdf->Text(85,120, ucfirst(strtolower($nom_patient)));

$pdf->Text(10, 130, 'Payment mode');
$pdf->Text(85,130, 'Cash');

$pdf->Text(10, 140, 'Nom Patient');
$pdf->Text(85,140, ucfirst(strtolower($nom_patient)) );


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,90,'',0,0);
$pdf->Cell(25 ,90,'',0,0);
$pdf->Cell(34 ,90,'',0,1);//end of line

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
$pdf->SetFont('Arial','B',18);

$pdf->Cell(95 ,10,'DESIGNATION',1,0);
$pdf->Cell(20 ,10,'QTE',1,0);
$pdf->Cell(35 ,10,'P.U HT',1,0);
$pdf->Cell(40 ,10,'TOTAL HT',1,1);//end of line


$pdf->SetFont('Arial','',16);

$pdf->Cell(95 ,150,'',1,0);
$pdf->Cell(20 ,150,'',1,0);
$pdf->Cell(35 ,150,'',1,0);
$pdf->Cell(40 ,150,'',1,1);//end of line

// Contenu de ton bon

// Changer 50 par le nombre de produits, donc il faut mettre un compteur dans ta requete qui va compter le nombre de produits
$i=0;
$total_total_ht =0;
$id_medis[0]=1;
foreach ($id_medis as $id_med){
    $pdf->SetFont('Arial','',12);
    $pdf->Text(12, 160+$i, strtoupper($type_consul));
    $pdf->SetFont('Arial','',16);
    $pdf->Text(110, 160+$i, '1');
    $pdf->Text(127, 160+$i, $somme);
    $pdf->Text(165, 160+$i, $somme);

    $pdf->line(10,162+$i,200,162+$i);
//$tva = $total_ht*19.25/100;
//$pdf->Text(146, 160+$i, $tva);
//$pdf->Text(172, 160+$i, $total_ht+$tva);
//    $total_total_ht += $total_ht;
//    $i += 7;
//    $total_ht =0;
//$tva = 0;
}


//summary
$pdf->SetFont('Arial','B',16);
$pdf->Cell(155 ,10,'Amount owed',0);
$pdf->Cell(5 ,10,$somme,0, 1);
$pdf->line(10,315,200,315);

$pdf->SetFont('Arial','',16);
$pdf->Cell(155 ,10,'Amount paid',0);
$pdf->Cell(5 ,10,$payer,0, 1);
$pdf->line(10,325,200,325);

$pdf->SetFont('Arial','',16);
$pdf->Cell(155 ,10,'Remise',0);
$pdf->Cell(5 ,10,$remise,0, 1);
$pdf->line(10,335,200,335);

$pdf->Cell(155 ,10,'Difference',0);
$pdf->Cell(5 ,10,$somme-($payer+$remise),0, 1);
$pdf->line(10,345,200,345);

$pdf->SetFont('Arial','B',16);

//$pdf->Cell(180 ,10,strlen(convertitNombreEnLettres(100000)),0,1,'C');
$pdf->Cell(180 ,10,'xxxxxxxxx xxxxxxxxxxxxxxxxx-xxxxxxxxxxx xxxxxxxxxxxxxxx',0,1,'C');
$pdf->line(10,355,200,355);

$pdf->SetFont('Arial','',16);
$pdf->Cell(180 ,10,'We wish a speedy recovery',0, 1,'C');
$pdf->line(10,365,200,365);

$pdf->Cell(155 ,10,'Drugs sold can not be returned not exchanged',0, 1,'C');
$pdf->Cell(90 ,20,iconv('UTF-8', 'windows-1252', 'Signature Caissière(ier)'),0, 0,'C');
$pdf->Cell(120 ,20,iconv('UTF-8', 'windows-1252', 'Signature Client'),0, 1,'C');

$pdf->Output();

?>
