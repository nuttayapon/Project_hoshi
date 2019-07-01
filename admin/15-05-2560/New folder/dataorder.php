<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

<tr height="" align="center" border="">
	<td>
		<div id="content">
		<table border="0" align="center" width="85%">
		<tr>
			<td>
				<br><table class="table table-striped">
				  <tr>
					<th> ID ลูกค้า  </th>
					<th> ID สินค้า  </th>
					<th> จำนวน </th>
					<th> ราคา </th>

				  </tr>
				<?php
				 include("../dbconfig.php");
					  $sql = "select * from tb_order_detail";  //เรียกข้อมูลมาแสดงทั้งหมด
					  $result = mysqli_query($con, $sql);
					  while($row = mysqli_fetch_array($result))
					  {
					echo '<tr>';
					echo '<td>'. $row['order_id'] . '</td>';
					echo '<td>'. $row['p_id'] . '</td>';
					echo '<td>'. $row['qty'] . '</td>';
					echo '<td>'. $row['total'] . '</td>';
					echo '</tr>';
					$i++;
				  }
				?>
				</table>
			</td>
		</tr>
		</table>
	</div>
	</td>
</tr>
<!---------------PHP footer--------------->
<?php
	require_once('footer.php');
?>
<!---------------PHP footer--------------->