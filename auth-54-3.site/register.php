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
	
	//Функции проверки данных формы регистрации
	function validationPassword($data) 
		{	
		if ((strlen($data) >= 6) and
			(strlen($data) <= 12)) {	
			return true;
			} else {
				return false;
			}
		}
		
	function validationLoginLenth($data) 
		{	
		if ((strlen($data) >= 4) and
			(strlen($data) <= 10)) {		
			return true;
			} else {
				return false;
			}
		}
		
	function validationLoginSymbol($data) 
		{	
		if ((preg_match('#^[a-zA-Z0-9]+$#', $data) == 1)) {	
			return true;
			} else {
				return false;
			}
		}
		
	function validationEmail($data) 
		{	
		if ((preg_match('#^[a-zA-Z-.]+@[a-z]+\.[a-z]{2,3}$#', $data) == 1)) {	
			return true;
			} else {
				return false;
			}
		}
		
	function validationDate($data) 
		{	
		if ((preg_match('#^(0[1-9]|1[0-9]|2[0-9]|3[0,1])\.(0[1-9]|1[0-2])\.(19[0-9]{2}|(200[0-9]|201[0-9]|202[0,1]))$#', $data) == 1)) {	
			return true;
			} else {
				return false;
			}
		}
	
	//Переменные для вывода ошибок
	$messageloginsymbol = "";
	$messageloginlenth = "";
	$messagepassword = "";
	$messageemail = "";
	$messagedate = "";
	
	if (isset($_POST['login']) and
		!empty($_POST['password']) and
		!empty($_POST['confirm']) and
		
		!empty($_POST['user_name']) and
		!empty($_POST['middle_names']) and
		!empty($_POST['surname']) and
		
		!empty($_POST['date']) and
		!empty($_POST['email']) and
		!empty($_POST['country'])) {
			
			//Условия проверки длины и качества логина, пароля, email
			if ((validationLoginLenth($_POST['login'])==true) and
				(validationLoginSymbol($_POST['login'])==true) and
				(validationPassword($_POST['password'])==true) and
				(validationPassword($_POST['confirm'])==true) and
				(validationEmail($_POST['email'])==true) and
				(validationDate($_POST['date'])==true)) {
			
				if ($_POST['password'] == $_POST['confirm']) {
					
					$login = $_POST['login'];
					
					$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
					
					$user_name = $_POST['user_name'];
					$middle_names = $_POST['middle_names'];
					$surname =  $_POST['surname'];
					
					$date = date('Y-m-d', strtotime($_POST['date']));
					$email = $_POST['email'];
					$country = $_POST['country'];
					
					$query = "SELECT * FROM user WHERE login = '$login'";
					$result = mysqli_query($link, $query) or die(mysqli_error($link));
						
					$login_user = mysqli_fetch_assoc($result);
					
					
					if (empty($login_user)) {
					
						$query = "INSERT INTO user (login, password, user_name, middle_names, surname, date, email, registration_date, country) VALUES ('$login', '$password', '$user_name', '$middle_names', '$surname', '$date', '$email', CURRENT_DATE(), '$country')";
						mysqli_query($link, $query) or die(mysqli_error($link));
						//Получаем id текущей записи
						$id = mysqli_insert_id($link);
						
						$_SESSION['auth'] = [
									'status' => true,
									'login'=> $login];
									
						$_SESSION['id'] = $id;
						
						//var_dump($_SESSION);
						//header('location: /index.php'); die();
						
						} else {
							echo "Введенный логин уже используется!";
							}
					
					} else {
						echo "Введенные пароли не совпадают. Введенный логин уже используется! Повторите попытку!";
						}
				} else {
					if ((validationLoginSymbol($_POST['login'])==false)) {
						$messageloginsymbol = "Для логина используйте только цифры и латинские буквы!<br>";
						}
					if ((validationLoginLenth($_POST['login'])==false)) {
						$messageloginlenth = "Длина логина должна быть от 4 до 10 символов!<br>";
						}
					if (validationPassword($_POST['password'])==false) {
						$messagepassword = "Длина пароля должна быть от 6 до 12 символов!<br>";
						}
					if (validationEmail($_POST['email'])==false) {
						$messageemail = "Email введен некорректно!<br>";
						}
					if (validationDate($_POST['date'])==false) {
						$messagedate = "Проверьте дату рождения!<br>";
						}
					}		
	}
	
	echo "<p><a href=\"index.php\">Вернуться на главную страницу</a><br><br><br><p>";
	
	echo "<form action=\"\" method=\"POST\">";
			//Логин
			echo "$messageloginsymbol";
			echo "$messageloginlenth";
			echo "<input type=\"text\" name=\"login\" placeholder=\"Ваш логин\"><br><br>";
			//Пароль
			echo "$messagepassword";
			echo"<input type=\"password\" name=\"password\" placeholder=\"Ваш пароль\"><br><br>";
			echo"<input type=\"password\" name=\"confirm\" placeholder=\"Подтвердите пароль\"><br><br>";
			//Имя пользователя
			echo"<input type=\"text\" name=\"user_name\" placeholder=\"Ваше Имя\"><br><br>";
			//Ваше отчество
			echo"<input type=\"text\" name=\"middle_names\" placeholder=\"Ваше Отчество\"><br><br>";
			//Ваша фамилия
			echo"<input type=\"text\" name=\"surname\" placeholder=\"Ваша Фамилия\"><br><br>";
			//Дата рождения
			echo "$messagedate";
			echo"<input type=\"text\" name=\"date\" placeholder=\"Дата рождения 31.12.1999\"><br><br>";
			//Email
			echo "$messageemail";
			echo "<input type=\"text\" name=\"email\" placeholder=\"Ваш email\"><br><br>";
			echo "<select name=\"country\">
					<option>Беларусь</option>
					<option>Украина</option>
					<option>Казахстан</option>
					<option>Россия</option>
				</select><br><br>
			<input type=\"submit\">
		</form>";
