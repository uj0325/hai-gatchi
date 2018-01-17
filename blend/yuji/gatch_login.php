<?php 
session_start();
require('dbconnect.php');

// formのvalueの初期値を設定
$username='';
$email='';
$password='';

// !empty($_POST) => 存在しないの逆==存在する場合のみTRUE になる

if(!empty($_POST)){ // [J-01]
	// このif文の中はログインボタンを押したときのみ動作する
	if (!empty($_POST['login'])) {
	echo 'ログインボタンを押しました<br>';

		// $username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//エラー件数チェック
		$errors = array();

		/*if($username == ''){ // [J-09]
			$errors['username']='blank';
		} // [J-09]usernameがブランクかどうかの条件閉鎖*/

		if($email == ''){ // [J-02]
			$errors['email']='blank';
		} // [J-02]emailがブランクかどうかの条件閉鎖

		if($password == ''){ // [J-03]
			$errors['password']='blank';
		} // [J-03]passwordがブランクかどうかの条件閉鎖

		elseif( strlen($password) < 6 ){ // [J-04]
			$errors['password']='length';
		} // [J-04]passwordの文字数に関する条件閉鎖

		if(empty($errors)){ // [J-05]
			echo 'エラーがありませんでした。確認画面へ移動します<br>';

		// DBと入力項目が一致するかチェックを行う
		// SQL文を作成する
		$sql = "SELECT * FROM `gatchi_users`
				WHERE `email` = ?
				AND `password` = ?";

		// ?マークを代入する
		$data = array($email,$password);
		$stmt = $dbh->prepare($sql);
		// SQL文を準備する
		$stmt->execute($data);
		// ?マークを代入して実行

		// SELECT文はFETCHしないと取得できない
		// 1行取得する
		$record = $stmt->fetch(PDO::FETCH_ASSOC);
		if($record){ // [J-06]
			echo '合致しました<br>';

			// $record['id'] -> DBの値
			// $record['username'] -> DBの値
			// $record['email'] -> DBの値
			// $record['password'] -> DBの値
			// これらはすべてDBのカラムとカラムに入っている値が$recordに入っている状態

			//すべてのユーザーデータが入った変数$recordを一時的に保持しておく
			$_SESSION['login_user'] = $record;

			// リダイレクト (ポスイト送信を破棄してリンクを飛ばす)
			header('Location: cushion_page.php');
			exit();

		} // [J-06] リダイレクト条件閉鎖

		else{ //[J-07]
			$errors['login'] = 'ng';
			// echo 'そんなユーザは登録されてないですよ<br>';
		} // [J-07]リダイレクトされなかったとき閉鎖
		} // [J-05]エラーバリデーション閉鎖
	}


	// このif文の中は会員登録送信ボタンを押したときのみ動作する
	if (!empty($_POST['create'])) {
		echo 'ユーザー作ります<br>';

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// エラーチェック
		$errors = array();

		// バリデーション
		if($username == ''){
			$errors['username']='blank';
		}

		if($email == ''){
			$errors['email']='blank';
		}

		if($password == ''){
			$errors['password']='blank';
		}elseif (strlen($password) < 6) {
			$errors['password']='length';
		}


	//画像のバリデーション
	if(!empty($_FILES['profile_image']['name'])){
		// ファイル名があったら処理開始
		//画像の拡張子をチェックする
		//拡張子の後ろから３文字を抜き出す

		$filename=$_FILES['profile_image']['name'];
		$ext = substr($filename,-3);

		if($ext != 'jpg' && $ext !='png' && $ext !='gif')
			$errors['profile_image'] = 'extention';
	}else{
		$errors['profile_image'] = 'blank';
	}

	var_dump($errors);

	if(empty($errors)){
		echo 'エラーがありませんでした。確認画面へ移動します<br>';

		move_uploaded_file($_FILES['profile_image']['tmp_name'],'profile_image/'.$_FILES['profile_image']['name']);
		// これで画像を保存することができる

		// エラーがない場合はセッションにもデータを保存してあげる
		$_SESSION['user_info']['username']=$username;
		$_SESSION['user_info']['email']=$email;
		$_SESSION['user_info']['password']=$password;
		$_SESSION['user_info']['profile_image']=$filename;

		// リダイレクト
		header('Location: check.php');
		exit();


	}

	}

	}

 ?>




