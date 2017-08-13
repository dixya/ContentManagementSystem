<?php
define(HOSTNAME,"localhost");
define(USERNAME,"root");
define(PASSWORD,"");
define(DBNAME,"php_acme_project");

function dbconnect() {
	mysql_connect(HOSTNAME,USERNAME,PASSWORD);
	mysql_select_db(DBNAME);
}

function executequery($sql) {
	dbconnect();
	$res = mysql_query($sql);
	return $res;
}
?>