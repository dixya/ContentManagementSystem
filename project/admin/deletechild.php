<?php
include("dbconnect.php");
$cpid = $_GET['pid'];
$sql = "select pict from tbl_childpages where cpid='$cpid'";
$result = executequery($sql);
$data = mysql_fetch_assoc($result);
$imgname = $data['pict'];
if(!empty($imgname)) {
	unlink("../userfiles/".$imgname);
}
$sql = "delete from tbl_childpages where cpid='$cpid'";
$result = executequery($sql);
header("location:managepages.php?msg=page deleted successfully");
?>