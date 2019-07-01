<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>


<!---------------PHP header--------------->
<table width="800" align="center">
<tr>
	<td>
      <form id="frmcart" name="frmcart" method="post" action="?act=update">
        <br>
		<table width="800" border="0" align="center" class="table table-hover">
			<tr>
			  <td height="40" colspan="5" align="center" bgcolor="#CCCCCC"><strong><b>ประเภทของสินค้า</span></strong></td>
			</tr>
	
  <tr>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>ภาพ</strong></td>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>ชื่อสินค้า</strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>รายละเอียดสินค้า</strong></td>
	<td colspan="2" width="100" align="center" bgcolor="#CCCCCC"><strong>ดำเนินการ</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("../dbconfig.php");
  $sql = "select * from category order by c_id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='center'><img src='../admin/img/" . $row["c_pic"] ." ' width='80'></td>";
	echo "<td align='center'>" . $row["c_name"] . "</td>";
    echo "<td align='center'><a href='product_detail.php?c_id=$row[c_id]'>คลิก</a></td>";
	echo "<td width='50' align='center'><a href='editproduct.php?c_id=$row[0]' class='btn btn-warning btn-sm'>แก้ไข</a></td>";
	echo "<td width='50' align='center'><a href='deleteproduct.php?c_id=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\"  class='btn btn-danger btn-sm'> ลบ </a></td>";
	echo "</tr>";
  }
  ?>
</table>
	<div align="right">
		<a href="add_product.php"><button type="button" class="btn btn-success"><FONT FACE="JasmineUPC" size="5"> เพิ่มสินค้า </FONT></button></a>
	</div>
	

</td>
</tr>
</table>
<!---------------PHP footer--------------->
<?php
	require_once('footer.php');
?>
<!---------------PHP footer--------------->