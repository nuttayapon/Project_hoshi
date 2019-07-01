<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require('../dbconfig.php');
require('fpdf.php');
mysqli_query($con,"SET NAMES TIS620");	
class PDF extends FPDF



{
// Page header
function Header()
{
    // Logo
    $this->Image('../img/logo13.png',65,12,0,20);
	$this->Ln(1); //ลงมา
    // Arial bold 15
    $this->SetFont('THSarabunNew Bold','',12);
    // Move to the right
	//พิมพ์ หมายเลขหน้า ตรงมุมขวาล่าง
	$this->Cell(0,-5, 'page '.$this->PageNo().' of  tp' ,0,0,'R');


		

    $this->Cell(40);
    $this->Ln(30); //ตารางลงมา
   
	//$this->SetFont('THSarabunNew','',20);
	//$this->SetFont('THSarabunNew Bold','',16);
	//$this->SetFillColor(255,83,0);
	//$this->SetTextColor(255,255,255);
	//$this->Ln(5);
	//$this->Cell(-3); //ไปทางขวา
	//$this->Cell(10,12,"No.",0,0,'C',TRUE);
	//$this->Cell(20,12,"ID",0,0,'C',TRUE);
	//$this->Cell(75,12,"สินค้า",0,0,'C',TRUE);	
	//$this->Cell(20,12,"จำนวน",0,0,'C',TRUE);
	//$this->Cell(35,12,"ราคาต่อหน่วย ",0,0,'C',TRUE);
	//$this->Cell(35,12,"ราคา (บาท)",0,1,'C',TRUE);

}

// Page footer
function Footer()
{
    $this->SetY(-12);
    $this->SetFont('THSarabunNew','',16);
		//กำหนดใช้ตัวอักษร Arial ตัวเอียง ขนาด 5
		$this->SetFont('Arial','I',7);
		$this->Cell(0,10, ' www.hoshibakery.com' ,0,0,'L');
		date_default_timezone_set('Asia/Bangkok');
		$this->Cell(0,10,Date("d:m:Y  :  H:i:s"),0,0,'R');
		//$this->Cell(-5,-5,Date("H:i:s"),0,0,'R');
		
}
}

// Instanciation of inherited class
$pdf=new PDF('P','mm','A4');
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew Bold','','THSarabunNew Bold.php');
$pdf->AliasNbPages( 'tp');
$pdf->AddPage();
$pdf->SetFont('THSarabunNew','',20);



$pdf->Ln(-1); //ลงมา
$pdf->SetFont('THSarabunNew Bold','',22);
$pdf->SetFillColor(0,128,255);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(-5);
$pdf->Cell(200,13,'ใบเสร็จ',0,1,'C',TRUE);


//////////////////// เริ่มตารางแสดงที่อยู่ในการจัดส่ง และ เริ่มตารางแสดงรายละเอียดในการสั่งซื้อ ///////////////////

// คิวรี่ข้อมูลตาราง tbl_order    
	$sql = "SELECT MAX(order_id) AS order_id FROM tbl_order";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

// คิวรี่ข้อมูลตาราง tbl_order    
	$sql3 = "select * from tbl_order WHERE cid=".$_SESSION["UserID"];  //เรียกข้อมูลมาแสดงทั้งหมด
	$result3 = mysqli_query($con, $sql3);
	$row3 = mysqli_fetch_array($result3);

// คิวรี่ข้อมูลตาราง tbl_order    
	$sql4 = "SELECT MAX(order_date) AS order_date FROM tbl_order";
	$result4 = mysqli_query($con, $sql4);
	$row4 = mysqli_fetch_array($result4);

// คิวรี่ข้อมูลตาราง tbl_order    
	$sql5 = "SELECT * FROM tbl_order 
	LEFT JOIN province ON (tbl_order.province = province.province_id) 
	LEFT JOIN amphur ON (tbl_order.amphur = amphur.amphur_id) 
	LEFT JOIN district ON (tbl_order.district = district.district_id) 
	WHERE cid=".$_SESSION["UserID"];  //เรียกข้อมูลมาแสดงทั้งหมด
	$result5 = mysqli_query($con, $sql5);
	$row5 = mysqli_fetch_array($result5);

