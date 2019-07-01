<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

<?php 

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_product WHERE pro_id=$id";
$result = mysqli_query($con,$sql);
$oldproduct = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_POST['edit'])) {

  $pro_name = $_POST['pro_name'];
 $pro_detail = $_POST['pro_detail'];
  $pro_price = $_POST['pro_price'];
  $amount = $_POST['amount'];

  $sql = "UPDATE tbl_product SET pro_price='$pro_price', amount='$amount', pro_name='$pro_name',pro_detail='$pro_detail' WHERE pro_id=$id";
  mysqli_query($con,$sql);

  if($_FILES["pro_img"]["name"] != null) {
                 $target_dir = "../img/cake/";
                 $temp = explode(".", $_FILES["pro_img"]["name"]);
                 $newfilename = microtime(true) . '.' . end($temp);
                move_uploaded_file($_FILES["pro_img"]["tmp_name"], $target_dir.$newfilename);
                $sql = "UPDATE tbl_product SET pro_img='$newfilename' WHERE pro_id=$id";
                $result = mysqli_query($con,$sql);
          }

echo '<meta http-equiv="refresh" content="0;p_product.php">';}

?>

<script type="text/javascript">
function ckForm(){
    var form = document.getElementById('formpro').elements;
    for(var i = 1; i < form.length; i++){
        if(form[i].type=="submit") continue;
        if(form[i].value==""){
            if(form[i].name=="pro_price"){
                alert("กรุณาใส่ราคา");
            }
            form[i].focus();
		}
		if(form[i].value==""){
            if(form[i].name=="amount"){
                alert("กรุณาจำนวน");
            }
            form[i].focus();
		}
			if(form[i].value==""){
			if(form[i].name=="pro_name"){
                alert("กรุณาใส่ชื่อสินค้า");
            }
            form[i].focus();
			return false;
		}
	}	
}
</script>
<div style="margin-top:1%;padding:1px 0px;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="5" color="#000000"><strong><center>จัดการสินค้า </center></strong></font></div>
<div class="panel-body"  >
		<form action="" method="post" class="" id="formpro" onSubmit="JavaScript:return ckForm();" enctype="multipart/form-data">
		<table  border="0"  align="center" width="1000">
		<tr>
			<td rowspan="2">
				<div class="panel panel-Success">
				<div class="panel-heading">ภาพสินค้า</div>
				<div class="panel-body">
					<center><img src="../img/cake/<?php echo $oldproduct[0]['pro_img']; ?>" width='270'>
					<br><br><input type="file" name="pro_img"  class="form-control" style="width:210"></center>
				</div>
				</div>
			</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td>
				<div class="panel panel-info">
				<div class="panel-heading"> ชื่อสินค้า  : </div>
				<div class="panel-body">
					<input type="text" name="pro_name" value="<?php echo $oldproduct[0]['pro_name']; ?>" style="width:230" class="form-control">
				</div>
				</div>

				<div class="panel panel-info">
				<div class="panel-heading"> รายละเอียดสินค้า  : </div>
				<div class="panel-body">
				<input type="text"  name="pro_detail" value="<?php echo $oldproduct[0]['pro_detail']; ?>" style="width:230" class="form-control">
				</div>
				</div>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td>
				<div class="panel panel-info">
				<div class="panel-heading"> ราคาสินค้า  : </div>
				<div class="panel-body">
				<input type="text" name="pro_price" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo $oldproduct[0]['pro_price']; ?>" style="width:230"  class="form-control"/>
				</div>
				</div>
		
				<div class="panel panel-info">
				<div class="panel-heading"> จำนวนสินค้าในสต็อก  : </div>
				<div class="panel-body">				
				<input type="text" name="amount" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo $oldproduct[0]['amount']; ?>" class="form-control" style="width:230"/>
				</div>
				</div>
		</td>
		</tr>
		<tr>
		<td colspan="5">
			<div align="center"><br>
				<button type="submit" name="edit"  id="bsave" class="btn btn-primary btn-lg" onclick="return confirm('ยืนยันการแก้ไขสินค้า')" > บันทึก  </button>
				<a href="p_product.php" id="bdel" class="btn btn-danger btn-lg"> ยกเลิก </a><br><br>
			</div>
			</form>
		</td>
		</tr>
		</table>
</div>
</div>

</FONT>
