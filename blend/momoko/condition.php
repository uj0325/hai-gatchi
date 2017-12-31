<?php
	session_start();
	if(!isset($_SESSION['login'])){
		header('Location:top.php');
		exit();
	}
?>

 <?php 
	//ログイン後クッションページ
 ?>
 <?php 
	$tubuyaki ='';
	$gatch_condition = '';
	$top_flag=1;

	$password_o=$_SESSION['login']['password'];
	$email_o=$_SESSION['login']['email'];
	$user_id=$_SESSION['login']['user_id'];

	$condition_flag=0;

	if(!empty($_POST)){
			//エラー件数チェック
			$errors3 = array();
			
			$gatch_condition=htmlspecialchars($_POST['gatch_condition']);
			$tubuyaki=htmlspecialchars($_POST['tubuyaki']);

			//バリデーション(検証)
			if($tubuyaki == ''){
				$errors3['tubuyaki']='blank';
			}
			elseif(strlen($tubuyaki) > 21){
				$errors3['tubuyaki']='length';
			}
			if($gatch_condition[0] == ''){
				$errors3['gatch_condition']='blank';
			}

			
			if(empty($errors3)){
				$condition_flag=1;
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

 		<div>
	 		<?php //ヘッダーを呼び出す ?>
	 		<?php require('parts/header2.php') ?>
 		</div>

	 	<div>
	 		<?php //サイドバーを呼び出す ?>
	 		<?php require('parts/sidebar2.php') ?>
	 	</div>
 	
 		<div style="position: absolute;top:60px;left: 440px;">
 		
 				<br>
 				<h2 style="text-align: center">コンディション入力</h2>
			 	<br>
			 	<div  style="text-align: center;background-color: #fffaf0;width: 600px">
			 		<br>

			 		<?php if($condition_flag == 0){ ?>
				    <form action="condition.php" method="POST">
				    
					<!-- コンディションのデータ -->
					<label>コンディション選択</label><br>
					<input type="radio" name="gatch_condition" value="i_karaoke.gif">
					<img src="parts_image/i_karaoke.gif" width="60px" style="padding: 5px">
 					<input type="radio" name="gatch_condition" value="i_drive.gif">
 					<img src="parts_image/i_drive.gif" width="60px" style="padding: 5px">
 					<input type="radio" name="gatch_condition" value="i_nomi.gif">
 					<img src="parts_image/i_nomi.gif" width="60px" style="padding: 5px">
 					<input type="radio" name="gatch_condition" value="i_takunomi.gif">
 					<img src="parts_image/i_takunomi.gif" width="60px" style="padding: 5px">
 					<br>
 					<input type="radio" name="gatch_condition" value="i_cafe.gif">
 					<img src="parts_image/i_cafe.gif" width="60px" style="padding: 5px">
 					<input type="radio" name="gatch_condition" value="i_game.gif">
 					<img src="parts_image/i_game.gif" width="60px" style="padding: 5px">
 					<input type="radio" name="gatch_condition" value="i_kaimono.gif">
 					<img src="parts_image/i_kaimono.gif" width="60px" style="padding: 5px">
 					<input type="radio" name="gatch_condition" value="i_meshi.gif">
 					<img src="parts_image/i_meshi.gif" width="60px" style="padding: 5px">
					<input type="radio" name="gatch_condition" value="i_sonota.gif">
					<img src="parts_image/i_sonota.gif" width="60px" style="padding: 5px">
					<br>
					
					<?php if(isset($errors3['gatch_condition']) && 
					$errors3['gatch_condition'] == 'blank'){?>
					<div class="alert alert-danger">
						１つ以上選択してください。
					</div>
					<?php } ?>
					<br>
					

					<!-- ２０文字のつぶやきのデータ -->
					<label>つぶやき入力</label><br>
					<input type ="text" name="tubuyaki" size="35px"
					placeholder="例：今夜は寝ないで遊ぶ!" value="<?php echo $tubuyaki; ?>">	
					<br>
					<?php if(isset($errors3['tubuyaki']) && 
					$errors3['tubuyaki'] == 'blank'){?>
					<div  class="alert alert-danger">
						つぶやきを入力してください。<br>
						※20文字以内でお願いします。
					</div>
					<?php } ?>
					<br>

					<?php if(isset($errors3['tubuyaki']) &&
					$errors3['tubuyaki'] == 'length'){ ?>
					<div  class="alert alert-danger">
						つぶやきは20文字以内で設定してください。
					</div>
					<?php } ?>
					<br>
					<!-- 送信ボタン -->
					<input type="submit" value="GO!">
					<br>

					</form>
					<br>
					<?php } ?>
					
					<?php if($condition_flag == 1){

						$dsn = 'mysql:dbname=hi_gatch;host=localhost';
		  				$user = 'root';
						$password = '';
						$dbh = new PDO($dsn,$user,$password);
						$dbh->query('SET NAMES utf8'); 

						$sql = 'UPDATE `gatch_users` SET
		                      `login`=?,
		                      `picture`=?,
		                      `gatch_condition`=?,
		                     `tubuyaki`=? 
		                       WHERE
		                      `user_id`=?;
		                ';

						$data = array(1,'icon_template.jpg',$gatch_condition,$tubuyaki,$user_id);
						//SQL文を実行する準備を行う
						$stmt = $dbh->prepare($sql);
						//SQL文を実行する(?マークを上書きして実行)
						$stmt->execute($data);

						$_SESSION['user']['user_id']=$user_id;

						header('location:main.php');
						exit();

					} ?>
					
				</div>
			
		
 	</div>
 		
 </body>
 </html>