<!-------------------------------------------------------------------------Header----------------------------------------------------------------------------------------->
<?php
require_once('header.php');
?>

<!-------------------------------------------------------------------------PHP----------------------------------------------------------------------------------------->

<?php
$id = $_GET['id'];

$provincesql = "SELECT * FROM provinces";
$provinceresult = mysqli_query($con,$provincesql);
$provinces = mysqli_fetch_all($provinceresult,MYSQLI_ASSOC);


$sql = "SELECT * FROM customers WHERE cid=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_POST['edit'])) {


  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $province = $_POST['province'];
  $address = $_POST['address'];

  $sql = "UPDATE customers SET fullname='$fullname' , username='$username' ,  email='$email' , tel='$tel' , province='$province' , address='$address' WHERE cid=$id";
  mysqli_query($con,$sql);
  //header('location:customer.php');
  echo '<meta http-equiv="refresh" content="0;c_customer.php">';

}

?>
<!---------------------------PHP---------------------------------------------->

<tr height="100%" align="center" border="0">
	<td>
		<div id="content">
			<br><br><h1><FONT FACE="IrisUPC">แก้ไขข้อมูล ID : <?php echo $id;?></h1> </FONT>
			<br>			
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
					<td><div class="form-group">
				  <label>Province :</label>
				  <select class="form-control" name="province">
				  <?php
				  foreach ($provinces as $province) {
						if ($row[0]['province'] == $province['pid']) {
						echo '<option value="' . $province['pid'] . '" selected>' . $province['pname'] . "</option>";
					  } else {
						echo '<option value="' . $province['pid'] . '">' . $province['pname'] . "</option>";
					  }
				  }
				  ?>
				  </select>
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
					<div align="right">
					<br><button type="submit" class="btn btn-success btn-lg" name="edit"><span class="glyphicon  glyphicon-floppy-disk"></span><FONT FACE="JasmineUPC" size="5"> บันทึก </FONT></button>
					&nbsp;&nbsp;
					<a href="c_customer.php"><button type="button" class="btn btn-danger btn-lg" name="edit"><FONT FACE="JasmineUPC" size="5"> ยกเลิก </FONT></button></a>
					<br><br>
					</div>
				</tr>
				</td>
				</table>
					


</div>
	</td>
</tr>
<!----------------------------------------------------------------------------Footer-------------------------------------------------------------------------------------->
<?php
 require_once('footer.php');
?>
<!----------------------------------------------------------------------------Footer-------------------------------------------------------------------------------------->
