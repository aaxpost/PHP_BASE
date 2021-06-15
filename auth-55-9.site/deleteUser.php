<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

    
	//Connecting to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'true_base_47';
	
	$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));	
	mysqli_query($link, "SET NAMES 'utf8'");
	
	if($_SESSION['user_status'] == 'admin') {
		echo "<p><a href=\"admin.php\">Админпанель.</a></p>";
	}
	
	if (!empty($_SESSION['auth']['status'])) {
		echo "<p>Вы прошли авторизацию, {$_SESSION['auth']['login']}. Статус: {$_SESSION['user_status']}</p>";
		}
	
	if(!empty($_SESSION['id'])) {
		
		echo "<p>Форма для замены пароля</p>
		<form action=\"\" method=\"POST\">
			<a>Для подтверждения введите пароль</a>
			<input type=\"password\" name=\"password\"><br><br>
			<input type=\"submit\" name=\"submit\">
		</form>";
		
		$id = $_SESSION['id'];
		$query = "SELECT * FROM user WHERE id='$id'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		$datauser = mysqli_fetch_assoc($result);
		$hash = $datauser['password'];
		
		if(isset($_POST['submit']) and
			(password_verify($_POST['password'], $hash))) {
				
				$query = "DELETE FROM user WHERE id=$id";
				mysqli_query($link, $query) or die(mysqli_error($link));
				$_SESSION['auth'] = NULL;
				$_SESSION['id'] = NULL;
				echo "<p>Ваша учетная запись удалена! Для продолжения перейдите по <a href=\"index.php\">ссылке</a></p>";
				//Этот участок выдает ошибку, не смогу понять как устранить...
				//header('location: /index.php'); die(); 
				}
				else {
					if(isset($_POST['submit'])) {
					echo "<p>Вы неправильно ввели пароль. Повторите попытку!</p>";
					}
				}
					
	}	
		else {
			echo "<p>Вы не прошли авторизацию!</p>";
			}
		
	echo "<p><a href=\"index.php\">Вернуться на главную.</p>";
	

