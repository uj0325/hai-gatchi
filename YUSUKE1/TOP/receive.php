<?php
	$sql = "SELECT `requesting_user`,
				   `receive_user`,
				   `request_created`,
				   `gatch`
			FROM `gatch`
			WHERE `receive_user` = 2
			AND `gatch` = 0
	       ";

	$data = array();
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	$requested = $stmt->fetchall();

	if (!empty($_POST['accept'])) {

		$sql = "UPDATE `gatch`
			    SET `gatch`=1
			    WHERE `receive_user`=?
			    AND `requesting_user`=?
			    AND `gatch`=0
			   ";

		$data = array($friend,$_POST['requesting_user']);
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		echo "<br><br>".$_POST['requesting_user']."のリクエストを承認しました";

		// header('Location: top.php');
		// exit();
	}
?>