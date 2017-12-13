<?php
	//行数$iをしていして値を送る処理をする
	
	//すでに定義されている変数
	//$email_o=htmlspecialchars($_POST['email_o']);
	//$password_o=htmlspecialchars($_POST['password_o']);
	//$i

?>

<?php 
	//test
	//echo $i;
 ?>

 <?php 
	//ログインページ
 ?>
 <?php 

	$tubuyaki ='';
	$gatch_condition = '';
	$top_flag=0;

	if(!empty($_POST)){

		$tubuyaki=htmlspecialchars($_POST['tubuyaki']);
		$gatch_condition=htmlspecialchars($_POST['gatch_condition']);

		//エラー件数チェック
		$errors = array();

		//バリデーション(検証)
		if($tubuyaki == ''){
			$errors['tubuyaki']='blank';
		}
		elseif(strlen($tubuyaki) > 21){
			$errors['tubuyaki']='length';
		}
		if($gatch_condition == ''){
			$errors['gatch_condition']='blank';
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
 	<title>コンディション入力画面</title>
 </head>
 <body>
 	<div>
 		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 		<script type="assets/js/bootstrap.js"></script>
 	
 		<?php if($top_flag == 0){ ?>
 		<!-- はい、合致とは～ -->
 		<div class="container">
 			<div class="row">
 				<br>
 				<h2 style="text-align: center">コンディション入力</h2>
			 	<br>
			 	<div class="col-lg-12" style="text-align: center;background-color: #e5fff2">
			 		<br>

				    <form action=" " method="POST">
				    
					<!-- コンディションのデータ -->
					<label>コンディション選択</label><br>
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

					<!-- ２０文字のつぶやきのデータ -->
					<label>つぶやき入力</label><br>
					<input type="text" name="tubuyaki" 
					placeholder="例：今夜は寝ないで遊ぶ!"
					value="<?php echo $email; ?>">
					<br>
					<?php if(isset($errors['tubuyaki']) && 
					$errors['tubuyaki'] == 'blank'){?>
					<div  class="alert alert-danger">
						つぶやきを入力してください。<br>
						※20文字以内でお願いします。
					</div>
					<?php } ?>
					<br>

					<?php if(isset($errors['tubuyaki']) &&
					$errors['tubuyaki'] == 'length'){ ?>
					<div  class="alert alert-danger">
						つぶやきは20文字以上を設定してください。
					</div>
					<?php } ?>
					<br>

					

					<br><br>
					<!-- 送信ボタン -->
					<input type="submit" value="登録確認画面へ">
					<br><br>
					</form>
					<br>
					
					
				</div>
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






