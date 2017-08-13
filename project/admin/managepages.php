<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['sitename'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from tbl_pages";
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
		<?php
		if(isset($_GET['msg'])) {
		?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<p><a href="addnewpage.php">Add New Parent Page</a></p>
		<p><a href="addnewchildpage.php">Add New Child Page</a></p>
		<table width="100%" cellpadding="4"  cellspacing="4">
			<tr>
				<th>Page Title</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $datapages['pagetitle'];?></td>
				<td>
					<?php if($datapages['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapages['pid'];?>&status=0&page=parent">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapages['pid'];?>&status=1&page=parent">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="editparent.php?pid=<?php echo $datapages['pid'];?>">Edit</a></td>
				<td><a href="deleteparent.php?pid=<?php echo $datapages['pid'];?>">Delete</a></td>
			</tr>
			<?php 
			$pid =  $datapages['pid'];
			$sqlc = "select * from tbl_childpages where pid='$pid'";
			$resultc = executequery($sqlc);
			$rowsc = mysql_num_rows($resultc);
			if($rowsc > 0) {
				while($datapagesc = mysql_fetch_assoc($resultc)) :
			
			?>
			<tr class="childpage">
				<td style="padding:0 0 0 20px;"><?php echo $datapagesc['pagetitle'];?></td>
				<td>
					<?php if($datapagesc['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapagesc['cpid'];?>&status=0&page=child">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapagesc['cpid'];?>&status=1&page=child">In Active</a>
					<?php }//end of else ?>
				</td>
				<td>Edit</td>
				<td><a href="deletechild.php?pid=<?php echo $datapagesc['cpid'];?>">Delete</a></td>
			</tr>
			<?php
				endwhile;
			}//end of if for child page listing
		
			}//end of while 
			?>
		</table>
		
	</div>
	<div class="clear"></div>
</div>
</body>
</html>