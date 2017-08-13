<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['sitename'])) {
	header("location:login.php");
}
include("dbconnect.php");
$catid = $_GET['catid'];

$sqlc = "select catname from tbl_category where catid='$catid'";
$resultc = executequery($sqlc);
$cname = mysql_fetch_assoc($resultc);
				

$sql = "select * from tbl_articles where catid='$catid'";
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
	<p class="info">Category Name: <?php echo $cname['catname'];?></p>
	<table width="100%" cellpadding="4"  cellspacing="4">
			<tr>
				<th>Article Title</th>
				<th>Image</th>
				<th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $datapages['atitle'];?></td>
				<td>
				<?php
				if(!empty($datapages['aimage'])) {
					?>
				<img src="../category/<?php echo $datapages['aimage'];?>" width="50" height="50" />
				<?php }else{ 
				echo "no image found";
				}
				?>				
				</td>
								<td>
					<?php if($datapages['status']==1) {?>
						<a href="updatestatus.php?pid=<?php echo $datapages['aid'];?>&status=0&page=article&catid=<?php echo $catid;?>">Active</a>
					<?php } else { ?>
						<a href="updatestatus.php?pid=<?php echo $datapages['aid'];?>&status=1&page=article&catid=<?php echo $catid;?>">In Active</a>
					<?php }//end of else ?>
				</td>
				<td><a href="editarticle.php?id=<?php echo $datapages['aid'];?>">Edit</a></td>
				<td><a href="deletearticle.php?id=<?php echo $datapages['aid'];?>">Delete</a></td>

			</tr>
			<?php } //end of while?>
			</table>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>