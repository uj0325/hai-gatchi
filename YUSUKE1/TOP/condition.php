<?php
// AJAXで飛ばすから require('../dbconnect.php'); が必要
require('../dbconnect.php');
	$sql ="UPDATE `users`
		   SET    `conditioned` =?
		   WHERE  `id` =?
	";
	$data = array($_POST['condition'], $_POST['login_id']);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	echo "aaaa";
?>