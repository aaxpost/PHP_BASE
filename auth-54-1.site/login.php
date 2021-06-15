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
		
		$query = "SELECT * FROM user WHERE login='$login'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		$datauser = mysqli_fetch_assoc($result);
		
		if (!empty($datauser['login'])) {
			
			$password_sample = $datauser['password'];
			//$password_hash = md5($datauser['salt'] . $_POST['password']);
			
					if (password_verify($_POST['password'], $datauser['password'])) {
							$_SESSION['auth'] = [
							'status' => true,
							'login'=> $datauser['login']];
							
							//var_dump($_SESSION);
							echo "<p>Вы авторизованы, как: {$_SESSION['auth']['login']}</p>";
							//header('location: /index.php'); die();
							$form = 0;
							}
					else {
						echo 'Пароль введен неверно! Повторите попытку!';
						}
			}
			
			else {
				echo 'Логин введен неверно, повторите попытку!';
				}
	}
			
	/*
	else {
		echo 'Повторите ввод данных!';
		$form = 1;
		}
	*/
	
	
	if ($form==1) {
		echo "<form action=\"\" method=\"POST\">
					<input type=\"text\" name=\"login\" placeholder=\"Ваш логин\"><br><br>
					<input type=\"password\" name=\"password\" placeholder=\"Ваш пароль\"><br><br>
					<input type=\"submit\">
				</form>";
	}
	







	
	
	
	




	
	
	
	
































