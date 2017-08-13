<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['sitename'])) {
	header("location:login.php");
}

include("dbconnect.php");
$id = $_GET['id'];
$sql = "select pict from tbl_pages where pid = '$id'";
$res = executequery($sql);
$data = mysql_fetch_assoc($res);
$img = $data['pict'];
unlink("../userfiles/".$img);
$sql = "update tbl_pages set pict=null where pid='$id'";
$res = executequery($sql);
header("location:editparent.php?pid=$id");
?>