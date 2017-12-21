<?php 
	session_start();
	$user_id=$_SESSION['user']['user_id'];
	$friendid=$_SESSION['friendid'];
	$time_now=$_SESSION['time_now'];
	//echo $user_id . '<br>';
	//echo $friendid;

	$dsn = 'mysql:dbname=hi_gatch;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8'); 

	//Step2 : SQL文を記載する。
	$sql = 'SELECT `user_name`,`picture` FROM `gatch_users` WHERE `user_id`=?';

	//Step3 : SQLを実行する。
	$data = array($friendid);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	$record = $stmt->fetchAll();

	$friend_name=$record[0]['user_name'];
	$friend_picture=$record[0]['picture'];
 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>友人追加確認画面</title>
 </head>
 <body>
 	<div>
 		<?php //ヘッダーを呼び出す ?>
 		<?php require('parts/header2.php') ?>
 	</div>

 	<div>
 		<?php //サイドバーを呼び出す ?>
 		<?php require('parts/sidebar.php') ?>
 	</div> -->

 	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 	<script type="assets/js/bootstrap.js"></script>
 	
 	<div style="position: absolute;top:60px;left: 470px;width:530px">
 		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 		<script type="assets/js/bootstrap.js"></script>
 		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
 		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

 		<div style="text-align: center">
				<br>
				<h4>追加したい友人はこちらの方で間違いないでしょうか？</h4>
				<br>

				<div style="background-color: #fffaf0;padding: 30px">
				
					<?php
					echo '<h4>ユーザーネーム:' . $friend_name .'様</h4>';
					?>
					<br>
					<img src="profile_image/<?php echo $friend_picture; ?>" width="100px">
					

				</div>
				<a class="btn btn-success" href="friend_tuika.php" role="button" style="float: left;margin: 20px 60px">
					友人ID入力画面に戻る
				</a>

				<form action="friend_tuika_db.php" method="POST">
					<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
					<input type="hidden" name="friendid" value="<?php echo $friendid ?>">
					<input type="hidden" name="time_now" value="<?php echo $time_now ?>">
			
					<button class="btn btn-success" type="submit" style="float:right;margin: 20px 60px;">
				    	間違いないです
					</button>

				</form>

				<br>
				
		</div>

 	</div>

 	
 
 </body>
 </html>