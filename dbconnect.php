<?php 
	error_reporting( ~E_DEPRECATED & ~E_NOTICE);
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'tgs_uas_syfadwiyatna14300015');
	
	$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
	$dbconn = mysql_select_db(DBNAME);
	
	if(!$conn)die("Connection failed : ".mysql_error());
	
	if(!$dbconn)die("Database Connection failed : ".mysql_error());

	$baseurl = "http://localhost/Latihan/TugasUAS_SyfaDwiyatna/";
	
?>