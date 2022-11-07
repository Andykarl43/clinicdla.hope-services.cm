
<?php
setlocale(LC_CTYPE, 'fr_FR');
require('fpdf/fpdf.php');
try{
    $db = new PDO('mysql:host=localhost;dbname=apfood_st_syges;charset=utf8', 'root', '');
}catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}

$id_rap_caisse=$_REQUEST['id_rap_caisse'];

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
$amount = ['10000','5000','2000','1000','500','500','100','50','25','10','5','2','1'];

if (!empty($id_rap_caisse)) {
    $id_rap_caisse = $_REQUEST['id_rap_caisse'];
    $cpt=0;


//    Tes requetes

    $sql = "SELECT * from rapport_caisse where id_rap_caisse = '$id_rap_caisse'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $row) {
        $id_rap_caisse = $row['id_rap_caisse'];
        $ref_rap = $row['ref_rap'];
        //$id_caisse = $row['id_caisse'];
        $id_perso = $row['id_perso'];
        $date_rap = $row['date_rap'];
        $motif = $row['motif'];
        $montant = $row['montant'];
        $dixmilles = $row['dixmilles'];
        $id_medis[0]=$dixmilles;
        $cinqmilles = $row['cinqmilles'];
        $id_medis[1]=$cinqmilles;
        $deuxmilles = $row['deuxmilles'];
        $id_medis[2]=$deuxmilles;
        $mille = $row['mille'];
        $id_medis[3]=$mille;
        $cinqcentnote = $row['cinqcentnote'];
        $id_medis[4]=$cinqcentnote;
        $cinqcentcoin = $row['cinqcentcoin'];
        $id_medis[5]=$cinqcentnote;
        $cent = $row['cent'];
        $id_medis[6]=$cent;
        $cinquante = $row['cinquante'];
        $id_medis[7]=$cinquante;
        $vingtcinq = $row['vingtcinq'];
        $id_medis[8]=$vingtcinq;
        $dix = $row['dix'];
        $id_medis[9]=$dix;
        $cinq = $row['cinq'];
        $id_medis[10]=$cinq;
        $deux = $row['deux'];
        $id_medis[11]=$deux;
        $un = $row['un'];
        $id_medis[12]=$un;

        $sql = "SELECT * from personnel where id_personnel = '$id_perso'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($tables as $table)
        {
            $nom=$table['nom'].' '.$table['prenom'];
        }


        $sql = "SELECT DISTINCT * from momo where id_rap_caisse = '$id_rap_caisse'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $number_momo= $table['number'];
            $montant_momo= $table['montant'];
            $solde_momo= $table['solde'];
        }

        $sql = "SELECT DISTINCT * from om where id_rap_caisse = '$id_rap_caisse'";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tables as $table) {
            $number_om= $table['number'];
            $montant_om= $table['montant'];
            $solde_om= $table['solde'];
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
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();

// Add new pages
$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',10);
//header


$pdf->Image('img/logo.jpeg', 105, 5, 10);

$pdf->SetFont('Arial','B',15);
$pdf->Text(50, 25,iconv('UTF-8', 'windows-1252','CASH, MOBILE MONEY & CHEQUES COUNT'));

//$pdf->SetFont('Arial','B',14);
//$pdf->Text(60, 30, 'BON DE COMMANDE No "'.$ref_com.'"');
$pdf->SetFont('Arial','B',10);
$today = date("d/m/Y");
$pdf->Text(160, 35, 'Date: '.$today);

$pdf->SetFont('Arial','',12);
$pdf->Text(15, 40, 'Official location : '.iconv('UTF-8', 'windows-1252',ucwords(strtolower($nom))));

$pdf->SetFont('Arial','B',12);
$pdf->Text(15, 50, '(A) CASH COUNT : ');
$pdf->Text(15, 55, 'Account No: '.iconv('UTF-8', 'windows-1252',strtoupper($ref_rap)));
//$pdf->Text(5, 50, 'destinataire):');iconv('UTF-8', 'windows-1252','')

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

//$pdf->Cell(130 ,5,iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE','2'),0,0);

$pdf->Cell(130 ,10,'',0,0);
$pdf->Cell(25 ,10,'',0,0);
$pdf->Cell(34 ,10,'',0,1);//end of line

$pdf->Cell(130 ,10,'',0,0);
$pdf->Cell(25 ,10,'',0,0);
$pdf->Cell(34 ,10,'',0,1);//end of line

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

$pdf->Cell(50 ,5,''.iconv('UTF-8', 'windows-1252',''),0,0);
$pdf->Cell(25 ,5,''.iconv('UTF-8', 'windows-1252','QUANTITY '),1,0);
$pdf->Cell(35 ,5,''.iconv('UTF-8', 'windows-1252',' AMOUNT (XAF)'),1,0);
$pdf->Cell(80 ,5,''.iconv('UTF-8', 'windows-1252','COMMENT'),1,1);


$pdf->SetFont('Arial','',11);

$pdf->Cell(50 ,66,'',1,0);
$pdf->Cell(25 ,66,'',1,0);
$pdf->Cell(35 ,66,'',1,0);
$pdf->Cell(80 ,66,'',1,1);

// Contenu de ton bon

// Changer 50 par le nombre de produits, donc il faut mettre un compteur dans ta requete qui va compter le nombre de produits
$i=0;
$j=0;
$total_amount =0;
foreach ($amount as $cle => $data_item ){
    $pdf->SetFont('Arial','B',11);
    $pdf->Text(12, 80+$i, '#'.$amount[$cle]);
    $pdf->line(60,81+$i,120,81+$i);
    $i += 5;
}
$i=0;
$pdf->SetFont('Arial','',11);
foreach ($id_medis as $id_med => $datas_item){
    $pdf->Text(62, 80+$i, $id_medis[$id_med]);
    $total_per_money = $id_medis[$id_med]*$amount[$id_med];
    $total_amount+=$total_per_money;
    $pdf->Text(88, 80+$i, $total_per_money);
//    $tva = $total_ht*19.25/100;
//    $total_ttc += $total_ht+$tva;
    $i += 5;
    $total_per_money =0;
    $tva = 0;
}

$pdf->Text(122, 80, $motif);


//summary
$pdf->Cell(50 ,5,'',0,0);
$pdf->Cell(25 ,5,'FCFA',0,0,'R');
$pdf->Cell(35 ,5,$total_amount,1,0);
$pdf->Cell(80 ,5,'',0,1);


$pdf->SetFont('Arial','B',11);

//$pdf->Cell(180 ,10,strlen(convertitNombreEnLettres(100000)),0,1,'C');
$pdf->Cell(222 ,24,'Amount in word: ',0,1);
$pdf->line(42,160,200,160);
$pdf->line(10,168,200,168);

$pdf->SetFont('Arial','B',12);
$pdf->Text(15, 180, '(C) MOBILE MONEY COUNT: ');
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,15,'',0,1);//end of line

