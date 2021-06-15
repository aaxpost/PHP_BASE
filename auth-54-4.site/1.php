<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
    //var_dump($_SESSION);
    
	echo "<a href=\"index.php\">Вернуться на главную страницу</a><br><br><br>";
	echo "<p>1.php</p>";
    
    if (!empty($_SESSION['auth'])) {
		$login=$_SESSION['auth']['login'];
		echo "<p>Вы зашли как, $login.</p>";
		}
