<?php
require('../dbconnect.php');

if (!empty($_POST)) {
	$sql ="INSERT INTO `gatch_push`
				   SET `user_id` = ?
		  ";
	$data = array($_POST['userid']);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
}

?>