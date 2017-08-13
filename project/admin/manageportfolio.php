<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['sitename'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from tbl_portfolio order by pcatname";
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
	<p><a href="addportfolio.php">ADD New Portfolio</a></p>
	<table width="100%" cellpadding="4"  cellspacing="4">
			<tr>
				<th>Category Name</th>
				<th>Title</th>
				<th>Image</th>
				<th>Status</th>
				<th>Delete</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $datapages['pcatname'];?></td>
				<td><?php echo $datapages['ptitle'];?></td>
				<td><img src="../portfolio/<?php echo $datapages['pimage'];?>" width="50" height="50" /></td>
				<td>
					<?php if($datapages['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapages['id'];?>&status=0&page=portfolio">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapages['id'];?>&status=1&page=portfolio">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="deleteportfolio.php?id=<?php echo $datapages['id'];?>">Delete</a></td>
			</tr>
			<?php } //end of while?>
			</table>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>