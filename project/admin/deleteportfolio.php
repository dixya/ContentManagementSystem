<?php
include("dbconnect.php");
$id = $_GET['id'];
$sql = "select pimage from tbl_portfolio where id='$id'";
$result = executequery($sql);
$data = mysql_fetch_assoc($result);
$imgname = $data['pimage'];
if(!empty($imgname)) {
	unlink("../portfolio/".$imgname);
}
$sql = "delete from tbl_portfolio where id='$id'";
$result = executequery($sql);
header("location:manageportfolio.php?msg=portfolio deleted successfully");
?>