<?php 
	// Step1 : データベースの接続情報を記述する
	$dsn = 'mysql:dbname=hai_gatchi;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');


 ?>