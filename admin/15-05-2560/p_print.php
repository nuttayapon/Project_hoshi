<?php
session_start();
require('../dbconfig.php');
require('fpdf.php');
mysqli_query($con,"SET NAMES TIS620");
$sql = "SELECT * FROM tbl_product";
$result = mysqli_query($con,$sql);
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
class PDF extends FPDF

{

// Page header
function Header()
{
    // Logo
    $this->Image('../admin/img/logo1.png',10,17,0,30);
	    $this->Ln(11);
    // Arial bold 15
    $this->SetFont('THSarabunNew Bold','',16);
    // Move to the right
    // Title
		date_default_timezone_set('Asia/Bangkok');
		$this->Cell(0,0,Date("d:m:Y"),0,0,'L');
		$this->Cell(0,0,Date("H:i:s"),0,0,'R');
		
		//นับจากขอบกระดาษด้านล่างขึ้นมา 10 มม.
		$this->SetY( 11 );
 
		//กำหนดใช้ตัวอักษร Arial ตัวเอียง ขนาด 5
		$this->SetFont('Arial','I',7);
 
		$this->Cell(0,10, ' www.hoshibakery.com' ,0,0,'L');
 
		//พิมพ์ หมายเลขหน้า ตรงมุมขวาล่าง
		$this->Cell(0,10, 'page '.$this->PageNo().' of  tp' ,0,0,'R');




    //$this->Cell(1,10,'Hoshibakery',85,17,'C');
    // Line break
    $this->Ln(0);
    $this->SetFont('THSarabunNew','',20);


	$this->SetFont('THSarabunNew Bold','',22);
	$this->SetFillColor(255,83,0);
	$this->SetTextColor(255,255,255);

$this->Ln(35);
	$this->Cell(-1);
	$this->Cell(15,30,"ID",1,0,'C',TRUE);
	$this->Cell(50,30,"รูป",1,0,'C',TRUE);
	$this->Cell(45,30,"ชื่อสินค้า",1,0,'C',TRUE);
    $this->Cell(20,30,"ราคา",1,0,'C',TRUE);
	$this->Cell(20,30,"จำนวน",1,0,'C',TRUE);
	$this->Cell(45,30,"วันเวลาที่ลงข้อมูล",1,1,'C',TRUE);


}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-12);
    // Arial italic 8
    $this->SetFont('THSarabunNew','',12);
    // Page number
  //  $this->Cell(0,10,'Thanks for shopping with us',0,0,'C');
}
}

// Instanciation of inherited class
$pdf=new PDF('P','mm','A4');
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew Bold','','THSarabunNew Bold.php');
$pdf->AliasNbPages();
$pdf->AliasNbPages( 'tp');
$pdf->AddPage();
$pdf->SetFont('THSarabunNew','',20);

$i = 1;
foreach ($rows as $row) {

	$pdf->SetFont('THSarabunNew','',18);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(-1);
	$pdf->Cell(15,30,$row['pro_id'],1,0,'C',TRUE);

	// get current X and Y
    $start_x = $pdf->GetX();
    $start_y = $pdf->GetY();
	// place image and move cursor to proper place. "+ 5" added for buffer
    $pdf->Image('../admin/img/' . $row['pro_img'], $pdf->GetX() + 5, $pdf->GetY() + 0, 0, 30);
    $pdf->SetXY($start_x - 5, $start_y);
    $pdf->Cell(5);
    $pdf->Cell(50, 30, '', 1);

	$pdf->Cell(45,30,$row['pro_name'],1,0,'C',TRUE);
	$pdf->Cell(20,30,$row['pro_price'],1,0,'C',TRUE);
	$pdf->Cell(20,30,$row['amount'],1,0,'C',TRUE);
	$pdf->Cell(45,30,$row['date_save'],1,1,'C',TRUE);


$i++;
}


$pdf->Output();
?>
