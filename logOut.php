<?php
	setcookie("loggedIn", "false", time()-3600);
	header('Location: home.php');
?>