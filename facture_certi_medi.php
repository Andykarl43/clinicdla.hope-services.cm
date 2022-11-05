<?php
require('fpdf/fpdf.php');
//include('phpqrcode/qrlib.php');

// Infos de connection à la BD
try{
    $db = new PDO('mysql:host=localhost;dbname=apfood_st_syges;charset=utf8', 'root', '');

}catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}

function dateToFrench($date, $format)
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('Lundi', 'Mardi', 'Mercredi', 'jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
}

class PDF extends FPDF
{
    // Page header
//    function Header()
//    {
//        // GFG logo image
//        $this->Image('Picture1.png', 10, 6, 40, 40);
//
//        // Set font-family and font-size
//        $this->SetFont('Times','B',20);
//
//        // Move to the right
//        $this->Cell(20);
//
//        // Set the title of pages.
//        $this->Cell(30, 20, ' ', 0, 2, 'C');
//
//        // Break line with given space
//        $this->Ln(5);
//    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Set font-family and font-size of footer.
        $this->SetFont('Arial', 'I', 8);

        // set page number
        //$this->Cell(0, 10, 'Page ' . $this->PageNo() .
        //  '/{nb}', 0, 0, 'C');
    }

    function subWrite($h, $txt, $link='', $subFontSize=12, $subOffset=0)
    {
        // resize font
        $subFontSizeold = $this->FontSizePt;
        $this->SetFontSize($subFontSize);

        // reposition y
        $subOffset = ((($subFontSize - $subFontSizeold) / $this->k) * 0.3) + ($subOffset / $this->k);
        $subX        = $this->x;
        $subY        = $this->y;
        $this->SetXY($subX, $subY - $subOffset);

        //Output text
        $this->Write($h, $txt, $link);

        // restore y position
        $subX        = $this->x;
        $subY        = $this->y;
        $this->SetXY($subX,  $subY + $subOffset);

        // restore font size
        $this->SetFontSize($subFontSizeold);
    }
}

// Script SQL pour charger les données de ta tables.
if(isset($_GET['id_certi_medi'])!=""){
    $id_certi_medi = $_GET['id_certi_medi'];
}else{

    ?>
    <script>
        alert('INCORRECT.');
        window.location.href='<?=$certificat['option1_link']?>';
    </script>
    <?php

}


$id_entreprise = 1;

$query = "SELECT * from certi_medi where id_certi_medi='$id_certi_medi' ";
$q = $db->query($query);
while ($row = $q->fetch()) {


    $id_certi_medi = $row['id_certi_medi'];
    $ref_certi_medi = $row['ref_certi_medi'];
    $id_patient = $row['id_patient'];
    $id_medecin = $row['id_medecin'];
    $date_debut = $row['date_debut'];
    $date_fin = $row['date_fin'];
    $nb_jour = $row['nb_jour'];
    $date_certi_medi = $row['date_certi_medi'];



    $date_debut= dateToFrench($date_debut, " j F Y");
    $date_fin= dateToFrench($date_fin, " j F Y");
    $date_certi_medi =  dateToFrench($date_certi_medi, " j F Y");

    if (strlen($nb_jour)<=1){
        $nb_jour= '0'.$nb_jour;
    }

    //---caractère
//    $nub_char=strlen($objet);
//    $ligne=$nub_char/45;
//    $objets=chunk_split($objet,51,"\r\n");
//    $objets_f=explode("\r\n", $objets);
    //---



    $sql = "SELECT DISTINCT * from patient where id_patient = '$id_patient'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $nom_patient= strtoupper($table['nom_p']) . ' ' . ucfirst(strtolower($table['prenom_p']));
        $age= $table['age_p'];
        $genre_p= $table['genre_p'];
    }
    $sql = "SELECT DISTINCT * from medecin where id_medecin = '$id_medecin'";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $nom_medecin= strtoupper($table['nom_m']) . ' ' . ucfirst(strtolower($table['prenom_m']));
    }


    if(empty($id_medecin)){
        $nom_medecin='N/A';
    }

    if(empty($id_patient)){
        $nom_patient='N/A';
    }



    $sql = "SELECT YEAR('$date_certi_medi') as total  ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tables as $table) {
        $annee = $table['total'];
    }

}
$date=dateToFrench($date_certi_medi, "d F Y");
$tailles=strlen($date);
$tempDir = 'filesCertificatMedical/';

//$codeContents = 'N° d\'attesation: '.$ref_dem_ent."\n".'Nom de l’ingénieur: '.$nom_ing."\n".' Tableau de l’Ordre pour l’année: '.$annee."\n".' Matricule: '.$matricule."\n".' Fait à Yaoundé: '.dateToFrench($date_dem_ent, "j F Y");

//$fileName = 'qrcode_ent_'.$id_ingenieur.'.png';

//$pngAbsoluteFilePath = $tempDir.$fileName;
//$urlRelativeFilePath = 'filesEnt/'.$fileName;

//QRcode::png($codeContents, $pngAbsoluteFilePath);


// Create new object.
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();

