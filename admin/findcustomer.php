<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->
<?php
$q = $_GET['q'];
$sql = "SELECT * FROM customers 
LEFT JOIN province ON (customers.province = province.province_id) 
LEFT JOIN amphur ON (customers.amphur = amphur.amphur_id) 
LEFT JOIN district ON (customers.district = district.district_id) 
WHERE mem_status=1 AND (fullname LIKE '%$q%' OR username LIKE '%$q%' OR email LIKE '%$q%') ";
$result = mysqli_query($con,$sql);
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);

 ?>

 <div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="5" color="#000000"><strong>สมาชิก  (<?php echo count($users); ?>)</strong>
		<form action="findcustomer.php" method="get" class="form-inline" style="float:right">
         <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="q" placeholder="ค้นหา...">
         <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button>
       </form>
</font></div>
<div class="panel-body" >
 

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
      <th width="100">การดำเนินการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = 1;
      foreach($users as $user) {
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
      <td>
        <a class="btn btn-primary" href="c_editcustomer.php?id=<?php echo $user['cid'] ?>"><i class="fa fa-edit"></i></a>
        <a class="btn btn-danger" href="c_deletecustomer.php?id=<?php echo $user['cid'] ?>"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>
</div>



