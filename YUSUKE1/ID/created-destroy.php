<?php
date_default_timezone_set('Asia/Manila');

	$sql = "SELECT `random_created`,`inputer_id`,`random`
			FROM `friend-add`
			WHERE `inputer_id` IS NULL";
	$data = array();
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	$created = $stmt->fetchall();

	foreach ($created as $key) {

		$today = strtotime(date("Y/m/d H:i:s"));
		$deleteDayTime = strtotime(date("Y/m/d H:i:s",strtotime($key['random_created'] . "+24 hour")));

		if ($today > $deleteDayTime){

			$sql = "DELETE
					FROM `friend-add`
					WHERE `random_created` = ?";

			$data = array($key['random_created']);
			$stmt = $dbh->prepare($sql);
			$stmt->execute($data);

			echo "<br>".$key['random']."<br>上記のIDは24時間入力されませんでした<br>新たなIDを発行・コピーしてください<br>";
		} // if
	} // foreach





?>