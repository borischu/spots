<?php
	
	extract($_POST);
	$username = $_POST["username"];
	$password = $_POST["password"];

	$correctlogin = false;

	if ($file = fopen("passwd.txt", "r")) {
		while(!feof($file)) {
			$line = trim(fgets($file));
			$delimiter = strpos($line, ":");
			$fileUserName = subStr($line, 0, $delimiter);
			$filePassWord = subStr($line, $delimiter+1);
			if ($username == $fileUserName && hash_equals($filePassWord, crypt($password, $filePassWord))) {
				$correctlogin = true;
				break;
			} 
		}
		fclose($file);
	}

	if ($correctlogin) {
		setcookie("loggedIn", "true");
		header("Location: home.php");
	} else {
		header("Location: login.php");
	}
?>