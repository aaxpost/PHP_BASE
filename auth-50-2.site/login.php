<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
    echo "<a href=\"index.php\">Вернуться на главную страницу</a><br><br><br>";
    
	//Connecting to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'true_base_47';
	
	$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));	
	mysqli_query($link, "SET NAMES 'utf8'");
	
	//we get the login and password from the form
	$form = 1;
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$query = "SELECT login FROM user WHERE login='$login' AND password='$password'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		$user = mysqli_fetch_assoc($result);
		
		if (isset($user)) {
			$_SESSION['auth'] = true;
			echo "<p>Вы авторизованы!</p>";
			//header('location: /index.php'); die();
			$form = 0;
			}
		else {
			echo 'Повторите ввод данных!';
			$form = 1;
			}
			
	}
	
	
	if ($form==1) {
		echo "<form action=\"\" method=\"POST\">
					<input type=\"text\" name=\"login\" placeholder=\"Ваш логин\"><br><br>
					<input type=\"password\" name=\"password\" placeholder=\"Ваш пароль\"><br><br>
					<input type=\"submit\">
				</form>";
	}
	







	
	
	
	




	
	
	
	
































