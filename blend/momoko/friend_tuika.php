<?php 
	session_start();
	date_default_timezone_set('Asia/Tokyo');

	$user_id=$_SESSION['user']['user_id'];

	$friend_id='';
	$tuika_flag=0;

	$dsn = 'mysql:dbname=hi_gatch;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8'); 

	//Step2 : SQL文を記載する。
	$sql = 'SELECT `user_id`,`created` FROM `gatch_idlist` WHERE `friend_id`=0';

	//Step3 : SQLを実行する。
	$data = array();
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	$rec = $stmt->fetchAll();
	

	if(!empty($_POST)){

		$friend_id=htmlspecialchars($_POST['friend_id']);
		//$friend_idから友人のidのみを取得
		$friendid=explode("_", $friend_id);


		//エラー件数チェック
		$errors = array();

		//バリデーション(検証)
		$count_match=0;
		$count_time_a=0;
		$count_time_b=0;

		$time_now=date("Y-m-d H:i:s", strtotime('-1 day'));

		//友人のidをDBの値と照合する
		for($i=0;$i < count($rec);$i++){
			$tuika_friend=$rec[$i]['user_id'];
			$created_time=$rec[$i]['created'];
			if($tuika_friend != $friendid[0]){
					$count_match++;
			}elseif($tuika_friend == $friendid[0]){
					$count_time_a++;
				if($time_now>$created_time){
					$count_time_b++;
				}
			}
		}

		if($friend_id == ''){
			$errors['friend_id']='blank';
		}elseif($count_match == count($rec)){
			$errors['friend_id']='match';
		}elseif ($count_time_b == $count_time_a) {
			$errors['friend_id']='time';
		}

		if(empty($errors)){
		//アラートで追加したい友人情報を表示
		//本当に友人だったら追加という風にする
		$_SESSION['friendid']=$friendid[0];
		$_SESSION['user']['user_id']=$user_id;
		$_SESSION['time_now']=$time_now;

		$tuika_flag=1;
		}
	}

 ?>

 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title>はい、合致～!メイン画面</title>
 </head>
 <body>
 	<div>
 		<?php //ヘッダーを呼び出す ?>
 		<?php require('parts/header2.php') ?>
 	</div>

 	<div>
 		<?php //サイドバーを呼び出す ?>
 		<?php require('parts/sidebar.php') ?>
 	</div> -->

 	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 	<script type="assets/js/bootstrap.js"></script>
 	
 	<div style="position: absolute;top:60px;left: 470px;width:530px">
 		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
 		<script type="assets/js/bootstrap.js"></script>
 		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
 		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

 		<?php if($tuika_flag == 0){ ?>
 		<div style="text-align: center">
				
				<h3>友人ID入力</h3>
				<h5>※追加したい友人のIDを入力してください。</h5>
				<br>

				<div style="background-color: #fffaf0;padding: 30px">
					<form action="" method="POST">
						<input type="text" name="friend_id">
						<?php if(isset($errors['friend_id']) && $errors['friend_id'] == 'blank'){?>
						<div  class="alert alert-danger">
							友人のidを入力してください。
						</div>
						<?php } ?>
						<?php if(isset($errors['friend_id']) && $errors['friend_id'] == 'match'){?>
						<div  class="alert alert-danger">
							友人のidが間違っています。
						</div>
						<?php } ?>
						<?php if(isset($errors['friend_id']) && $errors['friend_id'] == 'time'){?>
						<div  class="alert alert-danger">
							このIDは有効時間がもう過ぎています。
						</div>
						<?php } ?>

						<button type="submit" class="btn btn-success">送信</button>
					</form>
				</div>

				<br>
				<h5>マイIDを友達に教えることで「はい、合致～」の友達追加ができます。</h5>
				<h6>※マイIDは友達一人につき一つ必要です。</h6>
				<h6>※友人追加はマイID発行後24時間以内にする必要があります。</h6>
		</div>
		<?php } ?>

		<?php if($tuika_flag == 1){
			header('location:friend_tuika_check.php');
			exit();
		 } ?>

 	</div>

 	
 
 </body>
 </html>