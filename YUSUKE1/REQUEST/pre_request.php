<?php
	// 合致機能搭載
	// リクエストを送信するとカラムにIDが入る
	// リクエスト承認を押したらgatchカラムを1にしてチャット画面へ

	// リクエスト後５分経過で自動取り消し（gatchカラムに3を挿入）

	// top
	// ①リクエスト送信 requesting_userと receive_user をINSERT
	// ④ ②で合致したら、ほかの人と合致しました通知
	// top2
	// ②リクエスト確認 承認 → gatch = 1 にUPDATE
	// ③チャット画面 へ行く
session_start();
require('../dbconnect.php');

$_SESSON['login_user']['id']=1;
$login_user = $_SESSON['login_user']['id'];
$friend = 2;
	if (!empty($_POST['request'])) {
		$sql ="SELECT `requesting_user`
			   FROM `gatch`
			   WHERE `requesting_user`= $login_user
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
			$data = array($login_user,$friend);
			$stmt = $dbh->prepare($sql);
			$stmt->execute($data);

			echo "<br>DBにIDを送信しました";

		// header('Location: top.php');
		// exit();
		}else{
			echo "<br>一度に一人にしかリクエストは送信できません";
		}
	}




?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>top</title>
</head>
<body style="text-align: center;">
	<h1>TOPページ</h1>
	<P><?php echo "ログイン中の ID ".$login_user."<br>"; ?></P>
	<form method="POST" action="">
		<button type="submit" name="request" value="request">合致申請</button>
	</form>
</body>
</html>