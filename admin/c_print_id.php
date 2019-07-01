
<?php
session_start();
require('../dbconfig.php');
require('fpdf.php');
mysqli_query($con,"SET NAMES TIS620");
$id = $_GET['id']; 
$sql = "SELECT * FROM customers WHERE cid=".$id;

$result = mysqli_query($con,$sql);
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
class PDF extends FPDF


{

// Page header
function Header()
{
    // Logo
    $this->Image('img/logo1.png',10,17,0,30);
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

$this->Ln(25);


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

$sql = "SELECT * FROM customers WHERE cid=".$id;
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($row as $rows) {
$pdf->Ln(11); //ลงมา
$pdf->SetFont('THSarabunNew Bold','',18);
$pdf->SetFillColor(255,83,0);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(3);
$pdf->Cell(100,12,' ข้อมูลของลูกค้า ID : ',0,0,'R',TRUE);
$pdf->Cell(85,12,$rows['cid'],0,1,'L',TRUE);
$pdf->Cell(0.1);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(3);
$pdf->Cell(40,12,' ชื่อ : ',1,0,'R',TRUE);
$pdf->Cell(145,12,$rows['fullname'],1,1,'L',TRUE);
$pdf->Cell(3);
$pdf->Cell(40,12,' อีเมล : ',1,0,'R',TRUE);
$pdf->Cell(145,12,$rows['email'],1,1,'L',TRUE);
$pdf->Cell(3);
$pdf->Cell(40,12,' เบอร์โทรศัพท์ : ',1,0,'R',TRUE);
$pdf->Cell(145,12,$rows['tel'],1,1,'L',TRUE);
$pdf->Cell(3);
$pdf->Cell(40,12,' ที่อยู่ : ',1,0,'R',TRUE);
$pdf->Cell(145,12,$rows['address'],1,1,'L',TRUE);
$pdf->Cell(3);
$pdf->Cell(40,30,' ภาพ : ',1,0,'R',TRUE);
// get current X and Y
    $start_x = $pdf->GetX();
    $start_y = $pdf->GetY();
	// place image and move cursor to proper place. "+ 5" added for buffer
    $pdf->Image('../img/cimg/' . $rows['cimg'], $pdf->GetX() + 5, $pdf->GetY() + 0, 0, 30);
    $pdf->SetXY($start_x - 5, $start_y);
    $pdf->Cell(5);
    $pdf->Cell(145, 30, '', 1);
}
$i++;


$pdf->Output();
?>
