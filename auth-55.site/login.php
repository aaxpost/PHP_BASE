<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
	if(($_SESSION['auth'] != 0) and
		$_SESSION['user_status'] == 'admin') {
		echo "<p><a href=\"admin.php\">Админпанель.</a></p>";
	}
   
    if (!empty($_SESSION['auth']['status'])) {
		echo "<p>Вы прошли авторизацию, {$_SESSION['auth']['login']}. Статус: {$_SESSION['user_status']}</p>";
		}
    
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
		
		$query = "SELECT *, statuses.name as user_status, user.id as id 
					FROM user 
					LEFT JOIN statuses ON statuses.id=user.status_id
					WHERE login='$login'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		$datauser = mysqli_fetch_assoc($result);
		
		/*echo "<pre>";
		print_r($datauser);
		echo "</pre>";*/
		
		if (!empty($datauser['login'])) {
			
			$password_sample = $datauser['password'];
			//$password_hash = md5($datauser['salt'] . $_POST['password']);
			
					if (password_verify($_POST['password'], $datauser['password']) and
						$datauser['banned'] == '0') {
							$_SESSION['auth'] = [
							'status' => true,
							'login'=> $datauser['login']];
							$_SESSION['id'] = $datauser['id'];
							$_SESSION['user_status'] = $datauser['user_status'];
							
							//var_dump($_SESSION);
							echo "<p>Вы авторизованы, как: {$_SESSION['auth']['login']} Статус: {$_SESSION['user_status']}</p>";
							//header('location: /index.php'); die();
							$form = 0;
							}
					else {
						if(password_verify($_POST['password'], $datauser['password']) == false) {
						echo 'Пароль введен неверно! Повторите попытку!';
						}
						if($datauser['banned'] != '0') {
						echo 'Вы забанены!';
						}
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
	







	
	
	
	




	
	
	
	
































