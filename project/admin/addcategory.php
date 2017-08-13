<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['sitename'])) {
	header("location:login.php");
}
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
	<form name="frmpage" method="post" action="confirm-category.php" enctype="multipart/form-data">
		<table width="100%" cellpadding="4" cellspacing="4">
		<tr>
			<td>Category Name</td>
			<td><input type="text" name="catname" /></td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
			<textarea name="catdesc" rows="6" cols="30"></textarea>
			</td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="ADD CATEGORY" /></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>