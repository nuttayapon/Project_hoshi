<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

      <?php
      $orderid = $_GET['id'];
      $sql = "SELECT * FROM tbl_order  WHERE order_id='$orderid' LIMIT 1";
      $result = mysqli_query($con,$sql);
      $order = mysqli_fetch_all($result,MYSQLI_ASSOC);
 ?>
 <?php
if(isset($_POST['save'])) {
  $status = $_POST['status'];
  $tracking = $_POST['tracking'];

  $sql = "UPDATE tbl_order SET order_status='$status' , or_tracking='$tracking' WHERE order_id=$orderid";
  $result = mysqli_query($con,$sql);
	echo '<meta http-equiv="refresh" content="0;m_list.php">';}
 ?>


<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="5" color="#000000"><strong>รายละเอียดรายการสั่งซื้อของ ID : <?php echo $order[0]['order_id']?></strong>
</font></div>
<div class="panel-body" >

<table align="center" border="0" width="900" >
<tr>
<td>
<div class="panel panel-primary">
<div class="panel-heading">สถานะ</div>
<div class="panel-body" align="center">
	<form class="form-inline" action="" method="post">
  <label class="mr-sm-2">Status</label>
  <?php
  if($order[0]['order_status'] == 1) $s1 = 'selected';
  else  if($order[0]['order_status'] == 2)  $s2 = 'selected';
  else  if($order[0]['order_status'] == 3) $s3 = 'selected';
  else  if($order[0]['order_status'] == 4)  $s4 = 'selected';

  ?>
  <select name="status" class="form-control mb-2 mr-sm-2 mb-sm-0">
    <option value="0" <?php if(isset($s0)) echo $s0?>>ทั้งหมด</option>
        <option value="1" <?php if(isset($s1)) echo $s1?>>รอการชำระเงิน</option>
        <option value="2" <?php if(isset($s2)) echo $s2?>>รอตรวจสอบการชำระเงิน</option>
        <option value="3" <?php if(isset($s3)) echo $s3?>>ยืนยันการชำระเงินรอการจัดส่ง</option>
        <option value="4" <?php if(isset($s4)) echo $s4?>>จัดส่ง</option>

  </select>
  &nbsp;&nbsp;&nbsp;
	  <label class="mr-sm-2">หมายเลขการจัดส่ง</label>
	  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="tracking" value="<?php echo $order[0]['or_tracking']?>">
	  <button class="btn btn-success" type="submit" name="save">Save</button>
	</form>

</div>
</div>
</td>
</tr>
</table>


	<?php
		// วนลูปแสดงรายการ order ของสมาชิกนั้นๆ ที่กำลังล็อกอิน    //		$sql = "select * from tbl_order Order By order_id ASC";  //เรียกข้อมูลมาแสดงทั้งหมด
		$sql = "select * from tbl_order 
		LEFT JOIN province ON (tbl_order.province = province.province_id) 
		LEFT JOIN amphur ON (tbl_order.amphur = amphur.amphur_id) 
		LEFT JOIN district ON (tbl_order.district = district.district_id) 
		 WHERE order_id='$orderid' LIMIT 1";  //เรียกข้อมูลมาแสดงทั้งหมด
		$result = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($result))
		{
	?>	


<table align="center" border="0" width="900" >
<tr>
<td>
	  <div class="panel panel-info">
      <div class="panel-heading"><font size="4"> เลขที่ใบสั่งซื้อ : <?php echo $row['order_id'] ?></font></div>
      <div class="panel-body">
			<font size="4"><strong> ชื่อ : </strong>&nbsp;&nbsp;<?=$row['fullname']?></font><br>
			<font size="4"><strong> ที่อยู่ในการจัดส่ง : </strong>&nbsp;&nbsp;<?=$row['address']?> <?=$row['DISTRICT_NAME']?> <?=$row['AMPHUR_NAME']?> <?=$row['PROVINCE_NAME']?> <?=$row['amphur_postcode']?> </font><br>
			<font size="4"><strong> วันที่และเวลาที่สั่งซื้อ : </strong>&nbsp;&nbsp;<?=$row['order_date']?> &brvbar; <?=$row['order_time']?></font><br>
              <br>
              <h4><FONT FACE="Athiti">Status : <?php
               switch ($order[0]['order_status']) {
                 case '1':
                  $txt = '<span class="text-danger">รอการชำระเงิน</span>';
                   break;
                  case '2':
                    $txt = '<span class="text-warning">รอตรวจสอบการชำระเงิน</span>';
                   break;
                    case '3':
                      $txt = '<span class="text-primary">ยืนยันการชำระเงินรอการจัดส่ง</span>';
                       break;
                       case '4':
                         $txt = '<span class="text-success">จัดส่ง</span>';
                          break;
                 default:
                   break;
               }
              echo '<strong>'.$txt.'</strong>';
              ?></h4>

              <?php if($order[0]['order_status'] == 4) { ?>
                <h4>Tracking Number : <?php echo $order[0]['or_tracking']?></h4>

                <?php } ?>
                <br><br>
                <?php if($order[0]['order_status'] == 3 || $order[0]['order_status'] == 4) { ?>
                  <h4><a target="_blank" href="printorder.php?id=<?php echo $order[0]['order_id'] ?>" role="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</a></h4>

                  <?php } ?>
              <?php if($order[0]['order_status'] == 2) { ?>
              <?php
              $file = '../admin/img/bank/' . $order[0]['or_payslip'];
              ?>
              <br>
              <img src="<?php echo $file ?>" width="300">
              <h5>Bank : <?php echo strtoupper($order[0]['or_paybank']) ?></h5>
              <?php } ?>
              <br><br>



		   <table class="table table-bordered" align="center">
					<thead>
					  <tr class="panel warning" >
						<th><center>สินค้า</center></th>
						<th><center>ราคา</center></th>
						<th><center>จำนวน</center></th>
						<th><center>ราคารวม</center></th>
					  </tr>
					</thead>
					<?php  
					// วนลูป คิวรี่ข้อมูลตาราง tbl_orderdetail  
					$i=1;
					$sql2 = "select * from tbl_orderdetail WHERE order_id='".$row['order_id']."'";  //เรียกข้อมูลมาแสดงทั้งหมด
					$result2 = mysqli_query($con, $sql2);
					while($row2 = mysqli_fetch_array($result2))
					{
					?>
					<tbody>
					  <tr>
						<td><center><?=$row2['pro_name']?></center></td>
						<td><center><?=$row2['pro_price']?></center></td>
						<td><center><?=$row2['pro_qty']?></center></td>
						<td><center><?=number_format($row2['pro_total_price'],2)?></center></td>
					  </tr>
					</tbody>
					<?php $i++; } ?>

					<tr>
					<td colspan="3" align="right"><strong>รวม : </strong></td>
					<td><strong><center><?=number_format($row['total_price'],2)?></center></strong></td>
					<tr>
				</table>
	  </div>
      </div>
</td>
</tr>
</table>
<?php  } ?>	
</div>
</div>

</FONT>