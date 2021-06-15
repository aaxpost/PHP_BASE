<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
session_start();

if (isset($_SESSION['auth'])) {
  if ($_SESSION['auth'] == true) {
			include 'sign-in/elems/adminlist.php';
	}
}


?>
