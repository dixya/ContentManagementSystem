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
	<form name="frmpage" method="post" action="confirm-article.php" enctype="multipart/form-data">
		<table width="100%" cellpadding="4" cellspacing="4">
		<tr>
			<td>Select Parent</td>
			<td>
				<select name="category">
					<option>select category</option>
					<?php while($data = mysql_fetch_assoc($result)) { ?>
						<option value="<?php echo $data['catid'];?>"><?php echo $data['catname'];?> </option>
					<?php }//end of while ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Article Title</td>
			<td><input type="text" name="atitle" /></td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
			<textarea name="adesc" rows="6" cols="30"></textarea>
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" name="aimage" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="ADD ARTICLE" /></td>
		</tr>
		</table>
	</form>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>