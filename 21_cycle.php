<p>1.Выведите с помощью цикла столбец чисел от 1 до 100.</p>

<?php
	//Мое решение
	$arr = range(1, 100);
	foreach($arr as $elem) {
		echo $elem.'<br>';
		}

	//Можно еще так
	for($i = 1; $i <= 100; $i++) {
		echo $i.'<br>';
		}

	//Решение в задачнике
	for ($i = 1; $i <= 100; $i++) {
		echo $i . '<br>';
	}
?>

<p>2.Выведите с помощью цикла столбец четных чисел от 1 до 100. </p>

<?php

	//Мое решение
	for($i = 1; $i <= 100; $i++) {
		if($i % 2 == 0) echo $i.'<br>';
		}

	//Решение в задачнике
	for ($i = 0; $i <= 100; $i += 2) {
		echo $i . '<br>';
	}

?>

<p>3.Найдите с помощью цикла сумму чисел от 1 до 100.  </p>

<?php

	//Мое решение
	$a = 0;
	for($i = 1; $i <= 100; $i++) {
			$a = $i + $a;
		}
	echo $a;

	//Решение в задачнике
	$sum = 0;
	for ($i = 1; $i <= 100; $i++) {
		$sum += $i;
	}
	echo $sum;

?>

<p>4.Найдите с помощью цикла сумму квадратов чисел от 1 до 15.</p>

<?php

	//Мое решение
	$a = 0;
	for($i = 1; $i <= 15; $i++) {
			$a = ($i*$i) + $a;
		}
	echo $a;

	//Решение в задачнике
	$sum = 0;
	for ($i = 1; $i <= 15; $i++) {
		$sum += $i * $i;
	}
	echo $sum;

?>

<p>5.Найдите с помощью цикла сумму корней чисел от 1 до 15. Результат округлите до двух знаков после дробной части.</p>

<?php

	//Мое решение
	$a = 0;
	for($i = 1; $i <= 2; $i++) {
			$a += sqrt($i);
		}
	echo round($a, 2);

	//Решение в задачнике
	$sum = 0;
	for ($i = 1; $i <= 15; $i++) {
		$sum += sqrt($i);
	}
	echo round($sum, 2);

?>

<p>6.Найдите с помощью цикла сумму тех чисел от 1 до 100, которые делятся на 7.</p>

<?php

	//Мое решение
	$a = 0;
	for($i = 1; $i <= 100; $i++) {
		if($i % 7 == 0) $a += $i;
		}
	echo $a;

	//Решение в задачнике
	$sum = 0;
	for ($i = 1; $i <= 100; $i++) {
		if ($i % 7 == 0) {
			$sum += $i;
		}
	}
	echo $sum;

?>

<p>7.Заполните массив 10-ю иксами с помощью цикла.</p>

<?php

	//Мое решение
	$arr = [];
	for($i = 1; $i <= 10; $i++) {
		$arr[] = 'x';
		}
	var_dump($arr);

	//Решение в задачнике
	$arr = [];
	for ($i = 1; $i <= 10; $i++) {
		$arr[] = 'x';
	}
	var_dump($arr);

?>

<p>8.Заполните массив числами от 1 до 10 с помощью цикла.</p>

<?php

	//Мое решение
	$arr = [];
	for($i = 1; $i <= 10; $i++) {
		$arr[] = $i;
		}
	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	//Решение в задачнике
	$arr = [];
	for ($i = 1; $i <= 10; $i++) {
		$arr[] = $i;
	}
	var_dump($arr);

?>

<p>9.Заполните массив числами от 10 до 1 с помощью цикла.</p>

<?php

	//Мое решение
	$arr = [];
	for($i = 10; $i >= 1; $i--) {
		$arr[] = $i;
		}
	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	//Решение в задачнике
	$arr = [];
	for ($i = 10; $i > 0; $i--) {
		$arr[] = $i;
	}
	var_dump($arr);

?>

<p>10.Заполните массив 10-ю случайными числами от 1 до 10 с помощью цикла.</p>

