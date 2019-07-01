<!--------------------------------------------------Header---------------------------------------------->
<?php
require_once('header.php');
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Bangkok');

?>
<!-----------------------------------Header------------------------------------------------------------->
	<link rel="stylesheet" type="text/css" href="../hoshibakery/include/less/icons.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="4" color="#000000"><strong>สมาชิก </strong>
		<form action="findmember.php" method="get" class="form-inline" style="float:right">
      <label class="mr-sm-2">ต้งแต่</label>
      <input type="date" class="form-control mb-2 mr-sm-2 mb-sm-0" name="from"  value="<?php echo date("Y-m-d")?>">
      <label class="mr-sm-2">ถึง</label>
      <input type="date" class="form-control mb-2 mr-sm-2 mb-sm-0" name="to" value="<?php echo date("Y-m-d")?>">
         <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button>
       </form>
</font></div>
<div class="panel-body" >

<?php
$sql = "SELECT * FROM customers 
LEFT JOIN province ON (customers.province = province.province_id) 
LEFT JOIN amphur ON (customers.amphur = amphur.amphur_id) 
LEFT JOIN district ON (customers.district = district.district_id) 
WHERE mem_status=1";
$result = mysqli_query($con,$sql);
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);

 ?>
  <table  class="table table-bordered" border="0" align="center" width="800">
    <tr>
      <th>ลำดับ</th>
      <th>รูปภาพ</th>
      <th width="100">ชื่อ - นามสกุล</th>
      <th>ชื่อผู้ใช้</th>
      <th>อีเมล</th>
      <th>เบอร์โทรศัพท์</th>
      <th>ที่อยู่</th>
	  <th width="100">วันที่สมัครสมาชิก</th>
      <th width="100">การดำเนินการ</th>
    </tr>
  <tbody>
    <?php
      $i = 1;
      foreach($users as $user) {
        ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <?php
      $file = '../img/cimg/' . $user['cimg'];
      ?>

      <td>
        <a href="<?php echo $file ?>" data-lightbox="<?php echo $user['cid']; ?>" data-title="<?php echo $user['fullname']; ?>">
          <img src="<?php echo $file ?>" width="100">

     </a>
     </td>
      <td><?php echo $user['fullname'] ?></td>
      <td><?php echo $user['username'] ?></td>
      <td width="50"><?php echo $user['email'] ?></td>
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
</div>
<div class="panel panel-warning">
<div class="panel-heading" align="center">
	 <br>
	 <a href="c_print.php"><button  type="button" target="_blank"  class="btn btn-primary btn-md"> <FONT FACE="JasmineUPC" size="5"> พิมพ์ข้อมูลลูกค้า </FONT></button></a>
	 <br><br>
</div>
</div>
</FONT>