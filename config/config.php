<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'lepeshko_database';
$dp_port = '3307';
$db_conn = mysqli_connect(  $db_host,
							$db_user,	
							$db_pass,
							$db_name,
							$dp_port
							);
if(!$db_conn) {
	exit('error');
}