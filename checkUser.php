<?php
	$file = fopen("./passwd.txt", "r");

	$username = $_POST["username"];
	$userTaken = false;

	while (!feof($file) && !$userTaken) {
  		$line = fgets($file);
  		$user = explode(":", $line)[0];

  		if($user == $username) {
  			$userTaken = true;
  		}
	}

	fclose($file);

	if($userTaken) {$response = "userTaken";}
	else {$response = "userValid";}

	echo $response;
?>