<?php

	//Мое решение 1
	$arr = [];
	for($i = 1; $i <= 10; $i++) {
		$arr[] = mt_rand(1,10);
		}

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	//Решение в задачнике
	$arr = [];
	for ($i = 1; $i <= 10; $i++) {
		$arr[] = mt_rand(1, 10);
	}
	var_dump($arr);

?>

<p>11.С помощью цикла создайте строку из 6-ти символов, состоящую из случайных чисел от 1 до 9.</p>

<?php

	//Мое решение 1
	$arr = [];
	for($i = 1; $i <= 6; $i++) {
		$arr[] = mt_rand(1,9);
		}

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	//Решение в задачнике
	//Не внимательно прочитал задание. Эх((
	$str = '';
	for ($i = 1; $i <= 6; $i++) {
		$str .= rand(1, 9);
	}
	echo $str;

?>

<p>12.Дан массив с числами. С помощью цикла найдите сумму элементов этого массива.</p>

<?php

	//Мое решение 1
	$sum = 0;
	$arr = [1, 2, 3, 4, 5];
	foreach ($arr as $elem) {
		$sum += $elem;
		}

	echo "<pre>";
	print_r($sum);
	echo "</pre>";

	//Решение в задачнике
	$arr = [1, 2, 3, 4, 6, 9, 11];
	$sum = 0;
	foreach ($arr as $elem) {
		$sum += $elem;
	}
	echo $sum;

?>

<p>13. Дан массив с числами. С помощью цикла найдите сумму квадратов элементов этого массива.</p>

<?php

	//Мое решение 1
	$sum = 0;
	$arr = [1, 2, 3];
	foreach ($arr as $elem) {
		$sum += $elem*$elem;
		}

	echo "<pre>";
	print_r($sum);
	echo "</pre>";

	//Решение в задачнике
	$arr = [1, 2, 3, 4, 6, 9, 11];
	$sum = 0;
	foreach ($arr as $elem) {
		$sum += $elem * $elem;
	}
	echo $sum;

?>

<p>14. Дан массив с числами. С помощью цикла найдите корень из суммы квадратов элементов этого массива. Результат округлите в меньшую сторону до целых.</p>

<?php

	//Мое решение 1
	$sum = 0;
	$arr = [1, 2, 3];
	foreach ($arr as $elem) {
		$sum += $elem*$elem;
		}

	$result = floor(sqrt($sum));

	echo "<pre>";
	print_r($result);
	echo "</pre>";

	//Решение в задачнике
	$arr = [1, 2, 3, 4, 6, 9, 11];
	$sum = 0;
	foreach ($arr as $elem) {
		$sum += $elem * $elem;
	}
	echo floor(sqrt($sum));

?>

<p>15. Дан массив с числами. Найдите сумму тех элементов массива, которые больше 0 и меньше 10.</p>

<?php

	//Мое решение 1
	$sum = 0;
	$arr = [1, 2, 3, 10, 15, 25, 4, 5];
	foreach ($arr as $elem) {
		if ($elem > 0 and $elem < 10) $sum += $elem;
	}

	echo "<pre>";
	print_r($sum);
	echo "</pre>";

	//Решение в задачнике
	$arr = [1, 2, 3, 4, 6, 9, 11];
	$sum = 0;
	foreach ($arr as $elem) {
		if ($elem > 0 and $elem < 10)
			$sum += $elem;
		}
	}
	echo $sum;

?>

<p>16.Дан массив с числами. Проверьте, что в нем есть 3 одинаковых числа подряд.</p>

<?php

	//Мое решение 1
	$arr = [1, 2, 3, 3, 3, 10, 15, 25, 25, 4, 5];
	foreach ($arr as $key => $elem) {
		if ($elem == $arr[$key + 1] and $arr[$key + 1] == $arr[$key + 2]) {
			echo 'Есть';
			}
	}

	echo "<pre>";
	print_r($sum);
	echo "</pre>";

	//Решения в задачнике нет.

?>

<p>17.С помощью цикла сформируйте строку '1223334444...' и так далее до заданного числа. </p>

<?php

	//Мое решение 1
	$a = 9;
	for ($i = 1; $i <= $a; $i++) {
			for ($b = $i; $b > 0; $b-- ) echo $i;
		}

	//Решение в задачнике.
	$str = '';
	for ($i = 1; $i <= 10; $i++) {
		for ($j = 1; $j <= $i; $j++) {
			$str .= $i;
		}
	}
	echo $str;

