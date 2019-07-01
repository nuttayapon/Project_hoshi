<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>


<!---------------PHP header--------------->

<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link rel="stylesheet" type="text/css" href="jquery/css/ui-lightness/jquery-ui-1.7.2.custom.css">
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>ข้อมูลการสั่งซื้อของลูกค้า</title>
<?php
if(isset($_POST['od_id'])&&isset($_POST['od_status'])){//บันทึกสถานะการชำระเงิน
$odid=$_POST['od_id'];//รหัสใบสั่งซื้อ ข้อมูลถูกจัดเก็บแบบอาเรย์
$odst=$_POST['od_status'];//สถานะการสั่งซื้อ ข้อมูลจะอยู่ในรูปอาเรย์เช่นกัน
 for($olo=0;$olo<count($odid);$olo++){
  //อัพเดทสถานะการชำระเงิน
 mysql_query("UPDATE tb_order SET od_status='".$odst[$olo]."' WHERE od_id=".$odid[$olo]);
 }
echo "<script>alert('อัพเดทสถานะการชำระเงินเรียบร้อยแล้ว');</script>"; 
}

$showorder=false;#ไม่ให้แสดง table รายการสั่งซื้อ (ขณะที่รันโปรแกรมตอนแรก)
if(isset($_GET['day'])&&isset($_GET['mount'])&&isset($_GET['year'])){
 $day=$_GET['day'];
 $mount=$_GET['mount'];
 $year=$_GET['year'];
 $mbname=$_GET['mbname'];
 $sql="SELECT * FROM tb_order,tb_member WHERE tb_member.mb_user<>'' and tb_member.mb_user=tb_order.mb_user ";
 if($day!='0'&&$mount!='0'&&$year!='0'){#เลือก วัน เดือน ปี
  $rssearch="- $day/$mount/$year -";
  $date_select="%$year-$mount-$day";
  $sql.=" AND tb_order.od_date LIKE '$date_select'"; 
 }
 if($day=='0'&&$mount!='0'&&$year!='0'){#เลือก เดือน ปี
  $rssearch="- 00/$mount/$year -";
  $date_select="$year-$mount%";
  $sql.=" AND tb_order.od_date LIKE '$date_select'"; 
 }
 if($day=='0'&&$mount!='0'&&$year=='0'){#เลือก เดือน
  $rssearch="- 00/$mount/0000 -";
  $date_select="%-$mount-%";
  $sql.=" AND tb_order.od_date LIKE '$date_select'"; 
 }
 if($day=='0'&&$mount=='0'&&$year!='0'){#เลือก ปี
  $rssearch="- 00/00/$year -";
  $date_select="$year%";
  $sql.=" AND tb_order.od_date LIKE '$date_select'"; 
 }
 if($mbname!='')
  $rssearch="$rssearch  + $mbname +";
  $sql.=" AND (tb_member.mb_name LIKE '%$mbname%' OR tb_member.mb_user LIKE '%$mbname%') ";
 
 $showorder=true;#แสดงtable รายการสั่งซื่อได้ 
 $rs_showorder=$conn->Execute($sql.' ORDER BY tb_order.od_date DESC');#คิวรี่ข้อมูล จะมีคำสั่งเหมือน mysql_query
 $order_status=array('ยังไม่ชำระเงิน'=>1,'ชำระเงินแล้ว-รอจัดส่ง'=>2,'จัดส่งสินค้าเรียบร้อยแล้ว'=>3);#สถานะการชำระเงิน
} 

/*##############END ###############*/
if(isset($_POST['od_id'])){//ตรวจสอบการกดปุ่มsave (submit form)โดยเราจะตรวจสอบจาก ค่าพารามิเตอร์ที่ส่งเข้ามาแบบPOSTคือ od_id นั่นเอง
  $odid_save=$_POST['od_id'];//สร้างตัวแปร$odid_saveมารับค่าพารามิเตอร์ที่ส่งเข้ามา od_id[]
  $odstatus_save=$_POST['od_status'];//สร้างตัวแปร$odstatus_saveมารับค่าพารามิเตอร์ที่ส่งเข้ามา od_status[]
 }
