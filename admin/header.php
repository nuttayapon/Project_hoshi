<!-------------------------------------------- PHP --------------------------------------------->
	<?php require('../dbconfig.php');
		session_start();
		date_default_timezone_set('Asia/Bangkok');

	?>
<!-------------------------------------------- PHP --------------------------------------------->


<html>
<head>
<title>Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../hoshibakery/include/less/icons.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<?php
$sql = "SELECT * FROM customers WHERE mem_status=1";
$result = mysqli_query($con,$sql);
$customers = mysqli_fetch_all($result,MYSQLI_ASSOC);

$sql = "SELECT * FROM tbl_product WHERE pro_status=1";
$result = mysqli_query($con,$sql);
$products = mysqli_fetch_all($result,MYSQLI_ASSOC);

$sql = "SELECT * FROM tbl_order WHERE order_admin=1";
$result = mysqli_query($con,$sql);
$orders = mysqli_fetch_all($result,MYSQLI_ASSOC);

$sql = "SELECT * FROM tbl_order WHERE order_status=1";
$result = mysqli_query($con,$sql);
$pay = mysqli_fetch_all($result,MYSQLI_ASSOC);

$sql = "SELECT * FROM tbl_order WHERE order_status=2";
$result = mysqli_query($con,$sql);
$payed = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<!-------------------------------------------- แถบข้าง --------------------------------------------->


<ul>
  <li>
	<br><center><img src="../admin/img/logooo.png"width="150" height="auto" align="center" alt="Avatar"></center><br><br>
	<a href="indexadmin.php" class="active"><i class="fa fa-home w3-xxlarge"></i>&nbsp;<FONT FACE="Athiti" size="4"> HOME </FONT></a>
  </li>

  <li><a href="p_product.php"><i class="fa fa-cogs  w3-xxlarge"></i>&nbsp;<FONT FACE="Athiti" size="4"> จัดการสินค้า  <span class="badge"> 
	<?php echo count($products) ?> </span></FONT></a>
  </li>

  <li><a href="c_customer.php"><i class="fa fa-user w3-xxlarge"></i>&nbsp;<FONT FACE="Athiti" size="4"> สมาชิก  <span class="badge">
	<?php echo count($customers)?> </span></FONT></a>
  </li>

  <li><a href="m_list.php"><i class="fa fa-eye w3-xxlarge"></i>&nbsp;<FONT FACE="Athiti" size="4"> รายการสั่งซื้อ<span class="badge"> 
	<?php echo count($orders) ?></span></FONT></a>
 </li>
 <?php 
		if(isset($_SESSION['fullname'])) {
			echo '<li>
			<a href="logout1.php">
			<i class="fa fa-sign-out w3-xxlarge" aria-hidden="true"></i><FONT FACE="Athiti" size="4"> ออกจากระบบ  </FONT></a></li>';
			}
?>
</ul>
<!-------------------------------------------- แถบข้าง --------------------------------------------->


<!-------------------------------------------- บนสุด --------------------------------------------->
<center><div style="position: fixed;">
<img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="65" height="30" border="0" alt=""><img src="../img/1.png" width="45" height="30" border="0" alt=""></center></div>
<!-------------------------------------------- บนสุด --------------------------------------------->



<!-------------------------------------------- เริ่ม content --------------------------------------------->
<div style="margin-left:17%;padding:1px 16px;height:1000px;">
<style type="text/css">
	#content{
		background-color:#ffffff;
		float:center;
		height:155;
		width:100%;
		box-shadow: 1px 1px 2px 2px #c1c1c1;
		border-radius: 10px 10px 10px 10px;
</style>

<FONT FACE="Athiti" size="4">
<div id="content">
<table align="center" border="0">
<tr align="center">
<td height="175">
	
	<table align="center" border="0" width="900"> 
	<div align="center">
	<tr align="center">
	<td><a href="m_list.php"><button type="button" class="btn btn-primary btn-lg" style="width:200px;height:90px">
		<i class="fa fa-star  w3-xxlarge"></i>
		<br>รายการสั่งซื้อ  &nbsp;<span class="badge"><?php echo count($orders)?></span></button></a>
	</td>
	<td><a href="m_list_bank.php"><button type="button" class="btn btn-info btn-lg" style="width:200px;height:90px">
		<i class="fa fa-check-circle  w3-xxlarge"></i>
		<br>แจ้งโอนเงิน  &nbsp;<span class="badge"><?php echo count($payed)?></span></button></a>
	</td>
	<td><a href="m_list_pay.php"><button type="button" class="btn btn-warning btn-lg" style="width:200px;height:90px">
		<i class="fa fa-info-circle  w3-xxlarge"></i>
		<br>ยังไม่ได้ชำระเงิน &nbsp;<span class="badge"><?php echo count($pay)?></span></button></a>
	</td>
	<td><a href="o_order.php"><button type="button" class="btn btn-danger btn-lg" style="width:200px;height:90px">
		<i class="fa fa-money  w3-xxlarge"></i>
		<br>บันทึกการขาย</button></a>
	</td>
	</tr>
	</div>
	</table>
</td>
</tr>
</table>
</div>
<!-------------------------------------------- จบ content --------------------------------------------->

















<!-------------------------------------------- สไตล์ --------------------------------------------->
<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 17%;
    background-color: #ffffff;
    position: fixed;
    height: 100%;
    overflow: auto;
	/*border: 1px solid #ddd;*/
	box-shadow: 1px 1px 2px 2px #c1c1c1;
	border-radius:  0px 0px 20px 20px;
	float: center;
}

li a {
    display: block;
    color: #000000; /*สีตัวหนังสือ*/
    padding: 14px 20px;
    text-decoration: none;
}

li a.active {
    background-color: #ff9966;
    color: white; /*สีตัวหนังสือตัวแรก*/
}

li a:hover:not(.active) {
    background-color: #ff9900;
	color:#ffffff; /*สีตัวหนังสือเวลาชี้*/
	text-decoration: none; 
}

		html,body{
		height:100%;
		margin:0px;
		}

		#main_layout {
		width:100%;
		height:100%;
		}

		body{
		background-image:url("../img/bg2.png");
		background-repeat: repeat;
		background-attachment: fixed;
		background-position: center center;
		background-size: cover;
		padding-top: 0px;
		padding-bottom: 0px;
		}

		body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
		.w3-row-padding img {margin-bottom: 12px}
		/* Set the width of the sidebar to 120px */
		.w3-sidebar {width: 300px;background: #8c8c8c;}
		/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
		#main {margin-left: 120px}
		/* Remove margins from "page content" on small screens */
		@media only screen and (max-width: 600px) {#main {margin-left: 0}}
	</style>
<!-------------------------------------------- สไตล์ --------------------------------------------->
