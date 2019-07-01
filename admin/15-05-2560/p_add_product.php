<!---------------PHP header--------------->
<?php
	require_once('header.php');
?>
<!---------------PHP header--------------->
  <FONT FACE="Athiti"  size="4">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8"> <br />
      <h4 align="center"><FONT FACE="Athiti" size="5"> ฟอร์มเพิ่มสินค้า  </FONT></h4>
      <hr />
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
            <input type="file" name="pro_img" class="form-control" />
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
    </div>
  </div><br>
 </FONT>
<!---------------PHP footer--------------->
<?php
	require_once('footer.php');
?>
<!---------------PHP footer--------------->