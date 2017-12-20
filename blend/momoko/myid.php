<?php 
	session_start();
	
	$user_id=$_SESSION['mydate']['user_id'];
	$user_password=$_SESSION['mydate']['user_password'];
	$user_email=$_SESSION['mydate']['user_email'];
	$user_name=$_SESSION['mydate']['user_name'];
	$picture=$_SESSION['mydate']['picture'];
	$gatch_condition=$_SESSION['mydate']['gatch_condition'];
	$tubuyaki=$_SESSION['mydate']['tubuyaki'];

	$dsn = 'mysql:dbname=hi_gatch;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8'); 

	$sql = 'INSERT INTO `gatch_idlist` SET `user_id`=?;';

	$data = array($user_id);
	//SQL文を実行する準備を行う
	$stmt = $dbh->prepare($sql);
	//SQL文を実行する(?マークを上書きして実行)
	$stmt->execute($data);
	
 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>マイID発行ページ</title>
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
 	
 	<div style="position: absolute;top:100px;left: 500px;">
 		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 		<script type="assets/js/bootstrap.js"></script>
 		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
 		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

 		<div style="text-align: center">
				
				<h3>あなたのマイIDは</h3>
				
				<h3 style="background-color: #fffaf0;padding: 30px">
				<?php
				echo $user_id . '_' . uniqid() ;'です。';
				?>
				<a  href=" ">
					<i class="fa fa-repeat" aria-hidden="true" style="color: #696969;background-color: #f4fff4"></i>
				</a></h3>
				<br>
				<h5>マイIDを友達に教えることで「はい、合致～」の友達追加ができます。</h5>
				<h6>※マイIDは友達一人につき一つ必要です。</h6>
				<h6>※マイIDを更新する時は
					<i class="fa fa-repeat" aria-hidden="true" style="color: #696969;"></i>
					を押してください。
				</h6>
				<h6>※友達追加は設定の友人ID入力画面からできます。</h6>
		</div>
 	</div>

 	
 
 </body>
 </html>