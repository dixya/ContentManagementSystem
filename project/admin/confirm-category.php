<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$catname = $_POST['catname'];
	$catdesc = $_POST['catdesc'];
	$ucatname = strtoupper($catname);
	$sqlc = "select * from tbl_category where catname='$catname'";
	$resultc = executequery($sqlc);
	$rows = mysql_num_rows($resultc);
	if($rows > 0) {
		header("location:addcategory.php?msg=category already exists");
	}else {
	$sql = "insert into tbl_category (catid,catname,catdesc) values (null,'$ucatname','$catdesc')";	
	
	$result = executequery($sql);
	header("location:managecategory.php?msg=category successfully added");
	}
}else {
	header("location:login.php");
}//end of main else
?>