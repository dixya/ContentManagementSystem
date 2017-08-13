<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['sitename'])) {
	header("location:login.php");
}
include("dbconnect.php");
$sql = "select * from tbl_category";
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
	
	<p><a href="addarticle.php">ADD New Article</a></p>
	<table width="100%" cellpadding="4"  cellspacing="4">
			<tr>
				<th>Category Name</th>
			</tr>
			<?php
			while($datapages = mysql_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $datapages['catname'];?>
				<?php 
				$catid = $datapages['catid'];
				$sqlc = "select * from tbl_articles where catid='$catid'";
				$resultc = executequery($sqlc);
				$rowsc = mysql_num_rows($resultc);
				if($rowsc > 0) {
				?>
				<span class="info"><a href="viewarticles.php?catid=<?php echo $catid;?>">view articles</a></span>
				<?php }else { ?>
				<span class="info">no articles present</span>
				<?php } ?>
				</td>
			</tr>
			<?php } //end of while?>
			</table>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>