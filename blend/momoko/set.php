<?php 
	session_start();
	//設定メニュー画面
	$user_id=$_SESSION['user']['user_id'];

 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>はい、合致～!設定画面</title>
 </head>
 <body>
 	<div>
 		<?php //ヘッダーを呼び出す ?>
 		<?php require('parts/header2.php') ?>
 	</div>

 	<div>
 		<?php //サイドバーを呼び出す ?>
 		<?php require('parts/sidebar.php') ?>
 	</div>

 	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 	<script type="assets/js/bootstrap.js"></script>
 	
 	<div style="position: absolute;top:60px;left: 480px;">
 		<div style="text-align: center;width: 500px">
 			<br>
 			<h2>設定メニュー</h2>
 			<br>
 			<a class="btn btn-default btn-lg btn-block" href="friend_tuika.php" role="button">友人追加</a>
 			<a class="btn btn-warning btn-lg btn-block" href="" role="button">お問合せ</a>
 			<a class="btn btn-default btn-lg btn-block" href="" role="button">Q&A</a>
 			<a class="btn btn-warning btn-lg btn-block" href="" role="button">運営ポリシー</a>
 			<a class="btn btn-default btn-lg btn-block" href="" role="button">退会</a>
 			
 		</div>
 	</div>

 	
 
 </body>
 </html>