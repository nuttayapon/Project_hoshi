<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->



<?php
$from = $_GET['from'];
$to = $_GET['to'];
$status = $_GET['status'];
if($status==0) {
	$sql = "SELECT * FROM tbl_order  WHERE order_date BETWEEN '$from' AND '$to'";
	} else {
  $sql = "SELECT * FROM tbl_order  WHERE (order_date BETWEEN '$from' AND '$to') AND order_status=$status";

}
$result = mysqli_query($con,$sql);
$orders = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>


<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="4" color="#000000"><strong>จัดการสินค้า </strong> (<?php echo count($orders); ?>)
	  <form action="findorder.php" method="get" class="form-inline" style="float:right">
      <label class="mr-sm-2">ต้งแต่วันที่...</label>
      <input type="date" class="form-control mb-2 mr-sm-2 mb-sm-0" name="from" value="<?php echo $from ?>">
      <label class="mr-sm-2">ถึงวันที่...</label>
      <input type="date" class="form-control mb-2 mr-sm-2 mb-sm-0" name="to" value="<?php echo $to ?>">
      <label class="mr-sm-2">สถานะ</label>
     <select name="status" class="form-control mb-2 mr-sm-2 mb-sm-0" style="width:120px">
        <?php
        if($status == 1) $s1 = 'selected';
        else  if($status == 2)  $s2 = 'selected';
        else  if($status == 3) $s3 = 'selected';
        else  if($status == 4)  $s4 = 'selected';
        else  if($status == 0)  $s0 = 'selected';

        ?>
        <option value="0" <?php if(isset($s0)) echo $s0?>>ทั้งหมด</option>
        <option value="1" <?php if(isset($s1)) echo $s1?>>รอการชำระเงิน</option>
        <option value="2" <?php if(isset($s2)) echo $s2?>>รอตรวจสอบการชำระเงิน</option>
        <option value="3" <?php if(isset($s3)) echo $s3?>>ยืนยันการชำระเงินรอการจัดส่ง</option>
        <option value="4" <?php if(isset($s4)) echo $s4?>>จัดส่ง</option>

      </select>      &nbsp;&nbsp;
      <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </form>
</font></div>
<div class="panel-body">


  <table class="table table-bordered" border="0" align="center" width="800" > 
  <thead class="">
    <tr>
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
      <td><?php echo $txt ?> </td>
           <td width="200"><center>
		<a href="orderdetail.php?id=<?php echo $order['order_id'];?>">
			<button type="button" class="btn btn-info btn-md"> 
			รายละเอียด </button></a>
	  </td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>
 
<div class="panel panel-warning">
<div class="panel-heading" align="center">
	 <br>
	 <a href="c_print_idto22.php?from=<?php echo $from ?>&to=<?php echo $to ?>"><button  type="button" target="_blank"  class="btn btn-primary btn-md"> <FONT FACE="JasmineUPC" size="5"> พิมพ์ข้อมูลลูกค้า </FONT></button></a>
	 <br><br>
</div>
</div>
</FONT>


 </div>
</div>
</div>
</FONT>
