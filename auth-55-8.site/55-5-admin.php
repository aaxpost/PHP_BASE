<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	if(!empty($_SESSION['id']) and $_SESSION['user_status'] == 'admin') {
		echo "<p>Вы администратор сайта</p>";
		//Connecting to the database
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$db_name = 'true_base_47';
	
		$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));	
		mysqli_query($link, "SET NAMES 'utf8'");
		
		$query = "SELECT login, user_status, id FROM user";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($base_user = []; $row = mysqli_fetch_assoc($result); $base_user[] = $row);
		
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$query = "DELETE FROM user WHERE id='$id'";
			mysqli_query($link, $query) or die(mysqli_error($link));
			}
		
		/*echo "<pre>";
		print_r($base_user);
		echo "</pre>";*/
		
		echo "<table border=\"1\"><tr><th>Логин</th><th>Статус</th><th>Управление</th></tr>";
			
		foreach ($base_user as $data_user) {
				/*echo "<pre>";
				print_r($data_user);
				echo "</pre>";*/
				
				echo "<tr>";
				$login = $data_user['login'];
				$status = $data_user['user_status'];
				$delete_user_id = $data_user['id'];
				echo "<td>$login</td>";
				echo "<td>$status</td>";
				echo "<td><a href=\"admin.php?id=$delete_user_id\">Удалить</a><br><br></td>";
				echo "</tr>";
				}
				
				
			
		echo "</table>";
		
		
		
		
	}	
		else {
			echo "<p>Вы не прошли авторизацию!</p>";
			}
		
	echo "<p><a href=\"index.php\">Вернуться на главную.</p>";
	


