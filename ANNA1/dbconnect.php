<?php
	// MySQLの接続情報
	$dsn = 'mysql:dbname=y-hi-gatch;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh ->query('SET NAMES utf8');

// ーーーーーーーーーーここから下はページによって変えるーーーーーーーーーーーーー


	// $sql = "INSERT INTO `users` SET `username` = ?,
	//  			                   `email` = ?,
	//  			                   `password` = ?";

	// $data = array($username,$email,$password);
	// $stmt = $dbh->prepare($sql);
	// $stmt->execute($data);


?>