<!-------------------------------------------Header------------------------------------------------------>
<?php
require_once('header.php');
require_once('selectat.php');
?>
<body onload="Add();">
<!-------------------------------------------Header------------------------------------------------------>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM customers WHERE cid=".$_SESSION["UserID"];
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);


		$sql = "SELECT * FROM province";
		$result = mysqli_query($con,$sql);
		$province = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$sql = "SELECT * FROM district";
		$result = mysqli_query($con,$sql);
		$district = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$sql = "SELECT * FROM amphur";
		$result = mysqli_query($con,$sql);
		$amphur = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$sql = "SELECT * FROM amphur_postcode";
		$result = mysqli_query($con,$sql);
		$amphur_postcode = mysqli_fetch_all($result,MYSQLI_ASSOC);


if(isset($_POST['edit'])) {
$cimg = $_POST['cimg'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$address=$_POST['address'];
$district=$_POST['district'];
$amphur=$_POST['amphur'];
$province=$_POST['province'];
$amphur_postcode=$_POST['amphur_postcode'];

  $sql = "UPDATE customers SET  cimg='$cimg' , fullname='$fullname' , username='$username' ,  email='$email' , tel='$tel' , address='$address',district='$district',amphur='$amphur',province='$province',amphur_postcode='$amphur_postcode' WHERE cid=$id";
  mysqli_query($con,$sql);
  //header('location:customer.php');
  echo '<meta http-equiv="refresh" content="0;p_customer.php">';

}

?>
<!---------------------------PHP---------------------------------------------->
<table border="0" width="800" align="center">
<tr>
	<td>

				<br><br><h1><FONT FACE="IrisUPC"><center>แก้ไขข้อมูล ID : <?php echo $id;?></center></h1> </FONT>
				<form id="demo1" align="center" name="register" method="post" action=""  onSubmit="JavaScript:return fncSubmit();" >	
				<table border="0" width="800">
					<form action="" method="post" class="">
				<tr>
					<td><div class="form-group">
					<label>ID :</label>
					<input type="text" class="form-control" name="id" value="<?php echo $row[0]['cid']; ?>" disabled>
				  </div></td>
				</tr>
				<tr>
					<td>  <div class="form-group">
					<label>Full Name :</label>
					<input type="text" class="form-control" name="fullname" value="<?php echo $row[0]['fullname']; ?>">
				  </div></td>
				</tr>
				<tr>
					<td> <div class="form-group">
					 <label>Username :</label>
					 <input type="text" class="form-control" name="username" value="<?php echo $row[0]['username']; ?>">
				   </div></td>
				</tr>
				<tr>
					<td> <div class="form-group">
					<label>E-mail :</label>
					<input type="text" class="form-control" name="email" value="<?php echo $row[0]['email']; ?>">
				  </div></td>
				</tr>
				<tr>
					<td><div class="form-group">
					<label>Tel :</label>
					<input type="text" class="form-control" name="tel" value="<?php echo $row[0]['tel']; ?>">
				  </div></td>
				</tr>
				<tr>
				  <td>
					<div class="form-group">
					<label>Address :</label>
					<input type="text" class="form-control" name="address" value="<?php echo $row[0]['address']; ?>">
				  </div>
				  </td>
				</tr>
				<tr>
					<td>
					<div class="form-group">
					<label>จังหวัด :</label>
					<select class="form-control select2-single" name="province" id="Proviance">
					<option value="<?php echo $row[0]['province']; ?>">---เลือกจังหวัด---</option>
					</select>
					</div>
					</td>
				</tr>
				<tr>
					<td>
					<div class="form-group">
					<label>เขต/อำเภอ :</label>
					<select name="amphur" id="District" class="form-control select2-single">
					<option value="<?php echo $row[0]['amphur']; ?>">---เลือกอำเภอ---</option>
					</select>
					</div>
					</td>
				</tr>
				<tr>
					<td>
					<div class="form-group">
					<label>เเขวง/ตำบล :</label>
					<select name="district" id="Subdistrict" class="form-control select2-single">
					<option value="<?php echo $row[0]['district']; ?>">---เลือกตำบล---</option>
					</select>
					</div>
					</td>
				</tr>
				<tr>
					<td>
					<div class="form-group">
					<label>รหัสไปรษณีย์ :</label>
					<select name="amphur_postcode" id="Postcode" class="form-control select2-single">
					<option value="<?php echo $row[0]['amphur_postcode']; ?>">---เลือกรหัสไปษณีย์---</option>
					</select>
					</div>
					</td>
				</tr>
				<tr>
					<td>  <div class="form-group">
					<label>Picture :</label>
					<img id="picPreview" style="width:220;margin:5px">
					<input type="file" class="form-control" name="cimg" value="<?php echo $row[0]['cimg']; ?>">
							<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
							<script>
							$('[name="cimg"]').change(function(){
							 
								/* original file upload path */
								$('#picPath').text($(this).val());
							 
								var file = this.files[0];
								/* get picture details */
								$('#picLastModified').text(file.lastModified);
								$('#picLastModifiedDate').text(file.lastModifiedDate);
								$('#picName').text(file.name);
								$('#picSize').text(file.size);
								$('#picType').text(file.type);
							 
								/* set image preview */
								if( ! file.type.match(/image.*/))
								{
									return true;
								}
								var reader = new FileReader();
								reader.onload = function (event)
								{
									$('#picPreview').attr('src', event.target.result);
							 
									/* get image dimensions */
									var image = new Image();
									image.src = reader.result;
									image.onload = function()
									{
										$('#picDimensionsWidth').text(image.width);
										$('#picDimensionsHeight').text(image.height);
									};
							 
								}
								reader.readAsDataURL(file);
							 
							});
							</script>
				  </div></td>
				</tr>
				<tr>
				<td>
					<div align="right">
					<br><button type="submit" class="btn btn-success btn-lg" name="edit"><span class="glyphicon  glyphicon-floppy-disk"></span><FONT FACE="JasmineUPC" size="5"> บันทึก </FONT></button>
					&nbsp;&nbsp;
					<a href="p_customer.php"><button type="button" class="btn btn-danger btn-lg" name="edit"><FONT FACE="JasmineUPC" size="5"> ยกเลิก </FONT></button></a>
					<br><br>
					</div>
				</tr>
				</td>
				</table>
				</form>
</td>
</tr>
</table>
<!-------------------------------------------- จาวา -------------------------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script>
		$(function(){
			//เรียกใช้งาน Select2
			$(".select2-single").select2();
		});		
	</script>
<!-------------------------------------------- จาวา -------------------------------------------->

<!---------------------------------------Footer-------------------------------------------------------->
<?php
 require_once('footer.php');
?>
<!---------------------------------------Footer-------------------------------------------------------->
