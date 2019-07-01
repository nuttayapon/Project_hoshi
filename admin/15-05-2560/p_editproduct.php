<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

<?php
//1. เชื่อมต่อ database: 
include('../dbconfig.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

$pro_id = $_REQUEST["pro_id"];

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM tbl_product WHERE pro_id='$pro_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>

<br> <FONT FACE="Athiti"  size="4">
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10"> <br />
      <h4 align="center"><FONT FACE="Athiti"  size="5"> แก้ไขข้อมูลสินค้า  </FONT></h4>
      <hr/>
		<form action="p_productupdate_db.php" method="post" name="update" id="updateuser">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ID : </p>
				<input type="text" name="pro_id" value="<?php echo $pro_id; ?>" disabled='disabled' class="form-control" />
				<input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>" class="form-control" />          
			</div>
        </div>
		<div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อสินค้า</p>
				<input name="pro_name" type="text" id="pro_name" value="<?=$pro_name;?>" size="30" placeholder="ภาษาไทยเท่านั้น"  required="required"  class="form-control" />          
			</div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
			<input name="pro_detail" type="text" id="pro_detail" value="<?=$pro_detail;?>" size="30" placeholder="ภาษาไทยเท่านั้น"  required="required" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> ราคา (บาท) </p>
            <input type="text" name="pro_price" id="pro_price" value="<?=$pro_price;?>"  placeholder="ตัวเลขหรือภาษาอังกฤษเท่านั้น"  required="required" class="form-control"/>
          </div>
		</div>
		 <div class="form-group">
          <div class="col-sm-12">
            <p> จำนวนสินค้า </p>
            <input type="text" name="amount" id="amount" value="<?=$amount;?>"  placeholder="ตัวเลขหรือภาษาอังกฤษเท่านั้น"  required="required" class="form-control"/>
          </div>
		</div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <input type="file" name="pro_img" id="pro_img" value="<?=$pro_img;?>"  class="form-control"/>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12" align="center">
				<br>
				<input type="submit" name="Update" id="Update" value="Update" class="btn btn-primary btn-lg" />
				&nbsp;&nbsp;&nbsp;
				<a href="p_product.php"><button type="button" class="btn btn-danger btn-lg" name="btnadd"> ยกเลิก </button></a>
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