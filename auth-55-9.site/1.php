<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
    //var_dump($_SESSION);
    
    if($_SESSION['user_status'] == 'admin') {
		echo "<p><a href=\"admin.php\">Админпанель.</a></p>";
	}
	
	if (!empty($_SESSION['auth']['status'])) {
		echo "<p>Вы прошли авторизацию, {$_SESSION['auth']['login']}. Статус: {$_SESSION['user_status']}</p>";
		}
    
	echo "<a href=\"index.php\">Вернуться на главную страницу</a><br><br><br>";
	echo "<p>1.php</p>";
    
	
