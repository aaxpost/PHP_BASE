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
	
	//Получаем данные пользователя из базы по id
	if (!empty($_SESSION['id'])) {
		$id = $_SESSION['id'];
		
		$query = "SELECT
					user_name, 
					middle_names, 
					surname,
					date 
						
				FROM user WHERE id=$id";
				
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		$datauser = mysqli_fetch_assoc($result);
		
		$user_name = $datauser['user_name'];
		$middle_names = $datauser['middle_names'];
		$surname = $datauser['surname'];
		//$date = $datauser['date'];
		$date = date('d.m.Y', strtotime($datauser['date']));
		//var_dump($datauser);
	}
	//var_dump($_POST);
	
	//Функции валидации данных формы
	function validationDate($data) 
		{	
		if ((preg_match('#^(0?[1-9]|1[0-9]|2[0-9]|3[0-1])\.(0[1-9]|1[0-2])\.(19[0-9]{2}|(200[0-9]|201[0-9]|202[0,1]))$#', $data) == 1)) {	
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
		
	$message_error_date = "";
	$message_error_user_name = "";
	$message_error_middle_names = "";
	$message_error_surname = "";
	 
	
	if (isset($_POST['submit'])) {
		if (!empty($_POST['user_name'])) {
			$new_user_name = $_POST['user_name'];
			$user_name = $_POST['user_name'];
			}
			else {
				$new_user_name = $user_name;
				$message_error_user_name = "Поле с именем не может быть пустым";
				
				}
		if (!empty($_POST['middle_names'])) {
			$new_middle_names = $_POST['middle_names'];
			$middle_names = $_POST['middle_names'];
			}
			else {
				$new_middle_names = $middle_names;
				$message_error_middle_names = "Поле с отчеством не может быть пустым";
				}
				
		if (!empty($_POST['surname'])) {
			$new_surname = $_POST['surname'];
			$surname = $_POST['surname'];
			}
			else {
				$new_surname = $surname;
				$message_error_surname = "Поле с фамилией не может быть пустым";
				}
				
		if ((!empty($_POST['date'])) and
			(validationDate($_POST['date'])) == true) {
				$new_date = date('Y-m-d', strtotime($_POST['date']));
				$date = $_POST['date'];
			}
			
		if ((!empty($_POST['date'])) and
			(validationDate($_POST['date'])) == false) {
				$message_error_date = 'Дата введена в неверном формате';
				$new_date = $datauser['date']; 
			}
			
		if (empty($_POST['date'])) {
				$new_date = $datauser['date'];
				$message_error_date = "Поле с датой рождения не может быть пустым";
			}
		
		$query = "UPDATE user SET
					user_name = '$new_user_name',
					middle_names = '$new_middle_names',
					surname = '$new_surname',
					date = '$new_date' 
						
					WHERE id=$id";
				
		mysqli_query($link, $query) or die(mysqli_error($link));	
	
	}
		
	echo $message_error_user_name;
	echo $message_error_middle_names;
	echo $message_error_surname;
	echo $message_error_date;
	
	
?>

	<form action="" method="POST">
		<input type="text" name="user_name"  value="<?php echo $user_name ?>"><br><br>
		<input type="text" name="middle_names"  value="<?php echo $middle_names ?>"><br><br>
		<input type="text" name="surname"  value="<?php echo $surname ?>"><br><br>
		<input type="text" name="date"  value="<?php echo $date ?>"><br><br>
		<input type="submit" name="submit">
	</form>
	
<?php
	



