
<p>1.По заходу на страницу выведите сколько дней осталось до нового года.</p>
<?php
	echo 'До нового года осталось: '.floor((mktime(23, 59, 59, 12, 31) - time())/86400) .' дней';
?>

<p>2.Дан инпут и кнопка. В этот инпут вводится год. По нажатию на кнопку выведите на экран, високосный он или нет.</p>

	<form action="" method="GET">
		<input type="text" placeholder = "Введите год" name="name"><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php

//Можно было решить на фукнции date('L')

$year = '';

if (!empty($_REQUEST['name']))
	{
		$year = $_REQUEST['name'];
		if (($year % 4 == 0 and $year % 100 != 0) or ($year % 400 == 0)) {
			echo 'Это высокосный год!';
		} else {
					echo 'Это обычный год!';
				}
		}

?>

<p>3.Дан инпут и кнопка. В этот инпут вводится дата в формате '01.12.1990'. По нажатию на кнопку выведите на экран день недели, соответствующий этой дате, например, 'воскресенье'.</p>

	<form action="" method="GET">
		<input type="text" placeholder = "01.12.1990" name="name"><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php

	$date = '';
	$week = ['воскресенье', 'понедельник'. 'вторник'. 'среда'. 'четверг'. 'пятница'. 'суббота'];

	if (!empty($_REQUEST['name']))
		{
			echo $week[date('w', strtotime($_REQUEST['name']))];
		}

?>

<p>4.По заходу на страницу выведите текущую дату в формате '12 мая 2015 года, воскресенье'.</p>


<?php
	
	$month = [1 =>' января ', ' февраля ' ,' марта ' ,' апреля ' ,' мая ' ,' июня ' ,' июля ' ,' августа ' ,' сентября ' ,' октября ' ,' ноября ' ,' декабря '];
	
	$week = ['воскресенье', 'понедельник'. 'вторник'. 'среда'. 'четверг'. 'пятница'. 'суббота'];
	
	echo date('d', strtotime("now")). $month[date('n', strtotime("now"))]. date('Y', strtotime("now")). ' года, '. $week[date('w', strtotime("now"))]; 

?>

<p>5.Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'. По нажатию на кнопку выведите на экран сколько дней осталось до дня рождения пользователя.</p>
	
	<form action="" method="GET">
		<input type="text" placeholder = "01.12.1990" name="datehb"><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php

	$hbarr = [];
	$datehb = '';
	$datebase = '';
	$year = '';

	if (!empty($_REQUEST['datehb'])) {
		
			$hbarr = explode('.', $_REQUEST['datehb']);
			
			if ($hbarr[1] < date('m') or $hbarr[1] == date('m') and $hbarr[0] < date('d')) {

				$datebase = (date('Y') + 1).'-'.$hbarr[1].'-'.$hbarr[0];  
				}
				else {
					$datebase = date('Y').'-'.$hbarr[1].'-'.$hbarr[0];
					}	
		}
		
	echo 'До дня рождения осталось: '.abs(ceil(((strtotime($datebase) - time())/86400))).' дней';		
		
?>

<p>6.По заходу на страницу выведите сколько дней осталось до ближайшей масленницы (последнее воскресенье весны). </p>
	
<?php
	
	$result = 0;
	$diff = (strtotime("last Sunday of May" .date('Y')) - time()) / 86400;
	if ($diff > 0) {
		$result = $diff;
		}
		else {
			$result = (strtotime("last Sunday of May" .(date('Y') + 1)) - time()) / 86400;
			}
	echo floor($result);
?>

<p>7.Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '31.12'. По нажатию на кнопку выведите знак зодиака пользователя. </p>
	
	<form action="" method="GET">
		<input type="text" placeholder = "31.12" name="datehb"><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php
	//Понимаю что можно было делать просто mktime, после 8 задачи понял
	$zodarr = ['Овен' => [80,110],
				'Телец' => [111, 141],
				'Близнецы' => [142, 172],
				'Рак' => [173, 203],
				'Лев' => [204, 233],
				'Дева' => [234, 266],
				'Весы' => [267, 296],
				'Скорпион' => [297, 326],
				'Стрелец' => [327, 356],
				'Козерог1' => [357, 366],
				'Козерог2' => [1, 20],
				'Водолей' => [21, 50],
				'Рыбы' => [51, 79]
				];
				
	$hbarr = [];
	
	if (!empty($_REQUEST['datehb'])) {
			//Создаю массив с датой из формы
			$hbarr = explode('.', $_REQUEST['datehb']);
			//Получаю дату из формы в формате дейтстамп. Для ПО всегда будет 2020 год
			$dateform = (date('z', mktime(0, 0, 0, $hbarr[1], $hbarr[0], 2020))) + 1;	
		}

	foreach ($zodarr as $key => $elem) {
			if ($dateform >= $zodarr[$key][0] and $dateform <= $zodarr[$key][1])
			echo trim($key, '1..2');
		}
		
