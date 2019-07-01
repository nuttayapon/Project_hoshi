<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

<?php
$q = $_GET['q'];
$sql = "SELECT * FROM tbl_product WHERE pro_name LIKE '%$q%'";
$result = mysqli_query($con,$sql);
$oldproduct = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="5" color="#000000"><strong>จัดการสินค้า </strong> (<?php echo count($oldproduct); ?>)
		<form action="findproduct.php" method="get" class="form-inline" style="float:right">
         <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="q" placeholder="Search..." value="<?php echo $q ?>">
         <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
       </form>
</font></div>
<div class="panel-body">

<table class="table table-bordered" border="0" align="center" width="800" > 
				<thead>
				  <tr>
					<th><center><font size='4'>ลำดับ</font></center></th>
					<th><center><font size='4'>รหัสสินค้า</font></center></th>
					<th><center><font size='4'>ภาพสินค้า</font></center></th>
					<th><center><font size='4'>ชื่อสินค้า</font></center></th>
					<th><center><font size='4'>ราคา</font></center></th>
					<th><center><font size='4'>จำนวนสินค้า</font></center></th>
					<th><center><font size='4'>แก้ไข</font></center></th>
					<th><center><font size='4'>ลบ</font></center></th>
				  </tr>
				</thead>
				<tbody>
				    <?php
						$i = 1;
						foreach($oldproduct as $oldproduct) {
					?>
				  
				   <tr>
						<td scope="row"><center><?php echo $i; ?></center></td>
						<td scope="row"><center><?php echo $oldproduct['pro_id'] ?></center></td>
						<td><center><img src="../img/cake/<?php echo $oldproduct['pro_img'];?> " width="120"></center></td>
						  <td><center><?php echo $oldproduct['pro_name'] ?></center></td>
						  <td><center><?php echo $oldproduct['pro_price'] ?></center></td>
						  <td><center><?php echo $oldproduct['amount'] ?></center></td>
						  <td align='center'><a href="p_editproduct.php?id=<?php echo $oldproduct['pro_id'] ?>" class='btn btn-warning btn-lg'><span class='glyphicon glyphicon-edit'></span></a><br>
						  <td align='center'><a href="p_deleteproduct.php?id=<?php echo $oldproduct['pro_id'] ?>" onclick=\"return confirm('ท่านต้องการลบสินค้านี้ใช่หรือไม่')\"  class='btn btn-danger btn-lg' class="text-danger"><span class='glyphicon glyphicon-trash'></span></a></td>
					</tr>
					<?php $i++; } ?>
				</tbody>
			  </table>

</div>
</div>
</div>
</FONT>



  
