<?php 

$title="О котах";
$desc="Нужна ли кошка в квартире?";
$keywords="Нужна ли кошка в квартире?";
  require_once('templates/top.php');
?>
	
	<div class="container">		
		<div class="col-md-8">
	<form method="POST" action="index.php">

  <div class="form-group">
    <label for="exampleInputEmail1">Введите логин</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Введите Email">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Введите пароль">
  </div>
	
	<br>
    <div class="form-group">
    <label for="exampleInputPassword2">Повторите пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword2" type="password" name="password_again" placeholder="Повторите пароль">
	</div>

	<br>
    <div class="form-group">
    <label for="exampleInputPhone">Введите ваш номер телефона</label>
    <input type="password" class="form-control" id="exampleInputPhone" type="number" name="password_again" placeholder="Введите телефон(+375(..) ........">
	</div>
	  
  <button type="submit" class="btn btn-default">Регистрация</button>
</form>		
</div>
</div>			
<?php require_once('templates/bottom.php');?>