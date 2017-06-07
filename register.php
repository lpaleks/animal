<?php 

$title="О котах";
$desc="Нужна ли кошка в квартире?";
$keywords="Нужна ли кошка в квартире?";
  require_once('templates/top.php');
if($_POST){
	$arr = [];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$date = $_POST['date'];

	if($password == $password2){
	
		$query = "SELECT email FROM user WHERE email='$email' ";
		$adr = mysqli_query($db_conn, $query);
		if(mysqli_num_rows($adr)>=0){
			$err[] = 'Такой емаил в базе данных есть';
		}else {
			$query = "INSERT INTO user VALUES (
										 NULL,
										'$login',
										'$password',
										'$email',
										 NOW(),
										 NOW(),
										'unblock')";
			$ok = mysqli_query($db_conn, $query);
			}
		}else{
		exit($query);
		}
?>
		<script>
			document.location.href = "login.php";
		</script>
<?php		
		} else {
		$arr[] = "Не совпадают пароли"; 
		}
foreach($arr as $arr_err){
	echo "<p style='color:red; font-size:20px' class='error'>".$arr_err."</p>";
}


  /*
echo "<pre>";
print_r ($_POST); 
echo "</pre>";*/
 ?>


	
	<div class="container">		
		<div class="col-md-8">
	<form method="POST" action="register.php">

	<br>
    <div class="form-group">
    <label for="exampleInputLogin">Введите ваш логин</label>
    <input  class="form-control" id="exampleInputLogin" name="login" placeholder="Jonh Smith" required>
	</div>
	
  <br>
  <div class="form-group">
    <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Введите пароль" required>
  </div>
	

	<br>
    <div class="form-group">
    <label for="exampleInputPassword2">Повторите пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword2" type="password" name="password2" placeholder="Повторите пароль" required>
	</div>
	
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Введите Email" required>
  </div>
	

	

	
  <button type="submit" class="btn btn-default">Регистрация</button>
</form>		
</div>
</div>			
<?php require_once('templates/bottom.php');?>