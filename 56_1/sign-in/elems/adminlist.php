<?php
	//error_reporting(E_ALL);
    //ini_set('display_errors', 'on');
    //session_start();
	
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
	$query = "SELECT COUNT(*) as count FROM joke_data WHERE status='0'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$count = mysqli_fetch_assoc($result)['count'];
	$pagesCount = ceil($count / $notesOnPage);
	
	//Если страница открыта первый раз, гет запроса нет, откроем первую страницу.
	$pages = 1;
	
	//Вычисляем id
	$from = ($pages - 1)*$notesOnPage;
	$query = "SELECT*FROM joke_data WHERE status='0' ORDER BY date DESC LIMIT $from,$notesOnPage";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	for ($arr_joke = []; $row = mysqli_fetch_assoc($result); $arr_joke[] = $row );
	
	//Публикуем или удаляем анекдот
	if(isset($_GET['id']) AND
		isset($_GET['button']) AND
		$_GET['id'] != 0 AND
		$_GET['button'] != 0) {
		$joke_id = $_GET['id'];
		$button = $_GET['button'];
		
		if($button == 1) {
		$query = "UPDATE joke_data SET status='1' WHERE id='$joke_id'";
		}
		if($button == 2) {
		$query = "DELETE FROM joke_data WHERE id='$joke_id'";
		}
		
		mysqli_query($link, $query) or die(mysqli_error($link));
		$query = "SELECT*FROM joke_data WHERE status='0' ORDER BY date DESC LIMIT $from,$notesOnPage";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($arr_joke = []; $row = mysqli_fetch_assoc($result); $arr_joke[] = $row );
		
		$joke_id = 0;
		$button = 0;
		
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
        <a class="blog-header-logo text-dark" href="#">Смех для всех!</a>
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
    
    foreach ($arr_joke as $joke) {
		$text = $joke['text'];
		$date = $joke['date'];
		$id = $joke['id'];
      echo "<article class=\"blog-post\">
        <p class=\"blog-post-meta\">$date</p>

        <p>$text</p>
        <a class=\"btn btn-success\" href=\"?id=$id&button=1\" role=\"button\">Одобрить</a>
        <a class=\"btn btn-danger\" href=\"?id=$id&button=2\" role=\"button\">Удалить</a>
      
      
      </article>";
	}
      
?>	
     
    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
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
