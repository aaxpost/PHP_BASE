<?php
	//Страница генерации списка статей на главной
	function creatLink($href, $theme, $date)
	{					
			echo "<a href=\"$href\">Тема статьи: $theme / Дата публикации: $date</a><br>";
	}
	
	$query = "SELECT*FROM article WHERE id>0 ORDER BY id DESC";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	
	foreach ($data as $page) {
		creatLink($page['url'], $page['theme'], date('H:i:s d.m.Y', ($page['date'])));
		}
