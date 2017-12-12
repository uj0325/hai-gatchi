<?php

	if(empty($_POST)){
		echo 'データを入力してください。<br>';
		echo '<a href="top.php">入力画面へ戻る</a>';
		exit();
	}

  $username=htmlspecialchars($_POST['username']);
  $email=htmlspecialchars($_POST['email']);
  $gatch_password=htmlspecialchars($_POST['password']);


  //データを保存する処理

  //Step1 : データベースとの接続情報を記述する
  $dsn = 'mysql:dbname=hi_gatch;host=localhost';
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
  $sql = 'INSERT INTO `gatch_users` SET
                      `user_name`=?,
                      `email`=?,
                      `password`=?;
  ';

  //step3 記述したSQLを実行する
  //?マークの記述を配列の順番で上書きする
  $data = array($username,$email,$gatch_password);
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

  <div style="text-align: center">
    <h1>新規会員登録ありがとうございました！</h1>
    <br>
    <a href="top.php">トップページに戻る</a>
  </div>

</body>
</html>