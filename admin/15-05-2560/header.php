<!-- PHP -->
	<?php require('../dbconfig.php');

		session_start();
	?>


<!-- PHP -->

<html>
<head>
<title>HoshiBakery</title>
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


	
</head>
<body>

<FONT FACE="Courier New">
<table id="main_layout" cellpadding="0" cellspacing="0" border="0" align="center">
	

	<!-- header login -->
	<tr height="20">
		<td>
			<div id="hlogin" >
				<ul>
					<?php 
						if(isset($_SESSION['fullname'])) {
							echo '<li style="float:right">
							<a href="logout1.php">
							<i class="fa fa-sign-out" aria-hidden="true"></i><FONT FACE="Athiti" size="3"> ออกจากระบบ  </FONT></a></li>';
							echo '<li style="float:right">
							<a href="customer.php"><i class="nav-link" aria-hidden="true" ></i><FONT FACE="Athiti" size="3">'.$_SESSION['fullname'].'  </FONT></a></li>';
							
							}
					?>
				</ul>
			</div>
		</td>
	</tr>
	<!-- header login -->


	<!-- header logo -->
	<tr height="80">	
		<td>
			<div id="hpic">
				<img src="../img/header.jpg" width="100%" height="auto" border="0" alt="">
			</div>
		</td>	
	</tr>
	<!-- header logo -->


	<!-- header menu -->
	<tr height="45">
		<td>
			<div id="menu">
				<ul>
					<li><a href="p_product.php"><strong>Product</strong></a></li>
					<li><a href="o_order.php"><strong>Order</strong></a></li>
					<li><a href="c_customer.php"><strong>Customer</strong></a></li>
				</ul>
			</div>
		</td>
	</tr>
	<!-- header menu -->


	<!-- เริ่ม content -->
	<tr height="100%">	
		<td>
			<div id="content">

	<!-- เริ่ม content -->




	<style type="text/css">
		html,body{
		height:100%;
		margin:0px;
		}

		#main_layout {
		width:80%;
		height:100%;
		}

		body{
		background-image:url("../img/bg10.png");
		background-repeat: repeat;
		background-attachment: fixed;
		background-position: center center;
		background-size: cover;
		padding-top: 0px;
		padding-bottom: 0px;
		}



		/*---------------header login--------------*/
		#hlogin{
		 width:100%;
		 }
			#hlogin ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color:#ffffff;    < แถบเมนู >
				}
			#hlogin li{
				float: left;
				border-right:1px solid #bbb;
				}
			#hlogin li a {
				display: block;
				color: black;				<ตัวหนังสือ>
				text-align: center;
				font-size: 14px;
				padding: 3px 7px;
				text-decoration: none;
				}
			#hlogin li a:hover:not(.active) {
				background-color: #cecece;			<สีตัวชี้>
				}
			#hlogin .active {
				background-color:#fe7275;		<สีตัวแรก>
				}
		/*---------------header login--------------*/



		/*---------------header logo---------------*/
		#hpic{
		background-color:#ffffff;
		float:center;
		}
		/*---------------header logo---------------*/



		/*---------------header menu---------------*/
		#menu{
		text-align:center;
		}
		#menu p {
			font-family: "Times New Roman", serif;
		}
		#menu li {
		display:inline;
		}
		#menu a {
		text-decoration:none; 
		padding:0px;
		}
		#menu ul {
				list-style-type: none;
				margin: 0px;
				padding: 15px;  /*ขนาดของแถบเมนู*/
				overflow: hidden;
				background-color: #555555;    < แถบเมนู >
		}
		#menu li{
				float: center;
				border-right:2px solid #bbb;
		}
		#menu li a {
				color: #ffffff;<ตัวหนังสือ>
				text-align: center;
				font-size: 18px;
				padding: 12px 17px; /*ระยะห่างของจตัวหนังสือ*/
				text-decoration: none;
		}
		#menu li a:hover:not(.active) {
			background-color:#;
			color:#c0c0c0;
			text-decoration: none;
		}
		#menu .active {
				background-color:#c0c0c0;		<สีตัวแรก>
		}
		/*---------------header menu---------------*/



		/*---------------content---------------*/
		#content{
		background-color:#ffffff;
		float:center;
		height:100%;
		} 
		/*---------------content---------------*/

	</style>