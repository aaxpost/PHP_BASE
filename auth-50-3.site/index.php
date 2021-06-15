<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
    
    if (!empty($_SESSION['auth']['status'])) {
		echo "<p>Вы читаете это сообщение, потому что прошли авторизацию, {$_SESSION['auth']['login']}.</p>";
		echo "<a href=\"1.php\">1.php</a><br><br>";
		echo "<a href=\"2.php\">2.php</a><br><br>";
		echo "<a href=\"3.php\">3.php</a><br><br>";
		} else {
			echo "<p>Это сообщение для тех кто не авторизовался.</p>";
			echo "<a href=\"login.php\">Страница авторизации</a><br><br>";
			}
       
       
       
