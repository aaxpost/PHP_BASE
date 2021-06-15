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
	
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		
		$query = "SELECT login AS 'Логин', user_name AS 'Имя Польователя', middle_names AS 'Отчество', surname AS 'Фамилия', date AS 'Дата рождения' FROM user WHERE id='$id'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		$datauser = mysqli_fetch_assoc($result);
		
		//var_dump($datauser);
		
		foreach ($datauser as $key => $value) {
			echo "<b>" . $key . "</b>: " . $value . "<br>";
			}
		
	}