?>
</head>
<body>
<div id="container">
  <div id="header">
    <div id="headerText">Crochet Tukta Online(หลังร้าน)<img src="images/logo.png" width="35" height="57" /></div>
  </div>
  <div id="content">

    <div id="m_center"><strong>ดูรายการสั่งซื้อของลูกค้า</strong><br />
      <div id="dialogMsg" title="เกิดข้อผิดพลาด">
        <div id="showMsg"></div>
      </div>
      <form action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>" method="get" enctype="multipart/form-data" name="FaddPg" id="FaddPg" onsubmit="return chkVal()">
        <strong>วันที่</strong>
        <select name="day" id="day">
          <option value="0">ไม่เลือก</option>
          <?php for($dayi=1;$dayi<=31;$dayi++){ ?>
          <option value="<?=$dayi?>" >
          <?=$dayi?>
          </option>
          <? } ?>
        </select>
        <strong>เดือน</strong>
        <select name="mount" id="mount">
          <option value="0">ไม่เลือก</option>
          <?php 
   $mount=array('ม.ค.'=>'01', 'ก.พ.'=>'02', 'มี.ค.'=>'03','เม.ย.'=>'04','พ.ค.'=>'05','มิ.ย.'=>'06','ก.ค.'=>'07','ส.ค.'=>'08','ก.ย.'=>09,'ต.ค.'=>'10','พ.ย.'=>'11','ธ.ค.'=>'12');
   foreach($mount as $keymount => $valmount){#$keymount คือ ชื่อเดือน(ม.ค.) ส่วน $valmount คือ ลำดับเดือน(1)
    ?>
          <option value="<?=$valmount?>">
          <?=$keymount?>
          </option>
          <? } ?>
        </select>
        <strong>ปี</strong>
        <select name="year" id="year">
          <option value="0">ไม่เลือก</option>
          <?php for($yeari=2005;$yeari<=date('Y');$yeari++){#เริ่มจากปี 2005 ถึงปีปัจจุบัน(date('Y')) ?>
          <option value="<?=$yeari?>">
          <?=$yeari+543#แปลงให้เป็นปี พ.ศ.?>
          </option>
          <? } ?>
        </select>
        หรือ <strong>ชื่อ/Username</strong>
        <input type="text" name="mbname" id="mbname" />
        <input type="submit" name="bt_search" id="bt_search" value="ค้นหา" />
      </form>
      <?php if($showorder){ ?>
      <form id="pay_status" name="pay_status" method="post" action="admin_showorder.php?<?=$_SERVER['QUERY_STRING']?>">
        <table width="100%" border="1" cellpadding="3" cellspacing="0">
          <tr bgcolor="#996633">
            <td colspan="4" bgcolor="#FF9966">ผลการค้นหา : <strong>
              <?=$rssearch?>
              </strong></td>
          </tr>
          <tr bgcolor="#996633">
            <td><strong>วันที่</strong></td>
            <td><strong>ชื่อ-สกุล</strong></td>
            <td><strong>User name</strong></td>
            <td><strong>สถานะ <a href="#"  onclick="document.getElementById('pay_status').submit()"><img src="images/save.gif" width="16" height="16" border="0" />
              
            </a></strong></td>
          </tr>
          <?php
    if($rs_showorder->RecordCount()>0){
    while(!$rs_showorder->EOF){
     $odid=$rs_showorder->fields['od_id'];
     $u=$rs_showorder->fields['mb_user'];   
    ?>
          <tr bgcolor="#FFFFFF">
            <td><?="<a href=\"admin_showvieworder.php?orderid=$odid&u=$u\" target=\"_blank\">".$rs_showorder->fields['od_date']."</a>"?></td>
            <td><?=$rs_showorder->fields['mb_name']?></td>
            <td><?=$rs_showorder->fields['mb_user']?></td>
            <td><input type="hidden" name="od_id[]" id="od_id[]" value="<?=$odid?>" /><select name="od_status[]" id="select2">
                <?php foreach($order_status as $oskey => $osval){#แสดงสถานะการชำระเงิน?>
                <option value="<?=$osval?>" 
    <?=$osval==$rs_showorder->fields['od_status']?'selected="selected"':""?>>
                <?=$oskey?>
                </option>
                <? }  ?>
              </select></td>
          </tr>
          <? 
    $rs_showorder->MoveNext();}
    }else{
   ?>
          <tr bgcolor="#FFFFFF">
            <td colspan="4" align="center"><label for="select2"><strong>ไม่พบข้อมูลที่ค้นหา</strong></label></td>
          </tr>
          <? } ?>
        </table>
      </form>
      <? } ?>
    </div>
  </div>
  <div class="clear"></div>
  <div id="footer">
    <h1>copyright©2010 http://pnwtt1987.blogspot.com</h1>
  </div>
</div>
</body>
</html>
<?php $conn->Close();?>