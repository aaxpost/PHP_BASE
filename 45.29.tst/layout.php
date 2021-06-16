<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Блог 45.29 Вариант ЧПУ №2</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Блог 45.29 Вариант ЧПУ №2</h1>
			<!--
			<div>
				<p><a href="?article=8">Тема: Типы переменных в PHP. Дата публикации: 16.04.2014</a></p>
				<p><a href="">Статья №7</a></p>
				<p><a href="">Статья №6</a></p>
				<p><a href="">Статья №5</a></p>
				<p><a href="">Статья №4</a></p>
				<p><a href="">Статья №3</a></p>
				<p><a href="">Статья №2</a></p>
				<p><a href="">Статья №1</a></p>
			</div>
			-->
			
			<div>
				<?php if(isset($main)) { echo $main; } ?>
				<h2><?php if(isset($theme)) { echo $theme; } ?></h2>
				<?php if(isset($text)) { echo $text; } ?>
				<?php if(isset($content)) { echo $content; } ?>
				<br>
				<br>
				<p><?php if(isset($back)) { echo "<a href=\"/\">Вернуться на главную</a>"; } ?></p>
			</div>	
	
			<!--
			<div class="note">
				<p><span class="theme">Cтатья №300</span></p>
				<p><span class="date">Дата публикации: 16.04.2014 14:59:59</span></p>
				<p>
					Ut varius commodo fringilla. Nullam id pulvinar odio. Pellentesque gravida aliquam ipsum, et malesuada neque molestie eget. Vestibulum sagittis finibus efficitur. Donec sit amet aliquet dolor, vitae ornare tortor. Etiam eget augue nec diam vehicula bibendum. Nulla quis erat lacus. Vestibulum quis mattis augue. Praesent dignissim, justo non aliquam feugiat, lorem metus egestas leo, quis eleifend odio quam in ex. Aenean diam est, scelerisque ac ultricies sit amet, vulputate in tortor. Etiam ac mi enim. Sed pellentesque elementum erat eu eleifend. Integer imperdiet sem eu magna feugiat, sed efficitur velit convallis. 
				</p>
			</div>	
			
			<div>
				<nav>
				  <ul class="pagination">
					<li class="disabled">
						<a href="?page=1"  aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li class="active"><a href="?page=1">1</a></li>
					<li><a href="?page=2">2</a></li>
					<li><a href="?page=3">3</a></li>
					<li><a href="?page=4">4</a></li>
					<li><a href="?page=5">5</a></li>
					<li>
						<a href="?page=5" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				  </ul>
				</nav>
			</div> -->	
		</div>
	</body>
</html>
