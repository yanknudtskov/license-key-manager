<?php

		if(!isset($_COOKIE['keymanagementauth'])){
		header('Location: admin.php');
		exit;
		}

		$addkey = $_POST["key"];

		require( "config.php" );
		$query = "INSERT INTO `keys` VALUES ('','" . $addkey . "')";
		mysql_query($query);

		header('Location: admin.php');
?>