<?php
require_once('config/config.php');

if(isset($_GET['id'])){
	$id_del = $_GET['id'];
	
	$query = "SELECT * FROM Cat WHERE id='$id_del'";
		$adr = mysqli_query($db_conn, $query);
		if(!$adr){
			exit($query);
		}
		if(mysqli_num_rows($adr)>0){
			$res = mysqli_fetch_array($adr);
			if(file_exists($res['img'])){
				@unlink($res['img']);
			}
			$query = "DELETE FROM Cat WHERE id='$id'";
		}
		
	$query = "DELETE FROM Cat WHERE id='$id_del'";
	$adr = mysqli_query($db_conn, $query);
	if(!$adr){
		exit($query);
	}
	header("Location: home.php");
}