<?php 
	//ログインページ
 ?>
 <?php 

	$email_o ='';
	$password_o ='';
	$top_flag=0;

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

		if(empty($errors2)){
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

				    <form action=" " method="POST">

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

			 	<a href="touroku.php" class="btn btn-default btn-lg btn-block">
			 		新規会員登録
			 	</a>
					
				</div>
			</div>

			

			<?php } ?>

			<?php 
				if($top_flag == 1){
					
					require('condition.php');
				}
				
			 ?>
		
 	</div>
 		
 </body>
 </html>