?>

<p>18.Дан многомерный массив (см. его под задачей). С помощью цикла выведите строки в формате 'имя-зарплата'.</p>

<?php

	//Мое решение
	$arr = [
		0=>['name'=>'Коля', 'salary'=>300],
		1=>['name'=>'Вася', 'salary'=>400],
		2=>['name'=>'Петя', 'salary'=>500],
	];

	foreach ($arr as $elem) echo $elem['name'].' - '.$elem['salary'].'<br>';

	//Решение в задачнике.
	foreach ($arr as $elem) {
		echo $elem['name'] .'-'. $elem['salary'] . '<br>';
 	}

?>

<p>19.Заполните двумерный массив случайными числами от 1 до 10. В каждом подмассиве должно быть по 10 элементов. Должно быть 10 подмассивов.</p>

<?php

	//Мое решение
	$arr[] = [];
	for($i = 1; $i <= 10; $i++) {
		for($j = 1; $j <= 10; $j++) {
			$arr[$i][] = mt_rand(1,10);
		}
	}

	echo "<pre>";
	print_r($arr);
	echo "</pre>";

	//Решение в задачнике.
	$arr = [];
	for ($i = 0; $i < 10; $i++) {
		for ($j = 0; $j < 10; $j++)
			$arr[$i][] = mt_rand(1, 10);
		}
	}
	var_dump($arr);

?>

<p>20.Напишите свой аналог функции ucfirst (аналог - значит можно использовать все, что угодно, кроме этой функции).
Функция ucfirst преобразует первый символ строки в верхний регистр. Не работает с кириллицей.
</p>

<?php

	//Мое решение

	function myUcfirst($str) {

		$result = strtr($str, substr($str, 0, 1), chr(ord(substr($str, 0, 1)) - 32));

	return $result;

	}

	echo myUcfirst('dfght');


	//Решение в задачнике.
	$str = 'apple';
	$first = substr($str, 0, 1);
	$str = strtoupper($first).substr($str, 1, strlen($str));
	echo $str;

?>

<p>21.Напишите свой аналог функции strrev. Решите задачу двумя способами. Функция strrev переворачивает строку так, чтобы символы шли в обратном порядке.
</p>

<?php

	//Мое решение 1
	function myStrrev1($str) {

	return implode((array_reverse(str_split($str, 1))), '');

	}

	echo myStrrev1('edcba');

	//Мое решение 2

	function myStrrev2($str2) {
	//$strresult = '';
	for($i = strlen($str2); $i >= 0; $i--) {
		$strresult = $strresult.(substr($str2, $i, 1));
		}
	return $strresult;
	}

	echo myStrrev2('post');

	//Решение в задачнике.
	$str ='apple';
	$arr = str_split($arr, 1);
	$arr = array_reverse($arr);
	$str = implode($arr);
	echo $str;

	$str ='apple';
	$str2 = '';
	$numStr = strlen($str);;
	for ($i = $numStr; $i >= 1; $i--) {
		$str2 .= substr($str, $i-1, 1);
	}
	echo $str2;


?>

<p>22.Напишите свой аналог функции strlen.</p>

<?php

	//Мое решение 1
	function myStrlen($str) {

	return count(str_split($str, 1));

	}

	echo myStrlen('aaaaaaaaaa');

	//Решение в задачнике.
	$str = 'apple';
	$numStr = count(str_split($str, 1));
	echo $numStr;

?>

<p>23.Поменяйте в строке большие буквы на маленькие и наоборот.</p>

<?php

	//Мое решение 1

		$str = 'aBsDe';
		$arr = str_split($str, 1);
		$strnew = '';
		foreach ($arr as $elem) {
			if (ord($elem) >= 65 and ord($elem) <= 90) $strnew .= chr(ord($elem) + 32);
			if (ord($elem) >= 97 and ord($elem) <= 122) $strnew .= chr(ord($elem) - 32);
			}
		echo $strnew;

	//Решение в задачнике
		$str = 'apple';
		$str1 = str_split($str);
		$str2 = '';
		foreach ($str1 as $elem) {
			if(ord($elem) >= 97 && ord($elem) <= 122) {
				$str2 .= strtoupper($elem);
			} else {
			$str2 .= strtolower($elem);
			}
		}
		echo $str2;