$pdf->Ln(0); //ลงมา
$pdf->SetFont('THSarabunNew','',16);
$pdf->SetFillColor(185,220,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(-5);
$pdf->Cell(98,10,'ที่อยู่ในการจัดส่ง',0,0,'C',TRUE);

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(4,10,'',0,0,'C',TRUE);

$pdf->SetFillColor(185,220,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(98,10,'รายละเอียดการสั่งซื้อสินค้า',0,1,'C',TRUE);


// แถวแรกมี ชื่อ กับ วันที่ //
$pdf->SetFillColor(247,247,247);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(-5);
$pdf->Cell(20,10,' ชื่อ : ',0,0,'R',TRUE);
$pdf->Cell(78,10,$row5['fullname'],0,0,'L',TRUE);

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(4,10,'',0,0,'R',TRUE);

$pdf->SetFillColor(247,247,247);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(30,10,' วันที่และเวลา : ',0,0,'R',TRUE);
$pdf->Cell(22,10,$row4['order_date'],0,0,'L',TRUE);
$pdf->Cell(46,10,$row5['order_time'],0,1,'L',TRUE);


// แถวสองมี โทรสัพท์ กับ รหัสลูกค้า //
$pdf->SetFillColor(247,247,247);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(-5);
$pdf->Cell(20,10,' โทรศัพท์ : ',0,0,'R',TRUE);
$pdf->Cell(78,10,$row5['phone'],0,0,'L',TRUE);

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(4,10,'',0,0,'R',TRUE);

$pdf->SetFillColor(247,247,247);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(30,10,'รหัสลูกค้า : ',0,0,'R',TRUE);
$pdf->Cell(68,10,$row3['cid'],0,1,'L',TRUE);


// แถวสองมี ที่อยู่ กับ เลขที่ใบสั่งซื้อ //
$pdf->SetFillColor(247,247,247);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(-5);
$pdf->Cell(20,10,' ที่อยู่ : ',0,0,'R',TRUE);
$pdf->Cell(12,10,$row5['address'],0,0,'L',TRUE);
$pdf->Cell(15,10,$row5['DISTRICT_NAME'],0,0,'L',TRUE);
$pdf->Cell(15,10,$row5['AMPHUR_NAME'],0,0,'L',TRUE);
$pdf->Cell(18,10,$row5['PROVINCE_NAME'],0,0,'L',TRUE);
$pdf->Cell(18,10,$row5['amphur_postcode'],0,0,'L',TRUE);

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(4,10,'',0,0,'R',TRUE);

$pdf->SetFillColor(247,247,247);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(30,10,'เลขที่ใบสั่งซื้อ :  ',0,0,'R',TRUE);
$pdf->Cell(68,10,$row['order_id'],0,1,'L',TRUE);


//////////////////// จบตารางแสดงที่อยู่ในการจัดส่ง และ จบตารางแสดงรายละเอียดในการสั่งซื้อ  ///////////////////





//////////////////// แสดงรายการสินค้า  ///////////////////


$pdf->SetFont('THSarabunNew','',16);
	$pdf->SetFillColor(185,220,255);
	$pdf->SetTextColor(0,0,0);
	$pdf->Ln(5);
	$pdf->Cell(-3); //ไปทางขวา
	$pdf->Cell(10,12,"No.",0,0,'C',TRUE);
	$pdf->Cell(20,12,"รหัสสินค้า",0,0,'C',TRUE);
	$pdf->Cell(75,12,"สินค้า",0,0,'C',TRUE);	
	$pdf->Cell(20,12,"จำนวน",0,0,'C',TRUE);
	$pdf->Cell(35,12,"ราคาต่อหน่วย ",0,0,'C',TRUE);
	$pdf->Cell(35,12,"ราคารวม(บาท)",0,1,'C',TRUE);


// คิวรี่ข้อมูลตาราง tbl_order    
	$sql6 = "select * from tbl_order WHERE cid=".$_SESSION["UserID"];  //เรียกข้อมูลมาแสดงทั้งหมด
	$result6 = mysqli_query($con, $sql6);
	$row6 = mysqli_fetch_array($result6);
	$num1	= $row6['total_price'];
				

	$i = 1;	
	$sql2 = "select * from tbl_orderdetail WHERE order_id='".$row['order_id']."'";  //เรียกข้อมูลมาแสดงทั้งหมด
	$result2 = mysqli_query($con, $sql2);
	while($row2 = mysqli_fetch_array($result2))
	{
	
	$pdf->SetFont('THSarabunNew','',16);
	$pdf->SetFillColor(248,248,248);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(-3);
	$pdf->Cell(10,12,$i,0,0,'C',TRUE);
	$pdf->SetFillColor(247,247,247);
	$pdf->Cell(20,12,$row2["pro_id"],0,0,'C',TRUE);
	$pdf->Cell(75,12,$row2["pro_name"],0,0,'C',TRUE);
	$pdf->Cell(20,12,$row2['pro_qty'],0,0,'C',TRUE);
	$pdf->Cell(35,12,number_format($row2['pro_price'],2),0,0,'C',TRUE);
	$pdf->Cell(35,12,number_format($row2['pro_total_price'],2),0,1,'C',TRUE);
	
$i++; }
	$pdf->SetFont('THSarabunNew Bold','',16);
	$pdf->SetFillColor(225,225,225);
	$pdf->Cell(-3);
	$pdf->Cell(125,12,'จำนวนเงินรวม',0,0,'R',TRUE);
	$pdf->Cell(70,12,number_format($row6['total_price'],2),0,1,'R',TRUE);
	$pdf->SetFillColor(191,191,191);
	$pdf->Cell(-3);

 $pdf->Image('../img/paid.png', 15, 100, 180) ;
//////////////////// แสดงรายการสินค้า  ///////////////////






$pdf->Output();
?>