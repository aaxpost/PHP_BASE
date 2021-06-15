<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	
	if (!empty($_SESSION['auth']['status'])) {
		echo "<p>Вы прошли авторизацию, {$_SESSION['auth']['login']}. Статус: {$_SESSION['user_status']}</p>";
		}

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
		
		if (isset($_GET['delete_id'])) {
			$id = $_GET['delete_id'];
			echo "DELETE";
			$query = "DELETE FROM user WHERE id='$id'";
			mysqli_query($link, $query) or die(mysqli_error($link));
			}
			
		if (isset($_GET['id']) and
			isset($_GET['status'])) {
			$id = $_GET['id'];
			$status = $_GET['status'];
			$query = "UPDATE user SET user_status='$status' WHERE id='$id'";
			mysqli_query($link, $query) or die(mysqli_error($link));
			}
		
		/*echo "<pre>";
		print_r($base_user);
		echo "</pre>";*/
		
		echo "<table border=\"1\"><tr><th>Логин</th><th>Статус</th><th>Управление</th><th>Права</th></tr>";
			
		foreach ($base_user as $data_user) {
				/*echo "<pre>";
				print_r($data_user);
				echo "</pre>";*/
				
				if($data_user['user_status'] == 'admin') {
					$bgcolor = 'FF0000';
						}
				if($data_user['user_status'] == 'user') {
							$bgcolor = '3CD100';
							}
				
				echo "<tr>";
				$login = $data_user['login'];
				$status = $data_user['user_status'];
				$user_id = $data_user['id'];
					
				echo "<td bgcolor=\"$bgcolor\">$login</td>";
				echo "<td bgcolor=\"$bgcolor\">$status</td>";
				echo "<td bgcolor=\"$bgcolor\"><a href=\"admin.php?delete_id=$user_id\">Удалить</a><br><br></td>";
				
				if($data_user['user_status'] == 'admin') {
					echo "<td bgcolor=\"$bgcolor\"><a href=\"admin.php?id=$user_id&status=user\">сделать его юзером</a><br><br></td>";;
						}
				if($data_user['user_status'] == 'user') {
					echo "<td bgcolor=\"$bgcolor\"><a href=\"admin.php?id=$user_id&status=admin\">сделать его админом</a><br><br></td>";;
						}
					
				echo "</tr>";
				}
				
				
			
		echo "</table>";
		
		
		
		
	}	
		else {
			echo "<p>Вы не прошли авторизацию!</p>";
			}
		
	echo "<p><a href=\"index.php\">Вернуться на главную.</p>";
	


