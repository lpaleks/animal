<?php 
$id = (int)$_POST['id'];
require_once('config/config.php');
$query = "SELECT * FROM picture WHERE id='$id'";
$adr = mysqli_query($db_conn,$query);
if(!$adr){
	exit($query);
}
$r = mysqli_fetch_array($adr);
echo "<h4 style='text-align:center'> Название картинки: <b>".$r['name']."</b></h4>";
echo "<img style='display:block; margin:0 auto;' id='".$r['id']."' class='img-circle' width='500px' hiegth='400px' src='".$r['picture']."'>";