<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ログイン画面</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
	<h1>はい合致〜！| ログイン画面</h1>

	<div class="container">
	<div class="row">
	<div class="col-xs-4">

	<form action="" method="POST" accept-charset="utf-8">
	
	<?php if(isset($errors['login']) && $errors['login'] == 'ng'){ ?>
	<div class="alert alert-danger">
		Eメールアドレスまたはパスワードが違います
	</div>
	<?php } ?>

	<!-- メールアドレス入力エリア -->
	<h3>会員ログイン</h3>
	<label>メールアドレス</label><br>
		<input type="text" name="email" placeholder="Eメールアドレス" value="<?php echo $email; ?>"><br>

	<?php if(isset($errors['email']) && $errors['email'] == 'blank'){ ?>
	<div class="alert alert-danger">
	Eメールアドレスを入力してください</div>
	<?php } // [J-08]Eメールアドレスのブランク確認閉鎖 ?>

	<!-- パスワード入力エリア -->
	<label>パスワード</label><br>
		<input type="text" name="password">
		<br>

	<?php if(isset($errors['password']) && $errors['password'] == 'blank'){ // [J-09] ?>
	<div class="alert alert-danger">
	パスワードを入力してください</div>
	<?php } // [J-09]パスワードのブランク確認閉鎖  ?><br>
	<input type="hidden" name="login" value="login">
	<!-- 送信ボタンエリア -->
	<input type="submit" value="ログイン">

	</form>
	</div>


	<div class="col-xs-8">
	<h3>はい合致〜！ 新規会員登録</h3>

	<form action="" method="POST" enctype="multipart/form-data">

	<label>ユーザー名</label><br>
	<input type="text" name="username" placeholder="例：合致ときめき子" value="<?php echo $username; ?>">
	<br>

	<?php if(isset($errors['username']) && $errors['username'] == 'blank'){ ?>
	<div class="alert alert-danger">
	ユーザー名を入力してください
	</div>
	<?php } ?>

	<!-- メールアドレス入力エリア -->
	<label>メールアドレス</label><br>
		<input type="text" name="email" placeholder="Eメールアドレス" value="<?php echo $email; ?>"><br>

	<?php if(isset($errors['email']) && $errors['email'] == 'blank'){ ?>
	<div class="alert alert-danger">
	Eメールアドレスを入力してください
	</div>
	<?php } ?>

	<!-- パスワード入力エリア -->
	<label>パスワード</label><br>
	<input type="text" name="password">
	<br>

	<?php if(isset($errors['password']) && $errors['password'] == 'blank'){ ?>
	<div class="alert alert-danger">
	パスワードを入力してください
	</div>
	<?php } ?>

	<!-- プロフィール画像アップロードエリア -->
	<label>プロフィール画像</label>
	<input type="file" name="profile_image" accept="image/*">
	<br>

	<?php if(isset($isset['profile_image']) && $errors['profile_image'] == 'blank'){ ?>
	<div class="alert alert-danger">
	画像を選択してください</div>
	<?php } ?>

	<?php if(isset($errors['profile_image']) && $errors['profile_image'] == 'extention'){ ?>
 	<div class="alert alert-danger">
 	使用できる拡張子は、「jpg」，「png」，「gif」のみです。
 	</div>
 	<?php } ?>
 
 	<input type="hidden" name="create" value="create">

 	<!-- 送信ボタンエリア -->
 	<input type="submit" name="登録確認">

 	</form>
		
	</div>


		
	</div>

</div>


</div>

</body>
</html>