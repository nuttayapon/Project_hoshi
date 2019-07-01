<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

<?php
//1. เชื่อมต่อ database: 
include('../dbconfig.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

	$order_id = $_REQUEST["order_id"];
	$fullname = $_REQUEST["fullname"];
	$email = $_REQUEST["email"];
	$phone = $_REQUEST["phone"];
	$address = $_REQUEST["address"];

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM tbl_order WHERE order_id='$order_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>

<FONT FACE="Athiti"  size="4">
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10"> <br />
      <h4 align="center"><FONT FACE="Athiti"  size="5"> แก้ไขข้อมูล  </FONT></h4>
      <hr/>
		<form action="o_orderupdate_db.php" method="post" name="update" id="updateuser">
        <div class="form-group">
          <div class="col-sm-12">
            <p><strong> ID การสั่งซื้อ : </strong></p>
				<input type="text" name="order_id" value="<?php echo $order_id; ?>" disabled='disabled' class="form-control" />
				<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" class="form-control" />          
			</div>
        </div>
		<div class="form-group">
          <div class="col-sm-12">
            <p><strong> ชื่อ - นามสกุล </strong></p>
				<input name="fullname" type="text" value="<?php echo $fullname; ?>" size="30" disabled='disabled'  class="form-control" /> 
				<input type="hidden" name="fullname" value="<?php echo $fullname; ?>" class="form-control" />
			</div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p><strong> อีเมล </strong></p>
			<input name="email" type="text" value="<?php echo $email; ?>" size="30" class="form-control" disabled='disabled'/>
			<input type="hidden" name="email" value="<?php echo $email; ?>" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p><strong> เบอร์โทรศัพท์ </strong></p>
            <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>"  disabled='disabled' class="form-control"/>
			<input type="hidden" name="phone" value="<?php echo $phone; ?>" class="form-control" />
          </div>
		</div>
		 <div class="form-group">
          <div class="col-sm-12">
            <p><strong> ที่อยู่  </strong></p>
            <input type="text" name="address" id="address" value="<?php echo $address; ?>"  disabled='disabled' class="form-control"/>
			<input type="hidden" name="address" value="<?php echo $address; ?>" class="form-control" />
          </div>
		</div>

        <div class="form-group">
          <div class="col-sm-12" align="center">
			<br>
				<button type="submit" id="Update" class="btn btn-success btn-sm" name="Update"><span class="glyphicon  glyphicon-floppy-disk"></span><FONT FACE="Athiti" size="5"> บันทึก  </FONT></button>
				&nbsp;&nbsp;&nbsp;
				<a href="o_order.php"><button type="button" class="btn btn-danger btn-sm" name="edit"><FONT FACE="Athiti" size="5"> ยกเลิก </FONT></button></a>
          </div>
        </div>

      </form>
    </div>
  </div>
<br><br>
</FONT>



<!---------------PHP footer--------------->
<?php
	require_once('footer.php');
?>
<!---------------PHP footer--------------->