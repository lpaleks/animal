<?php  
$title="О котах";
$desc="Нужна ли кошка в квартире?";
$keywords="Нужна ли кошка в квартире?";
  require_once('templates/top.php');
 

		if($_GET['url']){
			$url = $_GET['url'];
		}else{
			$url = 'index';
		}

		$query = "SELECT * FROM maintexts WHERE url='$url'";  
		//echo $query;  
		$adr = mysqli_query($db_conn,$query);
		if(!$adr){
			exit('Error query');
		}
		$result = mysqli_fetch_array($adr);

		/*
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";*/

		echo "<pre>";


 ?>
	<div><?=$result['body']?></div>							
			
			
<?php require_once('templates/bottom.php');?>