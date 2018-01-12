<?php
	// 自分以外のログインしている人を全員表示する
	// usersテーブルからデータを取得してfetchallからのforeachで表示

	$sql = "SELECT `id`,`username`,`profileImage`
			FROM   `users`
			WHERE  `login` = 1
			AND    `id` != $login_id
		   ";
	$data = array();
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$login_users = $stmt->fetchall();
?>