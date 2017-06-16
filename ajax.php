<?php 
echo $_POST['id'];
$id = (int)$_POST['id'];
require_once('config/config.php');
$query = "SELECT * FROM picture WHERE id='$id'";
$adr = mysqli_query($db_conn,$query);
if(!$adr){
	exit($query);
}
$r = mysqli_fetch_array($adr);
echo "<h4>".$r['name']."</h4>";
echo "<img id='".$r['id']."' width='300px' hiegth='300px' src='".$r['picture']."'>";
