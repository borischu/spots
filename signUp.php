<?php
	session_start();
	extract($_POST);
	$username = $_POST["username"];
	$password = crypt($_POST["password"]);

	$username_exists = false;

	if ($file = fopen("passwd.txt", "r")) {
		while(!feof($file)) {
			$line = fgets($file);
			$delimiter = strpos($line, ":");
			$fileUserName = subStr($line, 0, $delimiter);
			if ($fileUserName == $username) {
				$username_exists = true;
				break;
			}
		}
		fclose($file);
	}

	if (($file = fopen("passwd.txt", "a")) and !$username_exists) {
		fwrite($file, "$username:$password\n");
		fclose($file);
		setcookie("loggedIn", "true");
		$_SESSION["username"] = $username;

		echo "<script>
		alert('Registration successful! Thank you for signing up!');
		window.location.href='home.php';
		</script>";
	}
	else {
		include "create_acct.php";
		echo '<script>';
		echo 'alert("Registration Failed. This username is already taken.")';
		echo '</script>';
	}
?>