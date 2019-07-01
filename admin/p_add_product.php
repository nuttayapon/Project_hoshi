<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->
<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti"  size="4">
<div class="panel panel-info">
<div class="panel-heading"><center><FONT FACE="Athiti" size="5"> ฟอร์มเพิ่มสินค้า  </FONT></center></div>
<div class="panel-body">
<table border="0"  align="center" width="800">
<tr>
<td>
		<br>
		<form action="p_add_product_db.php" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อสินค้า</p>
            <input type="text"  name="pro_name" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
            <textarea name="pro_detail" class="form-control"  rows="3"  required placeholder="รายละเอียดสินค้า"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> ราคา (บาท) </p>
            <input type="number"  name="pro_price" class="form-control" required placeholder="ราคา" />
          </div>
		  </div>
		  <div class="form-group">
          <div class="col-sm-12">
            <p> จำนวนสินค้า </p>
            <input type="number"  name="amount" class="form-control" required placeholder="จำนวนสินค้า" />
          </div>
		  </div>
          <div class="form-group">
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
			<img id="picPreview" style="width:220;margin:5px">
							<input type="file" class="input_text" placeholder="pro_img" name="pro_img" value="" required>	
							<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
							<script>
							$('[name="pro_img"]').change(function(){
							 
								/* original file upload path */
								$('#picPath').text($(this).val());
							 
								var file = this.files[0];
								/* get picture details */
								$('#picLastModified').text(file.lastModified);
								$('#picLastModifiedDate').text(file.lastModifiedDate);
								$('#picName').text(file.name);
								$('#picSize').text(file.size);
								$('#picType').text(file.type);
							 
								/* set image preview */
								if( ! file.type.match(/image.*/))
								{
									return true;
								}
								var reader = new FileReader();
								reader.onload = function (event)
								{
									$('#picPreview').attr('src', event.target.result);
							 
									/* get image dimensions */
									var image = new Image();
									image.src = reader.result;
									image.onload = function()
									{
										$('#picDimensionsWidth').text(image.width);
										$('#picDimensionsHeight').text(image.height);
									};
							 
								}
								reader.readAsDataURL(file);
							 
							});
							</script>
            
          </div>
        </div>
		<br>
        <div class="form-group">
          <div class="col-sm-12" align="center">
            <a href="p_product.php"><button type="submit" class="btn btn-primary btn-lg" name="btnadd"> + เพิ่มสินค้า </button></a>
			&nbsp;&nbsp;&nbsp;
			<a href="p_product.php"><button type="button" class="btn btn-danger btn-lg" name="btnadd"> ยกเลิก </button></a>
          </div>
        </div>
      </form>

</td>
</tr>
</table>		
</div>
</div>
</FONT>
</div>

