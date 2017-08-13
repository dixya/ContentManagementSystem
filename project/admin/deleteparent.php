<?php
include("dbconnect.php");
$pid = $_GET['pid'];
$sqlc = "select * from tbl_childpages where pid='$pid'";
$resultc = executequery($sqlc);
$rowsc = mysql_num_rows($resultc);
if($rowsc > 0) {
	header("location:managepages.php?msg=cant delete, one or more child pages present");
}else {
$sql = "select pict from tbl_pages where pid='$pid'";
$result = executequery($sql);
$data = mysql_fetch_assoc($result);
$imgname = $data['pict'];
if(!empty($imgname)) {
	unlink("../userfiles/".$imgname);
}
$sql = "delete from tbl_pages where pid='$pid'";
$result = executequery($sql);
header("location:managepages.php?msg=page deleted successfully");
}//end of else
?>