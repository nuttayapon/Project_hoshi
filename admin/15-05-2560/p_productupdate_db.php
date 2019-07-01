<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('../dbconfig.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$pro_id = $_REQUEST["pro_id"];
	$pro_name = $_REQUEST["pro_name"];
	$pro_detail = $_REQUEST["pro_detail"];
	$pro_price = $_REQUEST["pro_price"];
	$pro_img = $_REQUEST["pro_img"];	
	$amount = $_REQUEST["amount"];	

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE tbl_product SET  
			pro_name='$pro_name' , 
			pro_detail='$pro_detail' ,
			pro_price='$pro_price' ,
			pro_img='$pro_img' , 
			amount='$amount'
			WHERE pro_id='$pro_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขสินค้าเรียบร้อย');";
	echo "window.location = 'p_product.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}
?>