?>

<p>8.Дан массив праздников. По заходу на страницу, если сегодня праздник, то поздравьте пользователя с этим праздником.</p>

<?php
	
	$zodarr = ['Поздравляем с Новым годом!' => mktime(0, 0, 0, 1, 1),
				'Поздравляем с Рождеством' => mktime(0, 0, 0, 1, 7),
				'Поздравляем с Международным женским днем!' => mktime(0, 0, 0, 3, 8),
				'Поздравляем с Днем труда!' => mktime(0, 0, 0, 5, 1)
				];
	
	foreach ($zodarr as $key => $elem) {
			if (time() == $elem)
			echo $key;
		}
		
?>

<p>9.Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов на несколько дней вперед для каждого знака зодиака. По заходу на страницу спросите у пользователя дату рождения, определите его знак зодиака и выведите предсказание для этого знака зодиака на текущий день.</p>

<p>Введите дату Вашего рождения в формате 31.12</p>

<form action="" method="GET">
		<input type="text" placeholder = "31.12" name="datehb"><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php
	$zodarr = ['Овен' => [80,110],
				'Телец' => [111, 141],
				'Близнецы' => [142, 172],
				'Рак' => [173, 203],
				'Лев' => [204, 233],
				'Дева' => [234, 266],
				'Весы' => [267, 296],
				'Скорпион' => [297, 326],
				'Стрелец' => [327, 356],
				'Козерог1' => [357, 366],
				'Козерог2' => [1, 20],
				'Водолей' => [21, 50],
				'Рыбы' => [51, 79]
				];
				
	$hbarr = [];
	
	if (!empty($_REQUEST['datehb'])) {
			//Создаю массив с датой из формы
			$hbarr = explode('.', $_REQUEST['datehb']);
			//Получаю дату из формы в формате дейтстамп. Для ПО всегда будет 2020 год
			$dateform = (date('z', mktime(0, 0, 0, $hbarr[1], $hbarr[0], 2020))) + 1;	
		}

	foreach ($zodarr as $key => $elem) {
			if ($dateform >= $zodarr[$key][0] and $dateform <= $zodarr[$key][1])
			$zzod = trim($key, '1..2');
		}
	
	$arrhrs = ['Овен' => ['Гороскоп для овна на воскресенье', 'Гороскоп для овна на понедельник','Гороскоп для овна на вторник','Гороскоп для овна на среду', 'Гороскоп для овна на четверг','Гороскоп для овна на пятницу','Гороскоп для овна на субботу'],
	'Телец' => ['Гороскоп для тельца на воскресенье', 'Гороскоп для тельца на понедельник','Гороскоп для тельца на вторник','Гороскоп для тельца на среду', 'Гороскоп для тельца на четверг','Гороскоп для тельца на пятницу','Гороскоп для тельца на субботу'],
	'Близнецы' => ['Гороскоп для близнецов на воскресенье', 'Гороскоп для близнецов на понедельник','Гороскоп для близнецов на вторник','Гороскоп для близнецов на среду', 'Гороскоп для близнецов на четверг','Гороскоп для близнецов на пятницу','Гороскоп для близнецов на субботу'],
	'Рак' => ['Гороскоп для рака на воскресенье', 'Гороскоп для рака на понедельник','Гороскоп для рака на вторник','Гороскоп для рака на среду', 'Гороскоп для рака на четверг','Гороскоп для рака на пятницу','Гороскоп для рака на субботу'],
	'Лев' => ['Гороскоп для льва на воскресенье', 'Гороскоп для льва на понедельник','Гороскоп для льва на вторник','Гороскоп для льва на среду', 'Гороскоп для льва на четверг','Гороскоп для льва на пятницу','Гороскоп для льва на субботу'],
	'Дева' => ['Гороскоп для девы на воскресенье', 'Гороскоп для девы на понедельник','Гороскоп для девы на вторник','Гороскоп для девы на среду', 'Гороскоп для девы на четверг','Гороскоп для девы на пятницу','Гороскоп для девы на субботу'],
	'Весы' => ['Гороскоп для весов на воскресенье', 'Гороскоп для весов на понедельник','Гороскоп для весов на вторник','Гороскоп для весов на среду', 'Гороскоп для весов на четверг','Гороскоп для весов на пятницу','Гороскоп для весов на субботу'],
	'Скорпион' => ['Гороскоп для скорпионов на воскресенье', 'Гороскоп для скорпионов на понедельник','Гороскоп для скорпионов на вторник','Гороскоп для скорпионов на среду', 'Гороскоп для скорпионов на четверг','Гороскоп для скорпионов на пятницу','Гороскоп для скорпионов на субботу'],
	'Стрелец' => ['Гороскоп для стрельцов на воскресенье', 'Гороскоп для стрельцов на понедельник','Гороскоп для стрельцов на вторник','Гороскоп для стрельцов на среду', 'Гороскоп для стрельцов на четверг','Гороскоп для стрельцов на пятницу','Гороскоп для стрельцов на субботу'],
	'Козерог' => ['Гороскоп для козерога на воскресенье', 'Гороскоп для козерога на понедельник','Гороскоп для козерога на вторник','Гороскоп для козерога на среду', 'Гороскоп для козерога на четверг','Гороскоп для козерога на пятницу','Гороскоп для козерога на субботу'],
	'Водолей' => ['Гороскоп для водолея на воскресенье', 'Гороскоп для водолея на понедельник','Гороскоп для водолея на вторник','Гороскоп для водолея на среду', 'Гороскоп для водолея на четверг','Гороскоп для водолея на пятницу','Гороскоп для водолея на субботу'],
	'Рыбы' => ['Гороскоп для рыб на воскресенье', 'Гороскоп для рыб на понедельник','Гороскоп для рыб на вторник','Гороскоп для рыб на среду', 'Гороскоп для рыб на четверг','Гороскоп для рыб на пятницу','Гороскоп для рыб на субботу']
				];

	
	foreach ($arrhrs as $key => $elem) {
			if ($zzod == $key)
			echo $arrhrs[$key][date('w')];
		}
		
