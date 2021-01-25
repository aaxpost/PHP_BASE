<p>Блок 23. Задача №1</p>
<p>Первый вариант</p>
<?php
	$name = 'Иван';
	echo 'Привет '.$name.'!';	
?>

<p>Первый вариант</p>
<?php
	$name = 'Иван';
	echo "Привет $name !";	
?>

<p>Блок 23. Задача №2</p>
<p>Первый вариант</p>
<?php
	$arr = ['name'=>'Иван', 'age'=>30];
	echo 'Привет '.$arr['name'].'! Тебе '.$arr['age'].' лет!';	
?>

<p>Второй вариант</p>
<?php
	$arr = ['name'=>'Иван', 'age'=>30];
	echo "Привет {$arr['name']}! Тебе {$arr['age']} лет!";	
?>

<p>Третий вариант</p>
<?php
	$arr = ['name'=>'Иван', 'age'=>30];
	echo "Привет $arr[name]! Тебе $arr[age] лет!";	
?>

<p>Блок 23. Задача №3</p>
<p>Первый вариант. Двойные кавычки.</p>
<?php
	$test = '!!!';
	echo "<p>$test</p>";	
?>

<p>Второй вариант. Одинарные кавычки.</p>
<?php
	$test = '!!!';
	echo '<p>'.$test.'</p>';	
?>

<p>Блок 23. Задача №4</p>
<p>Первый вариант. Двойные кавычки.</p>
<?php
	$href = 'index.html';
 	$text = 'ссылка';
	echo "<a href=\"$href\">$text</a>";	
?>

<p>Второй вариант. Одинарные кавычки.</p>
<?php
	$href = 'index.html';
 	$text = 'ссылка';
	echo '<a href="'.$href.'">'.$text.'</a>';	
?>

<p>Блок 23. Задача №5</p>
<p>Пишем на PHP с HTML вставками</p>

<?php
	$arr = [1, 2, 3, 4, 5, 6];
	foreach ($arr as $elem) {
		echo "<p>$elem</p>";
	}
?>

<p>Блок 23. Задача №6 Дан массив. Выведите каждый элемент этого массива в отдельной li в теге ul.</p>
<p>Пишем на PHP с HTML вставками</p>

<?php
	echo "<ul>";
	$arr = [1, 2, 3, 4, 5, 6];
	foreach ($arr as $elem) {
		echo "<li>$elem</li>";
	}
	echo "</ul>";
?>

<p>Пишем на HTML с PHP вставками</p>

	<ul>
	<?php foreach ($arr as $elem):?>
		<li><?= $elem; ?></li>
		<?php endforeach; ?>
	</ul>
	
<p>Блок 23. Задача №7 Дан массив. С помощью цикла сформируйте с его помощью следующий HTML код:</p>
<p>Вариант с фигурными скобками</p>

<?php

	$arr = [
		['href'=>'1.html', 'text'=>'ссылка 1'],
		['href'=>'2.html', 'text'=>'ссылка 2'],
		['href'=>'3.html', 'text'=>'ссылка 3'],
	];
	foreach ($arr as $elem) {
		echo "<a href=\"{$elem['href']}\">{$elem['text']}</a>";
	}
?>

<p>Без фигурных скобок и без одинарных кавычек вокруг ключей.</p>

<?php

	foreach ($arr as $elem) {
		echo "<a href=\"$elem[href]\">$elem[text]</a>";
	}

?>

<p>Без массивов в тегах, заменяем переменными</p>
<?php
	foreach ($arr as $elem) {
		$href = $elem['href'];
		$text = $elem['text'];
		echo "<a href=\"$href\">$text</a>";
	}
?>

<p>Блок 23. Задача №8 Дан массив. Модифицируйте предыдущую задачу так, чтобы получился следующий HTML код:
<p>Вариант с фигурными скобками</p>

<?php

	$arr = [
		['href'=>'1.html', 'text'=>'ссылка 1'],
		['href'=>'2.html', 'text'=>'ссылка 2'],
		['href'=>'3.html', 'text'=>'ссылка 3'],
	];
	echo "<ul>";
	foreach ($arr as $elem) {
		echo "<li><a href=\"{$elem['href']}\">{$elem['text']}</a></li>";
	}
	echo "</ul>";
?>

<p>Без фигурных скобок и без одинарных кавычек вокруг ключей.</p>

<?php
	echo "<ul>";
	foreach ($arr as $elem) {
		echo "<li><a href=\"$elem[href]\">$elem[text]</a></li>";
	}
	echo "</ul>";
?>

<p>Без массивов в тегах, заменяем переменными</p>
<ul>
<?php
	foreach ($arr as $elem) {
		$href = $elem['href'];
		$text = $elem['text'];
		echo "<li><a href=\"$href\">$text</a></li>";
	}
?>
</ul>

<p>Пишем на HTML с PHP вставками</p>

	<ul>
	<?php foreach ($arr as $elem):
		$href = $elem['href'];
		$text = $elem['text'];?>
		<li><a href="<?php echo  $elem; ?>"><?php echo $text; ?></a></li>
		<?php endforeach; ?>
	</ul>
	
<p>Блок 23. Задача №9 Дан массив. С помощью цикла сформируйте с его помощью следующий HTML код:
<p>Вариант с фигурными скобками</p>

<?php

	$arr = [
		['name'=>'Коля', 'age'=>30, 'salary'=>500],
		['name'=>'Вася', 'age'=>31, 'salary'=>600],
		['name'=>'Петя', 'age'=>32, 'salary'=>700],
	];
	
	echo "<table>";
	echo "<tr>";
	foreach ($arr as $elem) {
		echo "<tr><td>{$elem['name']}</td><td>{$elem['age']}</td><td>{$elem['salary']}</td></tr>";
	}
	echo "</tr>";
	echo "</table>";
?>

<p>Без фигурных скобок и без одинарных кавычек вокруг ключей.</p>

<?php
	echo "<table>";
	echo "<tr>";
	foreach ($arr as $elem) {
		echo "<tr><td>$elem[name]</td><td>$elem[age]</td><td>$elem[salary]</td></tr>";
	}
	echo "</tr>";
	echo "</table>";
?>

<p>Без массивов в тегах, заменяем переменными</p>
<?php
	echo "<table>";
	echo "<tr>";
	foreach ($arr as $elem) {
		$name = $elem['name'];
		$age = $elem['age'];
		$salary = $elem['salary'];
		echo "<tr><td>$name</td><td>$age</td><td>$salary</td></tr>";
	}
	echo "</tr>";
	echo "</table>";
?>

<p>Пишем на HTML с PHP вставками</p>

	<table>
	<tr>
	<?php foreach ($arr as $elem):
		$name = $elem['name'];
		$age = $elem['age'];
		$salary = $elem['salary'];?>
		<tr><td><?php echo $name; ?></td><td><?php echo $age; ?></td><td><?php echo $salary; ?></td></tr>
		
	<?php endforeach; ?>
	</table>
	</tr>


































