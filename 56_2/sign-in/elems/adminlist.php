<?php
	
	//Количество записей на странице
	$notesOnPage = 5;
	//На основании гет получаю информацию о количестве итераций
	$query = "SELECT COUNT(*) as count FROM board_data WHERE user_id='1'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$count = mysqli_fetch_assoc($result)['count'];
	$pagesCount = ceil($count / $notesOnPage);
	
	//Если страница открыта первый раз, гет запроса нет, откроем первую страницу.
	$pages = 1;
	
	//Вычисляем id
	$from = ($pages - 1)*$notesOnPage;
	$query = "SELECT*FROM board_data WHERE user_id='1' ORDER BY date_update DESC LIMIT $from,$notesOnPage";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	for ($arr_board = []; $row = mysqli_fetch_assoc($result); $arr_board[] = $row );
	
	//Поднимаем объявление
	if(isset($_GET['id']) AND
		isset($_GET['button']) AND
		$_GET['id'] != 0 AND
		$_GET['button'] != 0) {
		$data_id = $_GET['id'];
		$button = $_GET['button'];
		
		if($button == 1) {
		$date = (date('Y-m-d H:i:s', time()));
		$query = "UPDATE board_data SET date_update='$date' WHERE id='$data_id'";
		}
		
		mysqli_query($link, $query) or die(mysqli_error($link));
		
		//Обновляем список объявлений?
		$query = "SELECT*FROM board_data WHERE user_id='1' ORDER BY date_update DESC LIMIT $from,$notesOnPage";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($arr_board = []; $row = mysqli_fetch_assoc($result); $arr_board[] = $row );
		
		$data_id = 0;
		$button = 0;
		
	}
	
	//Получаем список категорий
	$query = "SELECT * FROM category";
					
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for ($arr_category = []; $row = mysqli_fetch_assoc($result); $arr_category[] = $row)
	
	$alert = 0;
	
	//Получаем данные из формы и формируем запрос
	//Проверяем, что последняя запись не равна текущему запросу
	$alert = 0;
	$user_id = $_SESSION['user_id'];
	
	if (!empty($_POST) AND
		(isset($_POST['submit']))) {
			$query = "SELECT text FROM board_data WHERE id=(SELECT MAX(id) FROM board_data) AND user_id='$user_id'";
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			$last_text = mysqli_fetch_assoc($result)['text'];
			//echo $last_text;
			
			if($last_text != $_POST['dataText']) {
				$boardCategry = $_POST['boardCategry'];
				
				//Удаляем теги
				$dataText = strip_tags($_POST['dataText']);
				$date = (date('Y-m-d H:i:s', time()));
				
				$query = "INSERT INTO board_data SET date_publication='$date', date_update='$date', category_id='$boardCategry', text='$dataText', user_id='$user_id'";
				mysqli_query($link, $query) or die(mysqli_error($link));
				//echo "$query";
				$alert = 1;
			}
			else {
				$alert = 2;
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
    <title>Анекдоты</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">

    

    <!-- Bootstrap core CSS -->
<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../../blog/blog.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <!--<a class="link-secondary" href="#">Подписаться</a>-->
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Доска объявлений</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="/index.php?id=1&page=1&login=0">Выход из админ панели</a>
      </div>
    </div>
  </header>

<div class="nav-scroller py-1 mb-2">

	<ul class="nav nav-tabs">
			  
<?php
      //Выводим пункт меню
      echo "<li class=\"nav-item\">
				<a class=\"nav-link active\" href=\"#\">Все анекдоты</a>
			</li>";     
?>

	</ul>
  </div>
</div>

<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Админпанель</h1>
     <!--<p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
    </div>
  </div>
  
  <div class="row g-5">
    <div class="col-md-8">
      

     
		  
<?php
    
    foreach ($arr_board as $data) {
		$text = $data['text'];
		$date = $data['date_update'];
		$id = $data['id'];
      echo "<article class=\"blog-post\">
        <p class=\"blog-post-meta\">$date</p>
        <p>$text</p>";
        //Вычисляем, сколько прошло с момента прошлого обновления
        if((time() - strtotime($date)) > 86400) {
			echo "<a class=\"btn btn-success\" href=\"?id=$id&button=1\" role=\"button\">Поднять</a>";
		}
      echo "</article>";
	}
      
?>	
      <ul class="pagination justify-content-center">
<?php

	//Стрелка влево
	if(isset($_GET['id'])) {
		$id_active = $_GET['id'];
	} else {
		$id_active = 1;
		}
	
	//$pages = $_GET['page'];
	
	if ($pages != 1) {
		$prev = $pages - 1;
			echo "<li class=\"page-item\">
				  <a class=\"page-link\" href=\"?id=$id_active&page=1\" aria-label=\"Previous\">
					<span aria-hidden=\"true\">&laquo;</span>
				  </a>
				</li>";
		}
		else {
			echo "<li class=\"page-item disabled\">
				  <a class=\"page-link\" href=\"?id=$id_active&page=1\" aria-label=\"Previous\">
					<span aria-hidden=\"true\">&laquo;</span>
				  </a>
				</li>";
			}
	//Основные элементы
	for ($i = 1; $i <= $pagesCount; $i++) {
		if ($pages == $i) {
			$class = 'class="page-item active"';
		}
			else {
			$class = 'class="page-item"';
		}
		echo "<li $class><a class=\"page-link\" href=\"?id=$id_active&page=$i\">$i</a></li>";
	}
	
	
	//Стрелка вправо
	
	if ($pages != $pagesCount) {
		$prev = $pages + 1;
			echo "<li class=\"page-item\">
					<a class=\"page-link\" href=\"?id=$id_active&page=$prev\" aria-label=\"Previous\">
						<span aria-hidden=\"true\">&raquo;</span>
					</a>
				</li>";
		}
		else {
			echo "<li class=\"page-item disabled\">
				  <a class=\"page-link\" href=\"?id=$id_active&page=1\" aria-label=\"Previous\">
					<span aria-hidden=\"true\">&raquo;</span>
				  </a>
				</li>";
			}
?>
		
		</ul>
		
	<h4 class="fst-italic">Для размещения объявления, заполните форму.</h4>
	
<?php
	if($alert == 1) {
	echo "<div class=\"alert alert-success\" role=\"alert\">
		После одобрения администратором анекдот появится на сайте!
	</div>";
    }
    if($alert == 2) {
	echo "<div class=\"alert alert-danger\" role=\"alert\">
		Ошибка отправки или этот текст уже есть базе! Повторите попытку!
	</div>";
	}
?>
	
	
	<form action="" method="POST">
		<p>Выберите категорию:</p>
		<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="boardCategry">
			<!--<option selected>Выберите категорию</option>-->
<?php 		
			foreach ($arr_category as $category) {
				if ($category['id'] != 1) {
						$id = $category['id'];
						$name_category = $category['name'];
						 echo "<option value=\"$id\">$name_category</option>";
					 }
				}			
?>

		</select>
		<div class="mb-3">
		<label for="exampleFormControlTextarea1" class="form-label">Текст объявления</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name = "dataText"></textarea>
		</div>
	  <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
	</form>
    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">О насущном!</h4>
          <p class="mb-0">„Из объявления о трудоустройстве: «Если вы в конце рабочего дня все еще способны улыбаться, приглашаем вас на работу.»“</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Архив</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
          </ol>
        </div>

        
      </div>
    </div>
  </div>

</main>

<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>


    
  </body>
</html>
