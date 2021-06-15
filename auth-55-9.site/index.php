<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
    if($_SESSION['user_status'] == 'admin') {
		echo "<p><a href=\"admin.php\">Админпанель.</a></p>";
	}
    
    if (!empty($_SESSION['auth']['status'])) {
		echo "<p>Вы прошли авторизацию, {$_SESSION['auth']['login']}. Статус: {$_SESSION['user_status']}</p>";
		echo "<a href=\"logout.php\">Выход, перестать быть авторизованым.</a><br><br>";
		echo "<a href=\"personalArea.php\">Редактировать личный профиль.</a><br><br>";
		echo "<a href=\"1.php\">1.php</a><br><br>";
		echo "<a href=\"2.php\">2.php</a><br><br>";
		echo "<a href=\"3.php\">3.php</a><br><br>";
		} else {
			echo "<p>Это сообщение для тех кто не авторизовался.</p>";
			echo "<a href=\"login.php\">Страница авторизации</a><br><br>";
			echo "<a href=\"register.php\">Страница регистрации</a><br><br>";
			}
       
    //Выводим флеш сообщение
    if (isset($_SESSION['message'])) {
		$infotext = $_SESSION['message'];
		echo "<p>$infotext</p>";
		unset ($_SESSION['message']);
		}  
		
	
       
