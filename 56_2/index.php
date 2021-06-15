<?php

	//Параметры подключения к базе данных
	include 'sign-in/elems/connect.php';
	
	/*echo password_hash('admin', PASSWORD_DEFAULT);*/
	
	//Количество объявлений на странице
	$notesOnPage = 3;
	//На основании гет получаю информацию о количестве итераций
	if(isset($_GET['id']) AND
		$_GET['id'] != 1) {
		$category_id = $_GET['id'];
		$query = "SELECT COUNT(*) as count FROM board_data WHERE category_id='$category_id'";
		} else {
			$category_id = 1;
			$query = "SELECT COUNT(*) as count FROM board_data";
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
	$query = "SELECT*FROM board_data WHERE category_id='$category_id' ORDER BY `board_data`.`date_update` DESC LIMIT $from,$notesOnPage";
	} else {
		$query = "SELECT*FROM board_data ORDER BY `board_data`.`date_update` DESC LIMIT $from,$notesOnPage";
		}
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	for ($arr_board = []; $row = mysqli_fetch_assoc($result); $arr_board[] = $row );
	//var_dump($arr_board);
		
	//Получаем список категорий
	$query = "SELECT * FROM category";
					
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for ($arr_category = []; $row = mysqli_fetch_assoc($result); $arr_category[] = $row);
    
?>

<!--Инклудим хедер-->
<?php include 'sign-in/elems/header.php'; ?>


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
      <h1 class="display-4 fst-italic">Доска объявлений</h1>
      <p class="lead my-3">Ищите и найдете!</p>
     <!--<p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>-->
    </div>
  </div> 
  <div class="row g-5">
    <div class="col-md-8">
 		  
<?php
    
    foreach ($arr_board as $board) {
		$text = $board['text'];
		$date = $board['date_update'];
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
	</div>
    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">Задумайтесь!</h4>
          <p class="mb-0">„Нет, леди, мне некогда разыскивать вашу собаку. Поместите объявление в газету. Ах, ваша собака не умеет читать…“</p>
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
