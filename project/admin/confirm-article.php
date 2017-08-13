<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$atitle = $_POST['atitle'];
	$adesc = $_POST['adesc'];
	$category = $_POST['category'];
	if(!empty($_FILES['aimage']['name'])) {
	$imgname = $_FILES['aimage']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['aimage']['tmp_name'];
	$perpath = "../category/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into tbl_articles (aid,atitle,adesc,aimage,catid) values (null,'$atitle','$adesc','$imgname','$category')";
	}else {
	$sql = "insert into tbl_articles (aid,atitle,adesc,catid) values (null,'$atitle','$adesc','$category')";	
	}//end of else
	$result = executequery($sql);
	header("location:viewarticles.php?catid=$category");
}else {
	header("location:login.php");
}//end of main else
?>