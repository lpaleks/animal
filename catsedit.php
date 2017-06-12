<?php 
$title="О котах";
$desc="Нужна ли кошка в квартире?";
$keywords="Нужна ли кошка в квартире?";
require_once('templates/top.php');

if(isset($_GET['id'])){
	$name = $_POST['name'];
	$description = $_POST['description'];
	$id = (int)$_GET['id'];

if($_POST){
	if($_FILES['image']['size']>0){
		$query = "SELECT * FROM Cat WHERE id='$id'";
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
		
		
	
		$fileName = $_FILES['image']['name'];
		$tmp = $_FILES['image']['tmp_name'];
		$newTmp = 'images/'.$fileName;
		move_uploaded_file( $tmp, $newTmp);
		$pic = ",img='$newTmp' ";
	}else{
		$pic = '';
	}

	

	
	$query = "UPDATE Cat Set name='$name',description='$description' $pic WHERE id='$id'";
											
	$adr = mysqli_query($db_conn, $query);

}



	$cat_id = (int)$_GET['id'];
	$query = "SELECT * FROM Cat WHERE id='$cat_id'";
	$adr = mysqli_query($db_conn, $query);
	if(!$adr){
		exit($query);
	}


?>

	<div class="container">		
		<div class="col-md-8">
	<form method="POST" action="catsedit.php?id=<?=$cat_id?>" enctype="multipart/form-data">
<?php

$arr = mysqli_fetch_array($adr)

?>
	
	<br>
    <div class="form-group">
    <label for="exampleInputLogin">Название записи</label>
    <input  class="form-control" id="exampleInputLogin" name="name" value="<?=$arr['name']?>" required>
	</div>
	
  <br>
  <div class="form-group">
    <label for="exampleInputPassword1">Описание</label>
    <input  class="form-control" id="exampleInputPassword1" name="description" value="<?=$arr['description']?>" required>
  </div>
	
	<br>
    <div class="form-group">
    <label for="exampleInputImage">Картинка</label>
    <img src="<?=$arr['img']?>" class="img-circle" width="85" height="55">
	</div>
	
	<br>
    <div class="form-group">
    <label for="exampleInputImage">Загрузите картинку</label>
    <input type="file" class="form-control" id="exampleInputImage"  name="image" value="<?=$arr['img']?>" required>
	</div>
	
  <button type="submit" class="btn btn-default" name="button">Обновить</button>
</form>	
	<br>
    <div class="form-group">
    <a class="btn btn-success" href="home.php">Назад</a>	
	</div>

</div>
</div>			
<?php

} else {
	echo "Не поступил Get параметр";
}

require_once('templates/bottom.php');
?>