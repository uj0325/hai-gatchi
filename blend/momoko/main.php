<?php 
	session_start();
	//メインページ
	$user_id=$_SESSION['user']['user_id'];

 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>はい、合致～!メイン画面</title>
 </head>
 <body>
 	<div>
 		<?php //ヘッダーを呼び出す ?>
 		<?php require('parts/header.php') ?>
 	</div>

 	<div>
 		<?php //サイドバーを呼び出す ?>
 		<?php require('parts/sidebar.php') ?>
 	</div>

 	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 	<script type="assets/js/bootstrap.js"></script>
 	
 	<div style="position: absolute;top:60px;left: 250px;">
 		メインページのコンテンツです。<br>
 		<?php echo 'ログイン中のユーザーIDは「' . $user_id . '」です。'; ?>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 		<br><br><br>
 	</div>

 	
 
 </body>
 </html>