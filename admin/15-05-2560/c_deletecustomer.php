	
<!-------------------------------------------------------------------------Header----------------------------------------------------------------------------------------->
<?php
require_once('header.php');
?>

<!-------------------------------------------------------------------------PHP----------------------------------------------------------------------------------------->


<?php
$id = $_GET['id'];
$sql = "SELECT * FROM customers WHERE cid=$id";
$result = mysqli_query($con,$sql);
$oldcustomer = mysqli_fetch_all($result,MYSQLI_ASSOC);
if(isset($_POST['delete'])) {
  $sql = "DELETE FROM customers  WHERE cid=$id";
  mysqli_query($con,$sql);
  echo '<meta http-equiv="refresh" content="0;c_customer.php">';
}
?>


<tr height="" align="center" border="0">
	<td>
		<div id="content">
			<br><br>
			
				<h1><FONT FACE="IrisUPC">แก้ไขข้อมูล ID : <?php echo $id;?></h1> </FONT>
				<div class="container">
				<h3><FONT FACE="JasmineUPC" size="6"> คุณต้องการลบข้อมูลของ <?php echo $oldcustomer[0]['fullname'];?> ออกจากระบบ ?</h3>
		
				<form action="" method="post" class="">
				<div align="center">
					<br><button type="submit" class="btn btn-success btn-lg" name="delete" ><span class="glyphicon  glyphicon-floppy-disk"></span><FONT FACE="JasmineUPC" size="5"> ลบข้อมูล </FONT></button>
					&nbsp;&nbsp;
					<a href="c_customer.php"><button type="button" class="btn btn-danger btn-lg" name="edit"><FONT FACE="JasmineUPC" size="5"> ยกเลิก </FONT></button></a>
					<br><br>
					</div>
				</form>
				</div>
			
</div>
	</td>
</tr>
			
<?php
require_once('footer.php');
?>
			
