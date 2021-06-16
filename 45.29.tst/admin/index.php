<?php
	//Главная страница админ панели
	include '../elems/connect.php';
	
	if (!empty($_SESSION['auth'])) {
		
		//Подключаем html
		
		
		$query = "SELECT url FROM article WHERE id>0";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result)['url']; $data[] = $row);
		
		if (!empty($_POST['theme']) and
			!empty($_POST['text']) and
			!empty($_POST['submit']) and
			!empty($_POST['url']) and
			(array_search($_POST['url'], $data) == false))
			{
				$theme = $_POST['theme'];
				$text = $_POST['text'];
				$date = time();
				$url = $_POST['url'];
				
				$query = "INSERT INTO article SET theme='$theme', text='$text', date='$date', url='$url'";
				$result = mysqli_query($link, $query) or die(mysqli_error($link));
				
				//var_dump($_POST);
				
				$_SESSION['insert'] = [
					'text' => 'Данные сохранены в базу данных', 
					'status' => 'success'
					];
					
			
				
				
			} else {
				if (isset($_POST['submit'])) {
				$theme = $_POST['theme'];
				$text = $_POST['text'];
				$date = time();
				$url = $_POST['url'];
				
				$_SESSION['insert'] = [
					'text' => 'В форме есть ошибка, не все поля заполнены или url уже существует.', 
					'status' => 'success'
					];
				}
			}
	
	
	
	} else {
		header('location: /admin/login.php'); die();
	}
	
	include 'layout.php';
	
	
	
	
	
			
			
			
			
			
			
			
			
			
			
			
			

