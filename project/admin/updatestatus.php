<?php
$pid = $_GET['pid'];
$status = $_GET['status'];
include("dbconnect.php");

if($_GET['page']=='parent') 
$sql = "update tbl_pages set status = '$status' where pid = '$pid' ";

elseif($_GET['page']=='child') 
$sql = "update tbl_childpages set status = '$status' where cpid = '$pid' ";

elseif($_GET['page']=='portfolio')
$sql = "update tbl_portfolio set status = '$status' where id = '$pid' ";

elseif($_GET['page']=='category')
$sql = "update tbl_category set status = '$status' where catid = '$pid' ";

elseif($_GET['page']=='article')
$sql = "update tbl_articles set status = '$status' where aid = '$pid' ";

$res = executequery($sql);

if($_GET['page']=='portfolio')
header("location:manageportfolio.php");
elseif($_GET['page']=='category')
header("location:managecategory.php");
elseif($_GET['page']=='article') {
$catid = $_GET['catid'];	
header("location:viewarticles.php?catid=$catid");
}
else
header("location:managepages.php");
?>