<?php
session_start();
require('dbconnect.php');

	if(!isset($_SESSION['user_info'])){
	header('Location: gatch_login.php');
	exit();
}

	//ログイン画面で保存していたデータを入れ込む
			$username = $_SESSION['user_info']['username'];
			$email = $_SESSION['user_info']['email'];
			$password = $_SESSION['user_info']['password'];
			$filename = $_SESSION['user_info']['profile_image'];
			echo 'DBに登録しました。<br>';


	if(!empty($_POST)){

		var_dump($_POST);
		$sql = "INSERT INTO `gatchi_users` SET `user_name` = ?,
										`email` = ?,
										`password` = ?,
										`picture` = ?,
										`created` = NOW()";

		// ?マークを上書きするデータを用意する
		$data = array($username,$email,$password,$profile_image);
		$stmt = $dbh->prepare($sql); //SQL文セット完了
		$stmt->execute($data); //?マークを上書きしてSQL実行

		// ここまで処理が動けば登録完了！
		// 登録完了後は完了ページへ飛ばす
		// リダイレクト処理(POST送信を破棄できる)
		header('Location: thanks.php');
		exit();

	}

  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf8">
	<title>ユーザー登録確認</title>
</head>
<body>
	<div>
		下記の情報でユーザー登録してもよろしいでしょうか。<br>
		<br>
		ユーザー名:<?php echo $_SESSION['user_info']['username']; ?><br>
		メールアドレス:<?php echo $_SESSION['user_info']['email']; ?><br>
		パスワード:●●●●●●●●●●<br>
		<img src="./profile_image/<?php echo $_SESSION['user_info']['profile_image']; ?>" width="150px">
	</div>
	<br>

	<form action="" method="post">
		<input type="hidden" name="action" value="on">
		<input type="submit" value="ユーザーを登録する">
	</form>

	<br>
	<a href="login.php">前の画面へ戻る</a>


	</body>
</html>	