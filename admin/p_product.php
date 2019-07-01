<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->
<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="5" color="#000000"><strong>จัดการสินค้า </strong>
		<form action="findproduct.php" method="get" class="form-inline" style="float:right">
         <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="q" placeholder="ค้นหา...">
         <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button>
       </form>
</font></div>
<div class="panel-body" >
				<form id="frmcart" name="frmcart" method="post" action="">
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
				  //connect db
				  include("../dbconfig.php");
				  $i = 1;
				  $sql = "select * from tbl_product order by pro_id";  //เรียกข้อมูลมาแสดงทั้งหมด
				  $result = mysqli_query($con, $sql);
				  while($row = mysqli_fetch_array($result))
				  {
					echo "<tr>";
					echo "<td align='center'><font size='4'> $i </font></td>";
					echo "<td align='center'><font size='4'> " . $row["pro_id"] . " </font></td>";
					echo "<td align='center'><img src='../img/cake/" . $row["pro_img"] ." ' width='150'></td>";
					echo "<td align='center'><font size='4'>" . $row["pro_name"] . "</td>";
					echo "<td align='center'><font size='4'> " . $row["pro_price"] . "  </font></td>";	
					echo "<td align='center'><font size='4'>" . $row["amount"] . "</font></td>";
					echo "<td align='center'><a href='p_editproduct.php?id=$row[0]' class='btn btn-warning btn-lg'><span class='glyphicon glyphicon-edit'></span></a>";
					echo "<td align='center'><a href='p_deleteproduct.php?pro_id=$row[0]' onclick=\"return confirm('ท่านต้องการลบสินค้านี้ใช่หรือไม่')\"  class='btn btn-danger btn-lg'><span class='glyphicon glyphicon-trash'></span></a></td>";
					echo "</tr>";
					$i++;
				  }
				  ?>
				</tbody>
			  </table>
</div>
</div>

<div class="panel panel-warning">
<div class="panel-heading" align="center">
	 <br>
	 <a href="p_add_product.php"><button type="button" class="btn btn-success"><FONT FACE="JasmineUPC" size="5"> เพิ่มสินค้า </FONT></button></a>
	 <a href="p_print.php"><button  type="button" target="_blank"  class="btn btn-primary btn-md"> <FONT FACE="JasmineUPC" size="5"> พิมพ์รายการสินค้า </FONT></button></a>
	 <br><br>
</div>
</div>
</FONT>