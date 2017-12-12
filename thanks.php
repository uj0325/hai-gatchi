<?php

	if(empty($_POST)){
		echo 'データを入力してください。<br>';
		echo '<a href="top.php">入力画面へ戻る</a>';
		exit();
	}

  // $nickname = $_POST['nickname'];
  // $email = $_POST['email'];
  // $content = $_POST['content'];
  $nickname=htmlspecialchars($_POST['nickname']);
  $email=htmlspecialchars($_POST['email']);
  $content=htmlspecialchars($_POST['content']);

  //データを保存する処理(最高に覚えにくい)
  //PHPととMySQLの連携(PHPからMySQLを使用するやり方)
  //データベースの保存には大きく3ステップが必要

  //Step1 : データベースとの接続情報を記述する
  $dsn = 'mysql:dbname=survey;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8'); 

  //mysql:dbname=①データベース名;host=②MySQLの場所
  //$user = 'MySQLにアクセスするユーザー';
  //$password = 'MySQLにアクセスするユーザーのパスワード'
  //$dbh = new PDO(①②,③,④);
  //データベースが使える$dbhという変数が作成できる。
  //$dbh->query('SET NAMES utf8'); 
  //->と=>は違う意味
  //このプログラム上で使用する文字コードを設定
  //この5行はプログラムを理解する、というより丸暗記。	

  //step2 SQL文を記述
  $sql = 'INSERT INTO `survey` SET
                      `nickname`=?,
                      `email`=?,
                      `content`=?;
  ';

  //step3 記述したSQLを実行する
  //?マークの記述を配列の順番で上書きする
  $data = array($nickname,$email,$content);
  //SQL文を実行する準備を行う
  $stmt = $dbh->prepare($sql);
  //SQL文を実行する(?マークを上書きして実行)
  $stmt->execute($data);

  //データベースへ保存の処理が完了


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
  <p><?php echo $nickname; ?>様</p>
  <p>メールアドレス:<?php echo $email; ?></p>
  <p>お問合せ内容:<?php echo $content; ?></p>

</body>
</html>