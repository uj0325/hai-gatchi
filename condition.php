<?php
	//行数$iをしていして値を送る処理をする

	//$email_o=htmlspecialchars($_POST['email_o']);
	//$password_o=htmlspecialchars($_POST['password_o']);
?>


 <?php 
	//ログイン後クッションページ
 ?>
 <?php 

	$tubuyaki ='';
	$gatch_condition = '';
	$condition_flag=0;
	$top_flag=1;

	if(!empty($_POST['user_id'])){

			$user_id=htmlspecialchars($_POST['user_id']);

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
			if($gatch_condition == ''){
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
 	
 		<!-- はい、合致とは～ -->
 		<div class="container">
 			<div class="row">
 				<br>
 				<h2 style="text-align: center">コンディション入力</h2>
			 	<br>
			 	<div class="col-lg-12" style="text-align: center;background-color: #e5fff2">
			 		<br>

			 		<?php if($condition_flag == 0){ ?>
				    <form action="top.php" method="POST">
				    
					<!-- コンディションのデータ -->
					<label>コンディション選択</label><br>
					<input type="radio" name="gatch_condition" value="karaoke">カラオケ
 					<input type="radio" name="gatch_condition" value="nomikai">飲み会
 					<input type="radio" name="gatch_condition" value="drive">ドライブ
 					<input type="radio" name="gatch_condition" value="takunomi">宅飲み
 					<br>
 					<input type="radio" name="gatch_condition" value="otya">お茶
 					<input type="radio" name="gatch_condition" value="game">ゲーム
 					<input type="radio" name="gatch_condition" value="shopping">ショッピング
 					<input type="radio" name="gatch_condition" value="gohan">ご飯
					<input type="radio" name="gatch_condition" value="sonota">その他
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
						つぶやきは20文字以上を設定してください。
					</div>
					<?php } ?>
					<br>
					<!-- 送信ボタン -->
					<input type="submit" value="GO!">
					<br>

					<!-- 隠しデータをformで送信する -->
					<input type="hidden" name="user_password" 
					value="<?php echo $rec[$i]['password']; ?>">
					<input type="hidden" name="user_email" 
					value="<?php echo $rec[$i]['email']; ?>">
					<input type="hidden" name="user_id" 
					value="<?php echo $rec[$i]['user_id']; ?>">
					<input type="hidden" name="email_o" 
					value="<?php echo $email_o; ?>">
					<input type="hidden" name="password_o" 
					value="<?php echo $password_o; ?>">

					</form>
					<br>
					<?php } ?>
					
					// <?php if($condition_flag == 1){?>

						<form method="POST" action="main.php">
							
							<!-- 隠しデータをformで送信する -->
							<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">


						</form>

						<?php
						$dsn = 'mysql:dbname=hi_gatch;host=localhost';
		  				$user = 'root';
						$password = '';
						$dbh = new PDO($dsn,$user,$password);
						$dbh->query('SET NAMES utf8'); 

						$sql = 'UPDATE `gatch_users` SET
		                      `login`=?,
		                      `picture`=?,
		                      `gatch_condition`=?,
		                      `tubuyaki`=?, 
		                      WHERE
		                      `user_id`=?;
		                ';

						$data = array(1,'icon_template.jpg',$gatch_condition,$tubuyaki,$user_id);
						//SQL文を実行する準備を行う
						$stmt = $dbh->prepare($sql);
						//SQL文を実行する(?マークを上書きして実行)
						$stmt->execute($data);

						header('location:main.php');
						exit();

					} ?>
					
				</div>
			</div>
		
 	</div>
 		
 </body>
 </html>