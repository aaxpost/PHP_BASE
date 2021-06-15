<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
	
	//Connecting to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'joke';
	
	$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));	
	mysqli_query($link, "SET NAMES 'utf8'");
	
	//we get the login and password from the form
	$alert_form = 0;
	$form = 1;
	if (!empty($_POST['login']) and !empty($_POST['password'])) {
		$login = $_POST['login'];
		
		$query = "SELECT * FROM user WHERE login='$login'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		$datauser = mysqli_fetch_assoc($result);
		
		/*echo "<pre>";
		print_r($datauser);
		echo "</pre>";*/
		
		
		
		if (!empty($datauser['login'])) {
			
			$password_sample = $datauser['password'];
			
					if (password_verify($_POST['password'], $datauser['password'])) {
							$_SESSION['auth'] =  true;
							}
					else {
						if(password_verify($_POST['password'], $datauser['password']) == false) {
						$_SESSION['auth'] =  false;
						$alert_form == 1;
						}
					}
			}
			
			else {
				$alert_form = 1;
				}
	}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<?php

if (isset($_SESSION['auth'])) {
  if ($_SESSION['auth'] == false) {
			include 'elems/form.php';
	}
	
  if ($_SESSION['auth'] == true) {
			echo "<main class=\"form-signin\"><a class=\"btn btn-sm btn-outline-secondary\" href=\"/adminpane.php\">Перейти в админ панель</a></main>";
	}
  } else {
	  include 'elems/form.php';
	  }
  
?>
    
  </body>
</html>
