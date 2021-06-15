<?php
	//Параметры подключения к базе данных
	include 'sign-in/elems/connect.php';

	if (isset($_SESSION['auth'])) {
	  if ($_SESSION['auth'] == true) {
				include 'sign-in/elems/adminlist.php';
		}
	}



