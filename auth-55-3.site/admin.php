<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	if(!empty($_SESSION['id']) and $_SESSION['user_status'] == 'admin') {
		echo "<p>Вы администратор сайта</p>";
	}	
		else {
			echo "<p>Вы не прошли авторизацию!</p>";
			}
		
	echo "<p><a href=\"index.php\">Вернуться на главную.</p>";
	


