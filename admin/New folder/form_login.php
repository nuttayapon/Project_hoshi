<?php require('dbconfig.php');
	session_start();
 ?>
<html>
<head>
<title>HoshiBakery</title>
	<meta charset="utf-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" type="text/css" href="https://lnwaccounts.com/system/application/modules/lnwaccounts/_css/style.css?_=20150810000000" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">


</head>
<body>	
		<style type="text/css">
		html,body{
		height:100%;
		margin:0px;
		}

		#main_layout {
		width:100%;
		height:100%;
		}

		body{
		background-image:url("img/bg2.png");
		background-repeat: repeat;
		background-attachment: fixed;
		background-position: center center;
		background-size: cover;
		padding-top: 0px;
		padding-bottom: 0px;
		}



		#content{
		background-color:#ffffff;
		float:center;
		height:100%;
		width:100%;
		box-shadow: 1px 1px 2px 2px #c1c1c1;
		border-radius: 10px 10px 10px 10px;
		} 
		</style>

<FONT FACE="Courier New">
<br>
		<form name="frmlogin"  method="post" action="login.php">
       <table align="center" border="0" width="450">
			<tr>
				<td height="500">
					<?php if(isset($msg)) echo $msg;?>
						<div id="content">
						<div class="login_div" style="padding: 20px 30px;">
						<form id="login_form" method="post" style="margin: 0px;" action="#">
						<div style="margin-bottom: 10px;">
							<h1><FONT FACE="JasmineUPC">เข้าสู่ระบบ</FONT></h1>
						<div class="clear"></div>
						</div>
							<div>
								<input type="text" id="Username" required name="Username" placeholder="Username" class="input_text"><span class="varidate-sign"></span>
							</div>
							<div style="margin-top: 20px;">
								<input type="password" class="input_text" id="Password"required name="Password" placeholder="Password"
								><span class="varidate-sign"></span>
							</div>
							<div style="margin-bottom: 10px; margin-top: 20px;">
								<label><input type="checkbox" name="persistent" value="1"> <span onclick="$('#login_form input[name=persistent]').attr('checked','checked');"><FONT FACE="JasmineUPC" size="4">เข้าสู่ระบบอัตโนมัติ</FONT></span><br></label>
							</div>
							<div>
								<button type="submit" name="login" class="btn btn-success btn-block"><FONT FACE="JasmineUPC" size="5">เข้าสู่ระบบ</FONT></button>
								<a class="forget_a" style="margin-top: 10px; display:inline-block;" href="#"><FONT FACE="JasmineUPC" size="4">ลืมรหัสผ่าน ?</FONT></a>
							<div class="clear"></div>
						</div>
						</div>
						
						<div class="login_div" style="padding: 20px 40px 30px 40px; border-top:1px solid #ddd; ">
						<div class="register_box">
						<center><FONT FACE="JasmineUPC" size="5"><span>ยังไม่มีบัญชีใช่หรือไม่ ? <a href="signup.php">สร้างบัญชีใหม่</a> ไม่เกิน 5 นาที</span></FONT></center><br>
						<a href="signup.php"><button type="button" class="btn btn-warning btn-block"><FONT FACE="JasmineUPC" size="5">สมัครสมาชิก</FONT></button></a>
						</div>
						</div>

						<div class="login_div" style="padding: 20px 40px 30px 40px; border-top:1px solid #ddd; ">
						<div class="register_box">
						<a href="index.php"><button type="button" class="btn btn-danger btn-block"><FONT FACE="JasmineUPC" size="5">กลับสู่หน้าหลัก</FONT></button></a>


						</div>
						</div>

					</div>
				</form>
				</td>
			</tr>

			
		</table>
						</form>
