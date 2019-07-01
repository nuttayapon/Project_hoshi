<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

 <br> <FONT FACE="Athiti"  size="4">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-9"> <br />
<table width="800" border="1" align="center" class="w3-table-all"">
  <tr class="w3-red"><td colspan="3"><b><font size="5"> Product </font></b></td></tr>
  
<?php
//connect db
    include("../dbconfig.php");
	$pro_id = $_GET['pro_id']; //สร้างตัวแปร pro_id เพื่อรับค่า
	
	$sql = "select * from tbl_product where pro_id=$pro_id";  //รับค่าตัวแปร pro_id ที่ส่งมา
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	//แสดงรายละเอียด
	echo "<tr>";
  	echo "<td width='85' valign='top' bgcolor='#ffff99'><b>Title</b></td>";
    echo "<td width='279'>" . $row["pro_name"] . "</td>";
    echo "<td width='70' rowspan='4' ><img src='../admin/img/" . $row["pro_img"] . " ' width='100'></td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'  bgcolor='#ffff99'><b>Detail</b></td>";
    echo "<td>" . $row["pro_detail"] . "</td>";
  	echo "</tr>";
  	echo "<tr>";
    echo "<td valign='top'  bgcolor='#ffff99'><b>Price</b></td>";
    echo "<td>" .number_format($row["pro_price"],2) . "</td>";
  	echo "</tr>"; 

?>
</table>
		<div align="right"><br>
		<button onclick="window.location.href='p_product.php';" class="btn btn-warning btn-md">
		<FONT FACE="JasmineUPC" size="5"> กลับไปยังหน้าแรก  </FONT></button>
		</div>
<br>
<!---------------PHP footer--------------->
<?php
	require_once('footer.php');
?>
<!---------------PHP footer--------------->