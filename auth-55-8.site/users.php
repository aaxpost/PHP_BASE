<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
    if (!empty($_SESSION['auth']['status'])) {
		echo "<p>Вы прошли авторизацию, {$_SESSION['auth']['login']}. Статус: {$_SESSION['user_status']}</p>";
		}
    
	//Connecting to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'true_base_47';
	
	$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));	
	mysqli_query($link, "SET NAMES 'utf8'");
	
	$query = "SELECT id, login FROM user";
			
	$result = mysqli_query($link, $query) or die(mysqli_error($link));

	for ($dataalluser = []; $row = mysqli_fetch_assoc($result); $dataalluser[] = $row);
	
	foreach ($dataalluser as $value) {
			$id = $value["id"];
			$login = $value["login"];
			echo "<a href=\"profile.php?id=$id\">$login</a><br>";
		}
		
		

		
	

