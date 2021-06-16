<?php
	include 'elems/connect.php';
	
	$uri = trim(preg_replace('#(\?.*)?#', '', $_SERVER['REQUEST_URI']), '/');
	
	if (!empty($uri)) {
	
			$query = "SELECT*FROM article WHERE url='$uri'";
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			$page = mysqli_fetch_assoc($result);
					
			//Если гет запрос с несуществующим адресом выводим 404
			if (!$page) {	
				ob_start();
				include 'elems/404.php';
				$content = ob_get_clean();
				
				header("HTTP/1.0 404 Not Found");
			} else {
			//Выводим статью
			$theme = $page['theme'];
			$text = $page['text'];
			$back = true;
			}
	
	} else {
	//Хитро инклудим данные в буфер.
	ob_start();
	include 'elems/contentMain.php';
	$main = ob_get_clean();
	}
	
	//Подключаем html
	include 'layout.php';
	

	
	
	
	
			
			
			
			
			
			
			
			
			
			
			
			

