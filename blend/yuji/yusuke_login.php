<?php 
	// $_SESSIONというスーパーグローバル変数が使えるようになる
	// session_start()がないと$_SESSIONは使えない
	// session_start()は複数回読んではいけない
	session_start();
	require('dbconnect.php');

	// ①バリデーション(検証すること)
	// ②プロフィール画像をアップロードする
	// ③セッションデータを使用して、データを一時的に保持する
	// ④次のページへ移動する

	//初期値（imputタグのvalueの値）
	$username = '';
	$email = '';
	$password = '';

	// 画像のアップロードに関して
	// $_FILES というスーパーグローバル変数を用意する
	// [注意点]
	// $_FILESを使用するには
	// <form>のタグに
	// enctype = "multipart/form-data" という記述が必要

	if(!empty($_POST)){
		// isset()とempty()
		// isset() -> 存在するとTRUEを出力する
		// empty() -> 存在しないとTRUEを出力する
		// !isset() -> isset()の結果と逆を出力する
		// !empty() -> empty()の結果と逆を出力する

		echo 'TomTomボタンが押されちゃう！<br>';

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// エラー件数チェック
		$errors = array();

		if($username == ''){
			// == を使うときは、右辺左辺の比較
			// = を使うときは、右辺を左辺に代入
			// != を使うときは、右辺と左辺が違うときにTRUEを返す
			// echo 'ユーザー名が入力されておりません<br>';
			// 通常の配列の追加
			// $errors[]='blank';
			// array('username'=>'blank');
			$errors['username']='blank';
		}

		if($email == ''){
			$errors['email']='blank';
		}

		if($password == ''){
			$errors['password']='password';
		}elseif (strlen($password) < 6) {
			// var_dump(mb_strlen($username));exit;
			// strlen()関数 文字数をカウントする
			// mb_strlen()関数　文字数をカウントする(日本語対応)
			// strlen('ここの文字') => 数字で文字の数になる
			$errors['password']='length';
		}

		// 画像のバリデーション
		if(!$empty($_FILES['picture']['name'])){
		// ファイル名があったらここの処理が動く

		// 画像の拡張子チェック
		// プログラムは拡張子により挙動が変化します
		// 後ろから3文字抜き出す

		$filename=$_FILES['picture']['name'];
		$ext = substr($filename,-3);
		// echo $filename . 'の拡張子は' . '$ext';
		// exit(); // 強制的に処理を止めるプログラム

		if($ext != 'jpg' && $ext != 'png' && $ext != 'gif'){
			// ここのIF文に入ったら拡張子が[jpg,png,gif]以外
			$errors['picture'] = 'extention';
		}

	}else{
		// ファイル名が無かったら == ファイルをアップロードしない
		$errors['picture'] = 'blank';
	}

	if(empty($errors)){
		echo 'エラーなっしんぐ！確認画面へ移動<br>';

		// エラーがなかったら、「画像を保存」をしましょう
		// move_uploaded_file(設定1,設定2);
		// 画像アップロードする為に用意されている関数
		// 設定1の部分
		// 画像の（場所/ファイル）パスを設定
		// 設定2の部分
		// 保存するパスを設定
		// フォルダの書き込み権限を「読み書き」可能な状態にする！

		move_uploaded_file($_FILES['picture']['tmp_name'],'../profile_image/'.$_FILES['picture']['name']);
		// これで画像保存完了

	// エラーがない場合はセッションにもデータを保存してあげる
	$_SESSION['user_info']['username']=$username;
	$_SESSION['user_info']['email']=$email;
	$_SESSION['user_info']['password']=$password;

	//リダイレクト (ポスト送信を破棄してリンクを飛ばす)
	header('Location: check.php');
	exit;

		}
	}


 ?>




<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>ログイン前</title>
	<style type="text/css">
		body {
			background-color: white;
		}
		.welcome {
			text-align: center;
			background-image: url(login_background.jpg);
			background-size: cover;
			padding-bottom: 300px;
			color: black;
		}
		.form {
			text-align: center;
		}
		.login {
			float: left;
		}
		.resister {
			float: left;
		}
	</style>
