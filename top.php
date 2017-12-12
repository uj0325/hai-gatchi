<?php 
	//ログインページ
 ?>
 <?php 

	$username ='';
	$email ='';
	$email_o ='';

	if(!empty($_POST)){

		$username=htmlspecialchars($_POST['username']);
		$email=htmlspecialchars($_POST['email']);
		$password=htmlspecialchars($_POST['password']);
		$password2=htmlspecialchars($_POST['password2']);

		$email_o=htmlspecialchars($_POST['email_o']);
		$password_o=htmlspecialchars($_POST['password_o']);

		//エラー件数チェック
		$errors = array();
		$errors2 = array();

		//バリデーション(検証)
		if($username == ''){
			$errors['username']='blank';
		}
		if($email == ''){
			$errors['email']='blank';
		}
		if($password == ''){
			$errors['password']='blank';
		}elseif(strlen($password) < 4){
			$errors['password']='length';
		}
		if($password2 == ''){
			$errors['password2']='blank';
		}elseif(strlen($password) < 4){
			$errors['password2']='length';
		}elseif($password2 != $password){
			$errors['password2']='notsame';
		}


		if($email_o == ''){
			$errors2['email_o']='blank';
		}
		if($password_o == ''){
			$errors2['password_o']='blank';
		}elseif(strlen($password_o) < 4){
			$errors2['password_o']='length';
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
			 			<br><br>
			 		</div>
			 	</div>

			 	<div class="col-lg-4 col-lg-offset-1 col-xs-10 col-xs-offset-2" 
			 	style="text-align: center;background-color: #e5fff2">
			 		<h2>会員ログイン</h2>
			 		<br>
				    <form action="condition.php" method="POST">

					<!-- メールアドレスのデータ -->
					<label>メールアドレス</label><br>
					<input type="text" name="email_o" placeholder="例：tom@gmail.com"
					value="<?php echo $email; ?>">
					<br>
					<?php if(isset($errors2['email_o']) && 
					$errors2['email_o'] == 'blank'){?>
					<div  class="alert alert-danger">
						メールアドレスを入力してください。
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

					<br>
					<!-- 送信ボタン -->
					<input type="submit" value="メイン画面へ">
					<br><br>
				</form>
			 	</div>


			 	<div class="col-lg-4 col-lg-offset-2 col-xs-10 col-xs-offset-2" 
			 	style="text-align: center;background-color: #e5fff2">
			 		<h2>新規登録</h2>
			 		<br>
				    <form action="chech.php" method="POST">

					<!-- ユーザー名のデータ -->
					<label>ユーザー名</label><br>
					<input type="text" name="username" placeholder="例：トムトム"
					value="<?php echo $username; ?>">
					<br>
					
					<?php if(isset($errors['username']) && 
					$errors['username'] == 'blank'){?>
					<div class="alert alert-danger">
						ユーザー名を入力してください。
					</div>
					<?php } ?>
					<br>

					<!-- メールアドレスのデータ -->
					<label>メールアドレス</label><br>
					<input type="text" name="email" placeholder="例：tom@gmail.com"
					value="<?php echo $email; ?>">
					<br>
					<?php if(isset($errors['email']) && 
					$errors['email'] == 'blank'){?>
					<div  class="alert alert-danger">
						メールアドレスを入力してください。
					</div>
					<?php } ?>
					<br>

					<!-- パスワードのデータ -->
					<label>パスワード</label><br>
					<input type="password" name="password">
					<br>
					<?php if(isset($errors['password']) && 
					$errors['password'] == 'blank'){?>
					<div  class="alert alert-danger">
						パスワードを入力してください。
					</div>
					<?php }?>

					<?php if(isset($errors['password']) &&
					$errors['password'] == 'length'){ ?>
					<div  class="alert alert-danger">
						パスワードは4文字以上を設定してください。
					</div>
					<?php } ?>

					<!-- パスワードのデータ -->
					<label>パスワード(確認用)</label><br>
					<input type="password" name="password2">
					<br>
					<?php if(isset($errors['password2']) && 
					$errors['password2'] == 'blank'){?>
					<div  class="alert alert-danger">
						パスワード(確認用)を入力してください。
					</div>
					<?php }?>

					<?php if(isset($errors['password2']) &&
					$errors['password2'] == 'length'){ ?>
					<div  class="alert alert-danger">
						パスワードは4文字以上を設定してください。
					</div>
					<?php } ?>

					<?php if(isset($errors['password2']) && 
					$errors['password2'] == 'notsame'){ ?>
					<div  class="alert alert-danger">
						パスワード(確認用)はパスワードと同じにしてください。
					</div>
					<?php } ?>

					<br>
					<!-- 送信ボタン -->
					<input type="submit" value="登録確認画面へ">
					<br><br>
					</form>
					
				</div>
			</div>
		</div>

 	</div>
 		
 </body>
 </html>