$pdf->AddFont('CalistoMT','','CALIST.php');
$pdf->AddFont('CalisMTBol','','CALISTB.php');
$pdf->AddFont('CalistoMT-BoldItalic','','CALISTBI.php');
$pdf->AddFont('CenturyGothic','','07558_CenturyGothic.php');
$pdf->AddFont('CenturyGothic-Bold','','07723_Cgothicb0.php');
$pdf->AddFont('CenturyGothic-Italic','','07557_CenturyGothicKursiv.php');
$pdf->AddFont('CenturyGothic-BoldItalic','','07724_CGOTHICBI.php');
$pdf->AddFont('Candara','','Candara.php');

$pdf->AddFont('Candara-Italic','','Candara_Italic (1).php');
$pdf->AddFont('Candara-BoldItalic','','Candara_Bold_Italic.php');

$pdf->AddFont('Candara-Bold','','Candara_Bold.php');


// Add new pages
$pdf->AddPage('P');


//set font to arial, bold, 14pt

//$pdf->Line(20, 50,190,50);
$pdf->Image('img/logo_fact.png', 0,0,100,75);

$pdf->SetFont('Candara-Bold','',12);
//$pdf->Text(130,60,iconv('UTF-8', 'windows-1252', $ref_certi_medi));

$pdf->SetFont('CenturyGothic-Bold','U',18);
$pdf->Text(75,75,'CERTIFICAT MEDICAL');


$pdf->SetFont('Candara','',12);
$pdf->Text(15,95,iconv('UTF-8', 'windows-1252', 'Je soussignée, Dr '.$nom_medecin.', Médecin en service au Centre Médical le Lys des Portiques '));

$pdf->SetFont('Candara','',12);
if($genre_p =='M'){
    $pdf->Text(15,102,iconv('UTF-8', 'windows-1252','(CMLP) certifie avoir examiné ce jour M. '.$nom_patient.'.'));
}else{
    $pdf->Text(15,102,iconv('UTF-8', 'windows-1252','avoir examiné ce jour Mme '.$nom_patient.'.'));
}


$pdf->SetFont('Candara','',12);
$pdf->Text(15,112,iconv('UTF-8', 'windows-1252', 'Il ressort de ce qui précède que l’intéressé présente un état de santé qui nécessite un arrêt de travail'));

$pdf->SetFont('Candara','',12);
$pdf->Text(15,119,iconv('UTF-8', 'windows-1252', 'de sept ('.$nb_jour.') jour à compter du '.$date_debut.' au '.$date_fin.' inclus, sauf complication.'));

$pdf->SetFont('Candara','',12);
$pdf->Text(15,129,iconv('UTF-8', 'windows-1252', 'En foi de quoi le présent certificat est délivré pour servir et valoir ce que de droit.'));


//$plus=0;
//for($i=0; $i<$ligne; $i++){
//    if($ligne<5){
//        $pdf->SetTextColor(0 , 112, 192);
//        $pdf->SetFont('Candara-Bold','',14);
//        $pdf->Text(56,190+$plus,iconv('UTF-8', 'windows-1252', strtoupper($objets_f[$i])));
//        $plus+=5;
//        $autres=2*$ligne;
//    }
//}

// $pdf->SetTextColor(0 , 112, 192);
// $pdf->SetFont('Candara-Bold','',14);
// $pdf->Text(59,190,iconv('UTF-8', 'windows-1252',strtoupper($objet)));

$pdf->SetTextColor(0 , 0, 0);
$pdf->SetFont('Candara-Bold','',14);
$pdf->Text(150,150,iconv('UTF-8', 'windows-1252', 'Fait à Douala, le '.$annee));
$pdf->SetFont('Candara-Bold','',14);
$pdf->SetTextColor(0 , 112, 192);
$pdf->Text(150,165,iconv('UTF-8', 'windows-1252', $nom_medecin));

$pdf->Image('img/pied.png', 0,170,220,120);

//
//
//$pdf->Line(20, 270,190,270);
//
//$pdf->SetFont('CenturyGothic-BoldItalic','',8);
//$pdf->SetTextColor(54 , 95, 145);
//$str = 'Montée Elig Essono - Yaoundé -      20822 -    (+237) 677.66.10.66 / 655.01.02.03 -    noceonigc@yahoo.fr -    www.onigc.cm';
//$str = iconv('UTF-8', 'windows-1252', $str);
//$pdf->Text(20,275,$str);
//$pdf->Image('img/enveloppe.png', 64,272.5,3, 3);
//$pdf->Image('img/old-typical-phone.png', 78,272.5,3, 3);
//$pdf->Image('img/mouse.png', 128,272.5,3, 3);
//$pdf->Image('img/laptop.png', 162,272.5,3, 3);
//
//$pdf->SetFont('CenturyGothic-Italic','',7);
//$pdf->SetTextColor(0 , 0, 0);
//$str = 'Comptes  bancaires : BICEC Yaoundé – Vallée sous le N° 31615665001-03 / ECOBANK Yaoundé - Hippodrome sous le N° 01316146701-72';
//$str = iconv('UTF-8', 'windows-1252', $str);
//$pdf->Text(20,280,$str);
//
////Cell(width , height , text , border , end line , [align] )
//
////Splitter
//$pdf->Cell(10,36,'',0);
//
////set font to arial, bold, 14pt
//$pdf->SetFont('Arial','B',7);



$pdf->Output();

?>

