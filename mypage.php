<?php 
	session_start();
	$user_id=$_SESSION['user']['user_id'];

		$dsn = 'mysql:dbname=hi_gatch;host=localhost';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->query('SET NAMES utf8'); 

		$sql = 'SELECT user_id,email,password FROM `gatch_users` WHERE user_id=?';

		//Step3 : SQLを実行する。
		$data = array($user_id);
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		$rec = $stmt->fetchAll();
		// $user_password=$rec[0]['password'];
		// $user_email=$rec[0]['email';]
 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>マイページ</title>
 </head>
 <body>
 	<div>
 		<?php //ヘッダーを呼び出す ?>
 		<?php require('parts/header.php') ?>
 	</div>
 	
 	<div style="position: absolute;top:100px;left: 10px;">
 		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 		<script type="assets/js/bootstrap.js"></script>
 		<div style="text-align: center">
			<h2>入力内容確認</h2>
			<br>
			<div class="container">
				<div class="row">
					<div  class="col-lg-12" style="background-color: #e5fff2;">
						<br>
						<?php
						echo '<h4>ユーザーネーム:' . $username .'様</h4>';
						echo '<h4>メールアドレス:' . $email .'</h4>';
						echo '<h4>パスワード:ユーザー設定のパスワード</h4>'; 
						?>
						<br>
					</div>
				</div>
			</div>
		</div>
 	</div>

 	<div>
 		<?php //フッターを呼び出す ?>
 		<?php require('parts/footer.php') ?>
 	</div>
 
 </body>
 </html>