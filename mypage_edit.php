<?php 
	//マイページ編集画面
	session_start();
	
	$user_id=$_SESSION['mydate']['user_id'];
	$user_password=$_SESSION['mydate']['user_password'];
	$user_email=$_SESSION['mydate']['user_email'];
	$user_name=$_SESSION['mydate']['user_name'];
	$picture=$_SESSION['mydate']['picture'];
	$gatch_condition=$_SESSION['mydate']['gatch_condition'];
	$tubuyaki=$_SESSION['mydate']['tubuyaki'];
	
 ?>

 <?php 
	$tubuyaki ='';
	$gatch_condition = '';
	$email='';
	$picture='';
	$password='';

	$edit_flag=0;

	if(!empty($_POST)){
			//エラー件数チェック
			$errors3 = array();
			
			$new_gatch_condition=htmlspecialchars($_POST['gatch_condition']);
			$new_tubuyaki=htmlspecialchars($_POST['tubuyaki']);
			$new_email=htmlspecialchars($_POST['email']);
			$new_picture=htmlspecialchars($_POST['picture']);
			$new_password=htmlspecialchars($_POST['password'])

			//バリデーション(検証)
			if($new_tubuyaki == ''){
				$errors3['tubuyaki']='blank';
			}
			elseif(strlen($tubuyaki) > 21){
				$errors3['tubuyaki']='length';
			}
			if($new_gatch_condition == ''){
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

 		<div class="container">
 			<div class="row">
 				<br>
 				<h2 style="text-align: center">コンディション入力</h2>
			 	<br>
			 	<div class="col-lg-12" style="text-align: center;background-color: #e5fff2">
			 		<br>

			 		<?php if($edit_flag == 0){ ?>
				    <form action="myid.php" method="POST">
				    
					<!-- コンディションのデータ -->
					<label>コンディション選択</label><br>
					<input type="radio" name="gatch_condition" value="カラオケ">カラオケ
 					<input type="radio" name="gatch_condition" value="飲み会">飲み会
 					<input type="radio" name="gatch_condition" value="ドライブ">ドライブ
 					<input type="radio" name="gatch_condition" value="宅の飲み">宅飲み
 					<br>
 					<input type="radio" name="gatch_condition" value="お茶">お茶
 					<input type="radio" name="gatch_condition" value="ゲーム">ゲーム
 					<input type="radio" name="gatch_condition" value="ショッピング">ショッピング
 					<input type="radio" name="gatch_condition" value="ご飯">ご飯
					<input type="radio" name="gatch_condition" value="その他">その他
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

					</form>
					<br>
					<?php } ?>
					
					<?php if($edit_flag == 1){

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
		
 	</div>
 		
 </body>
 </html>