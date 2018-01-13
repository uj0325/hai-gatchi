<?php
	// ログインしているユーザーの中で
	// 自分のコンディションと同じユーザーをすべて表示

	$sql = "SELECT *
			FROM   `users`
			WHERE `login`= 1
			AND   `conditioned` =?
			AND   `id` != 1
		   ";
	$data = array(3);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$condition_gatch = $stmt->fetchall();
?>