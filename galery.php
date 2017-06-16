<?php
$scripts=['js/galary.js'];

require_once('templates/top.php');


$query = "SELECT * FROM picture WHERE showhide='show'";
$adr = mysqli_query($db_conn,$query);
if(!$adr){
	exit($query);
}
	while($result = mysqli_fetch_array($adr)){
			echo "<div class='col-md-3 galary'>";
			echo "<h3>".$result['name']."</h3>";
			if($result['picture']!=''){
				echo "<img id='".$result['id']."' width='200px' hiegth='200px' src='".$result['picture']."'>";
			}else{
				echo "<img src='images/no_foto.jpg'>";
			}
			echo "</div>";
	}