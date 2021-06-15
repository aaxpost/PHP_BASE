<?php
	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    session_start();
	
	if (isset($_GET['login']) AND 
		$_GET['login'] == 0) {
			$_SESSION['auth'] = null;
			}
	

    //Connecting to the database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'joke';
	
	$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));	
	mysqli_query($link, "SET NAMES 'utf8'");
	
	//Количество записей на странице
	$notesOnPage = 5;
	//На основании гет получаю информацию о количестве итераций
	if(isset($_GET['id']) AND
		$_GET['id'] != 1) {
		$category_id = $_GET['id'];
		$query = "SELECT COUNT(*) as count FROM joke_data WHERE status='1' AND category_id='$category_id'";
		} else {
			$category_id = 1;
			$query = "SELECT COUNT(*) as count FROM joke_data WHERE status='1'";
			}

	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$count = mysqli_fetch_assoc($result)['count'];
	$pagesCount = ceil($count / $notesOnPage);
	
	//Если страница открыта первый раз, гет запроса нет, откроем первую страницу.
	if (isset($_GET['page'])) {
		$pages = $_GET['page'];
		}
		else {
			$pages = 1;
		}
	
	//Вычисляем id
	$from = ($pages - 1)*$notesOnPage;
	if($category_id != 1) {
	$query = "SELECT*FROM joke_data WHERE id>0 AND category_id='$category_id' ORDER BY date DESC LIMIT $from,$notesOnPage";
	} else {
		$query = "SELECT*FROM joke_data WHERE id>0 ORDER BY date DESC LIMIT $from,$notesOnPage";
		}
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	for ($arr_joke = []; $row = mysqli_fetch_assoc($result); $arr_joke[] = $row );
		
	//Получаем список категорий
	$query = "SELECT * FROM category";
					
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for ($arr_category = []; $row = mysqli_fetch_assoc($result); $arr_category[] = $row);

    //Получаем данные из формы и формируем запрос
	//Проверяем, что последняя запись не равна текущему запросу
	$alert = 0;
	if (!empty($_POST) AND
		(isset($_POST['submit']))) {
			$query = "SELECT text FROM joke_data WHERE id=(SELECT MAX(id) FROM joke_data)";
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			$last_text = mysqli_fetch_assoc($result)['text'];
			echo $last_text;
			
			if($last_text != $_POST['jokeText']) {
				$jokeCategry = $_POST['jokeCategry'];
				//Удаляем теги
				$jokeText = strip_tags($_POST['jokeText']);
				/*$jokeText = $_POST['jokeText'];*/
				$date = (date('Y-m-d', time()));
				
				$query = "INSERT INTO joke_data SET date='$date', category_id='$jokeCategry', text='$jokeText', status = '0'";
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
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="blog/blog.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <!--<a class="link-secondary" href="#">Подписаться</a>-->
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Смех для всех!</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="/sign-in/signin.php">Авторизоваться</a>
      </div>
    </div>
  </header>

<div class="nav-scroller py-1 mb-2">

	<ul class="nav nav-tabs">
			  
<?php

    foreach ($arr_category as $category) {
		$id = $category['id'];
		$name_category = $category['name'];
		
		if((isset($_GET['id']) AND
			$_GET['id'] == $id) OR
			empty($_GET['id']) AND
			$id == 1) 
			{
			$claas = 'nav-link active';
			 
			}
			else {
				$claas = 'nav-link';
				}
      //Выводим пункты меню и записываем 1 в переменную пагинации
      echo "<li class=\"nav-item\">
				<a class=\"$claas\" href=\"index.php?id=$id&page=1\">$name_category</a>
			</li>";
	}
      
?>

	</ul>
  </div>
</div>

<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Самые смешные анекдоты для худых и толстых.</h1>
      <p class="lead my-3">Улыбаться приятно, это физически приятно. Ещё приятнее смеяться. А хохотать – это же просто удовольствие!</p>
     <!--<p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
    </div>
  </div>
  
  <div class="row g-5">
    <div class="col-md-8">
      

     
		  
<?php
    
    foreach ($arr_joke as $joke) {
		$text = $joke['text'];
		$date = $joke['date'];
      echo "<article class=\"blog-post\">
        <p class=\"blog-post-meta\">$date</p>

        <p>$text</p>
      
      
      </article>";
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
		
	<h4 class="fst-italic">Предложите интересный анекдот и мы обязательно его опубликуем.</h4>
	
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
		<p>Выберите категорию анекдота:</p>
		<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="jokeCategry">
			<!--<option selected>Выберите категорию анекдота</option>-->
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
		<label for="exampleFormControlTextarea1" class="form-label">Текст анекдота</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name = "jokeText"></textarea>
		</div>
	  <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
	</form>
    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">Задумайтесь!</h4>
          <p class="mb-0">Если анекдот — оружие слабого, ясно, почему мужчины насочиняли столько анекдотов о женщинах.(Лешек Кумор)</p>
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
