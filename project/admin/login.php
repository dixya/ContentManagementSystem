<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administration Panel - ACME Project ::</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="wrapper">
	<div class="login">
		<?php if(isset($_GET['msg'])) {?>
		<p class="msg"><?php echo $_GET['msg'];?></p>
		<?php } ?>
		<p class="title">User Login</p>
		<form name="frmlogin" method="post" action="chkuser.php">
			<p>Username: <input type="text" name="username" /></p>
			<p>Password: <input type="password" name="password" /></p>
			<p><input type="submit" name="submit" value="login" /></p>
		</form>
	</div>
</div>
</body>
</html>