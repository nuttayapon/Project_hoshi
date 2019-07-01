<!-------------------------------------------------------------------------Header----------------------------------------------------------------------------------------->
<?php

require_once('header.php');
require_once('selectat.php');

?>

<!-------------------------------------------------------------------------PHP----------------------------------------------------------------------------------------->

	<link rel="stylesheet" type="text/css" href="../hoshi/include/less/icons.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../jquery.Thailand.js/dependencies/JQL.min.js"></script>
	<script type="text/javascript" src="../jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
	<link rel="stylesheet" href="../jquery.Thailand.js/dist/jquery.Thailand.min.css">
	<script type="text/javascript" src="../jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="ajax.js" ></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<body onload="Add();">

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM customers WHERE cid=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);


		$sql = "SELECT * FROM province";
		$result = mysqli_query($con,$sql);
		$province = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$sql = "SELECT * FROM district";
		$result = mysqli_query($con,$sql);
		$district = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$sql = "SELECT * FROM amphur";
		$result = mysqli_query($con,$sql);
		$amphur = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$sql = "SELECT * FROM amphur_postcode";
		$result = mysqli_query($con,$sql);
		$amphur_postcode = mysqli_fetch_all($result,MYSQLI_ASSOC);


if(isset($_POST['edit'])) {
$cimg = $_POST['cimg'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$address=$_POST['address'];
$district=$_POST['district'];
$amphur=$_POST['amphur'];
$province=$_POST['province'];
$amphur_postcode=$_POST['amphur_postcode'];

  $sql = "UPDATE customers SET  cimg='$cimg' , fullname='$fullname' , username='$username' ,  email='$email' , tel='$tel' , address='$address',district='$district',amphur='$amphur',province='$province',amphur_postcode='$amphur_postcode' WHERE cid=$id";
  mysqli_query($con,$sql);
  //header('location:customer.php');
  echo '<meta http-equiv="refresh" content="0;p_customer.php">';

}

?>
<div style="margin-top:1%;padding:1px 0px;height:100%;">
<FONT FACE="Athiti">
<div class="panel panel-danger">
<div class="panel-heading"><font size="5" color="#000000"><strong>สมาชิก </strong>
</font></div>
<div class="panel-body" >
<!---------------------------PHP---------------------------------------------->
<table border="0" width="800" align="center">
<tr>
	<td>

				<br><br><h1><FONT FACE="IrisUPC"><center>แก้ไขข้อมูล ID : <?php echo $id;?></center></h1> </FONT>
				<form id="demo1" align="center" name="register" method="post" action=""  onSubmit="JavaScript:return fncSubmit();" >
				<table border="0" width="800">
					<form action="" method="post" class="">
				<tr>
					<td><div class="form-group">
					<label>ID :</label>
					<input type="text" class="form-control" name="id" value="<?php echo $row[0]['cid']; ?>" disabled>
				  </div></td>
				</tr>
				<tr>
					<td>  <div class="form-group">
					<label>Full Name :</label>
					<input type="text" class="form-control" name="fullname" value="<?php echo $row[0]['fullname']; ?>">
				  </div></td>
				</tr>
				<tr>
					<td> <div class="form-group">
					 <label>Username :</label>
					 <input type="text" class="form-control" name="username" value="<?php echo $row[0]['username']; ?>">
				   </div></td>
				</tr>
				<tr>
					<td> <div class="form-group">
					<label>E-mail :</label>
					<input type="text" class="form-control" name="email" value="<?php echo $row[0]['email']; ?>">
				  </div></td>
				</tr>
				<tr>
					<td><div class="form-group">
					<label>Tel :</label>
					<input type="text" class="form-control" name="tel" value="<?php echo $row[0]['tel']; ?>">
				  </div></td>
				</tr>
				<tr>
				  <td>
					<div class="form-group">
					<label>Address :</label>
					<input type="text" class="form-control" name="address" value="<?php echo $row[0]['address']; ?>">
				  </div>
				  </td>
				</tr>
				<tr>
					<td>
					<div class="form-group">
					<label>จังหวัด :</label>
					<select class="form-control select2-single" name="province" id="Proviance">
					<option value="<?php echo $row[0]['province']; ?>">---เลือกจังหวัด---</option>
					</select>
					</div>
					</td>
				</tr>
				<tr>
					<td>
					<div class="form-group">
					<label>เขต/อำเภอ :</label>
					<select name="amphur" id="District" class="form-control select2-single">
					<option value="<?php echo $row[0]['amphur']; ?>">---เลือกอำเภอ---</option>
					</select>
					</div>
					</td>
				</tr>
				<tr>
					<td>
					<div class="form-group">
					<label>เเขวง/ตำบล :</label>
					<select name="district" id="Subdistrict" class="form-control select2-single">
					<option value="<?php echo $row[0]['district']; ?>">---เลือกตำบล---</option>
					</select>
					</div>
					</td>
				</tr>
				<tr>
					<td>
					<div class="form-group">
					<label>รหัสไปรษณีย์ :</label>
					<select name="amphur_postcode" id="Postcode" class="form-control select2-single">
					<option value="<?php echo $row[0]['amphur_postcode']; ?>">---เลือกรหัสไปษณีย์---</option>
					</select>
					</div>
					</td>
				</tr>
				<tr>
					<td>  <div class="form-group">
					<label>Picture :</label>
					<img id="picPreview" style="width:220;margin:5px">
					<input type="file" class="form-control" name="cimg" value="<?php echo $row[0]['cimg']; ?>">
							<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
							<script>
							$('[name="cimg"]').change(function(){
							 
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
				  </div></td>
				</tr>
				<tr>
				<td>
					<div align="right">
					<br><button type="submit" class="btn btn-success btn-lg" name="edit"><span class="glyphicon  glyphicon-floppy-disk"></span><FONT FACE="JasmineUPC" size="5"> บันทึก </FONT></button>
					&nbsp;&nbsp;
					<a href="c_customer.php"><button type="button" class="btn btn-danger btn-lg" name="edit"><FONT FACE="JasmineUPC" size="5"> ยกเลิก </FONT></button></a>
					<br><br>
					</div>
				</tr>
				</td>
				</table>
				</form>
</td>
</tr>
</table>


</div>
</div>
</FONT>
<!-------------------------------------------- จาวา -------------------------------------------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
	<script>
		$(function(){
			//เรียกใช้งาน Select2
			$(".select2-single").select2();
		});		
	</script>
<!-------------------------------------------- จาวา -------------------------------------------->



<style type="text/css">
	.select2-container{
	box-sizing:border-box;
	display:inline-block;
	margin:0;
	position:relative;
	vertical-align:middle
	}


.select2-container 
.select2-selection--single{
	cursor:pointer;
	display:block;
    border: 1px solid #c7c7c7;
    border-radius: 5px;
	font-size: 14px;
	box-shadow: 0px 0px 1px px rgba(0,0,0,0.2);
	height:34px;user-select:none;-webkit-user-select:none
	}

.select2-container 
.select2-selection--single 
.select2-selection__rendered{
	display:block;
	color: #666666;
	padding-top:6px;
	padding-left:18px;
	padding-right:20px;
	overflow:hidden;
	text-overflow:ellipsis;
	white-space:nowrap
	}


.select2-container 
.select2-selection--single 
.select2-selection__clear{
	position:relative
	}


.select2-container[dir="rtl"] 
.select2-selection--single 
.select2-selection__rendered{
	padding-right:8px;
	padding-left:20px
	}


.select2-container 
.select2-selection--multiple{
	box-sizing:border-box;
	cursor:pointer;
	display:block;
	min-height:32px;user-select:none;-webkit-user-select:none
	}


.select2-container 
.select2-selection--multiple 
.select2-selection__rendered{
	display:inline-block;
	overflow:hidden;
	padding-left:8px;
	text-overflow:ellipsis;
	white-space:nowrap
	}


.select2-container 
.select2-search--inline{
	float:left
	}


.select2-container 
.select2-search--inline 
.select2-search__field{
	box-sizing:border-box;
	border:none;font-size:100%;
	margin-top:5px;padding:0
	}

	
.select2-container 
.select2-search--inline 
.select2-search__field::-webkit-search-cancel-button{
	-webkit-appearance:none
	}


.select2-dropdown{
	background-color:white;
	border:1px solid #aaa;
	border-radius:4px;
	box-sizing:border-box;
	display:block;
	position:absolute;
	left:-100000px;
	width:100%;
	z-index:1051
	}


.select2-results{
	display:block
	}
	

.select2-results__options{
	list-style:none;
	margin:0;
	padding:0
	}


.select2-results__option{
	padding:6px;
	user-select:none;
	-webkit-user-select:none
	}
	

.select2-results__option[aria-selected]{
	cursor:pointer
	}


.select2-container--open 
.select2-dropdown{left:0}
.select2-container--open 
.select2-dropdown--above{
	border-bottom:none;
	border-bottom-left-radius:0;
	border-bottom-right-radius:0
	}


.select2-container--open 
.select2-dropdown--below{
	border-top:none;
	border-top-left-radius:0;
	border-top-right-radius:0
	}


.select2-search--dropdown{display:block;padding:4px}.select2-search--dropdown .select2-search__field{padding:4px;width:100%;box-sizing:border-box}
.select2-search--dropdown .select2-search__field::-webkit-search-cancel-button{-webkit-appearance:none}.select2-search--dropdown
.select2-search--hide{display:none}
.select2-close-mask{border:0;margin:0;padding:0;display:block;position:fixed;left:0;top:0;min-height:100%;min-width:100%;height:auto;width:auto;opacity:0;z-index:99;background-color:#fff;filter:alpha(opacity=0)}
.select2-hidden-accessible{border:0 !important;clip:rect(0 0 0 0) !important;height:1px !important;margin:-1px !important;overflow:hidden !important;padding:0 !important;position:absolute !important;width:1px !important}
.select2-selection__clear{cursor:pointer;float:right;font-weight:bold}
.select2-container--default .select2-selection--single 
.select2-selection__placeholder{color:#999}.select2-container--default 
.select2-selection--single .select2-selection__arrow{height:26px;position:absolute;top:1px;right:1px;width:20px}
.select2-container--default .select2-selection--single 
.select2-selection__arrow b{border-color:#888 transparent transparent transparent;border-style:solid;border-width:5px 4px 0 4px;height:0;left:50%;margin-left:-4px;margin-top:-2px;position:absolute;top:50%;width:0}
.select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__clear{float:left}.select2-container--default[dir="rtl"] 
.select2-selection--single .select2-selection__arrow{left:1px;right:auto}.select2-container--default.select2-container--disabled 
.select2-selection--single{background-color:#eee;cursor:default}.select2-container--default.select2-container--disabled 
.select2-selection--single .select2-selection__clear{display:none}.select2-container--default.select2-container--open 
.select2-selection--single .select2-selection__arrow b{border-color:transparent transparent #888 transparent;border-width:0 4px 5px 4px}
.select2-container--default .select2-selection--multiple{background-color:white;border:1px solid #aaa;border-radius:4px;cursor:text}
.select2-container--default .select2-selection--multiple .select2-selection__rendered{box-sizing:border-box;list-style:none;margin:0;padding:0 5px;width:100%}
.select2-container--default .select2-selection--multiple .select2-selection__placeholder{color:#999;margin-top:5px;float:left}.select2-container--default 
.select2-selection--multiple .select2-selection__clear{cursor:pointer;float:right;font-weight:bold;margin-top:5px;margin-right:10px}.select2-container--default 
.select2-selection--multiple .select2-selection__choice{background-color:#e4e4e4;border:1px solid #aaa;border-radius:4px;cursor:default;float:left;margin-right:5px;margin-top:5px;padding:0 5px}
.select2-container--default .select2-selection--multiple 
.select2-selection__choice__remove{color:#999;cursor:pointer;display:inline-block;font-weight:bold;margin-right:2px}.select2-container--default 
.select2-selection--multiple .select2-selection__choice__remove:hover{color:#333}.select2-container--default[dir="rtl"] .select2-selection--multiple 
.select2-selection__choice,.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__placeholder,
.select2-container--default[dir="rtl"] .select2-selection--multiple .select2-search--inline{float:right}.select2-container--default[dir="rtl"] 
.select2-selection--multiple .select2-selection__choice{margin-left:5px;margin-right:auto}.select2-container--default[dir="rtl"] 
.select2-selection--multiple .select2-selection__choice__remove{margin-left:2px;margin-right:auto}.select2-container--default
.select2-container--focus .select2-selection--multiple{border:solid black 1px;outline:0}.select2-container--default.select2-container--disabled 
.select2-selection--multiple{background-color:#eee;cursor:default}.select2-container--default.select2-container--disabled 
.select2-selection__choice__remove{display:none}.select2-container--default.select2-container--open.select2-container--above 
.select2-selection--single,.select2-container--default.select2-container--open.select2-container--above 
.select2-selection--multiple{border-top-left-radius:0;border-top-right-radius:0}.select2-container--default.select2-container--open
.select2-container--below .select2-selection--single,.select2-container--default.select2-container--open.select2-container--below 
.select2-selection--multiple{border-bottom-left-radius:0;border-bottom-right-radius:0}.select2-container--default .select2-search--dropdown 
.select2-search__field{border:1px solid #aaa}.select2-container--default 
.select2-search--inline .select2-search__field{background:transparent;border:none;outline:0;box-shadow:none;-webkit-appearance:textfield}
.select2-container--default .select2-results>.select2-results__options{max-height:200px;overflow-y:auto}.select2-container--default 
.select2-results__option[role=group]{padding:0}.select2-container--default .select2-results__option[aria-disabled=true]{color:#999}
.select2-container--default .select2-results__option[aria-selected=true]{background-color:#ddd}.select2-container--default 
.select2-results__option .select2-results__option{padding-left:1em}.select2-container--default .select2-results__option 
.select2-results__option .select2-results__group{padding-left:0}.select2-container--default .select2-results__option 
.select2-results__option .select2-results__option{margin-left:-1em;padding-left:2em}.select2-container--default 
.select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-2em;padding-left:3em}
.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option 
.select2-results__option{margin-left:-3em;padding-left:4em}.select2-container--default .select2-results__option .select2-results__option 
.select2-results__option .select2-results__option .select2-results__option .select2-results__option{margin-left:-4em;padding-left:5em}
.select2-container--default .select2-results__option .select2-results__option .select2-results__option .select2-results__option 
.select2-results__option .select2-results__option .select2-results__option{margin-left:-5em;padding-left:6em}.select2-container--default 
.select2-results__option--highlighted[aria-selected]{background-color:#5897fb;color:white}.select2-container--default 
.select2-results__group{cursor:default;display:block;padding:6px}.select2-container--classic 
.select2-selection--single{background-color:#f7f7f7;border:1px solid #aaa;border-radius:4px;outline:0;background-image:-webkit-linear-gradient(top, #fff 50%, #eee 100%);background-image:-o-linear-gradient(top, #fff 50%, #eee 100%);background-image:linear-gradient(to bottom, #fff 50%, #eee 100%);background-repeat:repeat-x;filter:progid:DXImageTransform
.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0)}.select2-container--classic 
.select2-selection--single:focus{border:1px solid #5897fb}.select2-container--classic .select2-selection--single 
.select2-selection__rendered{color:#444;line-height:28px}.select2-container--classic .select2-selection--single 
.select2-selection__clear{cursor:pointer;float:right;font-weight:bold;margin-right:10px}.select2-container--classic 
.select2-selection--single .select2-selection__placeholder{color:#999}.select2-container--classic .select2-selection--single 
.select2-selection__arrow{background-color:#ddd;border:none;border-left:1px solid #aaa;border-top-right-radius:4px;border-bottom-right-radius:4px;height:26px;position:absolute;top:1px;right:1px;width:20px;background-image:-webkit-linear-gradient(top, #eee 50%, #ccc 100%);background-image:-o-linear-gradient(top, #eee 50%, #ccc 100%);background-image:linear-gradient(to bottom, #eee 50%, #ccc 100%);background-repeat:repeat-x;filter:progid:DXImageTransform
.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFCCCCCC', GradientType=0)}.select2-container--classic .select2-selection--single 
.select2-selection__arrow b{border-color:#888 transparent transparent transparent;border-style:solid;border-width:5px 4px 0 4px;height:0;left:50%;margin-left:-4px;margin-top:-2px;position:absolute;top:50%;width:0}.select2-container--classic[dir="rtl"] 
.select2-selection--single .select2-selection__clear{float:left}.select2-container--classic[dir="rtl"] 
.select2-selection--single .select2-selection__arrow{border:none;border-right:1px solid #aaa;border-radius:0;border-top-left-radius:4px;border-bottom-left-radius:4px;left:1px;right:auto}.select2-container--classic
.select2-container--open .select2-selection--single{border:1px solid #5897fb}.select2-container--classic.select2-container--open 
.select2-selection--single .select2-selection__arrow{background:transparent;border:none}.select2-container--classic.select2-container--open 
.select2-selection--single .select2-selection__arrow b{border-color:transparent transparent #888 transparent;border-width:0 4px 5px 4px}
.select2-container--classic.select2-container--open.select2-container--above .select2-selection--single{border-top:none;border-top-left-radius:0;border-top-right-radius:0;background-image:-webkit-linear-gradient(top, #fff 0%, #eee 50%);background-image:-o-linear-gradient(top, #fff 0%, #eee 50%);background-image:linear-gradient(to bottom, #fff 0%, #eee 50%);background-repeat:repeat-x;filter:progid:DXImageTransform
.Microsoft.gradient(startColorstr='#FFFFFFFF', endColorstr='#FFEEEEEE', GradientType=0)}.select2-container--classic.select2-container--open
.select2-container--below .select2-selection--single{border-bottom:none;border-bottom-left-radius:0;border-bottom-right-radius:0;background-image:-webkit-linear-gradient(top, #eee 50%, #fff 100%);background-image:-o-linear-gradient(top, #eee 50%, #fff 100%);background-image:linear-gradient(to bottom, #eee 50%, #fff 100%);background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFEEEEEE', endColorstr='#FFFFFFFF', GradientType=0)}
.select2-container--classic .select2-selection--multiple{background-color:white;border:1px solid #aaa;border-radius:4px;cursor:text;outline:0}
.select2-container--classic .select2-selection--multiple:focus{border:1px solid #5897fb}.select2-container--classic .select2-selection--multiple 
.select2-selection__rendered{list-style:none;margin:0;padding:0 5px}.select2-container--classic .select2-selection--multiple 
.select2-selection__clear{display:none}.select2-container--classic .select2-selection--multiple 
.select2-selection__choice{background-color:#e4e4e4;border:1px solid #aaa;border-radius:4px;cursor:default;float:left;margin-right:5px;margin-top:5px;padding:0 5px}.select2-container--classic .select2-selection--multiple 
.select2-selection__choice__remove{color:#888;cursor:pointer;display:inline-block;font-weight:bold;margin-right:2px}
.select2-container--classic .select2-selection--multiple .select2-selection__choice__remove:hover{color:#555}
.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice{float:right}
.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice{margin-left:5px;margin-right:auto}
.select2-container--classic[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove{margin-left:2px;margin-right:auto}
.select2-container--classic.select2-container--open .select2-selection--multiple{border:1px solid #5897fb}.select2-container--classic
.select2-container--open.select2-container--above .select2-selection--multiple{border-top:none;border-top-left-radius:0;border-top-right-radius:0}
.select2-container--classic.select2-container--open.select2-container--below 
.select2-selection--multiple{border-bottom:none;border-bottom-left-radius:0;border-bottom-right-radius:0}
.select2-container--classic .select2-search--dropdown .select2-search__field{border:1px solid #aaa;outline:0}
.select2-container--classic .select2-search--inline .select2-search__field{outline:0;box-shadow:none}
.select2-container--classic .select2-dropdown{background-color:#fff;border:1px solid transparent}
.select2-container--classic .select2-dropdown--above{border-bottom:none}.select2-container--classic 
.select2-dropdown--below{border-top:none}.select2-container--classic .select2-results>.select2-results__options{max-height:200px;overflow-y:auto}
.select2-container--classic .select2-results__option[role=group]{padding:0}.select2-container--classic 
.select2-results__option[aria-disabled=true]{color:grey}.select2-container--classic 
.select2-results__option--highlighted[aria-selected]{background-color:#3875d7;color:#fff}
.select2-container--classic .select2-results__group{cursor:default;display:block;padding:6px}
.select2-container--classic.select2-container--open .select2-dropdown{border-color:#5897fb}
</style>