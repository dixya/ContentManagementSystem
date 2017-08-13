<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['sitename'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from tbl_inquiry order by idate DESC";
$result = executequery($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel - ACME Project ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="wrapper">
	<?php include("sidebar.php");?>
	<div class="content">
	<table width="100%" cellpadding="4"  cellspacing="4">
			<tr>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Message</th>
				<th>Date</th>
				<th>Status</th>
				<th>Delete</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $datapages['cname'];?></td>
				<td><?php echo $datapages['cphone'];?></td>
				<td><?php echo $datapages['cemail'];?></td>
				<td><?php echo $datapages['message'];?></td>
				<td><?php echo $datapages['idate'];?></td>
				<td><?php echo $datapages['status'];?></td>
				<td><a href="deleteinquiry.php?id=<?php echo $datapages['id'];?>">Delete</a></td>
			</tr>
			<?php } //end of while?>
			</table>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>