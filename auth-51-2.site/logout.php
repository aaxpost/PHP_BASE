<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
    
    $_SESSION['auth'] = NULL;
    $_SESSION['message'] = "Вы перестали быть авторизованым пользователем.";
    
    header('location: /index.php'); die();
