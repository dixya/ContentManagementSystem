<?php
include("dbconnect.php");
$pcatname = $_POST['pcatname'];
$ptitle = $_POST['ptitle'];

if(isset($_FILES['pimage']['name'])) {
	$imgname = $_FILES['pimage']['name'];
	$rand = rand();
	$imgname = $rand."_".$imgname;
	$tmppath = $_FILES['pimage']['tmp_name'];
	$perpath = "../portfolio/".$imgname;
	move_uploaded_file($tmppath,$perpath);
	$sql = "insert into tbl_portfolio (id,pcatname,ptitle,pimage) values (null,'$pcatname','$ptitle','$imgname')";
	}else {
	$sql = "insert into tbl_portfolio (id,pcatname,ptitle) values (null,'$pcatname','$ptitle')";
	}//end of else
	$result = executequery($sql);
	header("location:manageportfolio.php");
?>