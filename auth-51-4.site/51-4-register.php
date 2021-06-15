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
	
	
	if (!empty($_POST['login']) and
		!empty($_POST['password']) and
		!empty($_POST['date']) and
		!empty($_POST['email'])) {
				
		$login = $_POST['login'];
		$password = $_POST['password'];
		$date = $_POST['date'];
		$email = $_POST['email'];
		
		$query = "INSERT INTO user (login, password, date, email, registration_date) VALUES ('$login', '$password','$date', '$email', CURRENT_DATE())";
		mysqli_query($link, $query) or die(mysqli_error($link));
		
		$_SESSION['auth'] = [
					'status' => true,
					'login'=> $login];
		header('location: /index.php'); die();		
	}
	
	echo "<a href=\"index.php\">Вернуться на главную страницу</a><br><br><br>";
	
	echo "<form action=\"\" method=\"POST\">
			<input type=\"text\" name=\"login\" placeholder=\"Ваш логин\"><br><br>
			<input type=\"password\" name=\"password\" placeholder=\"Ваш пароль\"><br><br>
			<input type=\"text\" name=\"date\" placeholder=\"Дата рождения 1999-12-31\"><br><br>
			<input type=\"text\" name=\"email\" placeholder=\"Ваш email\"><br><br>
			<input type=\"submit\">
		</form>";
