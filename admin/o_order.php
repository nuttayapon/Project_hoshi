<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->

<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="5" color="#000000"><strong>บันทึกการขาย </strong>
		          <font size="4" color="#000000" style="float:right" >เลือกเดือน
                  <select name="mm" class="txtbox" id="mm"  class="form-control mb-2 mr-sm-2 mb-sm-0" >
				  <?
				  if($_GET["mm"] == "")
				  {
				  $_GET["mm"]=date("m");
				  }
				  
				  for($i=1;$i<=12;$i++)
				  {
				  if($_GET["mm"]==$i)
				  {
				  	$sel="selected";
				  }
				  else
				  {
				  	$sel="";				  
				  }
				  ?>
                    <option value="<?=$i;?>" <?=$sel;?>><?=$i;?></option>
					<?
					}
					?>
                  </select>
                  ปี 
                  <select name="yy" class="txtbox" id="yy">
                    <?
				  if($_GET["yy"] == "")
				  {
				  $_GET["yy"]=date("Y");
				  }					
				  for($i=2005;$i<=2020;$i++)
				  {
				  if($_GET["yy"]==$i)
				  {
				  	$sel="selected";
				  }
				  else
				  {
				  	$sel="";				  
				  }
				  ?>
                    <option value="<?=$i;?>" <?=$sel;?>>
                    <?=$i;?>
                    </option>
                    <?
					}
					?>
                  </select>
				  <button  type="submit" class="btn btn-success btn-sm"> <FONT FACE="Athiti" size="3"> ดูรายงาน </FONT></button>
</font></div>
<div class="panel-body" >



<br>
<FONT FACE="Athiti" size="5">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

		<table width="800" border="0" align="center" class="table table-bordered">
			<form name="form1" method="get" action="">
			<tr align="center" >
					<th  bgcolor="#ffdd97"><center> No. </center></th>
					<th  bgcolor="#ffdd97"><center> รหัสสั่งซื้อ  </center></th>
					<th  bgcolor="#ffdd97"><center> ชื่อ </center></th>
					<th  bgcolor="#ffdd97"><center> วันที่และเวลาสั่งซื้อ </center></th>
					<th  bgcolor="#ffdd97"><center> จำนวน (บาท) </center></th>
			</tr>
		
		<? $i=0;
		 $sql = "select * from tbl_order Where 1 and MONTH(order_date)='".$_GET["mm"]."' and YEAR(order_date)='".$_GET["yy"]."'";
		 $result = mysqli_query($con, $sql);
		 $sum = $row['total_price'] + $row['total_price'];
		 while($row = mysqli_fetch_array($result))
		{ $i++; ?>
			<tr> 
              <td width="60" bgcolor="#FFFFFF"><div align="center"><?=$i;?></div></td>
			  <td width="100" bgcolor="#FFFFFF"><div align="center"> <?=$row["order_id"];?></div></td>
              <td width="300" bgcolor="#FFFFFF"><div align="center"><?=$row["fullname"];?></div></td>
              <td width="200" bgcolor="#FFFFFF"><div align="center"><?=$row["order_date"];?></div></td>
			  <td width="200" bgcolor="#FFFFFF"><div align="center"><?=number_format($row["total_price"], 2,'.',',');?>
			  <?
				  $total_price=$total_price+$row["total_price"];
				  ?></div></td>
            </tr>
            <? 	} ?>
			<tr >
			  <td height="40" colspan="4" align="right" bgcolor="#ffcc66"><strong><b> <font size="5" color="#000000">รวม  : </font></span></strong></td>
			  <td height="40" colspan="4" align="left" bgcolor="#ffcc66"><strong><b> <font size="5" color="#000000"> <?=number_format($total_price, 2,'.',',');?></font></span></strong></td>
			</tr>
		</form>
		</table>
				<br>
				<div align="right">
					<a href="o_print.php"><button  type="button"  class="btn btn-success btn-sm"> <FONT FACE="Athiti" size="4"> พิมพ์บันทึกการขาย </FONT></button></a><br><br>
				</div>

</FONT>
</div>
</div>
</div>
</div>
</FONT>