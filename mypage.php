<?php 
	session_start();
	$user_id=$_SESSION['user']['user_id'];

	$dsn = 'mysql:dbname=hi_gatch;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8'); 

	$sql = 'SELECT * FROM `gatch_users` WHERE user_id=?';

	//Step3 : SQLを実行する。
	$data = array($user_id);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	$rec = $stmt->fetchAll();

	$user_password=$rec[0]['password'];
	$user_email=$rec[0]['email'];
	$user_name=$rec[0]['user_name'];
	$picture=$rec[0]['picture'];
	$gatch_condition=$rec[0]['gatch_condition'];
	$tubuyaki=$rec[0]['tubuyaki'];

	$_SESSION['mydate']['user_password']=$user_password;
	$_SESSION['mydate']['user_email']=$user_email;
	$_SESSION['mydate']['user_name']=$user_name;
	$_SESSION['mydate']['picture']=$picture;
	$_SESSION['mydate']['gatch_condition']=$gatch_condition;
	$_SESSION['mydate']['tubuyaki']=$tubuyaki;
	$_SESSION['mydate']['user_id']=$user_id;

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
 	
 	<div style="position: absolute;top:100px;left: 530px;">
 		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 		<script type="assets/js/bootstrap.js"></script>
 		<div style="text-align: center">
 			<h2>マイページ</h2>
			<div>
				<img src="profile_image/<?php echo $picture; ?>" width="100px">
				<?php
				echo '<h4>ユーザーネーム:' . $user_name .'様</h4>';
				echo '<h4>メールアドレス:' . $user_email .'</h4>';
				echo '<h4>パスワード:</h4>'; 
				?>
				<?php for($i=0; $i<strlen($user_password);$i++){
 					echo '●';
 				} ?>
 				<?php
				echo '<h4>コンディション:' . $gatch_condition .'</h4>';
				echo '<h4>つぶやき:' . $tubuyaki . '</h4>'; 
				?>
				<br>
			</div>
			<a href="myid.php">マイID発行画面へ</a>
			<br>
			<a href="mypage_edit.php">マイページ編集画面</a>
		</div>
 	</div>

 	<div>
 		<?php //フッターを呼び出す ?>
 		<?php require('parts/footer.php') ?>
 	</div>
 
 </body>
 </html>