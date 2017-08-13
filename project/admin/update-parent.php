<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['sitename'])) {
	header("location:login.php");
}

include("dbconnect.php");
if(isset($_POST['submit'])) {
	$pid = $_POST['id'];
	$pagetitle = $_POST['pagetitle'];
	$pagedesc = $_POST['pagedesc'];
	if(!empty($_FILES['pict']['name'])) {
	$imgname = $_FILES['pict']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pict']['tmp_name'];
	$perpath = "../userfiles/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "update tbl_pages set pagetitle='$pagetitle', pagedesc='$pagedesc',pict='$imgname' where pid='$pid'";
	}else {
	$sql = "update tbl_pages set pagetitle='$pagetitle', pagedesc='$pagedesc' where pid='$pid'";	
	}//end of else
	$result = executequery($sql);
	header("location:editparent.php?pid=$pid");
}else {
	header("location:login.php");
}//end of main else
?>