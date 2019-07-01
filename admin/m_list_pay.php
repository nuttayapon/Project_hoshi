<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->
<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="4" color="#000000"><strong> รายการสั่งซื้อ  (<?php echo count($orders); ?>)</strong>
	  <form action="findorder.php" method="get" class="form-inline" style="float:right">
      <label class="mr-sm-2">ต้งแต่วันที่</label>
      <input type="date" class="form-control mb-2 mr-sm-2 mb-sm-0" name="from">
      <label class="mr-sm-2">ถึงวันที่</label>
      <input type="date" class="form-control mb-2 mr-sm-2 mb-sm-0" name="to" value="<?php echo date("Y-m-d")?>">
      <label class="mr-sm-2">สถานะ</label>
      <select name="status" class="form-control mb-2 mr-sm-2 mb-sm-0" style="width:120px">
        <option value="0">ทั้งหมด</option>
        <option value="1">รอการชำระเงิน</option>
        <option value="2">รอตรวจสอบการชำระเงิน</option>
        <option value="3">ยืนยันการชำระเงินรอการจัดส่ง</option>
        <option value="4">จัดส่ง</option>
      </select>      &nbsp;&nbsp;
      <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </form>
</font></div>
<div class="panel-body" >


<?php
$sql = "SELECT * FROM tbl_order WHERE order_status=1";
$result = mysqli_query($con,$sql);
$orders = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<table class="table table-bordered" border="0" align="center" width="800" > 
  <thead class="">
    <tr class="panel warning">
      <th><center>ลำดับ</center></th>
      <th><center>เลขที่ใบสั่งซื้อ</center></th>
      <th><center>ชื่อ - นามสกุล</center></th>
      <th><center>วันที่สั่งซื้อ </center></th>
      <th><center>สถานะ</center></th>
      <th><center>รายละเอียดสินค้า</center></th>
  </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      foreach($orders as $order) {
        ?>

    <tr>
      <th scope="row"><center><?php echo $i; ?></center></th>
      <td><center><?php echo $order['order_id'] ?></center></td>
      <td><center><?php echo $order['fullname'] ?></center></td>
      <td><center><?php echo $order['order_date'] ?></center></td>
	      <?php
       switch ($order['order_status']) {
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
      ?>
      <td><center><?php echo $txt ?></center> </td>

      <td width="200"><center>
		<a href="orderdetail.php?id=<?php echo $order['order_id'];?>">
			<button type="button" class="btn btn-info btn-md"> 
			รายละเอียด </button></a>
	  </td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>
 





</div>
</div>

</FONT>