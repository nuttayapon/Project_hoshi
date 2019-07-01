<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

<FONT FACE="Athiti">
		<div id="content">
		<table border="0" align="center" width="90%">
		<tr>
			<td>
				<br>
				<table width="800" border="0" align="center" class="table table-hover">
			<tr >
			  <td height="40" colspan="8" align="center" bgcolor="#cc6633"><strong><b> <font size="5" color="#ffffff">บันทึกการขาย</font></span></strong></td>
			</tr>
				  <tr align="center" >
					<th  bgcolor="#ffdd97"><center> ID การสั่งซื้อ  </center></th>
					<th  bgcolor="#ffdd97"><center> ชื่อ - นามสกุล </center></th>
					<th  bgcolor="#ffdd97"><center> ที่อยู่ </center></th>
					<th  bgcolor="#ffdd97"><center> สถานะ </center></th>
					<th  bgcolor="#ffdd97"><center> เวลาสั่งซื้อ </center></th>
					<th colspan="3" bgcolor="#ffdd97"><center> การดำเนินการ </center></th>
				  </tr>
				<?php
				 include("../dbconfig.php");
					  $sql = "select * from tb_order_detail";  //เรียกข้อมูลมาแสดงทั้งหมด
					  $result = mysqli_query($con, $sql);
					  while($row = mysqli_fetch_array($result))
					  {
				?>
				<tr>
					 <td><?php echo $row['order_id'] ?></td>
					<td><?php echo $row['p_id'] ?></td>
					<td><?php echo $row['qty'] ?></td>
					<td><?php echo $row['total'] ?></td>

					<td  align='center' width='20'>
					<a href="editorder.php?order_id=<?php echo $row[0];?>">
					<button type="button" class="btn btn-warning btn-sm"><FONT FACE="Athiti" size="4">แก้ไข</FONT></button></a></td>

					<td width='20' align='center'><a href="deleteorder.php?order_id=<?php echo $row[0];?>">
					<button type="button" class="btn btn-danger btn-sm"><FONT FACE="Athiti" size="4">ลบ</FONT></button></a></td>
					</tr>
				    <?php  } ?>
				</table>
				<br>
				<div align="right">
					<a href="print1.php"><button  type="button"  class="btn btn-success" btn-sm"> <FONT FACE="Athiti" size="4"> พิมพ์บันทึกการขาย </FONT></button></a><br><br>
				</div>
			</td>
		</tr>		
		</table>
		</div>
</FONT>
<!---------------PHP footer--------------->
<?php
	require_once('footer.php');
?>
<!---------------PHP footer--------------->