?>

<p>10.Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку выведите количество слов в тексте, количество символов в тексте, количество символов за вычетом пробелов.</p>

<form action="" method="GET">
		<textarea placeholder="Введите текст" name="text"></textarea><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php
	
	$text = '';
	
	if (!empty($_REQUEST['text'])) {
			$text = $_REQUEST['text'];
			//Эта строка не работает с кирилицей
			//echo 'Количество слов в тексте: '.str_word_count($text).'<br>';
			echo 'Количество слов в тексте: '.count((explode(' ', $text))).'<br>';
			echo 'Количество символов в тексте: '.mb_strlen($text).'<br>';
			echo 'Количество символов за вычетом пробелов: '.strlen(strtr($text, [' ' => ''])).'<br>';
		}	
?>

<p>11.Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте.</p>

<form action="" method="GET">
		<textarea placeholder="Введите текст" name="text"></textarea><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php
	
	//$text = 'hello world';
	//Этот блок не работает, странно
	/*if (!empty($_REQUEST['text'])) {
			$text = $_REQUEST['text'];
			$arr = array_count_values(count_chars($text));
			var_dump($arr);
			foreach ($arr as $key => $elem) {
				echo 'Содержание символа: -'.chr(4).'- в этом тексте '.$key. ' %.'.'<br>';
				}
		}*/
	/*if (!empty($_REQUEST['text'])) {
		$text = $_REQUEST['text'];
		$arr = str_split($text, 1);
		var_dump($arr);
		}*/
	
	if (!empty($_REQUEST['text'])) {
		$text = mb_strtolower($_REQUEST['text']);
		$len = mb_strlen($text);
		}
		
	$arrnew = [];
	for($i = 0; $i < mb_strlen($text); $i++) {
		$arrnew[] = mb_substr($text, $i, 1);
		}
		
	$arr =  array_count_values($arrnew);
	
	foreach ($arr as $key => $elem) {
		echo $key .' - '. ($elem/$len)*100 . ' %'.'<br>';
		}
	
?>

<p>12. Дан массив слов, инпут и кнопка. В инпут вводится набор букв. По нажатию на кнопку выведите на экран те слова, которые содержат в себе все введенные буквы.</p>

