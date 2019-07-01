<?php
session_start();
require('../dbconfig.php');
require('fpdf.php');
mysqli_query($con,"SET NAMES TIS620");
$sql = "SELECT * FROM tbl_order";
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
		
		//�Ѻ�ҡ�ͺ��д�ɴ�ҹ��ҧ����� 10 ��.
		$this->SetY( 11 );
 
		//��˹������ѡ�� Arial ������§ ��Ҵ 5
		$this->SetFont('Arial','I',7);
 
		$this->Cell(0,10, ' www.hoshibakery.com' ,0,0,'L');
 
		//����� �����Ţ˹�� �ç��������ҧ
		$this->Cell(0,10, 'page '.$this->PageNo().' of  tp' ,0,0,'R');




    //$this->Cell(1,10,'Hoshibakery',85,17,'C');
    // Line break
    $this->Ln(0);
    $this->SetFont('THSarabunNew','',20);


	$this->SetFont('THSarabunNew Bold','',22);
	$this->SetFillColor(255,83,0);
	$this->SetTextColor(255,255,255);

$this->Ln(35);
	$this->Cell(-5);
	$this->Cell(12,12,"ID",1,0,'C',TRUE);
    $this->Cell(50,12,"���� - ���ʡ��",1,0,'C',TRUE);
  $this->Cell(55,12,"�����",1,0,'C',TRUE);
  $this->Cell(35,12,"�������Ѿ��",1,0,'C',TRUE);
  $this->Cell(50,12,"�ѹ���ҷ������Թ���",1,1,'C',TRUE);

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
  $pdf->Cell(-5);
	$pdf->Cell(12,12,$row['order_id'],1,0,'C',TRUE);
  $pdf->Cell(50,12,$row['fullname'],1,0,'C',TRUE);
	 $pdf->Cell(55,12,$row['email'],1,0,'C',TRUE);
	  $pdf->Cell(35,12,$row['phone'],1,0,'C',TRUE);
  $pdf->Cell(50,12,$row['order_date'],1,1,'C',TRUE);

$i++;
}


$pdf->Output();
?>
