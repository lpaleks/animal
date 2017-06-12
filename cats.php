<?php 
$title="О котах";
$desc="Нужна ли кошка в квартире?";
$keywords="Нужна ли кошка в квартире?";
require_once('templates/top.php');


if($_POST){
	$fileName = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
	$newTmp = 'images/'.$fileName;
	move_uploaded_file( $tmp, $newTmp);
	
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	$query = "INSERT INTO Cat VALUES (NULL,'$name','$description','$newTmp')";
											
	$adr = mysqli_query($db_conn, $query);
	if(!$adr){
		exit($query);
	}
	else{
	?>
	<script>
		document.location.href = "home.php";
	</script>*/	
	<?php
	}
}
?>

	<div class="container">		
		<div class="col-md-8">
	<form method="POST" action="cats.php" enctype="multipart/form-data">

	<br>
    <div class="form-group">
    <label for="exampleInputLogin">Введите название записи</label>
    <input  class="form-control" id="exampleInputLogin" name="name" placeholder="Название" required>
	</div>
	
  <br>
  <div class="form-group">
    <label for="exampleInputPassword1">Введите описание</label>
    <textarea  class="ckeditor form-control" id="exampleInputPassword1" name="description" placeholder="Описание" required></textarea>
  </div>
	

	<br>
    <div class="form-group">
    <label for="exampleInputImage">Загрузите картинку</label>
    <input type="file" class="form-control" id="exampleInputImage"  name="image" placeholder="Повторите пароль" required>
	</div>
	
	
  <button type="submit" class="btn btn-default">Добавить</button>
</form>		

	<br>
    <div class="form-group">
    <a class="btn btn-success" href="cats.php"></a>	
	</div>
	
</div>
</div>			
<?php require_once('templates/bottom.php');?>