?>

<p>24.Преобразуйте строку 'var_text_hello' в 'varTextHello'. Скрипт должен работать с любыми строками такого рода.</p>

<?php

	//Мое решение 1

		echo lcfirst(implode('', explode(' ', ucwords(strtr('var_text_hello', '_', ' ')))));


	//Решение в задачнике
	$arr = explode('_', 'var_test_text');
	$str = '';
	foreach ($arr as $elem) {
		if($elem == $arr[0]) {
			$str .= $elem;
		} else {
			$str .= ucfirst($elem);
		}
	}
	echo $srtr;

?>

<p>25.С помощью только одного цикла нарисуйте следующую пирамидку:</p>

<?php

	//Мое решение 1
		for ($i = 1; $i <= 9; $i++) echo str_repeat($i, $i).'<br>';

	//Решение в задачнике
	for ($i = 1; $i <= 9; $i++) {
		echo str_repeat($i , $i) . '<br>';
	}

?>

<p>26.Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть не 5 рядов, а произвольное количество, оно задается так: $str = 'xxxxxxxx'; - это первый ряд пирамиды.</p>

<?php

	//Мое решение
		$str = 'xxx';
		for ( $i = 0; $i <= strlen($str); $i++) echo substr($str, $i).'<br>';

	//Решение в задачнике
	//В подсказке ошибка была $strNum != $с
	$str = 'xxxxxxxxxx';
	$strNum = strlen($str);
	$str2 = '';
	for ($i = $strNum; $i > 0; $i--) {
		$str2 .= substr($str, 0, $i) . '<br>';
	}
	echo $str2;

?>

<p>27.Дан массив с произвольными числами. Сделайте так, чтобы элемент повторился в массиве количество раз, соответствующее его числу. Пример: [1, 3, 2, 4] превратится в [1, 3, 3, 3, 2, 2, 4, 4, 4, 4]</p>

<?php

	//Мое решение
		$arr = [1, 3, 2, 4];
		$arr2 = [];
		foreach ($arr as $key => $elem) {
			$a = $elem;
			for ($i = $a; $i >= 1; $i--)
				$arr2[] = $elem;
			}

		echo "<pre>";
		print_r($arr2);
		echo "</pre>";

	//Решение в задачнике
	$arr = [1, 2, 3, 4];
	$newArr = [];
	foreach ($arr as $elem) {
		for ($i = 1; $i <= $elem; $i++) {
			$newArr[] = $elem;
		}
	}
	var_dump($newArr);


?>

<p>28.Дан массив с произвольными целыми числами. Сделайте так, чтобы первый элемент стал ключом второго элемента, третий элемент - ключом четвертого и так далее. Пример: [1, 2, 3, 4, 5, 6] превратится в [1=>2, 3=>4, 5=>6].</p>

<?php

	//Мое решение
		$arr = [3, 2, 7, 4, 5, 10, 34, 45];
		$arrnew = [];
		for ($i = count($arr); $i > 0; $i--) {
				if (count($arr) != 0) $arrnew[array_shift($arr)] = array_shift($arr);
			}

		echo "<pre>";
		print_r($arrnew);
		echo "</pre>";

	//Решение в задачнике, в задачнике есть ошибка $i = 1
	$arr = [1, 2, 3, 4, 5, 6];
	$newArr = [];
	$key = 0;
	$num = count($arr);
	for ($i = 0; $i <= $num -1; $i+= 2) {
		$key = $arr[$i];
		$newArr[$key] = $arr[$i + 1];
	}

	echo "<pre>";
	print_r($newArr);
	echo "</pre>";

?>

<p>29.Дана строка. Удалите из этой строки четные символы.</p>

<?php

	//Мое решение
		$str = 'qwerty';
		$strnew = '';
		$arr = str_split($str, 1);
		foreach ($arr as $key => $value) {
			if($key % 2 == 0) $strnew .= $value;
		}

		echo $strnew;

	//Решение в задачнике
		$str = 'aazzqqq';
		$i = 0;
		$res = '';
		while ($i <= strlen($str)) {
			$res .= substr($str, $i, 1);
			$i = $i + 2;
		}
		echo $res;

