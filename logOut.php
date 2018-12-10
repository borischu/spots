<?php
	session_start();
	session_destroy();
	setcookie("loggedIn", "false", time()-3600);
	header('Location: home.php');
?>