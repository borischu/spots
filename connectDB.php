<?php
	$url = parse_url(getenv("CLEARDB_DATABASE_URL")); 

	$host = "$url["host"];";
	// $host = "localhost";
	$user = $url["user"];
	$pwd = $url["pass"];
	$dbs = substr($url["path"], 1);
	$port = "3306";

	$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

	if (empty($connect)) {
	  die("mysqli_connect failed: " . mysqli_connect_error());
	}

	$table = "spots";
?>
