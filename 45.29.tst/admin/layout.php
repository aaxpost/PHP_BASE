<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Блог 45.24</title>
		<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Блог 45.25</h1>
			<h2>Форма для размещения новых статей</h2>
			<p><?php if(isset($_SESSION['insert'])) echo $_SESSION['insert']['text']; ?></p>
			<a href="logout.php">Выход</a>
			<div id="form">
				<form action="" method="POST">
					<p><input name = "theme" value="<?php if(isset($theme)) echo $theme ?>" class="form-control" placeholder="Тема статьи" ></p>
					<p><input name = "url" value="<?php if(isset($url)) echo $url ?>" class="form-control" placeholder="URL статьи"></p>
					<p><textarea name = "text" class="form-control" placeholder="Текст статьи"><?php if(isset($text)) echo $text ?></textarea></p>
					<p><input name = "submit" type="submit" class="btn btn-info btn-block"></p>
				</form>
			</div>
			
		</div>
	</body>
</html>