///////////////////////////
//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(20 ,5,''.iconv('UTF-8', 'windows-1252',''),0,0);
$pdf->Cell(50 ,5,''.iconv('UTF-8', 'windows-1252','Telephone Number'),1,0);
$pdf->Cell(30 ,5,''.iconv('UTF-8', 'windows-1252','Amount (xaf) '),1,0);
$pdf->Cell(40 ,5,''.iconv('UTF-8', 'windows-1252',' Account Balance'),1,0);
$pdf->Cell(30 ,5,''.iconv('UTF-8', 'windows-1252','Difference'),1,1);


$pdf->SetFont('Arial','',11);

$pdf->Cell(20,7,'MOMO',1,0);
$pdf->Cell(50 ,7,$number_momo,1,0);
$pdf->Cell(30 ,7,$montant_momo,1,0);
$pdf->Cell(40 ,7,$solde_momo,1,0);
$diff_momo=($montant_momo-$solde_momo);
$pdf->Cell(30 ,7,$diff_momo,1,1);

// Contenu de ton bon

// Changer 50 par le nombre de produits, donc il faut mettre un compteur dans ta requete qui va compter le nombre de produits
$pdf->Cell(20,7,'OM',1,0);
$pdf->Cell(50 ,7,$number_om,1,0);
$pdf->Cell(30 ,7,$montant_om,1,0);
$pdf->Cell(40 ,7,$solde_om,1,0);
$diff_om=($montant_om-$solde_om);
$pdf->Cell(30 ,7,($montant_om-$solde_om),1,1);

//summary
$pdf->Cell(20,7,'',0,0);
$pdf->Cell(50 ,7,'FCFA',0,0,'R');
$pdf->Cell(30 ,7,($montant_om+$montant_momo),1,0);
$pdf->Cell(40 ,7,($solde_om+$solde_momo),1,0);
$pdf->Cell(30 ,7,$diff_momo+$diff_om,1,1);


////////////////////////
///
$pdf->Cell(189 ,15,'',0,1);//end of line
$pdf->SetFont('Arial','B',12);

$pdf->Cell(30 ,5,''.iconv('UTF-8', 'windows-1252',''),0,0);
$pdf->Cell(50 ,5,''.iconv('UTF-8', 'windows-1252','Name'),1,0);
$pdf->Cell(30 ,5,''.iconv('UTF-8', 'windows-1252','Désignation'),1,0);
$pdf->Cell(40 ,5,''.iconv('UTF-8', 'windows-1252',' Signature'),1,0);
$pdf->Cell(30 ,5,''.iconv('UTF-8', 'windows-1252','Date'),1,1);


$pdf->SetFont('Arial','B',11);

$pdf->Cell(30,7,'PREPARED BY',1,0);
$pdf->Cell(50 ,7,'',1,0);
$pdf->Cell(30 ,7,'',1,0);
$pdf->Cell(40 ,7,'',1,0);
$pdf->Cell(30 ,7,'',1,1);

// Contenu de ton bon

// Changer 50 par le nombre de produits, donc il faut mettre un compteur dans ta requete qui va compter le nombre de produits
$pdf->Cell(30,7,'VERIFIED BY',1,0);
$pdf->Cell(50 ,7,'',1,0);
$pdf->Cell(30 ,7,'',1,0);
$pdf->Cell(40 ,7,'',1,0);
$pdf->Cell(30 ,7,'',1,1);

//summary
$pdf->Cell(30,7,'APPROVED BY',1,0);
$pdf->Cell(50 ,7,'',1,0);
$pdf->Cell(30 ,7,'',1,0);
$pdf->Cell(40 ,7,'',1,0);
$pdf->Cell(30 ,7,'',1,1);
///
///


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
