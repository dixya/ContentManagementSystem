<?php
if(isset($_POST['submit'])) {
	$mytext = $_POST['mytext'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="frmeditor" method="post" action="" enctype="multipart/form-data">
<?php
			
			include("fckeditor/fckeditor.php") ;
			$oFCKeditor = new FCKeditor('mytext') ;
			$oFCKeditor->BasePath	= "fckeditor/"; //$sBasePath ; 
			$oFCKeditor->Value	= '';
			$oFCKeditor->Height 	= 200; 
			$oFCKeditor->Width 	= 300; 
			$oFCKeditor->Create() ;
			?>
<p><input type="submit" name="submit" value="submit" />
</form>
</body>
</html>