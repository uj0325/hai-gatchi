<?php
	session_start();

	$dsn = 'mysql:dbname=hi_gatch;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8'); 

	$sql = 'UPDATE `gatch_idlist` SET `friend_id`=? WHERE `user_id`=? LIMIT 1;';

	$user_id=htmlspecialchars($_POST['user_id']);
	$friend_id=htmlspecialchars($_POST['friendid']);

	$data = array($user_id,$friend_id);
	//SQL文を実行する準備を行う
	$stmt = $dbh->prepare($sql);
	//SQL文を実行する(?マークを上書きして実行)
	$stmt->execute($data);

	header('Location: main.php');
	exit();
?>