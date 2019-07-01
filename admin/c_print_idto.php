
<?php
session_start();
require('../dbconfig.php');
require('fpdf.php');
date_default_timezone_set('Asia/Bangkok');


mysqli_query($con,'SET NAMES TIS620');
$from = $_GET['from'];
$to = $_GET['to'];
$sql = "SELECT * FROM customers WHERE mem_status=1 AND  mem_date BETWEEN '$from' AND '$to' ";$result = mysqli_query($con,$sql);
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);
class PDF extends FPDF
{

// Page header
function Header()
{
  global $id;
  global $details;
    // Logo
    $this->Image('img/logo1.png',16,17,0,30);
	    $this->Ln(10);
    // Arial bold 15
    $this->SetFont('THSarabunNew Bold','',28);
    // Move to the right
    $this->Cell(97);
    // Title
	    $this->SetFont('THSarabunNew','',18);

	    $this->Cell(97);
	    

    // Line break
    $this->Ln(25);
	    $this->Cell(190,0,'',1,1,'C');

		$this->SetFont('THSarabunNew Bold','',20);
    $this->Cell(200,10,'รายการสมาชิก',0,1,'C');
    $this->Ln(8);


	$this->SetFont('THSarabunNew Bold','',20);
	$this->SetFillColor(128,128,128);
	$this->SetTextColor(255,255,255);
	$this->Cell(1);
	$this->Cell(10,12,"#",1,0,'C',TRUE);
	$this->Cell(25,12,"รูป",1,0,'C',TRUE);
		$this->Cell(40,12,"ชื่อ-สกุล",1,0,'C',TRUE);

  $this->Cell(60,12,"E-mail",1,0,'C',TRUE);
  $this->Cell(30,12,"เบอร์โทรศัพท์",1,0,'C',TRUE);
  $this->Cell(30,12,"ชื่อผู้ใช้",1,1,'C',TRUE);

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-12);
    // Arial italic 8
    $this->SetFont('THSarabunNew','',12);
    // Page number
    $this->Cell(0,10,'Print by Admin',0,0,'L');
	$date = date("d M Y");
	    $this->Cell(0,10,$date,0,0,'R');

}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew Bold','','THSarabunNew Bold.php');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('THSarabunNew','',20);
$i = 1;
$image_height = 20;
$image_width = 20;
foreach ($users as $user) {

	$pdf->SetFont('THSarabunNew','',18);
  $pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
  $pdf->Cell(1);
	$pdf->Cell(10,30,$i,1,0,'C',TRUE);


    $start_x = $pdf->GetX();
    $start_y = $pdf->GetY();
	// place image and move cursor to proper place. "+ 5" added for buffer
    $pdf->Image('../img/cimg/' . $user['cimg'], $pdf->GetX() + 5, $pdf->GetY() + 0, 0, 15);
    $pdf->SetXY($start_x - 5, $start_y);
    $pdf->Cell(5);
    $pdf->Cell(25, 30, '', 1);



	$pdf->Cell(40,30,$user['fullname'],1,0,'C',TRUE);
  $pdf->Cell(60,30,$user['email'],1,0,'C',TRUE);
  $pdf->Cell(30,30,$user['tel'],1,0,'C',TRUE);

  $pdf->Cell(30,30,$user['username'],1,1,'C',TRUE);
$i++;
}


$pdf->Output();
?>