<form action="" method="GET">
		<textarea placeholder="Введите текст" name="text"></textarea><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php

	//Функция преврающающая строку в массив и нормально работающая с кириллицей
	function strToarr ($str) {
		$arr = [];
		for($i = 0; $i < mb_strlen($str); $i++) {
		$arr[] = mb_substr($str, $i, 1);
		}
		return $arr;
		}
	
	//Все это можно решить проще, но у меня не отображаются в браузере символы кирилицы
	$word = ['привет','пока','пора', 'get'];

	//Формирую из введенных букв массив
	if (!empty($_REQUEST['text'])) {
		//Делаю все символы маленькими
		$arrlet = strToarr(mb_strtolower($_REQUEST['text']));
		}

	//Сравнивает элемент массива слов с введенными буквами и возвращает слово
	foreach ($word as $elem) {

		$arr3 = array_intersect(strToarr ($elem), $arrlet);
		$arr4 = array_diff($arrlet, $arr3);
		if (count($arr4) == 0) {
			echo $elem.'<br>';
			} 
		
		}
	
?>

<p>13.Дан текстареа и кнопка. В текстареа через пробел вводятся слова. По нажатию на кнопку выведите слова в таком виде: сначала заголовок 'слова на букву а' и под ним все слова, которые начинаются на 'а', потом заголовок 'слова на букву б' и все слова на 'б' и так далее. Буквы должны идти в алфавитном порядке. Брать следует только те буквы, на которые начинаются наши слова. То есть: если нет слов, к примеру, на букву 'в' - такого заголовка тоже не будет.</p>

<form action="" method="GET">
		<textarea placeholder="Введите текст" name="text"></textarea><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php

	$alph = ['а','б','в','г','д','е','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я'];
	
	//Формирую из введенных слов массив
	if (!empty($_REQUEST['text'])) {
		$arrword = explode(' ', $_REQUEST['text']);
		$i = 0;
		foreach ($alph as $elem) {
		$i = 0;
		foreach ($arrword as $word) {
			if ($i == 0 and mb_substr($word, 0, 1) == $elem) {
				echo 'слова на букву '.$elem.'<br>'. $word .'<br>';
				$i++;
				}
				else {
					if ($i == 1 and mb_substr($word, 0, 1) == $elem) {
					echo $word .'<br>';
						}
					}
			}
		}
		}	
?>

<p>14.Дан инпут и кнопка. В этот инпут вводится строка на русском языке. По нажатию на кнопку выведите на экран транслит этой строки.</p>

<form action="" method="GET">
		<textarea placeholder="Введите текст" name="text"></textarea><br><br>
		<input type="submit" value = "Отправить">
	</form>

