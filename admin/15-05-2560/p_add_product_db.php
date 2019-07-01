<meta charset="UTF-8" />
<?php 
require_once('condb.php');

    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
	//รับชื่อไฟล์จากฟอร์ม 
	$pro_name = $_POST['pro_name'];
	$pro_detail = $_POST['pro_detail'];
	$pro_price = $_POST['pro_price'];
	$amount = $_POST['amount'];
	$pro_img = (isset($_POST['pro_img']) ? $_POST['pro_img'] : '');
		
	$upload=$_FILES['pro_img'];
	if($upload <> '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['pro_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;

	$path_copy=$path.$newname;
	$path_link="img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['pro_img']['tmp_name'],$path_copy);  
		
	
	}


			 $sql = "INSERT INTO tbl_product 
					(pro_name, 
					pro_detail, 
					pro_price, 
					amount,
					pro_img) 
					VALUES
					('$pro_name',
					'$pro_detail',
					'$pro_price',
					'$amount',
					'$newname')";
		
		$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());

	mysql_close();



	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มสินค้าเรียบร้อย');";
			echo "window.location='p_product.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='p_product.php';";
			echo "</script>";
	  }
	
	
 ?>