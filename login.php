<?php 

$title="О котах";
$desc="Нужна ли кошка в квартире?";
$keywords="Нужна ли кошка в квартире?";
require_once('templates/top.php');
  
if($_POST){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
	$adr = mysqli_query($db_conn, $query);
	if(!$adr){
		exit($query);
	} else{
		if(mysqli_num_rows($adr)>0){
			$user = mysqli_fetch_array($adr);
			$_SESSION['user_id'] = $user['id'];
?>
		<script>
			document.location.href = "index.php";
		</script>
<?php		
		}else{
			echo "Ошибка ввода"; 
		}
	}
}  
  
?> 

<div class="container">		
	<div class="col-md-5">
	<form method="POST" action="login.php">
	
	<div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Введите Email" required>
	</div>
	
  <br>
  <div class="form-group">
    <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Введите пароль" required>
  </div>
	
  <button type="submit" class="btn btn-default">Регистрация</button>
</form>		
</div>
</div>	

<?php require_once('templates/bottom.php');?>