<?php 
$title="О котах";
$desc="Нужна ли кошка в квартире?";
$keywords="Нужна ли кошка в квартире?";
require_once('templates/top.php');


if(isset($_GET['id'])){
	$id_del = $_GET['id'];
	$query = "DELETE FROM Cat WHERE id='$id_del'";
	mysqli_query($db_conn, $query);
	header("Location: home.php");
}

?>

<div class="container">		
	<div class="col-md-8">
	
				<table class="table table-bordered">
					<tr>
						<th>Название</th>
						<th>Описание</th>
						<th>Картинка</th>
						<th></th>
						<th></th>
					</tr>
				
<?php

$query = "SELECT * FROM Cat";
$adr = mysqli_query($db_conn, $query);
if(!$adr){
	exit($query);
}		
				
while($arr = mysqli_fetch_array($adr)){

?>	
					<tr>
						<td><?=$arr['name']?></td>
						<td><?=$arr['description']?></td>
						<td>
						<?php
						if($arr['img']==""){
						?>
						<img src="media/img/logoo.gif" class="img-circle" width="85" height="55">
						<?php
						} else {
						?>
						<img src="<?=$arr['img']?>" class="img-circle" width="85" height="55">
						<?php
						} 
						?>
						</td>
						<td>
						<a class="btn btn-success" href="catsedit.php?id=<?=$arr['id']?>">Редактировать</a>
						</td>
						<td>
						<!--<a class="btn btn-danger" href="home.php?id=<?=$arr['id']?>">Удалить</a>-->
						<a class="btn btn-danger" href="#" onclick="delete_position('del.php?id=<?=$arr['id']?>','Вы действительно хотите удалить?')">Удалить</a>
						</td>

					</tr>


<?php	
}
?>
				
				
				</table>
					<br>
    <div class="form-group">
    <a class="btn btn-success" href="cats.php">Добавить новую кошку</a>	
	</div>

</div>
</div>			
<?php require_once('templates/bottom.php');?>