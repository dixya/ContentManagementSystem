<?php
include("dbconnect.php");
$catid = $_GET['id'];
$sqlc = "select * from tbl_articles where catid='$catid'";
$resultc = executequery($sqlc);
$rowsc = mysql_num_rows($resultc);
if($rowsc > 0) {
	header("location:managecategory.php?msg=cant delete, one or more articles present");
}else {
$sql = "delete from tbl_category where catid='$catid'";
$result = executequery($sql);
header("location:managecategory.php?msg=category deleted successfully");
}//end of else
?>