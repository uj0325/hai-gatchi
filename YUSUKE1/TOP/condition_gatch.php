<?php
	// ログインしているユーザーの中で
	// 自分のコンディションと同じユーザーをすべて表示

	$sql = "SELECT *
			FROM  `users`
			WHERE `login`= 1
			AND   `conditioned` =?
			AND   `id` != ?
		   ";
	$data = array($login_condition,$login_id);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$condition_gatch = $stmt->fetchall();
?>