<?php

	function getTranslit($str) {
	
	return strtr(mb_strtolower($str), ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya']);
	}
	
	echo getTranslit($_REQUEST['text']);

?>

<p>Не решено, временный архив</p>

<p>15.Дан инпут, 2 радиокнопочки и кнопка. В инпут вводится строка, а с помощью радиокнопочек выбирается - нужно преобразовать эту строку в транслит или из транслита обратно.</p>

<form action="" method="GET">
	<textarea placeholder="Введите текст" name="text"></textarea><br><br>
	<p>Выберите нужную функцию</p>
	<p>Транслит с русского на латинцу<input type="radio" name="trns" value="1"></p>
	<p>Транслит с латинцы на русский<input type="radio" name="trns" value="2"></p>
	<input type="submit">
</form>

	

<?php
	
	var_dump($_REQUEST);
	
	function getTranslitRuEn($str) {
	
	return strtr(mb_strtolower($str), ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya']);
	}
	
	function getTranslitEnRu($str) {
	
	return strtr(mb_strtolower($str), ['a' => 'а', 'b' => 'б', 'ya' => 'я']);
	}
	
	if ($_REQUEST['trns'] = 1) {
	echo getTranslitRuEn($_REQUEST['text']);
	}
	
	if ($_REQUEST['trns'] = 2) {
	echo getTranslitEnRu('привет');
	}
	
	
	

?>

<p>15.Дан инпут, 2 радиокнопочки и кнопка. В инпут вводится строка, а с помощью радиокнопочек выбирается - нужно преобразовать эту строку в транслит или из транслита обратно.</p>

<form action="" method="GET">
	<textarea placeholder="Введите текст" name="text"></textarea><br><br>
	<p>Выберите нужную функцию</p>
	<p>Транслит с русского на латинцу<input type="radio" name="trns" value="1"></p>
	<p>Транслит с латинцы на русский<input type="radio" name="trns" value="2" checked></p>
	<input type="submit">
</form>

	

<?php

	//var_dump($_REQUEST);
	
	
	//Функция обратной транслитерации упрощена. Если задача была в этом, дайте знать, переделаю.
	
	function getTranslitRuEn($str) {
	
	return strtr(mb_strtolower($str), 
	['а' => 'a', 
	'б' => 'b', 
	'в' => 'v', 
	'г' => 'g', 
	'д' => 'd', 
	'е' => 'e', 
	'ё' => 'e', 
	'ж' => 'zh', 
	'з' => 'z', 
	'и' => 'i', 
	'й' => 'y', 
	'к' => 'k', 
	'л' => 'l', 
	'м' => 'm', 
	'н' => 'n', 
	'о' => 'o', 
	'п' => 'p', 
	'р' => 'r', 
	'с' => 's', 
	'т' => 't', 
	'у' => 'u', 
	'ф' => 'f', 
	'х' => 'kh', 
	'ц' => 'ts', 
	'ч' => 'ch', 
	'ш' => 'sh', 
	'ъ' => '', 
	'ы' => 'y', 
	'ь' => '', 
	'э' => 'e', 
	'ю' => 'yu', 
	'я' => 'ya']);
	}
	
	function getTranslitEnRu($str) {
	
	return strtr(mb_strtolower($str), 
	['a' => 'а',
	 'b' => 'б',
	 'v' => 'в',
	 'g' => 'г',
	 'd' => 'д',
	 'e' => 'е',
	 'zh' => 'ж',
	 'z' => 'з',
	 'i' => 'и',
	 'y' => 'й',
	 'k' => 'к',
	 'l' => 'л',
	 'm' => 'м',
	 'n' => 'н',
	 'o' => 'о',
	 'p' => 'п',
	 'r' => 'р',
	 's' => 'с',
	 't' => 'т',
	 'u' => 'у',
	 'f' => 'ф',
	 'kh' => 'х',
	 'ts' => 'ц',
	 'ch' => 'ч',
	 'sh' => 'ш',
	 'y' => 'ы',
	 'e' => 'э', 
	 'yu' => 'ю', 
	 'ya' => 'я']);
	}

	if ($_REQUEST['trns'] == '1') {
	echo getTranslitRuEn($_REQUEST['text']);
	}
	
	if ($_REQUEST['trns'] == '2') {
	echo getTranslitEnRu($_REQUEST['text']);
	}
	
?>

<p>16.Дан массив с вопросами и правильными ответами. Реализуйте тест: выведите на экран все вопросы, под каждым инпут. Пользователь читает вопрос, пишет свой ответ в инпут. Когда вопросы заканчиваются - он жмет на кнопку, страница обновляется и вместо инпутов под вопросами появляется сообщение вида: 'ваш ответ: ... верно!' или 'ваш ответ: ... неверно! Правильный ответ: ...'. Правильно отвеченные вопросы должны гореть зеленым цветом, а неправильно - красным.</p>

<?php

	//var_dump($_REQUEST);
	//Массив вопросов и ответов
	$arr = ['Количество часов в сутках?' => 24, 'Количество дней в неделе?' => 7,'Сколько будет 2*2?' => 4];
	
	//Переменная расчета номера вопроса и имени формы
	$i = 0;
	
	//Если запрос не отправлен показываем страницу с тестом
	if (empty($_REQUEST['submit'])) {
	
	echo '<form action="" method="GET">';	
	foreach ($arr as $key => $elem) {
		$i++;
		echo $key.'<br>';	
		echo '<textarea placeholder="Введите текст" name="text'.$i.'"></textarea><br><br>';
		}
	echo '<input type="submit" value = "Отправить" name="submit">';
	echo '</form>';
	
	}
	
	$i = 0;
	
	if (isset($_REQUEST['text1']) and
		isset($_REQUEST['text2']) and
		isset($_REQUEST['text3']) and
		isset($_REQUEST['submit'])) {
			
	echo '<br><br>Результаты теста<br><br>';
	
	echo '<form action="" method="GET">';
		
	foreach ($arr as $key => $elem) {
		$i++;
		echo $key.'<br>';
		
		if ($elem == $_REQUEST['text'.$i.'']) {
			echo '<p style="background:green">Ваш ответ: '.$_REQUEST['text'.$i.''].' Верно!</p>';
			}
			else {
				echo '<p style="background:red">Ваш ответ: '.$_REQUEST['text'.$i.''].' Неверно! Правильный ответ: '.$elem.'</p>';
				}	
		
		}
	
	echo '</form>';
	
	}

?>

<p>17.Модифицируем предыдущую задачу: пусть теперь тест показывает варианты ответов и радиокнопочки. Пользователь должен выбрать один из вариантов.</p>

<?php

	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";
	//Функция, которая ищет в массиве элементы равные ключам.
	//Можно сказать. правильные ответы на вопросы
	function searchTrue ($arr) {
		$str = '';
		foreach ($arr as $key => $elem) {
				if ($key == $elem) $str .= $elem.', ' ;	
			}
			
		return trim($str, ', ');
		}

	//Массив вопросов и ответов
	$arr = ['v1' => [22 => 0, 24 => 24], 'v2' => [6 => 0, 7 => 7], 'v3' => [1 => 0, 4 => 4]];
	
	//Пробовал использовать вопросы как value - не работает, ввел дополнительный массив 
	$arrv = ['v1' => 'Количество часов в сутках?', 'v2' => 'Количество дней в неделе?', 'v3' =>  'Сколько будет 2*2?'];

	//Если запрос не отправлен показываем страницу с тестом
	if (empty($_REQUEST['submit'])) {
		
	echo '<form action="" method="GET">';
		
	foreach ($arr as $key => $elem) {
		echo $arrv[$key].'<br>';
		echo '<form action="" method="GET">';
		foreach ($elem as $key2 => $subelem) {
			
			echo '<input type="radio" name="'.$key.'" value="'.$key2.'">'.$key2.'<br>';
			
			}
		}
	echo '<input type="submit" value = "Отправить" name="submit">';
	echo '</form>';
	
	
	}
	
	//Блок отображающий результаты теста
	if (!empty($_REQUEST['submit'])) {	
		echo '<br><br>Результаты теста<br><br>';
		
		foreach ($arr as $key => $elem) {
		
			echo $arrv[$key].'<br>';

			foreach ($elem as $key2 => $subelem) {
				if ($_REQUEST[$key] == $key2 and
				$_REQUEST[$key] == $arr[$key][$_REQUEST[$key]]) {
				echo '<p style="background:green">Ваш ответ:'.($_REQUEST[$key]).' Верно!</p>';
				}
					else {
					if ($_REQUEST[$key] == $key2 and
					$_REQUEST[$key] != $arr[$key][$_REQUEST[$key]]) {
					echo '<p style="background:red">Ваш ответ: '.($_REQUEST[$key]).' Неверно! Правильный ответ: '.searchTrue($arr[$key]).'</p>';
					}
				}
		
			}
		}
	}
?>

<p>18.Модифицируем предыдущую задачу: пусть теперь на один вопрос может быть несколько правильных ответов. Пользователь должен отметить один или несколько чекбоксов.</p>

<?php

	//echo "<pre>";
	//print_r($_REQUEST);
	//echo "</pre>";
	
	//Функция, которая ищет в массиве элементы равные ключам.
	//Можно сказать. правильные ответы на вопросы
	function searchTrue ($arr) {
		$str = '';
		foreach ($arr as $key => $elem) {
				if ($key == $elem) $str .= $elem.', ' ;	
			}
			
		return trim($str, ', ');
		}

	//Массив вопросов и ответов
	$arr = ['v1' => [1 => 'z', 2 => 'z', 3 => 'z', 6 => 6, 7 => 7, 10 => 'z'], 'v2' => [1 => 'z', 7 => 7], 'v3' => [1 => 'z', 0 => 0, 2 => 2, 5 => 'z', 10 => 10]];
	
	//Пробовал использовать вопросы как value - не работает, ввел дополнительный массив 
	$arrv = ['v1' => 'Выберите номера летних месяцев', 'v2' => 'Поставьте отметки на выходных днях', 'v3' =>  'Ометьте четные числа'];
	
	//Если запрос не отправлен показываем страницу с тестом
	//Этот участок работает!!! 27 декабря 2020 года
	if (empty($_REQUEST['submit'])) {
		
	echo '<form action="" method="GET">';
		
	foreach ($arr as $key => $elem) {
		echo $arrv[$key].'<br>';
		echo '<form action="" method="GET">';
		foreach ($elem as $key2 => $subelem) {
			echo '<input type="checkbox" name="'.$key.'[]" value="'.$key2.'">'.$key2.'<br>';
			}
		}
	echo '<input type="submit" value = "Отправить" name="submit">';
	echo '</form>';
	
	
	}
	
	//Блок отображающий результаты теста
	if (!empty($_REQUEST['submit'])) {	
		echo '<br><br>Результаты теста<br><br>';
		//Просматриваем массив вопросов и ответов
		foreach ($arr as $key => $elem) {
		//Выводим вопрос
			echo $arrv[$key].'<br>';
		//Сравниваем ответы из формы с данными массива
			foreach ($_REQUEST[$key] as $elem2) {
				
				if (array_search($elem2, $arr[$key]) == $elem2)  {
				//if (1 == 1)  {
				echo '<p style="background:green">Ваш ответ:'.$elem2.' Верно!</p>';
				//echo array_search($elem2, $arr[$key]);
				}
				else {
					if (array_search($elem2, $arr[$key]) != $elem2) {
					echo '<p style="background:red">Ваш ответ: '.$elem2.' Неверно! Правильный ответ: '.searchTrue($arr[$key]).'</p>';
					}
				
				}
			}
		}
	}
?>

<p>19.Напишите скрипт, который будет считать факториал числа. Само число вводится в инпут и после нажатия на кнопку пользователь должен увидеть результат.</p>

<form action="" method="GET">
	<input type="text" name="num">
	<input type="submit">
</form>

<?php

	//echo "<pre>";
	//print_r($_REQUEST);
	//echo "</pre>";
	
	$num = $_REQUEST['num'];
	$result = 1;
	
	for ($i = 1; $i <= $num; $i++) {
		$result =  $result*$i;
		}
		
	if (isset($_REQUEST['num'])) echo $result;
	
?>

<p>20.Напишите скрипт, который будет находить корни квадратного уравнения. Для этого сделайте 3 инпута, в которые будут вводиться коэффициенты уравнения.</p>

<form action="" method="GET">
	<input type="text" placeholder = "коэффициент a" name="a"><br><br>
	<input type="text" placeholder = "коэффициент b" name="b"><br><br>
	<input type="text" placeholder = "коэффициент c" name="c"><br><br>
	<input type="submit" name ="submit">
</form>

<?php

	//echo "<pre>";
	//print_r($_REQUEST);
	//echo "</pre>";
	
	$d = 0;
	$x1 = 0;
	$x2 = 0;
	
	if (!empty($_REQUEST['submit'])) {
		//Находим дискриминанту
		$a = $_REQUEST['a'];
		$b = $_REQUEST['b'];
		$c = $_REQUEST['c'];
		$d = pow($b, 2) - 4*$a*$c;
		//Находим дискриминанту
		echo 'Дискриминанта равна: '.$d.'<br>';
		
		if ($d < 0) echo 'У этого уровнения нет корней';
		if ($d == 0) {
			echo 'У этого уровнения есть ровно один корень.'.'<br>';
			echo 'x1 = '.(- $b + sqrt($d)) / 2 * $a;
			}
		if ($d > 0) {
			echo 'У этого уровнения есть ровно два корня.'.'<br>';
			echo 'x1 = '.(- $b + sqrt($d)) / 2 * $a.'<br>';
			echo 'x2 = '.(- $b - sqrt($d)) / 2 * $a.'<br>';
			}
		}
		
?>

<p>21.Даны 3 инпута. В них вводятся числа. Проверьте, что эти числа являются тройкой Пифагора: квадрат самого большого числа должен быть равен сумме квадратов двух остальных.</p>

<form action="" method="GET">
	<input type="text" placeholder = "Первое число" name="arr[]"><br><br>
	<input type="text" placeholder = "Второе число" name="arr[]"><br><br>
	<input type="text" placeholder = "Третье число" name="arr[]"><br><br>
	<input type="submit" name ="submit">
</form>

<?php

	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";
	
	$d = 0;
	$x1 = 0;
	$x2 = 0;
	
	if (!empty($_REQUEST['submit'])) {
		
		$a = $_REQUEST['arr']['0'];
		$b = $_REQUEST['arr']['1'];
		$c = $_REQUEST['arr']['2'];
		
		if ($a > $b and $a > $c and $a*$a == $b*$b + $c*$c) {
				echo 'Введенные числа являются тройкой пифагора.';
				}
				else {
				if ($b > $a and $b > $c and $b*$b == $a*$a + $c*$c) {
					 echo 'Введенные числа являются тройкой пифагора.';
					}
				}
					if ($c > $a and $c > $b and $c*$c == $b*$b + $a*$a) {
							echo 'Введенные числа являются тройкой пифагора.';
						}	
						else {
							echo 'Введенные числа не являются тройкой пифагора!';
							}
		}
		
?>

<p>22.Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку выведите список делителей этого числа.</p>

<form action="" method="GET">
	<input type="text" placeholder = "Введите число" name="num"><br><br>
	<input type="submit" name ="submit">
</form>

<?php

	//echo "<pre>";
	//print_r($_REQUEST);
	//echo "</pre>";
	
	$num = 0;
	$str = '';
	
	if (!empty($_REQUEST['num'])) {
		$num = $_REQUEST['num'];
		$arr = range(1, $_REQUEST['num']);
		
		foreach ($arr as $elem) {
			if ($num % $elem == 0)
				$str .= $elem.',';
			}
		}
	echo trim($str, ',');
		
?>

<p>23.Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку разложите число на простые множители.</p>

<form action="" method="GET">
	<input type="text" placeholder = "Введите число" name="num"><br><br>
	<input type="submit" name ="submit">
</form>

<?php

	//echo "<pre>";
	//print_r($_REQUEST);
	//echo "</pre>";
	
	$div = $_REQUEST['num'];
	$arr = range(2, $div, 1);
	
	//var_dump($arr);

	divide($div, $str);
	$str = '';
	echo $str;

	function divide($num, $str) {
		//echo $num.', '.'<br>';
		if($num > 1){
		$arr = range(2, $num, 1);
		foreach ($arr as $elem) {
			if ($num % $elem == 0) {
				$str .= $elem.'*';
				$n = $elem;
				break;
				}
			}
			$num = $num / $n;
			divide($num, $str);
			
		}
		else {
			echo trim($str, '*');
			}	
	}
	
?>

<p>24.Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите список общих делителей этих двух чисел.</p>

<form action="" method="GET">
	<input type="text" placeholder = "Введите число" name="num1"><br><br>
	<input type="text" placeholder = "Введите число" name="num2"><br><br>
	<input type="submit" name ="submit">
</form>

<?php

	//Функция возвращающая массив делителей числа
	function divider($num) {
		$arr = range(1, $num);
			foreach ($arr as $elem) {
				if ($num % $elem == 0)
				$arrdiv[] = $elem;
			}
		return $arrdiv;
		}
	
	if(isset($_REQUEST['submit'])) {
		$arrresult = array_intersect(divider($_REQUEST['num1']), divider($_REQUEST['num2']));
		foreach ($arrresult as $elem) {
			$str .= $elem.', ';
			}
		echo 'Введенные числа имеют такие общие делители:'.'<br>'.trim($str, ', ');
	}
	
?>

<p>25.Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите наибольший общий делитель этих двух чисел.</p>

<form action="" method="GET">
	<input type="text" placeholder = "Введите число" name="num1"><br><br>
	<input type="text" placeholder = "Введите число" name="num2"><br><br>
	<input type="submit" name ="submit">
</form>

<?php

	//Функция возвращающая массив делителей числа
	function divider($num) {
		$arr = range(1, $num);
			foreach ($arr as $elem) {
				if ($num % $elem == 0)
				$arrdiv[] = $elem;
			}
		return $arrdiv;
		}
	
	if(isset($_REQUEST['submit'])) {
		$result = array_pop(array_intersect(divider($_REQUEST['num1']), divider($_REQUEST['num2'])));
		
		echo 'Наибольший общий делитель этих чисел: '.$result;
	}
	
?>

<p>26.Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите наименьшее число, которое делится и на одно, и на второе из введенных чисел.</p>

<form action="" method="GET">
	<input type="text" placeholder = "Введите число" name="num1"><br><br>
	<input type="text" placeholder = "Введите число" name="num2"><br><br>
	<input type="submit" name ="submit">
</form>

<?php

	$num1 = $_REQUEST['num1'];
	$num2 = $_REQUEST['num2'];
	
	$i = 1;
	
	if(isset($_REQUEST['submit'])) {
		while($i > 0) {
			if ($i % $num1 == 0  and $i % $num2 == 0) break;
			$i++;
			}
		echo 'Наименьшее число, которое делится на эти числа: '.$i;
	}
	
?>

<p>27.Даны 3 селекта и кнопка. Первый селект - это дни от 1 до 31, второй селект - это месяцы от января до декабря, а третий - это годы от 1990 до 2025. С помощью этих селектов можно выбрать дату. По нажатию на кнопку выведите на экран день недели, соответствующий этой дате, например, 'воскресенье'.</p>

<form action="" method="GET">
	<select name = "day">
	<?php
	foreach (range(1, 31, 1) as $elem) {
		echo '<option>'.$elem.'</option>';
		}
	?>
	</select>
	
	<select name = "month">
	<?php
	foreach (range(1, 12, 1) as $elem) {
		echo '<option>'.$elem.'</option>';
		}
	?>   	
	</select>
	
	<select name = "year">
	<?php
	foreach (range(1990, 2025, 1) as $elem) {
		echo '<option>'.$elem.'</option>';
		}
	?>   	
	</select>
	<input type="submit" name ="submit">
</form>

<?php

	$arr = ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'];
	if (isset($_REQUEST['submit'])) {
		echo $arr[date('w', strtotime($_REQUEST['day'].'-'.$_REQUEST['month'].'-'.$_REQUEST['year']))];
	}
	
?>
	


































