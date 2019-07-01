<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

<?php
//============ Start Session และทำการเรียก Function ติดต่อฐานข้อมูล 
require("../connect/function.php");
//=========== ถ้ามีการลบรายการสินค้า
						if($_GET["Action"]=="Delete")
						{
							//===========  ลบตาราง cusorder หมายเลขใบสั่งซื้อ
							$sql_del= "delete from cusorder  where OrderNo='".$_GET["OrderNo"]."'";
							$dbquery_del = mysqli_query($sql_del);
							//===========  ลบรายละเอียดว่าได้สั่งซื้อะไรบ้าง
							$sql_del= "delete from order_detail  where OrderNo='".$_GET["OrderNo"]."'";
							$dbquery_del = mysqli_query($sql_del);							

									echo"<script language='JavaScript'>";
									echo"alert('ลบข้อมูลเรียบร้อยแล้ว');";
									echo"window.location='cusorder.php';";
									echo"</script>";							
						}
						
?>
<html>
<title>..:: ระบบจัดการฐานข้อมูล ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../css/styles.css" type="text/css">
<div align="center"><br>
  <table cellspacing=1 cellpadding=4 width="75%" bgcolor=#CCCCCC border=0 align="center" height="10">
    <tbody>
      <tr bgcolor=#e5e5e5> 
        <td width="100%" bgcolor="#FFFFFF"> <div align="center"></div>
          <table cellspacing=1 cellpadding=4 width="100%" border=0 align="center" height="10">
            <tbody>
              <tr bgcolor=#e5e5e5> 
                <td width="35%" bgcolor="#FFFFFF"> <div align="left"><b><img src="../image/allrowto.gif" width="11" height="11" align="absbottom"> 
                    รายการสั่งซื้อ</b></div></td>
                <td width="22%" align=middle bgcolor="#FFFFFF"> <div align="left"> 
                  </div></td>
                <td width="43%" bgcolor="#FFFFFF"> <div align="right"><a href="head.php">กลับไปหน้าหลัก</a></div></td>
              </tr>
            </tbody>
          </table></td>
      </tr>
    </tbody>
  </table>
</div>

  <table width="68%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="58%">&nbsp;</td>
      <td width="42%">&nbsp;</td>
    </tr>
  </table>
  
<table cellspacing=1 cellpadding=3 width="75%" bgcolor=#CCCCCC border=0 align="center" height="10">
  <tbody>
    <tr bgcolor=#e5e5e5> 
      <td bgcolor="#FFFFFF"><div align="center">รหัสสั่งซื้อ</div></td>
      <td bgcolor="#FFFFFF">ชื่อ</td>
      <td bgcolor="#FFFFFF"><div align="center">สถานะ</div></td>
      <td bgcolor="#FFFFFF"><div align="center">วันที่</div></td>
      <td bgcolor="#FFFFFF"><div align="center">ลบ</div></td>
    </tr>
    <?
	 		 $i=0;
		//===========  นำข้อมูลมาแสดงทั้งหมด
$sql = "select * From cusorder";
/*   ตั้งค่า แสดงผลต่อหน้า  $Per_Page   */

$Per_Page =10;
if(!$Page)
$Page=1;

$Prev_Page = $Page-1;
$Next_Page   = $Page+1;

$result  = mysqli_query($sql);
$Page_start = ($Per_Page*$Page)-$Per_Page;
$Num_Rows =	mysqli_num_rows($result);

if($Num_Rows<=$Per_Page)
		$Num_Pages =1;
else if(($Num_Rows % $Per_Page)==0)
		$Num_Pages =($Num_Rows/$Per_Page)	;
else 
		$Num_Pages =($Num_Rows/$Per_Page)	+1;

$Num_Pages  = (int)$Num_Pages;

if(($Page>$Num_Pages)	|| ($Page<0))
print "<center><b>จำนวน $Page มากกว่า $Num_Pages ยังไม่มีข้อความ<b></center>";
$sql .= "  Where 1 order by OrderNo desc 	LIMIT $Page_start , $Per_Page";
  //ส่วนแสดงผล
  $i=0;
		$query =  mysqli_query($sql);
		While($result= mysqli_fetch_array($query)){
$i++;
$resultMember=select("member","where 1=1 and MemberID='".$result["MemberID"]."'");			
			?>
    <tr bgcolor=#e5e5e5> 
      <td width="132" bgcolor="#FFFFFF"><div align="center"> <a href="orderdetail.php?OrderNo=<?=$result["OrderNo"];?>"> 
          <?=$result["OrderNo"];?>
          </a></div></td>
      <td width="198" bgcolor="#FFFFFF"> <a href="detailmember.php?MemberID=<?=$resultMember["MemberID"];?>"> 
        <?=$resultMember["Name"];?>
        <?=$resultMember["LastName"];?>
        </a></td>
      <td width="183" bgcolor="#FFFFFF"> 
        <div align="center">
          <?
		  if($result["status"]=="1")
		  {
		  echo "รอการชำระเงิน";
		  }
		  else
		  {
		  echo "ชำระเงิน/จัดส่งสินค้าไปแล้ว";
		  }
		  ?>
        </div></td>
      <td width="150" bgcolor="#FFFFFF"> <div align="center"> 
          <?=$result["Date"];?>
        </div></td>
      <script language="JavaScript">

function Conf<?=$i; ?>(object) {
if (confirm("ยืนยันการลบ [  <?=$result["OrderNo"]; ?> ] ") ==true) {
return true;
}
return false;
}

</script>
      <td width="46" bgcolor="#FFFFFF"><div align="center"><a href="<?=$_SERVER['PHP_SELF'];?>?Action=Delete&OrderNo=<?=$result["OrderNo"];?>" onClick="return Conf<?=$i; ?>(this)"><img src="../image/delete.gif" width="16" height="16" border="0"></a></div></td>
    </tr>
    <?
}
?>
  </tbody>
</table>


<br>
<br>
<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td> จำนวน 
      <?= $Num_Rows;?></b>
      แบ่งเป็น : <b> 
      <?=$Num_Pages;?>
      </b> ไปยัง : 
      <?/* สร้างปุ่มย้อนกลับ */
			if($Prev_Page)	
					echo " <a href='$PHP_SELF?Page=$Prev_Page'><< Back </a> ";
			for($i=1; $i<$Num_Pages; $i++){
						if($i != $Page)
								echo " [ <a href='$PHP_SELF?Page=$i'>$i</a> ]";
						else 
								echo "<b> $i </b>";
		}
/*สร้างปุ่มเดินหน้า */
if($Page!=$Num_Pages)
					echo " <a href ='$PHP_SELF?Page=$Next_Page'> Next >>  </a>";
			
			?></font>
      &nbsp;</td>
  </tr>
</table>
