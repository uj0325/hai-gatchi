<?php 
	session_start();
	//メインページ
	//$user_id=$_SESSION['user_info']['user_id'];

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
 	
 	<div style="position: absolute;top:100px;left: 10px;">
 		メインページのコンテンツです。<br>
 		<?php echo 'ログイン中のユーザーIDは「' . $_SESSION['user']['user_id'] . '」です。'; ?>
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

 	<div>
 		<?php //フッターを呼び出す ?>
 		<?php require('parts/footer.php') ?>
 	</div>
 
 </body>
 </html>