<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>


<!---------------PHP header--------------->
<FONT FACE="Athiti">
<table width="900" align="center">
<tr >
	<td>
      <form id="frmcart" name="frmcart" method="post" action="?act=update">
        <br>
		<table width="800" border="0" align="center" class="table table-hover">
			<tr >
			  <td height="40" colspan="6" align="center" bgcolor="#cc6633"><strong><b> <font size="5" color="#ffffff">จัดการสินค้า</font></span></strong></td>
			</tr>
  <tr >
    <td width="100" align="center" bgcolor="#ffdd97"><strong><font size='4'>ภาพ</strong></td>
    <td width="200" align="center" bgcolor="#ffdd97"><strong><font size='4'>ชื่อสินค้า</strong></td>
	<td width="200" align="center" bgcolor="#ffdd97"><strong><font size='4'>จำนวนสินค้า</strong></td>
    <td width="100" align="center" bgcolor="#ffdd97"><strong><font size='4'>รายละเอียดสินค้า</strong></td>
	<td colspan="2" width="100" align="center" bgcolor="#ffdd97"><strong><font size='4'>ดำเนินการ</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("../dbconfig.php");
  $sql = "select * from tbl_product order by pro_id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='center'><img src='../admin/img/" . $row["pro_img"] ." ' width='90'></td>";
	echo "<td align='center'><font size='4'>" . $row["pro_name"] . "</td>";
	echo "<td align='center'>" . $row["amount"] . "</td>";
    echo "<td width='100' align='center'><a href='p_product_detail.php?pro_id=$row[0]' class='btn btn-info btn-sm'><font size='4'>ข้อมูลสินค้า</a>";
	echo "<td width='100' align='center'><a href='p_editproduct.php?pro_id=$row[0]' class='btn btn-warning btn-sm'><font size='4'>แก้ไข</a>";
	echo "<td width='50' align='center'><a href='p_deleteproduct.php?pro_id=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\"  class='btn btn-danger btn-sm'><font size='4'> ลบ </a></td>";
	echo "</tr>";
  }
  ?>
</table>
	<div align="right">
		<a href="p_add_product.php"><button type="button" class="btn btn-success"><FONT FACE="JasmineUPC" size="5"> เพิ่มสินค้า </FONT></button></a>
	

	<a href="p_print.php"><button  type="button"  class="btn btn-primary btn-md"> <FONT FACE="JasmineUPC" size="5"> พิมพ์รายการสินค้า </FONT></button></a><br><br>
</div>
</td>
</tr>
</table>
</FONT>
<!---------------PHP footer--------------->
<?php
	require_once('footer.php');
?>
<!---------------PHP footer--------------->