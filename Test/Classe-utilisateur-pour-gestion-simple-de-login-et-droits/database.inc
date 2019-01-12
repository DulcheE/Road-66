<?php
function connectionBDD(){
	$DB_HOST = "localhost";
	$DB_NAME = "2010src2s3grp8";
	$DB_LOGIN = "2010src2s3grp8";
	$DB_PASSWORD ="W4GtMjustbbwuGDM";
	$pdo = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME,$DB_LOGIN,$DB_PASSWORD,array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	return $pdo;
}
?>