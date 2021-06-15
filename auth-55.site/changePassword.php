<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
	//Connecting to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'true_base_47';
	
	$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));	
	mysqli_query($link, "SET NAMES 'utf8'");
	
	function validationPassword($data) 
		{	
		if ((strlen($data) >= 6) and
			(strlen($data) <= 12)) {	
			return true;
			} else {
				return false;
			}
		}
		
	if(($_SESSION['auth'] != 0) and
		$_SESSION['user_status'] == 'admin') {
		echo "<p><a href=\"admin.php\">Админпанель.</a></p>";
	}
		
	if (!empty($_SESSION['auth']['status'])) {
		echo "<p>Вы прошли авторизацию, {$_SESSION['auth']['login']}. Статус: {$_SESSION['user_status']}</p>";
		}
	
	if(!empty($_SESSION['id'])) {
		
		echo "<p>Форма для замены пароля</p>
		<form action=\"\" method=\"POST\">
			<a>Введите старый пароль</a>
			<input type=\"password\" name=\"old_password\"><br><br>
			<a>Введите новый пароль</a>
			<input type=\"password\" name=\"new_password\"><br><br>
			<a>Введите новый пароль для проверки</a>
			<input type=\"password\" name=\"confirm_password\"><br><br>
			<input type=\"submit\" name=\"submit\">
		</form>";
		
		$id = $_SESSION['id'];
		$query = "SELECT * FROM user WHERE id='$id'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		$datauser = mysqli_fetch_assoc($result);
		$hash = $datauser['password'];
		
		if(isset($_POST['submit']) and
			($_POST['new_password'] == $_POST['confirm_password']) and
			(validationPassword($_POST['new_password'])) and
			(password_verify($_POST['old_password'], $hash))) {
				$new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
				$query = "UPDATE user SET password='$new_password' WHERE id=$id";
				mysqli_query($link, $query) or die(mysqli_error($link));
				}
				else {
					if(isset($_POST['submit']) and
						(validationPassword($_POST['new_password']) == false)) {
					echo "<p>Пароль должен быть более 6 и менее 12 символов. Повторите попытку!</p>";
					}
					if(isset($_POST['submit']) and
						(password_verify($_POST['old_password'], $hash) == false)) {
					echo "<p>Вы ввели неверный пароль!</p>";
					}
					if(isset($_POST['submit']) and
						($_POST['new_password'] != $_POST['confirm_password'])) {
					echo "<p>Введенные пароли не совпадают!</p>";
					}
				}	
	}
	else {
		echo "<p>Вы не прошли авторизацию!</p>";
		}
		
	echo "<p><a href=\"index.php\">Вернуться на главную.</p>";
	
