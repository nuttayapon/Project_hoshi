<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('../dbconfig.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$order_id = $_REQUEST["order_id"];
	$fullname = $_REQUEST["fullname"];
	$email = $_REQUEST["email"];
	$phone = $_REQUEST["phone"];
	$address = $_REQUEST["address"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE tbl_order SET  
			fullname='$fullname' , 
			email='$email' ,
			phone='$phone' ,
			address='$address' 
			WHERE order_id='$order_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขออร์เดอร์เรียบร้อย');";
	echo "window.location = 'o_order.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}
?>