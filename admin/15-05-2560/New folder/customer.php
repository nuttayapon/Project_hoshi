<!--------------------------------------------------Header---------------------------------------------->
<?php
require_once('header.php');
?>
<!-----------------------------------Header------------------------------------------------------------->

<FONT FACE="Athiti">
<tr height="" align="center" border="">
	<td>
		<div id="content">
		<table border="0" align="center" width="1000">
		<tr>
			<td>
				<br><table class="table table-striped">
				  <tr>
					<th>ลำดับ</th>
					<th>ชื่อ-สกุล</th>
					<th>ชื่อผู้ใช้</th>
					<th>อีเมล</th>
					<th>เบอร์โทร</th>
					<th>จังหวัด</th>
					<th>ที่อยู่</th>
					<th colspan="2">การดำเนินการ</th>
				  </tr>
				<?php
				  $sql = "SELECT * FROM customers LEFT JOIN provinces ON (customers.province = provinces.pid)";
				  $result = mysqli_query ($con ,$sql);
				  $customers = mysqli_fetch_all($result,MYSQLI_ASSOC);
				  $i = 1;
				 foreach ($customers as $customer) {
					echo '<tr>';
					echo '<td>'.  $i.  '</td>';
					echo '<td>'. $customer['fullname'] . '</td>';
					echo '<td>'. $customer['username'] . '</td>';
					echo '<td>'. $customer['email'] . '</td>';
					echo '<td>'. $customer['tel'] . '</td>';
					echo '<td>'. $customer['pname'] . '</td>';
					echo '<td>'. $customer['address'] . '</td>';
					echo '<td><a href="editcustomer.php?id='. $customer['cid'] .'"><button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> แก้ไข</button></a></td>';
					echo '<td><a href="deletecustomer.php?id='. $customer['cid'] .'"><button class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> ลบ</button></a></td>';
					echo '</tr>';
					$i++;
				  }
				?>
				</table>
					<table>
				<tr>
				<a href="printcustomer.php"><button type="submit" class="btn btn-info btn-block" id="btn"><font size="4" color="#000000" ><FONT FACE="Athiti">
 พิมพ์ข้อมูลลูกค้า </font></button></a><br>
				</tr>
				</table>
			</td>
		</tr>
		</table>
	</div>
	</td>
</tr>
</FONT>
<!-----------------------Footer----------------------------------------------------->
<?php
 require_once('footer.php');
?>
<!----------------------------------Footer----------------------------------------->