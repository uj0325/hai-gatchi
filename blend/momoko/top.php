<?php 
	//ログインページ
 ?>
 <?php 
 	session_start();
	$email_o ='';
	$password_o ='';
	$top_flag=0;


	$dsn = 'mysql:dbname=hi_gatch;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8'); 

	//Step2 : SQL文を記載する。
	$sql = 'SELECT user_id,email,password FROM `gatch_users` WHERE 1';

	//Step3 : SQLを実行する。
	$data = array();
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	$rec = $stmt->fetchAll();
	// $user_password=$rec[0]['password'];
	// $user_email=$rec[0]['email';]

	if(!empty($_POST)){

		

		$email_o=htmlspecialchars($_POST['email_o']);
		$password_o=htmlspecialchars($_POST['password_o']);

		//エラー件数チェック
		$errors2 = array();

		//バリデーション(検証)

		if($email_o == ''){
			$errors2['email_o']='blank';
		}
		if($password_o == ''){
			$errors2['password_o']='blank';
		}elseif(strlen($password_o) < 4){
			$errors2['password_o']='length';
		}

		//メアドをDBの値と照合する
		$errors_count=0;
		for($i=0;$i < count($rec);$i++){
			if($rec[$i]['email'] == $email_o){
				if($rec[$i]['password'] != $password_o){
					$errors2['password_o']='match';
				}
			}else{
				$errors_count++;
			}
		}

		if($errors_count == count($rec)){
			$errors2['email_o']='match';
		}

		if(empty($errors2)){
			
		// tomtom cord
		$sql = 'SELECT user_id,email,password FROM `gatch_users` WHERE email=? AND password=?';

		//Step3 : SQLを実行する。
		$data = array($email_o,$password_o);
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		$rec = $stmt->fetchAll();
		$_SESSION['login']=$rec[0];

		
			$top_flag=1;
		}
	}

 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>はい、合致～!トップ画面</title>
 </head>
 <body>
 	<div>
 		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 		<script type="assets/js/bootstrap.js"></script>

 		<div>
	 		<?php //ヘッダーを呼び出す ?>
	 		<?php require('parts/header2.php') ?>
 		</div>

	 	<div>
	 		<?php //サイドバーを呼び出す ?>
	 		<?php require('parts/sidebar2.php') ?>
	 	</div>

 	
 		<?php if($top_flag == 0){ ?>
 		<div style="position: absolute;top:60px;left: 200px;">
 		<!-- はい、合致とは～ -->
 			<div style="background-image: url(parts_image/background_image.jpg);background-size: 300px;
 			background-repeat: no-repeat;background-size: cover;width:1050px;height: 300px">	
			 	<div style="text-align: center;color: white">
			 			<br><br><br>
			 			<h1>What is 「はい、合致～」？</h1>
			 			<h4>ちょっと暇?急に暇?最速で暇人同士を「はい、合致!」</h4>
			 			<h4>独りが苦手なあなたの心のスキマ、お埋めします!</h4>
			 			<br>
			 	</div>
			</div>	
				<br>
			 	<div class="col-lg-4 col-lg-offset-2" style="text-align: center;background-color: #fffaf0">
			 		<br>
			 		<h4>「はい、合致～」会員ログイン</h4>

				    <form action="top.php" method="POST">

					<!-- メールアドレスのデータ -->
					<input type="text" name="email_o" placeholder="メールアドレス"
					value="<?php echo $email_o; ?>">
					<?php if(isset($errors2['email_o']) && 
					$errors2['email_o'] == 'blank'){?>
					<div  class="alert alert-danger">
						メールアドレスを入力してください。
					</div>
					<?php } ?>
					<br>
					<?php if(isset($errors2['email_o']) && 
					$errors2['email_o'] == 'match'){?>
					<div  class="alert alert-danger">
						このメールアドレスは登録されていません。
					</div>
					<?php } ?>
					<br>

					<!-- パスワードのデータ -->
					<input type="password" name="password_o" placeholder="パスワード">

					<?php if(isset($errors2['password_o']) && 
					$errors2['password_o'] == 'blank'){?>
					<div  class="alert alert-danger">
						パスワードを入力してください。
					</div>
					<?php }?>

					<?php if(isset($errors2['password_o']) &&
					$errors2['password_o'] == 'length'){ ?>
					<div  class="alert alert-danger">
						パスワードは4文字以上を設定してください。
					</div>
					<?php } ?>

					<?php if(isset($errors2['password_o']) &&
					$errors2['password_o'] == 'match'){ ?>
					<div  class="alert alert-danger">
						正しいパスワードを入力してください。
					</div>
					<?php } ?>
					<br>
					<br>
					<!-- 送信ボタン -->
					<input type="image" name="submit" src="parts_image/login_button.jpg" width="180px">
					<br><br>
				</form>
			 	</div>

			 	<div class="col-lg-4 col-lg-offset-1" style="text-align: center;background-color: #fffaf0">
			 		<br>
			 		<h4>「はい、合致～」無料会員登録</h4>

			 		<form action="touroku.php" method="POST">
				    
					<!-- ユーザー名のデータ -->
					<input type="text" name="username" placeholder="ユーザー名">
					<br>
					<br>
					<!-- メールアドレスのデータ -->
					<input type="text" name="email" placeholder="メールアドレス">
					<br>
					<br>
					<!-- パスワードのデータ -->
					<input type="password" name="password" placeholder="パスワード">
					<br>
					<br>
					<!-- パスワードのデータ -->
					<input type="password" name="password2" placeholder="パスワード(確認用)">
					<br>
					<br>
					<!-- 送信ボタン -->
					<input type="image" name="submit" src="parts_image/create_account.jpg" width="180px">
					<br><br>
					</form>
				</div>

		</div>	

			<?php } ?>

			<?php 
				if($top_flag == 1){
					header('location:condition.php');
					exit();
				}
				
			 ?>
		
 	</div>
 		
 </body>
 </html>