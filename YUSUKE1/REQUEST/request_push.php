<?php
require('../dbconnect.php');
		$sql ="SELECT `requesting_user`
			   FROM `gatch`
			   WHERE `requesting_user`= $login_user
			   AND `gatch`=0
			  ";
		$data = array();
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
		$request = $stmt->fetch(PDO::FETCH_ASSOC);
		if (!$request) {
			$sql = "INSERT INTO `gatch`
			    	SET `requesting_user` = ?,
				    	`receive_user` = ?,
				    	`request_created` = NOW()
			       ";
			$data = array($login_user,$friendname);
			$stmt = $dbh->prepare($sql);
			$stmt->execute($data);
?>