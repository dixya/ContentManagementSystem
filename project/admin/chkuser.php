<?php
include("dbconnect.php");
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "select * from tbl_user where username='$username' and password='$password'";
	$result = executequery($sql);
	$rows = mysql_num_rows($result);
	if($rows > 0) {
		session_start();
		$_SESSION['username']=$username;
		$_SESSION['sitename']="acmeproject";
		header("location:index.php");
	}
	else {
		header("location:login.php?msg=username or password invalid");
	}
}else {
	header("location:login.php");
}
?>