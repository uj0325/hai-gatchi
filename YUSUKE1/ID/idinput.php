<?php
require('../dbconnect.php');

	if (!empty($_POST)) {


		$sql ="SELECT `random`
			   FROM   `friend-add`
			   WHERE  `inputer_id` IS NULL";
		$data = array();
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
		$random = $stmt->fetchall();

		$inputedId = $_POST['idInput'];
		foreach ($random as $key) {
			if ($key['random'] == $inputedId) {

				$inputer =rand(1,100);
				$sql ="UPDATE `friend-add`
			   		   SET `inputer_id` = ?,
			   		   	   `relation_created` = NOW()
			   		   WHERE `random` = ?";
				$data = array($inputer,$inputedId);
				$stmt = $dbh->prepare($sql);
				$stmt->execute($data);

				break;
			}else{
				continue;
			}
		} // foreach
		header('Location: idinput.php');
		exit();
	} // if (!empty($_POST))


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<title>ID入力</title>
</head>
<body style="text-align: center;">
	<header style="height: 100px;">
		<h1>ID入力しますよー</h1>
	</header>

	<div>
		<form method="POST" action="">
			<input style="width: 400px; padding: 5px; border: 1px solid black; display: inline-block; background-color: white; font-size: 20px;" type="text" name="idInput" placeholder="友達から受け取ったIDを入力してください">
			</input>
			<input type="submit" value="友達追加">
		</form>
	</div>

</body>
</html>
