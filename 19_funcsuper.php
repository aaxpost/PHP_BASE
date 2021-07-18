<p>1.Сделайте функцию cut, которая первым параметром будет принимать строку, а вторым параметром - сколько первых символов оставить в этой строке. Второй параметр должен быть необязательным и по умолчанию принимать значение 10.</p>

<?php
	
	function cut($strbase, $num = 10)
	{
			echo mb_substr($strbase, 0, $num);
		
	}
	
	cut('какая-то строка данных для задачи', 3);
	
?>

<p>2.Дан массив с числами. Выведите последовательно его элементы используя рекурсию и не используя цикл.</p>

<?php
	$arr = [1, 2, 3, 4, 5];

	first($arr);

	function first($arr)
	{
		echo array_shift($arr).'<br>'; //выводим первый элемент массива
    
		if(!empty($arr)) {
			first($arr); //это рекурсия
		}
	}
?>

<p>3.Дано число. Сложите его цифры. Если сумма получилась более 9-ти, опять сложите его цифры. И так, пока сумма не станет однозначным числом (9 и менее).</p>

<?php


	function lowNum($num)
	{
		$arr = str_split($num, 1);
		$result = array_sum($arr);
		if ($resullt > 9) {
			$result = lowNum($result);
		}
		return $result;
	}
	
	echo lowNum(1111111);
	
?>

<p>4.Дан многомерный массив произвольного уровня вложенности. Выведите всего его элементы на экран..</p>

<?php
	

	$arr = [[1, 2, 3, 4, 5], [6, 7, 8]];
	
	
	//echo $arr1[1][0].'<br>'.'Проверка вызова элементов';
	
	echoArr($arr, 0);

	function echoArr($arr, $level)
	{ 
		if($level < count($arr)) {
			echo array_shift($arr[$level]).'<br>';
		
			if(!empty($arr[$level])) {
				echoArr($arr, $level);
			}
			else  {
				$level2 = $level + 1;
				echoArr($arr, $level2);
			}
		
		}
	}
?>	

<p>1.Сделайте функцию cut, которая первым параметром будет принимать строку, а вторым параметром - сколько первых символов оставить в этой строке. Второй параметр должен быть необязательным и по умолчанию принимать значение 10.</p>

<?php
	
	function cut($strbase, $num = 10)
	{
			echo mb_substr($strbase, 0, $num);
		
	}
	
	cut('какая-то строка данных для задачи', 3);
	
?>

<p>2.Дан массив с числами. Выведите последовательно его элементы используя рекурсию и не используя цикл.</p>

<?php
	$arr = [1, 2, 3, 4, 5];

	first($arr);

	function first($arr)
	{
		echo array_shift($arr).'<br>'; //выводим первый элемент массива
    
		if(!empty($arr)) {
			first($arr); //это рекурсия
		}
	}
?>

<p>3.Дано число. Сложите его цифры. Если сумма получилась более 9-ти, опять сложите его цифры. И так, пока сумма не станет однозначным числом (9 и менее).</p>

<?php


	function lowNum($num)
	{
		$arr = str_split($num, 1);
		$result = array_sum($arr);
		if ($resullt > 9) {
			$result = lowNum($result);
		}
		return $result;
	}
	
	echo lowNum(1111111);
	
?>

<p>4.Дан многомерный массив произвольного уровня вложенности. Выведите всего его элементы на экран..</p>

<?php
	

	$arr = [[1, 2, 3, 4, 5, 99], [6, 7, 8]];
	
	echoArr($arr);

	function echoArr($arr, $level = 0)
	{ 
		if($level < count($arr)) {
			echo array_shift($arr[$level]).'<br>';
		
			if(!empty($arr[$level])) {
				echoArr($arr, $level);
			}
			else  {
				$level2 = $level + 1;
				echoArr($arr, $level2);
			}
		
		}
	}
?>

<p>5.Дан многомерный массив произвольного уровня вложенности. Выведите всего его элементы на экран..</p>

<?php
	

	$arr = [[1, 2, 3, 4, 5], [6, 7, 8]];
	
	echoArr($arr);

	function echoArr($arr, $level = 0)
	{ 
		if($level < count($arr)) {
			echo array_shift($arr[$level]).'<br>';
		
			if(!empty($arr[$level])) {
				echoArr($arr, $level);
			}
			else  {
				$level2 = $level + 1;
				echoArr($arr, $level2);
			}
		
		}
	}
?>		

