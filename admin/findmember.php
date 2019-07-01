<?php require ('header.php'); ?>


<?php
$from = $_GET['from'];
$to = $_GET['to'];
$sql = "SELECT * FROM customers  WHERE mem_date BETWEEN '$from' AND '$to'";
$result = mysqli_query($con,$sql);
$orders = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>


<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="4" color="#000000"><strong>สมาชิก </strong> (<?php echo count($orders); ?>)
	  <form action="findmember.php" method="get" class="form-inline" style="float:right">
      <label class="mr-sm-2">ต้งแต่</label>
      <input type="date" class="form-control mb-2 mr-sm-2 mb-sm-0" name="from"  value="<?php echo date("Y-m-d")?>">
      <label class="mr-sm-2">ถึง</label>
      <input type="date" class="form-control mb-2 mr-sm-2 mb-sm-0" name="to" value="<?php echo date("Y-m-d")?>">
         <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button>
       </form>
</font></div>
<div class="panel-body">
 

  <table  class="table table-bordered" border="0" align="center" width="800">
  <thead class="">
    <tr>
      <th>ลำดับ</th>
      <th>รูปภาพ</th>
      <th>ชื่อ - นามสกุล</th>
      <th>ชื่อผู้ใช้</th>
      <th>อีเมล</th>
      <th>เบอร์โทรศัพท์</th>
      <th>ที่อยู่</th>
	   <th width="100">วันที่สมัครสมาชิก</th>
      <th width="100">การดำเนินการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      foreach($orders as $user) {
        ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><center><img src="../img/cimg/<?php echo $user['cimg'];?> " width="120"></center></td>
      <td><?php echo $user['fullname'] ?></td>
      <td><?php echo $user['username'] ?></td>
      <td><?php echo $user['email'] ?></td>
      <td><?php echo $user['tel'] ?></td>
	  <td><?php echo $user['address'] ?> 
			<?php echo $user['DISTRICT_NAME'] ?> 
			<?php echo $user['AMPHUR_NAME'] ?> 
			<?php echo $user['PROVINCE_NAME'] ?> 
			<?php echo $user['amphur_postcode'] ?>
	  </td>		
	  <td width="120"><?php echo $user['mem_date'] ?></td>
      <td>
        <a class="btn btn-primary" href="c_print_id.php?id=<?php echo $user['cid'] ?>"><i class="fa fa-print"></i></a>
        <a class="btn btn-danger" href="c_deletecustomer.php?id=<?php echo $user['cid'] ?>"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>
</div>
<div class="panel panel-warning">
<div class="panel-heading" align="center">
	 <br>
	 <a href="c_print_idto.php?from=<?php echo $from ?>&to=<?php echo $to ?>"><button  type="button" target="_blank"  class="btn btn-primary btn-md"> <FONT FACE="JasmineUPC" size="5"> พิมพ์ข้อมูลลูกค้า </FONT></button></a>
	 <br><br>
</div>
</div>
</FONT>
