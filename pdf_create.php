<?php
require('fpdf/fpdf184/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$random =  rand(10000, 99999);
$filename = "Kl18_" . $random . ".pdf";

// Set font
$pdf->SetFont('Arial','B',16);
// Move to 10 cm to the right
$pdf->Cell(10);
// Centered text in a framed 100*10 mm cell and line break
$pdf->Cell(100,10,utf8_decode('Számla'),1,1,'C');
//sortörés
//$pdf->Ln(40);
//vonal rajzolása x1,y1,x2,y2
$pdf->SetFont('Arial','',12);
$pdf->Line(10, 27, 200, 27);
$pdf->Ln(10);

$elado = utf8_decode("Eladó neve és címe: \n Nav xml demó normál+jövedéki \n 1101 Budapest Gitár utca 7 \n 11111111-22222222 Bank \n Adóig.szám: 33333333-2-42");
$pdf->MultiCell(95, 7, $elado, 1, "L");

$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+95,$y-35);
$vevo = utf8_decode("Vevo neve és címe: \n") . utf8_decode($_POST["nev"]) . "\n" . utf8_decode($_POST["cim"]) . utf8_decode("\n\nAdóig.szám: ") . $_POST["ado"];
$pdf->MultiCell(95, 7, $vevo, 1, "L");

$szamlaszam= utf8_decode("Számlaszám \n Kl18/") . $random;
$pdf->MultiCell(95, 7, $szamlaszam, 1, "C");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+95,$y-14);

$fizmod=utf8_decode("Fizetési mód: \n" . $_POST["fiz"]);
$pdf->MultiCell(95, 7, $fizmod, 1, "C");

$datum = date("Y.m.d");
$pdf->MultiCell(63, 7, utf8_decode("Teljesítés kelte \n" . $datum), 1, "C");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+63,$y-14);

$pdf->MultiCell(63, 7, utf8_decode("Számla kelte \n" . $datum), 1, "C");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+126,$y-14);

$datum = date("Y.m") . "." . (date("d")+10);
$pdf->MultiCell(64, 7, utf8_decode("Fizetesi határido \n" . $datum), 1, "C");

$pdf->Ln(10);

$pdf->MultiCell(40, 7, utf8_decode("Megnevezés"), 1, "C");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+40,$y-7);

$pdf->MultiCell(30, 7, utf8_decode("Besor./V.kód"), 1, "C");
$pdf->SetXY($x+70,$y-7);

$pdf->MultiCell(25, 7, utf8_decode("Mennyiség"), 1, "C");
$pdf->SetXY($x+95,$y-7);

$pdf->MultiCell(20, 7, utf8_decode("Egységár"), 1, "C");
$pdf->SetXY($x+115,$y-7);

$pdf->MultiCell(20, 7, utf8_decode("Nettó ár"), 1, "C");
$pdf->SetXY($x+135,$y-7);

$pdf->MultiCell(15, 7, utf8_decode("Áfa%"), 1, "C");
$pdf->SetXY($x+150,$y-7);

$pdf->MultiCell(20, 7, utf8_decode("Áfa"), 1, "C");
$pdf->SetXY($x+170,$y-7);

$pdf->MultiCell(20, 7, utf8_decode("Bruttó ár"), 1, "C");

$pdf->Ln(5);

$megnevezes=utf8_decode($_POST["arunev"]);
$pdf->MultiCell(40, 7, $megnevezes, 0, "L");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+40,$y-7);

$mennyiseg=utf8_decode($_POST["mennyiseg"]);
$pdf->MultiCell(55, 7, $mennyiseg, 0, "R");
$pdf->SetXY($x+95,$y-7);

$ar=utf8_decode($_POST["ar"]);
$pdf->MultiCell(20, 7, $ar, 0, "R");
$pdf->SetXY($x+115,$y-7);

$egysegar=utf8_decode($_POST["ar"] * $_POST["mennyiseg"]);
$pdf->MultiCell(20, 7, $egysegar, 0, "R");
$pdf->SetXY($x+135,$y-7);

$pdf->MultiCell(15, 7, "27%", 0, "C");
$pdf->SetXY($x+150,$y-7);

$afa=$egysegar*0.27;
$pdf->MultiCell(20, 7, $afa, 0, "R");
$pdf->SetXY($x+170,$y-7);

$brutto = $egysegar + $afa;
$pdf->MultiCell(20, 7, $brutto, 0, "R");

$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->Line($x, $y, $x+190, $y);

$pdf->MultiCell(40, 7, utf8_decode("Összesen:"), 0, "L");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+115,$y-7);

$pdf->MultiCell(20, 7, $egysegar, 0, "R");
$pdf->SetXY($x+150,$y-7);

$pdf->MultiCell(20, 7, $afa, 0, "R");
$pdf->SetXY($x+170,$y-7);

$pdf->MultiCell(20, 7, $brutto, 0, "R");

$pdf->Ln(5);

$pdf->MultiCell(130, 7, utf8_decode("Nettó"), 0, "R");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+130,$y-7);

$pdf->MultiCell(30, 7, utf8_decode("Áfa"), 0, "R");
$pdf->SetXY($x+160,$y-7);

$pdf->MultiCell(30, 7, utf8_decode("Bruttó"), 0, "R");

$pdf->MultiCell(100, 7, "27%", 0, "R");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+100,$y-7);

$pdf->MultiCell(30, 7, $egysegar, 0, "R");
$pdf->SetXY($x+130,$y-7);
$xx= $x+130;
$yy= $y-7;

$pdf->MultiCell(30, 7, $afa, 0, "R");
$pdf->SetXY($x+160,$y-7);

$pdf->MultiCell(30, 7, $brutto, 0, "R");
$pdf->Line(100, $yy+7, 200, $yy+7);

$pdf->MultiCell(130, 7, $egysegar, 0, "R");
$x= $pdf->GetX();
$y= $pdf->GetY();
$pdf->SetXY($x+130,$y-7);

$pdf->MultiCell(30, 7, $afa, 0, "R");
$pdf->SetXY($x+160,$y-7);

$pdf->MultiCell(30, 7, $brutto, 0, "R");

//Fájlt hoz létre
$pdf->Output($filename,'F');

use PHPMailer\PHPMailer\PHPMailer;
$email = "bakosmik74@gmail.com";

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

$mail = new PHPMailer();

//SMTP Settings
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Charset = "UTF-8";
$mail->Username = "noreplytous20@gmail.com";
$mail->Password = "Ezegyjelszo123";
$mail->Port = 465; //587
$mail->SMTPSecure = "ssl"; //tls

//Email Settings
$mail->isHTML(true);
$mail->setFrom($email, "XY ticket");
$mail->addAddress($email);
$mail->Subject = "Elektronikus számla!";
$mail->Body = "Köszönjük a vásárlást!";
$mail->addAttachment($filename);

if(!$mail->send())
{
   echo "Hiba a levél küldésekor. Próbálja újra!";
   exit;
}

echo "Az üzenet sikeresen továbbítva.";

?>