<?php 
	//ログインページ
 ?>
 <?php 

	$username ='';
	$email ='';
	$password ='';
	$password2 ='';
	$top_flag=0;

	if(!empty($_POST)){
		$username=htmlspecialchars($_POST['username']);
		$email=htmlspecialchars($_POST['email']);
		$password=htmlspecialchars($_POST['password']);
		$password2=htmlspecialchars($_POST['password2']);

		//エラー件数チェック
		$errors = array();

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


		
		if(empty($errors)){
			$top_flag=1;
		}
		
	}

 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>新規登録画面</title>
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
 		<div style="position: absolute;top:60px;left: 560px;">

 			<br><center>
 			<h3 style="text-align: center">「はい、合致～」無料会員登録</h3>
			<br></center>
 				
			 	<div style="text-align: center;background-color: #fffaf0">
			 		<br>

				    <form action=" " method="POST">
				    
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
					<br>

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

					<br><br>
					<!-- 送信ボタン -->
					<input type="submit" value="登録確認画面へ">
					<br><br>
					</form>
					<br>
					
				
		</div>
			<?php } ?>

			<?php 
				if($top_flag == 1){
					require('check.php');
				}
				
			 ?>
		
 	</div>
 		
 </body>
 </html>