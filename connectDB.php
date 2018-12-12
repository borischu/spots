<?php
	$host = "fall-2018.cs.utexas.edu";
	// $host = "localhost";
	$user = "cs329e_mitra_borischu";
	$pwd = "Part&Snake=freer";
	$dbs = "cs329e_mitra_borischu";
	$port = "3306";

	$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

	if (empty($connect)) {
	  die("mysqli_connect failed: " . mysqli_connect_error());
	}

	$table = "spots";
?>