?>

<p>30.Дана строка. Поменяйте ее первый символ на второй и наоборот, третий на четвертый и наоборот, пятый на шестой и наоборот и так далее. То есть из строки '12345678' нужно сделать '21436587'.</p>

<?php

	//Мое решение
	$str = '12345678';
	$i = 0;
	$res = '';

	while ($i <= strlen($str)) {
		$res .= strrev(substr($str, $i, 2));
		$i = $i + 2;
	}
	echo $res;

	//Решение в задачнике


	$str = '1234';
	$newStr = strrev($str);
	$newStr = array_reverse(str_split(strrev($str), 2));
	echo implode('', $newStr);

?>

<p>31.Сделайте аналог функции array_unique. </p>

<?php

	//Мое решение
	$arr = [1, 1, 1, 2, 2, 3, 1, 3, 5, 6, 6, 6, 0];
	$arrnew = [];
	foreach ($arr as $value) {
		if (in_array($value, $arrnew)== false)
			$arrnew[] = $value;
	}

	echo "<pre>";
	print_r($arrnew);
	echo "</pre>";

	//Решение в задачнике
	function getArrUnique ($arr)
	{
		$result = [];
		foreach ($arr as $elem) {
			if (in_array($elem, $result) == false) {
				$result[] = $elem;
			}
		}
		return $result;
	}

?>

<p>32.Сделайте функцию, противоположную функции array_unique. Ваша функция должна оставлять дубли и удалять элементы, не имеющие дублей.</p>

<?php

	//Мое решение
	$arr = [1, 1, 1, 2, 3, 3, 4 ,5, 1, 6, 1, 3];
	$arrcount = array_count_values($arr);
	foreach ($arrcount as $elem => $count) {
		if ($count == 1) {
			array_splice($arr, array_search($elem, $arr), 1);
		}
	}

	echo "<pre>";
		print_r($arr);
	echo "</pre>";

	//Решение в задачнике
	$arr = [1, 1, 1, 2, 3, 3, 4 ,5, 1, 6, 1, 3];
	$newArr = [];
	$elems = count($arr);
	for ($i = 0; $i < $elems; $i++) {
		$value = $arr[$i];
		unset($arr[$i]);
		if (in_array($value, $arr)) {
			$newArr[] = $value;
			}
		$arr[$i] = $value;
	}
	$arr = $newArr;

	echo "<pre>";
		print_r($arr);
	echo "</pre>";

?>

<p>33.Напишите скрипт, который проверяет, является ли данное число простым (простое число - это то, которое делится только на 1 и на само себя).</p>

<?php

	//Мое решение
	$num = 13;

	function plainNum($num){
	$arrnum = range(2, $num - 1);
	foreach ($arrnum as $value) {
		if ($num % $value == 0) return 'true'; return 'false';
			}
	}

	echo plainNum($num);

	//Решение в задачнике
	$num = 31;
		$flag = false;
		for ($i = 2; $i < $num; $i++) {
			if ($num % $i == 0) {
				$flag = true;
				break;
			}
		}

		if ($flag == true) {
			echo'Простое число';
		} else {
			echo 'Сложное число'
		}
?>

<p>34.Дан массив со строками. Запишите в новый массив только те строки, которые начинаются с 'http://'.</p>

<?php

	//Мое решение
	$arr = ['https://mcx.com.ua', 'http://mcx.in.ua', 'mcx.com.ua', 'http://mcx.com.ua'];
	$arrnew = [];

	foreach ($arr as $value) {
		if(!empty(strstr($value, 'http://'))) $arrnew[] = strstr($value, 'http://');
			}

	echo "<pre>";
		print_r($arrnew);
	echo "</pre>";

	//Решение в задачнике
	$arr = ['http://google.com', 'https://youtube.com', 'https://vk.com'];
		$newArr = [];
		foreach ($arr as $elem) {
			$pos = strpos($elem, 'http://');
			if ($pos !== false) {
				$newArr[] = $elem;
			}
		}

		var_dump($newArr);
?>
