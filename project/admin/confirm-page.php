<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$pagetitle = $_POST['pagetitle'];
	$pagedesc = $_POST['pagedesc'];
	if(isset($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../userfiles/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into tbl_pages (pid,pagetitle,pagedesc,pict) values (null,'$pagetitle','$pagedesc','$imgname')";
	}else {
	$sql = "insert into tbl_pages (pid,pagetitle,pagedesc) values (null,'$pagetitle','$pagedesc')";	
	}//end of else
	$result = executequery($sql);
	header("location:managepages.php?msg=page successfully added");
}else {
	header("location:login.php");
}//end of main else
?>