</head>
<body>
	<header>
		<div style="height: 80px">
			<img src="../images/gatchi_logo88.gif" alt="ロゴ" style="margin-left:20px; width: 150px;height:80px;">
			<img src="welcome.jpg" alt="ようこそ暇人さん。" style="position: absolute;left: 0px;right: 0px;top: 0px;margin: auto;width:150px;height:80px;">
		</div>
	</header>

	<div class="welcome" style="margin-top: -20px">
		<h1 style="padding-top:150px; font-size: 50px; color: white;">
			WHAT IS 「はい、合致～」？
		</h1>
		<p style="font-weight: bold; font-size: 25px; color: white;">ちょっと暇？急に暇？最速で暇人同士をはい合致！<br>独りが苦手なあなたの心のスキマ、お埋めします。
		</p>


		<div class="form" style="padding-left: 400px; padding-top: 30px; margin-top: 100px">
			<div class="login" style="margin-right: 25px; background-color: #f8f2f2; padding: 0 20px;">

				<p>「はい、合致～」会員ログイン</p>
				<form action="" method="POST" >

				<?php if(isset($errors['login']) && $errors['login'] == 'ng'){ ?>
				<div class="alert alert-danger">
				Eメールアドレスまたはパスワードが違います</div>
				<?php } ?>
					
				</div>

				<!-- メールアドレス名のデータ -->
					<input type="text" name="email" placeholder="メールアドレス" value="<?php echo $email; ?>" style="width: 250px; height: 30px; margin-bottom: 20px;"><br>
				<!-- メールアドレス名のデータ入力終わり -->

				<!-- メールアドレスの入力をバリデート -->
				<?php if(isset($errors['email']) && $errors['email'] == 'blank'){ ?>
				<div class="alert alert-danger">
				Eメールアドレスを入力してください
				</div>
				<?php } ?>
				<!-- メールアドレスのバリデートここまで -->

				<!-- パスワードのデータ -->
				<input type="text" name="password" placeholder="パスワード" style="width: 250px; height: 30px;margin-bottom: 20px;"><br>

				<!-- <a href="../yoka/cushion_page.php">
					<img src="../images/login_button.jpg" typ="submit" style="width: 200px; height: 3px; margin-bottom: 15px;">
				</a> -->

				<!-- <input type="submit" value ="ログイン"style="width: 250px; height: 30px;margin-bottom: 20px;"> -->
				<div style="font-size: 10px;">
					<div style="float: left; font-size: 15px;">
						次回から自動ログインを有効にする
					</div>			
					<input type="checkbox" style="float: left height: 15px; width: 15px;margin-left: 15px;">
				</div>
				</form>
			</div>

			<div class="resister" style="background-color: #f8f2f2; margin-left: 25px; padding: 0 20px; ">
				<p>「はい、合致～」無料会員登録</p>
				<form action="resister.php" method="POST">
					<input type="text" placeholder="ユーザー名" style="width: 250px; height: 30px; margin-bottom: 10px;"><br>
					<input type="text" placeholder="メールアドレス" style="width: 250px; height: 30px; margin-bottom: 10px;" ><br>
					<input type="password" placeholder="パスワード" style="width: 250px; height: 30px; margin-bottom: 10px;"><br>
					<a href="../annabox/portfolio_anna.html"><img src="../images/create_account.jpg" type="submit" style="width: 200px; height: 30px; margin-bottom: 15px;"></a>



					<!-- <input type="submit" value="アカウント作成" style="width: 250px; height: 30px; margin-bottom: 15px;"> -->
				</form>
			</div>
		</div>
	</div>



	<footer style="width: 100%; background-color: #f8f2f2 ; float: left; padding-bottom: 20px;" >
	       <?php 

		require('../footer.html'); 

		?>
    </footer>


</body>
</html>