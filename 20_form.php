<html>
<head>
	<title>Формы_Задача_4</title>
	<meta charset="utf-8">
</head>
<body>

<p>Задача №1</p>
<p>1.Спросите у пользователя имя с помощью формы. Сделайте чекбокс: если он отмечен, то поприветствуйте пользователя, если не отмечен - попрощайтесь с пользователем.</p>


		<form action="" method="GET">
			<input type="password" placeholder = "Введите Ваше имя" name="name"><br><br>
			<input type="hidden" name="hello" value="0">
			<input type="checkbox" name="hello" value="1">
			<input type="submit">
			<input type="submit" value = "Нажмите для регистрации">
		</form>


<?php
	//Если форма была отправлена и переменная не пустая:
	if (
			isset($_REQUEST['login']) and 
			isset($_REQUEST['password_1']) and 
			isset($_REQUEST['password_2'])
		) 
		{
			$login = trim(strip_tags($_REQUEST['login']));
			$pass1 = trim(strip_tags($_REQUEST['password_1']));
			$pass2 = trim(strip_tags($_REQUEST['password_2']));
			if ($pass1 != $pass2)
			{
				echo 'Введенные пароли не совпадают! Повторите попытку.';
			}
			else
			{
				if (((strlen($pass1)) > 5 and (strlen($pass1)) < 9) and
					((strlen($login)) > 3 and (strlen($login)) < 12))
				{
					echo 'Вы успешно прошли регистрацию';
				}	
			}
		}
		

?>

</body>
</html>


