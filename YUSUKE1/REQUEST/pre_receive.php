<?php

// DBからリクエスト送ってきている人のデータを取得して表示
// 	(gatchカラムが0のものだけ表示)
// 承認をおすとDBに合致したというデータを送る

// ログイン中のユーザーを全員表示
// DBからlogin = 1 のデータを取得
// foreachで表示
// AJAX

// Chatはcomet


require('../dbconnect.php');

$username = 2;
echo "ログイン中のユーザー<br>".$username;
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

		$data = array($username,$_POST['requesting_user']);
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		// echo "<br>".$_POST['requesting_user']."のリクエストを承認しました";

		header('Location: pre_receive.php');
		exit();
	}

	// リクエスト拒否ボタンありの時
	// if (!empty($_POST['refuse'])) {
	// 	$sql = "UPDATE `gatch`
	// 		    SET `gatch`=2
	// 		    WHERE `receive_user`=?
	// 		    AND `requesting_user`=?
	// 		    ";

	// 	$data = array($username,$_POST['requesting_user']);
	// 	$stmt = $dbh->prepare($sql);
	// 	$stmt->execute($data);

	// 	echo "<br>".$_POST['requesting_user']."のリクエストを拒否しました";
	// }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>top2</title>
</head>
<body style="text-align: center;">
		<h2>リクエストしているユーザー</h2>
	<?php foreach($requested as $requests): ?>
		<p><?php echo $requests['requesting_user']; ?></p>
	<?php if ($requests['gatch'] == 0):?>
		<form method="POST" action="">
			<input type="hidden" name="requesting_user" value="<?php echo $requests['requesting_user']; ?>">
			<input type="submit" name="accept" value="承認する">
<!-- 		<input type="submit" name="refuse" value="お断り">
 -->		</form>
	<?php endif ?>
	<?php endforeach ?>
		<h2>マッチしているユーザー</h2>


</body>
</html>