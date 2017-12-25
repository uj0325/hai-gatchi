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

 	
 		<?php if($top_flag == 0){ ?>
 		<!-- はい、合致とは～ -->
 		<div class="container">
 			<div class="row">
 				<div class="col-lg-12">
			 		<div style="text-align: center">
			 			<h1>What is "はい、合致～!"？</h1>
			 		</div>
			 		<div style="font-size: 25px;text-align: center">
			 			<h4>ちょっと暇?急に暇?最速で暇人同士を「はい、合致～!」</h4>
			 			<h4>独りが苦手なあなたの心のスキマ、お埋めします!</h4>
			 			<br>
			 		</div>
			 	</div>

			 	<div class="col-lg-12" style="text-align: center;background-color: #e5fff2">
			 		<h2>会員ログイン</h2>
			 		<br>

				    <form action="top.php" method="POST">

					<!-- メールアドレスのデータ -->
					<label>メールアドレス</label><br>
					<input type="text" name="email_o" placeholder="例：tom@gmail.com"
					value="<?php echo $email_o; ?>">
					<br>
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
					<label>パスワード</label><br>
					<input type="password" name="password_o">
					<br>
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
					<!-- 送信ボタン -->
					<input type="submit" value="ログイン">
					<br><br>
				</form>
			 	</div>

			 	<a href="touroku.php" class="btn btn-default btn-lg btn-block">
			 		新規会員登録
			 	</a>
					
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