<?
	ob_start();
	
$objConnect = mysqli_connect("localhost","nuttayap_hoshi","xwzscEi","hoshi") or die("Error Connect to Database");
$objDB = mysqli_select_db("db_banhom");
$age = $_POST['status'];
$strSQL = "UPDATE orders SET status ='$age'";
/*
$age = $_POST['status'];
*/
$objQuery = mysql_query($strSQL);
if($objQuery)
{

	header("location:add_status_payment.php");

}
else
{
	echo "Error Save [".$strSQL."]";
}
mysql_close($objConnect);
	 

?>