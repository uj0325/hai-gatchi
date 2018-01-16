<?php
require('../dbconnect.php');
	$sql ="INSERT INTO `push`
		   SET    `pushed_user` =?,
		   		  `receive_user` = ?,
		   		  `push_created` = NOW()
	";
	$data = array($_POST['pushed_user'],$_POST['receive_user']);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
?>