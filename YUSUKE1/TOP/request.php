<?php
	if (!empty($_POST['request'])) {
		$sql ="SELECT `requesting_user`
			   FROM `gatch`
			   WHERE `requesting_user`= $login_id
			   AND `gatch`=0
			  ";
		$data = array();
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
		$login = $stmt->fetch(PDO::FETCH_ASSOC);
		if (!$login) {
			$sql = "INSERT INTO `gatch`
			    	SET `requesting_user` = ?,
				    	`receive_user` = ?,
				    	`request_created` = NOW()
			       ";
			$data = array($login_id,$friend);
			$stmt = $dbh->prepare($sql);
			$stmt->execute($data);

			echo "<br><br>DBにIDを送信しました";

		// header('Location: top.php');
		// exit();
		}else{
			echo "<br><br>一度に一人にしかリクエストは送信できません";
		}
	}
?>